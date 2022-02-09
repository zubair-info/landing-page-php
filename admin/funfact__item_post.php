<?php
session_start();
require_once('../config.php');
// print_r($_POST);

$funfact_counter = filter_var($_POST['funfact_counter'], FILTER_SANITIZE_NUMBER_INT);
$white_head = filter_var($_POST['white_head'], FILTER_SANITIZE_STRING);


if (empty($funfact_counter)) {
    $_SESSION['error_msg_funfact_counter'] = "Funfact Counter Number Requried";
    header('location: funfact_item.php');
} elseif (empty($white_head)) {
    $_SESSION['error_msg_white_head'] = "Funfact White Heading Requried";
    header('location: funfact_item.php');
} else {
    // echo 'update kora jabe';
    $insert_query = "INSERT INTO `funfact_items`(`funfact_counter`,`white_head`) VALUES ('$funfact_counter','$white_head')";
    mysqli_query($db_conect, $insert_query);
    header('location: funfact_item.php');
    $_SESSION['update_success']="funfact Update Sucessfully!!";

}
