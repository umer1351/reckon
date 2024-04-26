<?php
// Include the database configuration
include "../config.php";

// Get the SKU value from the AJAX request
$sku = $_POST['sku'];

// Prepare and execute the SQL query to fetch the price and description based on the SKU
$sql = "SELECT price, description FROM item_lists WHERE sku = '$sku'";
$result = mysqli_query($link, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the price and description from the result
    $row = mysqli_fetch_assoc($result);
    $price = $row['price'];
    $description = $row['description'];

    // Calculate the total price by multiplying with the request value
    $totalPrice = $price * $_POST['request'];

    // Return the price and description as JSON
    echo json_encode(['success' => true, 'price' => $price, 'totalPrice'=>$totalPrice, 'description' => $description]);
} else {
    // Return an error message if the query fails
    echo json_encode(['success' => false, 'message' => 'Failed to fetch price']);
}
?>
