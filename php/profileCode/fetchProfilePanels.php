<?php
// Include your database connection file
require '../../config.php';

// Fetch profile panels
$sql = "SELECT id, name FROM sku_codes";
$result = mysqli_query($link, $sql);

// Check if there are any records
if(mysqli_num_rows($result) > 0) {
    // Fetch and output options for the dropdown
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
    }
} else {
    // No records found
    echo "<option value=''>No profile panels found</option>";
}

// Free result set
mysqli_free_result($result);

// Close connection
mysqli_close($link);
?>
