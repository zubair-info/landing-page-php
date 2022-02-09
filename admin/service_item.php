<?php
session_start();
ob_start();

require_once('../config.php');
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}

if (isset($_POST['submit'])) {
    // $id = $_GET['id'];

    $service_head = filter_var($_POST['service_head'], FILTER_SANITIZE_STRING);
    $service_head = strtoupper($service_head);
    $service_detail = filter_var($_POST['service_detail'], FILTER_SANITIZE_STRING);
    $service_image = $_FILES['service_image'];
    // print_r($service_image);
    // die();
    $image_orginal_name = $_FILES['service_image']['name'];
    $image_orginal_size = $_FILES['service_image']['size'];

    if (empty($service_head)) {
        $_SESSION['error_msg_service_head'] = "Service  Heading  Requried";
    } elseif (empty($service_detail)) {
        $_SESSION['error_msg_service_detail'] = "Service Details Requried";
    } elseif (empty($service_image)) {
        $_SESSION['error_msg_service_image'] = "Service Image Requried";
    } else {
        // echo 'update kora jabe';

        if ($image_orginal_size <= 2000000) {

            $after_explode = explode('.', $image_orginal_name);
            // print_r($after_explode);
            $image_extention = end($after_explode);
            // print_r($image_extention);
            $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
            if (in_array($image_extention, $allow_extention)) {

                $insert_query = "INSERT INTO `service_items`(`service_head`, `service_detail`, `image_location`) VALUES ('$service_head','$service_detail','Primary Location')";
                mysqli_query($db_conect, $insert_query);
                $id_form_db = mysqli_insert_id($db_conect);
                $image_new_name = $id_form_db . "." . $image_extention;
                $save_location = "../uploads/service/" . $image_new_name;
                move_uploaded_file($_FILES['service_image']['tmp_name'], $save_location);
                $image_location = "uploads/service/" . $image_new_name;
                $update_query = "UPDATE service_items SET image_location='$image_location' WHERE id=$id_form_db";
                mysqli_query($db_conect, $update_query);
                $_SESSION['update_success'] = "Service Item Update Sucessfully!!";
                header('location: service_item.php');
                // ob_end_flush();
            } else {
                $_SESSION['error_msg_service_image'] = "Service Image Requried";
            }
        } else {
            $_SESSION['error_msg_service_image'] = "Image is too big!! more than 2MB";
        }
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Service Item</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Service Item</h3>
                        </div>
                        <div class="card-body">

                            <form action=" " method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Service Item Heading</label>
                                    <input type="text" name="service_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_service_head'])) {
                                            echo $_SESSION['error_msg_service_head'];
                                            unset($_SESSION['error_msg_service_head']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Service Item Details</label>
                                    <!-- <input type="text" name="service_detail" class="form-control"> -->
                                    <textarea type="text" class="form-control" id="service_detail" name="service_detail" rows="4" cols="50"></textarea>
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_service_detail'])) {
                                            echo $_SESSION['error_msg_service_detail'];
                                            unset($_SESSION['error_msg_service_detail']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Service sub Heading</label>
                                    <input type="file" name="service_image" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_service_image'])) {
                                            echo $_SESSION['error_msg_service_image'];
                                            unset($_SESSION['error_msg_service_image']);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <button class="btn btn-success" name="submit" type="submit">Add Items</button>
                            </form>

                        </div>

                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Service Item List </h3>
                        </div>
                        <div class="card-body box-body table-responsive no-paddings">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Item Heading</th>
                                        <th>Item Details</th>
                                        <th>Item Image</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM service_items";
                                    $db_from = mysqli_query($db_conect, $get_query);

                                    $count = 0;

                                    foreach ($db_from as $service) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $service['service_head'] ?></td>
                                            <td><?= $service['service_detail'] ?></td>
                                            <td>
                                                <img src="../<?= $service['image_location'] ?>" alt="" width="150px;">

                                            </td>
                                            <td>
                                                <?php
                                                if ($service['active_sts'] == 1) :
                                                ?>
                                                    <span class="badge bg-success">active</span>

                                                <?php
                                                else :
                                                ?>
                                                    <span class="badge bg-danger">Deactive</span>


                                                <?php
                                                endif

                                                ?>

                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <?php
                                                    if ($service['active_sts'] == 1) :
                                                    ?>
                                                        <a href="service_item_active.php?service_id=<?= $service['id'] ?>" class="btn btn-danger"" class=" btn btn-success">active</a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <a href="service_item_deactive.php?service_id=<?= $service['id'] ?>" class="btn btn-success">Deactive</a>


                                                    <?php
                                                    endif

                                                    ?>

                                                    <a href="service_item_edit.php?service_id=<?= $service['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="service_item_delete.php?service_id=<?= $service['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="service_item_delete.php?service_id=<?= $service['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>


                                                </div>
                                            </td>

                                        </tr>
                                    <?php

                                    }

                                    ?>

                                </tbody>


                            </table>

                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>




<?php
require_once('inc/admin_footer.php');

?>