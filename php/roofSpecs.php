<?php

	$sql_panel = "SELECT * FROM sku_codes;";
    $query_panel = mysqli_query($link,$sql_panel);

    $sql_user = "SELECT * FROM users where id = ".$_SESSION['id']."";
    $query_user = mysqli_query($link,$sql_user);
    $row_user = mysqli_fetch_assoc($query_user);

    $sql_pc = "SELECT pc.id AS profile_code_id, pc.code_heading, pc.code, pp.name AS profile_panel_name
        FROM profile_codes pc
        JOIN sku_codes pp ON pc.profile_panel_id = pp.id";
    $result_pc = mysqli_query($link, $sql_pc);

?>