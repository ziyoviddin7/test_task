<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Add Task</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>


    <div class="nav justify-content-end" style="font-size: 40px">
        <form action="{{ route('user.logout') }}" method="post">
            @csrf
            <a style="margin-right: 40px; color: black;" href="{{ route('user.logout') }}"
                onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
    </div>
    </form>


    </div>

    <div style="overflow: hidden; margin: 20px;">
        <div style="float: left; margin-left: 100px">
            <button id="showTasksBtn" class="btn btn-outline-primary me-2">Tasks</button>
            <button id="showTagsBtn" class="btn btn-outline-secondary">Tags</button>
        </div>
    
        <div style="float: right; margin-right: 100px;">
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                Add Task
            </button>
            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#createTagModal">
                Add Tag
            </button>
        </div>
    </div>
    

    <div class="container mt-4">
        <div id="tasksSection">
            <h2>Tasks</h2>
            <div id="taskList"></div>
        </div>

        <div id="tagsSection" style="display: none;">
            <h2>Tags</h2>
            <div id="tagList"></div>
        </div>
    </div>


    @include('task.add-task-modal')
    @include('task.edit-task-modal')
    @include('tag.add-tag-modal')
    @include('tag.edit-tag-modal')
    @include('task.tasks-js')
    @include('tag.tag-js')


</body>

</html>
