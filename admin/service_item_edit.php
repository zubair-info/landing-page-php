<?php
session_start();
require_once('../config.php');
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}


$id = $_GET['service_id'];
$get_query = "SELECT * FROM service_items WHERE id=$id";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);
// header('location: guest_message.php');

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Service item Editt</h1>
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
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Service Item Edit</h3>
                        </div>

                        <div class="card-body">
                            <form action="service_item_edit_post.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>" class="form-control">

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Service Item Heading</label>
                                    <input type="text" name="service_head" value="<?= $after_assoc['service_head'] ?>" class="form-control">
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
                                    <textarea rows="4" cols="50" class="form-control" name="service_detail" /><?php echo $after_assoc['service_detail'] ?></textarea>
                                    <!-- <input type="text" name="service_detail" value="<?= $after_assoc['service_detail'] ?>" class="form-control"> -->
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
                                    <label for="" class="text-capitalize">Service Image</label>
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
                                <div class="mb-3">
                                    <img src="../<?= $after_assoc['image_location'] ?>" alt="" width="150">
                                </div>

                                <button class="btn btn-success" name="submit" type="submit">Update Items</button>
                            </form>

                        </div>

                    </div>


                </div>

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