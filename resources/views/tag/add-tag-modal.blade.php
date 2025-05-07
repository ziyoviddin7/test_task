<div class="modal fade" id="createTagModal" tabindex="-1" aria-labelledby="createTagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="tagForm">
          <div class="modal-header">
            <h5 class="modal-title" id="createTagModalLabel">New Tag</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="tagTitle" class="form-label">Tag Title</label>
              <input type="text" class="form-control" id="tagTitle" name="title" required minlength="3" maxlength="20">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save Tag</button>
          </div>
        </form>
      </div>
    </div>
  </div>