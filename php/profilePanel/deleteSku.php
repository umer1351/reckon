<?php
// Include your database connection file
require '../../config.php';

// Check if SKU ID is provided in the POST data
if(isset($_POST['id'])) {
    $skuId = $_POST['id'];

    // Prepare and execute SQL query to delete SKU
    $sql = "DELETE FROM sku_codes WHERE id = $skuId";
    $result = mysqli_query($link, $sql);

    // Check if the query was successful
    if($result) {
        // Return success message
        echo json_encode(array('success' => true));
    } else {
        // Error executing the query
        echo json_encode(array('success' => false, 'error' => mysqli_error($link)));
    }
} else {
    // No SKU ID provided in the POST data
    echo json_encode(array('success' => false, 'error' => 'SKU ID not provided.'));
}
?>
