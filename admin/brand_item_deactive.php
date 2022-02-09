<?php
// print_r($_GET);
require_once('../config.php');

$id = $_GET['brand_id'];
$update_sts_query = "UPDATE brand_items SET active_sts=1 WHERE id=$id";
mysqli_query($db_conect, $update_sts_query);
header('location: brand_item.php');
