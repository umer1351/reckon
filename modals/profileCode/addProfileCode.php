<!-- Add Profile Code Modal -->
<div class="modal fade" id="addProfileCodeModal" tabindex="-1" role="dialog" aria-labelledby="addProfileCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProfileCodeModalLabel">Add Profile Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addProfileCodeForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="profile_panel_id">Profile Panel:</label>
                        <select class="form-control" id="profile_panel_id" name="profile_panel_id" required>
                            <option value="" disabled selected>Loading profile panels...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="code_heading">Code Heading:</label>
                        <input type="text" class="form-control" id="code_heading" name="code_heading" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Code:</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Profile Code</button>
                </div>
            </form>
        </div>
    </div>
</div>