<!-- Update SKU Modal -->
<div class="modal fade" id="updateSkuModal" tabindex="-1" role="dialog" aria-labelledby="updateSkuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateSkuModalLabel">Update SKU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form for updating SKU -->
        <form  id="updateSku" method="POST">
          <div class="form-group">
            <label for="update_name">Dimensional Name</label>
            <input type="text" class="form-control" id="update_name" name="update_name" required>
          </div>
          <div class="form-group">
            <label for="update_description">Description</label>
            <input type="text" class="form-control" id="update_description" name="update_description" required>
          </div>
          <div class="form-group">
            <label for="update_code">Code</label>
            <input type="text" class="form-control" id="update_code" name="update_code" required>
          </div>
          <div class="form-group">
            <label for="update_size">Size</label>
            <input type="text" class="form-control" id="update_size" name="update_size" required>
          </div>
          <!-- Add other necessary fields here -->
          <input type="hidden" id="update_id" name="update_id">
          <button type="submit" class="btn btn-primary">Update SKU</button>
        </form>
      </div>
    </div>
  </div>
</div>