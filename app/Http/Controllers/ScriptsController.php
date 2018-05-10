<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\EmitScriptOutput;

class ScriptsController extends Controller
{
    public function scanRepo()
    {
        $data = json_encode(['message' => 'triggered EmitScriptOutput']);
        event(new EmitScriptOutput($data));
        return "ok";
    }
}
