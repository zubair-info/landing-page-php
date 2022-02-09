<?php
session_start();
require_once('../config.php');

if (isset($_POST['submit'])) {
    // $id = $_GET['id'];

    $black_head = filter_var($_POST['black_head'], FILTER_SANITIZE_STRING);
    $green_head = filter_var($_POST['green_head'], FILTER_SANITIZE_STRING);
    $sub_head = filter_var($_POST['sub_head'], FILTER_SANITIZE_STRING);
    $sub_head = strtoupper($sub_head);

    if (empty($black_head)) {
        $_SESSION['error_msg_black_head'] = " Black Heading  Requried";
        header('location: message_head.php');
    } elseif (empty($green_head)) {
        $_SESSION['error_msg_green_head'] = " Green Heading Requried";
        header('location: message_head.php');
    } elseif (empty($sub_head)) {
        $_SESSION['error_msg_sub_head'] = " Sub Heading  Requried";
        header('location: message_head.php');
    } else {
        // echo 'update kora jabe';
        $get_query = "SELECT COUNT(*) AS total_meaasge_head FROM message_heads";
        $db_query_result = mysqli_query($db_conect, $get_query);
        $after_assoc = mysqli_fetch_assoc($db_query_result);
        // print_r($after_assoc);

        if ($after_assoc['total_meaasge_head'] == 0) {
            $insert_query = "INSERT INTO `message_heads`(`black_head`, `green_head`, `sub_head`) VALUES ('$black_head','$green_head','$sub_head')";
            mysqli_query($db_conect, $insert_query);
            $_SESSION['update_success'] = "Message Head Update Sucessfully!!";

            header('location: message_head.php');
        } else {
            $_SESSION['error_msg'] = "Message Head Already Register Please Edit";
            header('location: message_head.php');
        }
    }
}
