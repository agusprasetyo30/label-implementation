<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "label_example";

    $koneksi = mysqli_connect($host, $username, $password, $db_name) or trigger_error(mysqli_error($koneksi), E_USER_NOTICE);
?>