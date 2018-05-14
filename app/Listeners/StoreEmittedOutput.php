<?php

namespace App\Listeners;

use App\Events\EmitScriptOutput;
use App\Models\ScriptOutput;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreEmittedOutput
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EmitScriptOutput  $event
     * @return void
     */
    public function handle(EmitScriptOutput $event)
    {
        $output = new ScriptOutput();
        $output->data = json_encode(
            $event->data,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK
        );
        $output->save();
    }
}
