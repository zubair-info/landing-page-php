<?php
// print_r($_GET);
require_once('../config.php');

$id = $_GET['funfact_id'];
$update_sts_query = "UPDATE funfact SET active_sts=2 WHERE id=$id";
// $update_sts_query2 = "UPDATE funfact SET active_sts=1 WHERE id!=$id";

mysqli_query($db_conect, $update_sts_query);
// mysqli_query($db_conect, $update_sts_query2);

header('location: funfact.php');
