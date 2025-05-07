<div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editTaskForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editTaskTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="editTaskTitle" name="title" required minlength="3" maxlength="20">
                    </div>
                    <div class="mb-3">
                        <label for="editTaskText" class="form-label">Text</label>
                        <textarea class="form-control" id="editTaskText" name="text" maxlength="200"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editTaskTags" class="form-label">Tags</label>
                        <select id="editTaskTags" name="tags[]" class="form-select" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
