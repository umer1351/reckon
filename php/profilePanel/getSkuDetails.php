<?php
// Include your database connection file
require '../../config.php';

// Check if SKU ID is provided in the URL
if(isset($_GET['id'])) {
    $skuId = $_GET['id'];

    // Prepare and execute SQL query to fetch SKU details
    $sql = "SELECT * FROM sku_codes WHERE id = $skuId";
    $result = mysqli_query($link, $sql);

    // Check if the query was successful
    if($result) {
        // Fetch SKU details
        $sku = mysqli_fetch_assoc($result);

        // Check if SKU exists
        if($sku) {
            // Convert SKU details to JSON format and output
            echo json_encode($sku);
        } else {
            // SKU not found
            http_response_code(404);
            echo json_encode(array('message' => 'SKU not found.'));
        }
    } else {
        // Error executing the query
        http_response_code(500);
        echo json_encode(array('message' => 'Error fetching SKU details: ' . mysqli_error($link)));
    }
} else {
    // No SKU ID provided in the URL
    http_response_code(400);
    echo json_encode(array('message' => 'SKU ID not provided.'));
}
?>
