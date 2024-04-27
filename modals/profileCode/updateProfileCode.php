<!-- Update Profile Code Modal -->
<div class="modal fade" id="updateProfileCodeModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileCodeModalLabel">Update Profile Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateProfileCodeForm">
                <div class="modal-body">
                    <input type="hidden" id="update_profile_code_id" name="profile_code_id">
                    <div class="form-group">
                        <label for="update_profile_panel_id">Profile Panel:</label>
                        <select class="form-control" id="update_profile_panel_id" name="profile_panel_id" required>
                            <!-- Options will be populated dynamically using JavaScript -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="update_code_heading">Code Heading:</label>
                        <input type="text" class="form-control" id="update_code_heading" name="code_heading" required>
                    </div>
                    <div class="form-group">
                        <label for="update_code">Code:</label>
                        <input type="text" class="form-control" id="update_code" name="code" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Profile Code</button>
                </div>
            </form>
        </div>
    </div>
</div>