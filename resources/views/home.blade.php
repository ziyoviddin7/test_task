<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Task</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>

<body>

    <ul class="nav justify-content-end" style="font-size: 40px">
        <form action="{{ route('user.logout') }}" method="post">
            @csrf
                <a style="margin-right: 40px; color: black;"
                    href="{{ route('user.logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
            </div>
        </form>

    </ul>
    <div class="container mt-5" style="margin-left: 700px">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">
            Add Task
        </button>
        <button type="button" class="btn btn-primary btn-dark" data-bs-toggle="modal" data-bs-target="#addTagModal">
            Add Tag
        </button>
    </div>

    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="taskForm">
                        <div class="mb-3">
                            <label for="taskTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="taskTitle" name="title"
                                placeholder="Enter task title" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskText" class="form-label">Description</label>
                            <textarea class="form-control" id="taskText" name="text" rows="3" placeholder="Enter task description"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="taskTags" class="form-label">Tags</label>
                            <select class="form-select" multiple aria-label="multiple select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Save Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTagModal">Add New Tag</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="tagForm">
                        <div class="mb-3">
                            <label for="taskTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="taskTitle" name="title"
                                placeholder="Enter tag title" required>
                        </div>
                        <button type="submit" class="btn btn-success">Save Tag</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#taskForm').on('submit', function(e) {
                e.preventDefault();
                const formData = {
                    title: $('#taskTitle').val(),
                    text: $('#taskText').val(),
                    tags: $('#taskTags').val(),
                };
            });

            $('#tagForm').on('submit', function(e) {
                e.preventDefault();
                const formData = {
                    title: $('#taskTitle').val(),
                    text: $('#taskText').val(),
                    tags: $('#taskTags').val(),
                };
            });
        });
    </script>
</body>

</html>
