<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="taskForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="taskTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="taskTitle" name="title" required
                            minlength="3" maxlength="20">
                    </div>
                    <div class="mb-3">
                        <label for="taskText" class="form-label">Text</label>
                        <textarea class="form-control" id="taskText" name="text" maxlength="200"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="taskTags" class="form-label">Tags</label>
                        <select id="taskTags" name="tags[]" class="form-select" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Task</button>
                </div>
            </form>
        </div>
    </div>
</div>