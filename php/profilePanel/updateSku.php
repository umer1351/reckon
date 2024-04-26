<!-- // update_sku.php -->
<?php
    // Include your database connection file
    require '../../config.php';

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Retrieve form data
        $id = $_POST['id']; // Assuming you have an 'id' field in the form
        $name = $_POST['name'];
        $description = $_POST['description'];
        $code = $_POST['code'];
        $size = $_POST['size'];
        
        // Update data in the database
        $sql = "UPDATE sku_codes SET name='$name', description='$description', code='$code', size='$size' WHERE id=$id";
        $query = mysqli_query($link, $sql);
         // print_r($_POST);
        // exit;
        
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
