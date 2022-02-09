<?php
session_start();
require_once('../config.php');

if (isset($_POST['submit'])) {
    // $id = $_GET['id'];

    $testimonal_black_head = filter_var($_POST['testimonal_black_head'], FILTER_SANITIZE_STRING);
    $testimonal_green_head = filter_var($_POST['testimonal_green_head'], FILTER_SANITIZE_STRING);
    $testimonal_sub_head = filter_var($_POST['testimonal_sub_head'], FILTER_SANITIZE_STRING);
    $testimonal_sub_head = strtoupper($testimonal_sub_head);

    if (empty($testimonal_black_head)) {
        $_SESSION['error_msg_testimonal_black_head'] = "Testimonial Black Heading  Requried";
        header('location: testimonial.php');
    } elseif (empty($testimonal_green_head)) {
        $_SESSION['error_msg_testimonal_green_head'] = "Testimonial Green Heading Requried";
        header('location: testimonial.php');
    } elseif (empty($testimonal_sub_head)) {
        $_SESSION['error_msg_testimonal_sub_head'] = "Testimonial Sub Heading  Requried";
        header('location: testimonial.php');
    } else {
        // echo 'update kora jabe';
        $get_query = "SELECT COUNT(*) AS total_testimonal FROM testimonal_heads ";
        $db_query_result = mysqli_query($db_conect, $get_query);
        $after_assoc = mysqli_fetch_assoc($db_query_result);
        // print_r($after_assoc);

        if ($after_assoc['total_testimonal'] == 0) {
            $insert_query = "INSERT INTO `testimonal_heads`(`testimonal_black_head`, `testimonal_green_head`, `testimonal_sub_head`) VALUES ('$testimonal_black_head','$testimonal_green_head','$testimonal_sub_head')";
            mysqli_query($db_conect, $insert_query);
            $_SESSION['update_success']="Testimonal Update Sucessfully!!";

            header('location: testimonial.php');
        } else {
            $_SESSION['error_msg_testimonal'] = "Testimonal Already Register Please Edit";
            header('location: testimonial.php');
        }
    }
}
