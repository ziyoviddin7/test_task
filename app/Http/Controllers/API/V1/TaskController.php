<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskStoreRequest;
use App\Http\Requests\Task\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\Task\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = Task::all();
        return TaskResource::collection($tasks);
    }

    public function store(TaskStoreRequest $taskStoreRequest)
    {
        $data = $taskStoreRequest->validated();
        $task = $this->taskService->store($data);
        return new TaskResource($task);
    }

    public function edit(Task $task, TaskUpdateRequest $taskUpdateRequest)
    {
        $data = $taskUpdateRequest->validated();
        $task = $this->taskService->update($task, $data);
        return new TaskResource($task);
    }

    public function show(Task $task)
    {
        $taskWithTags = $task->load('tags');

        return new TaskResource($taskWithTags);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            "message" => "Task removed"
        ]);
    }
}
