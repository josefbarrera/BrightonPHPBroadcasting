<?php

namespace App\Listeners;

use App\Events\EmitScriptOutput;
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
        //
    }
}
