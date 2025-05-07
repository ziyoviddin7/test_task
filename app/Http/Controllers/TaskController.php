<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;
        $tags = Tag::all();
        return view('tasks', compact('tasks', 'tags'));
    }
}
