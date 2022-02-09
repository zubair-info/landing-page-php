<?php
session_start();
require_once('../config.php');
$id = $_POST['id'];

$black_head = filter_var($_POST['black_head'], FILTER_SANITIZE_STRING);
$green_head = filter_var($_POST['green_head'], FILTER_SANITIZE_STRING);
$sub_head = filter_var($_POST['sub_head'], FILTER_SANITIZE_STRING);
$sub_head = strtoupper($sub_head);

if (empty($black_head)) {
    $_SESSION['error_msg_black_head'] = " Black Heading  Requried";
    header('location: message_heads_edit.php');
} elseif (empty($green_head)) {
    $_SESSION['error_msg_green_head'] = " Green Heading Requried";
    header('location: message_heads_edit.php');
} elseif (empty($sub_head)) {
    $_SESSION['error_msg_sub_head'] = " Sub Heading  Requried";
    header('location: message_heads_edit.php');
} else {
    $update_query = "UPDATE `message_heads` SET `black_head`='$black_head',`green_head`='$green_head',`sub_head`='$sub_head' WHERE id=$id";
    mysqli_query($db_conect, $update_query);
    header('location: message_head.php');
}
