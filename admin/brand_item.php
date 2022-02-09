<?php
session_start();
ob_start();

require_once('inc/admin_header.php');
require_once('inc/navbar.php');
// require_once('inc/sidebar.php');
require_once('../config.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}
// print_r($_FILES['banner_image']);



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Brand</li>
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
                            <h3 class="card-title text-capitalize">Brand Add From</h3>
                        </div>

                        <div class="card-body">

                            <form action="brand_item_post.php" method="post" enctype="multipart/form-data">

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

                                <button class="btn btn-success" name="submit" type="submit">Add Brand</button>
                            </form>

                        </div>

                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-capitalize">Brand Item List</h3>
                        </div>

                        <div class="card-body box-body table-responsive no-padding">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Item Image</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM brand_items";
                                    $db_from = mysqli_query($db_conect, $get_query);

                                    $count = 0;

                                    foreach ($db_from as $brand) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>

                                            <td>
                                                <img src="../<?= $brand['image_location'] ?>" alt="" width="150px;">

                                            </td>
                                            <td>
                                                <?php
                                                if ($brand['active_sts'] == 1) :
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
                                                    if ($brand['active_sts'] == 1) :
                                                    ?>
                                                        <a href="brand_item_active.php?brand_id=<?= $brand['id'] ?>" class="btn btn-danger"" class=" btn btn-success">active</a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <a href="brand_item_deactive.php?brand_id=<?= $brand['id'] ?>" class="btn btn-success">Deactive</a>


                                                    <?php
                                                    endif

                                                    ?>

                                                    <a href="brand_item_edit.php?brand_id=<?= $brand['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="brand_item_delete.php?brand_id=<?= $brand['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="brand_item_delete.php?brand_id=<?= $brand['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>



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
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section> <!-- /.col -->
</div>


<?php

require_once('inc/admin_footer.php');

?>