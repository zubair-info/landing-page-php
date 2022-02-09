<?php
require_once('../config.php');
$id = $_GET['testimonal_id'];


$delete_query = "DELETE FROM `testimonal_heads` WHERE id=$id";
mysqli_query($db_conect, $delete_query);
header('location: testimonial.php');
