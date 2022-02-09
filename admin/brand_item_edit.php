<?php
session_start();
require_once('../config.php');
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}

if (isset($_GET['brand_id'])) {
    $_SESSION['id'] = $_GET['brand_id'];
}
$id = $_SESSION['id'];
// $id=$_SESSION['']

$get_query = "SELECT * FROM brand_items WHERE id=$id";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);


// print_r($after_assoc);
// header('location: guest_message.php');

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Brand</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Brand Edit</li>
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
                            <h3 class="card-title">Brand Item Edit</h3>
                        </div>
                        <div class="card-body">

                            <form action="brand_item_edit_post.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>" class="form-control">

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">brand Image</label>
                                    <input type="file" name="brand_image" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_image'])) {
                                            echo $_SESSION['error_msg_image'];
                                            unset($_SESSION['error_msg_image']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <img src="../<?= $after_assoc['image_location'] ?>" alt="" width="150">
                                </div>

                                <button class="btn btn-success" name="submit" type="submit">Update Brand</button>
                            </form>

                        </div>
                    </div>


                </div>
                <!-- /.col -->

            </div>
            <!-- /.card -->
        </div>
    </section> <!-- /.col -->
</div>

<?php

require_once('inc/admin_footer.php');

?>