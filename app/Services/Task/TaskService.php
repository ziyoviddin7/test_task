<?php


namespace App\Services\Task;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    public function store($data)
    {
        $task = Task::create([
            'user_id' => Auth()->id(),
            'title' => $data['title'],
            'text' => $data['text'],
        ]);

        if (isset($data['tags'])) {
            $task->tags()->sync($data['tags']);
        }

        return $task;
    }

    public function update($task, $data)
    {
        $task->update([
            'title' => $data['title'] ?? $task->title,
            'text' => $data['text'] ?? $task->text,
        ]);

        if (isset($data['tags'])) {
            $task->tags()->sync($data['tags']);
        }

        return $task;
    }
}