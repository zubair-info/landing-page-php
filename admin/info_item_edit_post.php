<?php
session_start();
require_once('../config.php');

$id = $_POST['id'];

$white_head = filter_var($_POST['white_head'], FILTER_SANITIZE_STRING);
$white_head = strtoupper($white_head);
$green_head = filter_var($_POST['green_head'], FILTER_SANITIZE_STRING);
$sub_head = filter_var($_POST['sub_head'], FILTER_SANITIZE_STRING);
$para_one = filter_var($_POST['para_one'], FILTER_SANITIZE_STRING);
$para_two = filter_var($_POST['para_two'], FILTER_SANITIZE_STRING);
// print_r($_FILES);
$info_item_image = $_FILES['info_item_image'];

// die();
if (empty($sub_head)) {
    $_SESSION['error_msg_sub_head'] = "Sub Head Requried";
    header('location: info_item_edit.php');
} elseif (empty($white_head)) {
    $_SESSION['error_msg_white_head'] = "Requried Black Head";
    header('location: info_item_edit.php');
} elseif (empty($green_head)) {
    $_SESSION['error_msg_green_head'] = "Black Green Head Requried";
    header('location: info_item_edit.php');
} elseif (empty($para_one)) {
    $_SESSION['error_msg_para_one'] = "Paragraph One Requried";
    header('location: info_item_edit.php');
} elseif (empty($para_two)) {
    $_SESSION['error_msg_para_two'] = "Paragraph Two is Requried";
    header('location: info_item_edit.php');
} else {

    $update_query_info_item = "UPDATE `company_infos` SET `white_head`='$white_head',`green_head`='$green_head',`sub_head`='$sub_head',`para_one`='$para_one',`para_two`='$para_two' WHERE id=$id";
    mysqli_query($db_conect, $update_query_info_item);
    header('location: info_item.php');
    $image_orginal_name = $_FILES['info_item_image']['name'];
    $image_orginal_size = $_FILES['info_item_image']['size'];

    if ($_FILES['info_item_image']['name']) {



        if ($image_orginal_size <= 2000000) {

            $after_explode = explode('.', $image_orginal_name);
            // print_r($after_explode);
            $image_extention = end($after_explode);
            // print_r($image_extention);
            $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
            if (in_array($image_extention, $allow_extention)) {

                $get_image_location = "SELECT image_location FROM company_infos WHERE id=$id";

                $image_location_form_db = mysqli_query($db_conect, $get_image_location);

                $after_assoc_image_location = mysqli_fetch_assoc($image_location_form_db);
                // echo $after_assoc_image_location['image_location'];

                unlink('../' . $after_assoc_image_location['image_location']);
                $image_new_name = $id . "." . $image_extention;
                $save_location = "../uploads/info_item/" . $image_new_name;
                move_uploaded_file($_FILES['info_item_image']['tmp_name'], $save_location);
                $image_location = "uploads/info_item/" . $image_new_name;
                $update_new_image_query = "UPDATE company_infos SET image_location='$image_location' WHERE id=$id";
                mysqli_query($db_conect, $update_new_image_query);

                header('location: info_item.php');
                $_SESSION['update_success']="Info Item Update Sucessfully!!";

            } else {
                $_SESSION['info_item_image'] = "Image Allowed Png,Jpg,Jpeg";
                header('location: info_item.php');
            }
        } else {
            $_SESSION['info_item_image'] = "Image is too big!! more than 2MB";
            header('location: info_item.php');
        }
    } else {
        $_SESSION['info_item_image'] = "Image requried";
        header('location: info_item.php');
    }
}
