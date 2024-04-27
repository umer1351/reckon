$(document).ready(function() {
    function ajaxRequest(url, method, data, successCallback, errorCallback) {
        $.ajax({
            url: url,
            method: method,
            data: data,
            success: successCallback,
            error: errorCallback
        });
    }

    // Function to handle AJAX requests for fetching profile panels
    function fetchProfilePanels() {
        ajaxRequest('php/profileCode/fetchProfilePanels.php', 'GET', null, function(response) {
            $('#update_profile_panel_id, #profile_panel_id').html(response);
        }, function(xhr, status, error) {
            console.error(error);
        });
    }

    // Function to populate update profile code modal
    $('#updateProfileCodeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var profileCodeId = button.data('id');

        fetchProfilePanels(); // Fetch profile panels

        // Fetch profile code details
        ajaxRequest('php/profileCode/getProfileCodeDetails.php?id=' + profileCodeId, 'GET', null, function(response) {
            var profileCode = JSON.parse(response);
            $('#update_profile_code_id').val(profileCode.id);
            $('#update_profile_panel_id').val(profileCode.profile_panel_id);
            $('#update_code_heading').val(profileCode.code_heading);
            $('#update_code').val(profileCode.code);
        }, function(xhr, status, error) {
            console.error(error);
        });
    });

    // Function to handle form submission for updating profile code
    $('#updateProfileCodeForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        ajaxRequest('php/profileCode/updateProfileCode.php', 'POST', formData, function(response) {
            $('#updateProfileCodeModal').modal('hide');
            location.reload();
        }, function(xhr, status, error) {
            console.error(error);
        });
    });

    // Function to handle deletion of profile code
    $('.delete-profile-code').click(function(e) {
        e.preventDefault();
        var profileCodeId = $(this).data('id');
        if(confirm("Are you sure you want to delete this profile code?")) {
            ajaxRequest('php/profileCode/deleteProfileCode.php', 'POST', { profile_code_id: profileCodeId }, function(response) {
                location.reload();
            }, function(xhr, status, error) {
                console.error(error);
                alert("Error deleting profile code. Please try again.");
            });
        }
    });

    // Function to handle form submission for adding profile code
    $('#addProfileCodeForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        ajaxRequest('php/profileCode/addProfileCode.php', 'POST', formData, function(response) {
            $('#addProfileCodeModal').modal('hide');
            location.reload();
        }, function(xhr, status, error) {
            console.error(error);
        });
    });

    // Fetch profile panels when adding profile code modal is shown
    $('#addProfileCodeModal').on('show.bs.modal', fetchProfilePanels);
});
