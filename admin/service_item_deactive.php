<?php
// print_r($_GET);
require_once('../config.php');

$id = $_GET['service_id'];
$update_sts_query = "UPDATE service_items SET active_sts=1 WHERE id=$id";
mysqli_query($db_conect, $update_sts_query);
header('location: service_item.php');
