<?php
session_start();
require_once('../config.php');

$id = $_POST['id'];

// print_r($_FILES);
$brand_image = $_FILES['brand_image'];

// die();
if (empty($brand_image)) {
    $_SESSION['error_msg_sub_head'] = "Sub Head Requried";
    header('location: info_item_edit.php');
} else {

    $image_orginal_name = $_FILES['brand_image']['name'];
    $image_orginal_size = $_FILES['brand_image']['size'];

    if ($_FILES['brand_image']['name']) {



        if ($image_orginal_size <= 2000000) {

            $after_explode = explode('.', $image_orginal_name);
            // print_r($after_explode);
            $image_extention = end($after_explode);
            // print_r($image_extention);
            $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
            if (in_array($image_extention, $allow_extention)) {

                $get_image_location = "SELECT image_location FROM brand_items WHERE id=$id";

                $image_location_form_db = mysqli_query($db_conect, $get_image_location);

                $after_assoc_image_location = mysqli_fetch_assoc($image_location_form_db);
                // echo $after_assoc_image_location['image_location'];

                unlink('../' . $after_assoc_image_location['image_location']);
                $image_new_name = $id . "." . $image_extention;
                $save_location = "../uploads/brand/" . $image_new_name;
                move_uploaded_file($_FILES['brand_image']['tmp_name'], $save_location);
                $image_location = "uploads/brand/" . $image_new_name;
                $update_new_image_query = "UPDATE brand_items SET image_location='$image_location' WHERE id=$id";
                mysqli_query($db_conect, $update_new_image_query);

                header('location: brand_item.php');
                $_SESSION['update_success'] = "Info Item Update Sucessfully!!";
            } else {
                $_SESSION['brand_image'] = "Image Allowed Png,Jpg,Jpeg";
                header('location: brand_item.php');
            }
        } else {
            $_SESSION['brand_image'] = "Image is too big!! more than 2MB";
            header('location: brand_item.php');
        }
    } else {
        $_SESSION['brand_image'] = "Image requried";
        header('location: info_item.php');
    }
}
