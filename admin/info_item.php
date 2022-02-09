<?php
session_start();
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
// require_once('inc/sidebar.php');
require_once('../config.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Info Item</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Information</li>
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
                            <h3 class="card-title">Info Item Add</h3>
                        </div>
                        <div class="card-body">

                            <form action="info_item_post.php" method="post" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">info sub Heading</label>
                                    <input type="text" name="sub_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_sub_head'])) {
                                            echo $_SESSION['error_msg_sub_head'];
                                            unset($_SESSION['error_msg_sub_head']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Info Black Heading</label>
                                    <input type="text" name="white_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_white_head'])) {
                                            echo $_SESSION['error_msg_white_head'];
                                            unset($_SESSION['error_msg_white_head']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Info Green Heading</label>
                                    <input type="text" name="green_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_green_head'])) {
                                            echo $_SESSION['error_msg_green_head'];
                                            unset($_SESSION['error_msg_green_head']);
                                        }
                                        ?>
                                    </span>
                                </div>


                                <div class="mb-3">
                                    <label for="" class="text-capitalize">info Pragradh One</label>
                                    <textarea rows="4" cols="50" class="form-control" name="para_one"></textarea>
                                    <!-- <input type="text" name="para_one" class="form-control"> -->
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_para_one'])) {
                                            echo $_SESSION['error_msg_para_one'];
                                            unset($_SESSION['error_msg_para_one']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">info Pragradh Two</label>
                                    <textarea rows="4" cols="50" class="form-control" name="para_two"></textarea>
                                    <!-- <input type="text" name="para_two" class="form-control"> -->
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_para_two'])) {
                                            echo $_SESSION['error_msg_para_two'];
                                            unset($_SESSION['error_msg_para_two']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">info Image</label>
                                    <input type="file" name="info_item_image" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_image'])) {
                                            echo $_SESSION['error_msg_image'];
                                            unset($_SESSION['error_msg_image']);
                                        }
                                        ?>
                                    </span>
                                </div>


                                <button class="btn btn-success" type="submit">Add info</button>
                            </form>

                        </div>

                    </div>


                </div>

                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Info Item List </h3>
                        </div>
                        <div class="card-body box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>White Heading</th>
                                        <th>Green Heading</th>
                                        <th>Sub Heading</th>
                                        <th>Paragraph one</th>
                                        <th>Paragraph Two</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM company_infos";
                                    $db_from = mysqli_query($db_conect, $get_query);
                                    $count = 0;

                                    foreach ($db_from as $info) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $info['white_head'] ?></td>
                                            <td><?= $info['green_head'] ?></td>
                                            <td><?= $info['sub_head'] ?></td>
                                            <td><?= $info['para_one'] ?></td>
                                            <td><?= $info['para_two'] ?></td>
                                            <td>
                                                <img src="../<?= $info['image_location'] ?>" alt="" width="150px;">

                                            </td>
                                            <td>
                                                <?php
                                                if ($info['active_sts'] == 1) :
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
                                                    if ($info['active_sts'] == 1) :
                                                    ?>
                                                        <a href="info_item_active.php?info_id=<?= $info['id'] ?>" class="btn btn-danger"" class=" btn btn-success">active</a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <a href="info_item_deactive.php?info_id=<?= $info['id'] ?>" class="btn btn-success">Deactive</a>


                                                    <?php
                                                    endif

                                                    ?>
                                                    <a href="info_item_edit.php?info_edit_id=<?= $info['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="info_item_delete.php?info_id=<?= $info['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="info_item_delete.php?info_id=<?= $info['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>


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
    </section>
    <!-- /.col -->
</div>


<?php
require_once('inc/admin_footer.php');

?>