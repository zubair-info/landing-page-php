<?php
require_once('../config.php');
$id = $_GET['message_head_id'];


$delete_query = "DELETE FROM `message_heads` WHERE id=$id";
mysqli_query($db_conect, $delete_query);
header('location: message_head.php');
