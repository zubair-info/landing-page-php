<?php
session_start();
require_once('../config.php');
// print_r($_POST);
// print_r($_FILES);
// echo '<br>';
$white_head = filter_var($_POST['white_head'], FILTER_SANITIZE_STRING);
$white_head = strtoupper($white_head);
$green_head = filter_var($_POST['green_head'], FILTER_SANITIZE_STRING);
$sub_head = filter_var($_POST['sub_head'], FILTER_SANITIZE_STRING);
$para_one = filter_var($_POST['para_one'], FILTER_SANITIZE_STRING);
$para_two = filter_var($_POST['para_two'], FILTER_SANITIZE_STRING);
// print_r($_FILES);
$funfact_image = $_FILES['funfact_image']['name'];

// die();
if (empty($white_head)) {
    $_SESSION['error_msg_white_head'] = "Requried White Head";
    header('location: funfact.php');
} elseif (empty($green_head)) {
    $_SESSION['error_msg_green_head'] = "Greeen Head Requried";
    header('location: funfact.php');
} elseif (empty($sub_head)) {
    $_SESSION['error_msg_sub_head'] = "Sub Head Requried";
    header('location: funfact.php');
} elseif (empty($sub_head)) {
    $_SESSION['error_msg_sub_head'] = "Sub Head Requried";
    header('location: funfact.php');
} elseif (empty($para_one)) {
    $_SESSION['error_msg_para_one'] = "Paragraph One Requried";
    header('location: funfact.php');
} elseif (empty($para_two)) {
    $_SESSION['error_msg_para_two'] = "Paragraph Two is Requried";
    header('location: funfact.php');
} elseif (empty($funfact_image)) {
    $_SESSION['error_msg_funfact_image'] = "Image Requried";
    header('location: funfact.php');
} else {

    $upload_image_orginal_name = $_FILES['funfact_image']['name'];
    $upload_image_orginal_size = $_FILES['funfact_image']['size'];
    if ($upload_image_orginal_size <= 2000000) {
        $after_explode = explode('.', $upload_image_orginal_name);
        // print_r($after_explode);
        $image_extention = end($after_explode);
        // echo $image_extention;
        $allow_image_extention = array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG');
        if (in_array($image_extention, $allow_image_extention)) {
            $insert_query = "INSERT INTO `funfact`(`white_head`, `green_head`, `sub_head`, `para_one`, `para_two`, `image_location`) VALUES ('$white_head','$green_head','$sub_head','$para_one','$para_two','Primary Location')";
            mysqli_query($db_conect, $insert_query);
            $id_from_db = mysqli_insert_id($db_conect);
            $image_new_name = $id_from_db  . "." . $image_extention;
            $save_location = "../uploads/funfact/" . $image_new_name;
            move_uploaded_file($_FILES['funfact_image']['tmp_name'], $save_location);
            $image_location = "uploads/funfact/" . $image_new_name;
            $update_image_location_query = "UPDATE funfact SET image_location='$image_location' WHERE id=$id_from_db";
            mysqli_query($db_conect, $update_image_location_query);
            header('location: funfact.php');
            $_SESSION['update_success'] = "Funfact Update Sucessfully!!";
        } else {
            $_SESSION['error_msg_funfact_image'] = "Plase Valid Extention Png,Jpg,Jpeg";
            header('location: funfact.php');
        }
    } else {
        $_SESSION['error_msg_funfact_image'] = "Image File Is too Big";
        header('location: funfact.php');
    }
}
