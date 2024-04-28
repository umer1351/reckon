<?php
// Assuming you have included your database connection file here
include "../config.php";
// if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['profilePanel'])) {
    // Sanitize the input to prevent SQL injection
    $profilePanelId = mysqli_real_escape_string($link, $_GET['profilePanel']);
    // Query to fetch the profile code based on the profile_panel_id"
    $sql = "SELECT size FROM sku_codes WHERE id = '$profilePanelId'" ;
    $result = mysqli_query($link, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $size = $row['size'];

            // Return the profile code as JSON
            echo json_encode(array('success' => true, 'code' => $size));
            exit;
        } else {
            // No matching profile code found
            echo json_encode(array('success' => false, 'message' => 'Size  not found'));
            exit;
        }
    } else {
        // Error in executing the query
        echo json_encode(array('success' => false, 'message' => 'Error in fetching Size'));
        exit;
    }
// } else {
//     // Invalid request
//     echo json_encode(array('success' => false, 'message' => 'Invalid request'));
//     exit;
// }
?>
