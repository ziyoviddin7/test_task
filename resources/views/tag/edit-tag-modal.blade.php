<div class="modal fade" id="editTagModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editTagForm">
        <div class="modal-header">
          <h5 class="modal-title">Edit Tag</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="editTagId">
          <div class="mb-3">
            <label for="editTagTitle" class="form-label">Tag Title</label>
            <input type="text" class="form-control" id="editTagTitle" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
