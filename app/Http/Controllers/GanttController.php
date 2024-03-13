<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Link;
use App\Models\User;

class GanttController extends Controller
{

    public function get(int $id){
        $tasks = new Task();
        $links = new Link();
        return response()->json([
            "data" => $tasks->where('user_id', $id)->get(),
            "links" => $links->all(),
        ]);
    }
}
