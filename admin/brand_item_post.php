<?php
session_start();
require_once('../config.php');


$brand_image = $_FILES['brand_image']['name'];
// print_r($service_image);
// die();
$image_orginal_name = $_FILES['brand_image']['name'];
$image_orginal_size = $_FILES['brand_image']['size'];

if (empty($brand_image)) {
    $_SESSION['error_msg_name'] = "Image   Requried";
    header('location: brand_item.php');
} else {
    // echo 'update kora jabe';

    if ($image_orginal_size <= 2000000) {

        $after_explode = explode('.', $image_orginal_name);
        // print_r($after_explode);
        $image_extention = end($after_explode);
        // print_r($image_extention);
        $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
        if (in_array($image_extention, $allow_extention)) {

            $insert_query = "INSERT INTO `brand_items`( `image_location`) VALUES ('Primary Location')";
            mysqli_query($db_conect, $insert_query);
            $id_form_db = mysqli_insert_id($db_conect);
            $image_new_name = $id_form_db . "." . $image_extention;
            $save_location = "../uploads/brand/" . $image_new_name;
            move_uploaded_file($_FILES['brand_image']['tmp_name'], $save_location);
            $image_location = "uploads/brand/" . $image_new_name;
            $update_query = "UPDATE brand_items SET image_location='$image_location' WHERE id=$id_form_db";
            mysqli_query($db_conect, $update_query);
            // $_SESSION['testimonial_success']="Testimonal Update Sucessfully!!";
            $_SESSION['update_success'] = "Brand Update Sucessfully!!";

            header('location: brand_item.php');
        } else {
            $_SESSION['error_msg_image'] = "Image Allowed Png/Jpg/Jpeg";
            header('location: brand_item.php');
        }
    } else {
        $_SESSION['error_msg_image'] = "Image is too big!! more than 2MB";
        header('location: brand_item.php');
    }
}
