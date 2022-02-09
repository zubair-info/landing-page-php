<?php
session_start();
require_once('../config.php');
$id = $_POST['id'];
// die();
$service_head = filter_var($_POST['service_head'], FILTER_SANITIZE_STRING);
$service_head = strtoupper($service_head);
$service_detail = filter_var($_POST['service_detail'], FILTER_SANITIZE_STRING);
$service_image =  $_FILES['service_image'];
if (isset($_POST['submit'])) {

    if (empty($service_head)) {
        $_SESSION['error_msg_service_head'] = "Service Heading  Requried";
        header('location: service_item_edit.php');
    } elseif (empty($service_detail)) {
        $_SESSION['error_msg_service_detail'] = "Service Heading  Requried";
        header('location: service_item_edit.php');
    } elseif (empty($service_image)) {
        $_SESSION['error_msg_service_image'] = "Service Image  Requried";
        header('location: service_item_edit.php');
    } else {
        // echo 'update kora jabe';
        $update_query_service = "UPDATE `service_items` SET `service_head`='$service_head',`service_detail`='$service_detail',`image_location`='Primary Location' WHERE id=$id";
        mysqli_query($db_conect, $update_query_service);
        header('location: service_item.php');

        if ($_FILES['service_image']['name']) {

            $image_orginal_name = $_FILES['service_image']['name'];
            $image_orginal_size = $_FILES['service_image']['size'];
            if ($image_orginal_size <= 2000000) {

                $after_explode = explode('.', $image_orginal_name);
                // print_r($after_explode);
                $image_extention = end($after_explode);
                // print_r($image_extention);
                $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
                if (in_array($image_extention, $allow_extention)) {

                    $get_image_location = "SELECT image_location FROM service_items WHERE id=$id";

                    $image_location_form_db = mysqli_query($db_conect, $get_image_location);

                    $after_assoc_image_location = mysqli_fetch_assoc($image_location_form_db);

                    // print_r($after_assoc_image_location);
                    // echo $after_assoc_image_location['image_location'];

                    unlink('../' . $after_assoc_image_location['image_location']);
                    $image_new_name = $id . "." . $image_extention;
                    $save_location = "../uploads/service/" . $image_new_name;
                    move_uploaded_file($_FILES['service_image']['tmp_name'], $save_location);
                    $image_location = "uploads/service/" . $image_new_name;
                    $update_new_image_query = "UPDATE service_items SET image_location='$image_location' WHERE id=$id";
                    mysqli_query($db_conect, $update_new_image_query);
                    $_SESSION['update_success']="Service Item Update Sucessfully!!";

                    header('location: service_item.php');
                }
            } else {
                $_SESSION['service_image'] = "Image is too big!! more than 2MB";
                header('location: service_item_edit.php');
            }
        }
    }
}
