<?php

namespace App\Models;

use App\Events\EmitScriptOutput;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class BashScript extends Model
{
    public function execute()
    {
        $this->emitEvent('start', 'Scan started');
        $script_path = base_path('external_scripts');
        $process = new Process("sh $script_path/clone_repo.sh");

        try {
            $process->mustRun(function ($type,$buffer) {
                if (Process::ERR === $type) {
                    $message_type = 'error';
                } else {
                    $message_type = 'info';
                }
                $this->emitEvent($message_type, $buffer);
            });
        } catch (ProcessFailedException $e) {
            $this->emitEvent('error', $e->getMessage());
        }
        $this->emitEvent('end', 'Scan finished');
    }

    private function emitEvent($type, $content)
    {
        $data = [
            'type' => $type,
            'date' => date('Y-m-d H:i:s'),
            'content' => $content
        ];
        event(new EmitScriptOutput($data));
    }
}
