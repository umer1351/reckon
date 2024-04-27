<!-- Add SKU Modal -->
<div class="modal fade" id="addSkuModal" tabindex="-1" role="dialog" aria-labelledby="addSkuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSkuModalLabel">Add SKU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form for adding SKU -->
        <form action="add_sku.php" method="POST">
          <div class="form-group">
            <label for="name">Dimensional Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
          </div>
          <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" required>
          </div>
          <div class="form-group">
            <label for="size">Size</label>
            <input type="text" class="form-control" id="size" name="size" required>
          </div>
          <!-- Add other necessary fields here -->
          <button type="button" class="btn btn-primary" onclick="addSku(1)">Add SKU</button>
        </form>
      </div>
    </div>
  </div>
</div>