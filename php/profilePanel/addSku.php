<!-- // add_sku.php -->
<?php
    // Include your database connection file
    require '../../config.php';

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $name = $_POST['name'];
        $description = $_POST['description'];
        $code = $_POST['code'];
        $size = $_POST['size'];
        
        // Insert data into the database
        $sql = "INSERT INTO sku_codes (name, description, code, size) VALUES ('$name', '$description', '$code', '$size')";
        $query = mysqli_query($link, $sql);
        
        if ($query) {
            // Redirect to some success page or refresh the current page
            // header('Location: index.php');
            exit;
        } else {
            // Handle error
            echo "Error: " . mysqli_error($link);
        }
    }
?>

