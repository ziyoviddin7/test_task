<script>
    $(document).ready(function() {
        loadTasks();
    });

    // Create Task
    $('#taskForm').on('submit', function(e) {
        e.preventDefault();

        const selectedTags = $('#taskTags').val();

        const formData = {
            title: $('#taskTitle').val(),
            text: $('#taskText').val(),
            tags: selectedTags,
        };

        $.ajax({
            url: '/api/v1/new_task',
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' +
                    '4ade0b52c9b567754a2efbf3d0f69d28950e2c66811340a62c6b7ac5ca129141'
            },
            data: formData,
            success: function(response) {
                alert('Task added!');
                $('#addTaskModal').modal('hide');
                $('#taskForm')[0].reset();
                loadTasks();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });


    // Edit Task
    $(document).on('click', '.edit-task', function() {
        const taskId = $(this).data('id');

        $.ajax({
            url: '/api/v1/task/' + taskId,
            method: 'GET',
            headers: {
                'Authorization': 'Bearer 4ade0b52c9b567754a2efbf3d0f69d28950e2c66811340a62c6b7ac5ca129141'
            },
            success: function(response) {
                const task = response.data;
                $('#editTaskTitle').val(task.title);
                $('#editTaskText').val(task.text);
                $('#editTaskTags').val(task.tags.map(tag => tag
                    .id));

                $('#editTaskModal').modal('show');

                $('#editTaskForm').data('task-id', task.id);
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });

    $('#editTaskForm').on('submit', function(e) {
        e.preventDefault();

        const taskId = $('#editTaskForm').data('task-id');
        const updatedTags = $('#editTaskTags').val();

        const updatedTask = {
            title: $('#editTaskTitle').val(),
            text: $('#editTaskText').val(),
            tags: updatedTags,
        };

        $.ajax({
            url: '/api/v1/task/' + taskId,
            method: 'PATCH',
            headers: {
                'Authorization': 'Bearer 4ade0b52c9b567754a2efbf3d0f69d28950e2c66811340a62c6b7ac5ca129141'
            },
            data: updatedTask,
            success: function(response) {
                alert('Task updated!');
                $('#editTaskModal').modal('hide');
                loadTasks();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });

    // Task List
    function loadTasks() {
        $.ajax({
            url: '/api/v1/tasks',
            method: 'GET',
            headers: {
                'Authorization': 'Bearer 4ade0b52c9b567754a2efbf3d0f69d28950e2c66811340a62c6b7ac5ca129141'
            },
            success: function(response) {
                const tasks = response.data;
                $('#taskList').empty();

                tasks.forEach(function(task) {
                    const taskHtml = `
                    <div class="card mb-2" data-id="${task.id}">
                        <div class="card-body">
                            <h5 class="card-title">${task.title}</h5>
                            <p class="card-text">${task.text}</p>
                            <button class="btn btn-sm btn-warning edit-task" data-id="${task.id}">Edit</button>
                            <button class="btn btn-sm btn-danger delete-task" data-id="${task.id}">Delete</button>
                        </div>
                    </div>
                `;
                    $('#taskList').append(taskHtml);
                });
            },
            error: function(xhr) {
                alert('Ошибка при загрузке задач: ' + xhr.responseJSON?.message || xhr.statusText);
            }
        });
    }

    $(document).on('click', '.delete-task', function() {
        const taskId = $(this).data('id');

        if (confirm('Delete this task?')) {
            $.ajax({
                url: '/api/v1/task/' + taskId,
                method: 'DELETE',
                headers: {
                    'Authorization': 'Bearer 4ade0b52c9b567754a2efbf3d0f69d28950e2c66811340a62c6b7ac5ca129141'
                },
                success: function() {
                    loadTasks();
                },
                error: function(xhr) {
                    alert('Delete error: ' + xhr.responseJSON?.message || xhr.statusText);
                }
            });
        }
    });

    $(document).ready(function() {
        $('#showTasksBtn').on('click', function() {
            $('#tasksSection').show();
            $('#tagsSection').hide();
        });

        $('#showTagsBtn').on('click', function() {
            $('#tasksSection').hide();
            $('#tagsSection').show();
            loadTags();
        });
    });

    

</script>
