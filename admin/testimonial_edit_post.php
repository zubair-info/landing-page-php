<?php
session_start();
require_once('../config.php');
$id = $_POST['id'];
if (isset($_POST['submit'])) {
    $testimonal_black_head = filter_var($_POST['testimonal_black_head'], FILTER_SANITIZE_STRING);
    $testimonal_green_head = filter_var($_POST['testimonal_green_head'], FILTER_SANITIZE_STRING);
    $testimonal_sub_head = filter_var($_POST['testimonal_sub_head'], FILTER_SANITIZE_STRING);
    $testimonal_sub_head = strtoupper($testimonal_sub_head);

    if (empty($testimonal_black_head)) {
        $_SESSION['error_msg_testimonal_black_head'] = "Testimonial Black Heading  Requried";
        header('location: testimonial_edit.php');
    } elseif (empty($testimonal_green_head)) {
        $_SESSION['error_msg_testimonal_green_head'] = "testimonial Green Heading Requried";
        header('location: testimonial_edit.php');
    } elseif (empty($testimonal_sub_head)) {
        $_SESSION['error_msg_testimonal_sub_head'] = "testimonial Sub Heading  Requried";
        header('location: testimonial_edit.php');
    } else {
        // echo 'update kora jabe';
        $update_query_testimonal = "UPDATE `testimonal_heads` SET `testimonal_black_head`='$testimonal_black_head',`testimonal_green_head`='$testimonal_green_head',`testimonal_sub_head`='$testimonal_sub_head' WHERE id=$id";
        mysqli_query($db_conect, $update_query_testimonal);
        header('location: testimonial.php');
    }
}
