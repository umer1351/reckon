<?php
include "../config.php";

if (isset($_POST['paint_id'])) {
    $paintId = $_POST['paint_id'];

    // Fetch the color information based on the paint ID from the database
    $sql_color = "SELECT * FROM colors WHERE paint_id = $paintId";
    $result_color = $link->query($sql_color);
    $colors = array();
    if ($result_color && $result_color->num_rows > 0) {
        while ($row_color = $result_color->fetch_assoc()) {
            // Include both color code, ID, and color name in the array
            $color_info = array(
                'id' => $row_color['id'],
                'color' => $row_color['color'],
                'color_code' => $row_color['color_code']
            );
            $colors[] = $color_info;
        }
        echo json_encode($colors); // Return the colors as JSON response
    } else {
        echo json_encode(array());
    }
} else {
    echo "Error: Paint ID not provided.";
}
?>

