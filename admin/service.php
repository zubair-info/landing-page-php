<?php
session_start();
require_once('../config.php');
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}

if (isset($_POST['submit'])) {
    // $id = $_GET['id'];

    $service_black_head = filter_var($_POST['service_black_head'], FILTER_SANITIZE_STRING);
    $service_green_head = filter_var($_POST['service_green_head'], FILTER_SANITIZE_STRING);
    $service_sub_head = filter_var($_POST['service_sub_head'], FILTER_SANITIZE_STRING);
    $service_sub_head = strtoupper($service_sub_head);

    if (empty($service_black_head)) {
        $_SESSION['error_msg_service_black_head'] = "Service Black Heading  Requried";
    } elseif (empty($service_green_head)) {
        $_SESSION['error_msg_service_green_head'] = "Service Green Heading Requried";
    } elseif (empty($service_sub_head)) {
        $_SESSION['error_msg_service_sub_head'] = "Service Sub Heading  Requried";
    } else {
        // echo 'update kora jabe';
        // $id = $_POST['id'];

        $get_query = "SELECT COUNT(*) AS total_service FROM service_heads ";
        $db_query_result = mysqli_query($db_conect, $get_query);
        $after_assoc = mysqli_fetch_assoc($db_query_result);

        // print_r($after_assoc);

        if ($after_assoc['total_service'] == 0) {
            $insert_query = "INSERT INTO `service_heads`(`service_black_head`, `service_green_head`, `service_sub_head`) VALUES ('$service_black_head','$service_green_head','$service_sub_head')";
            mysqli_query($db_conect, $insert_query);
            $_SESSION['update_success'] = "Service  Update Sucessfully!!";
        } else {
            $_SESSION['error_msg_service'] = "Service Already Register";
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
                    <h1>Service</h1>
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
                            <h3 class="card-title">Service Add Form</h3>
                        </div>
                        <div class="card-body">
                            <?php

                            if (isset($_SESSION['error_msg_service'])) {

                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    echo $_SESSION['error_msg_service'];
                                    unset($_SESSION['error_msg_service']);

                                    ?>
                                </div>

                            <?php
                            }

                            ?>
                            <form action=" " method="post">

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Service Black Heading</label>
                                    <input type="text" name="service_black_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_service_black_head'])) {
                                            echo $_SESSION['error_msg_service_black_head'];
                                            unset($_SESSION['error_msg_service_black_head']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Service sub Heading</label>
                                    <input type="text" name="service_green_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_service_green_head'])) {
                                            echo $_SESSION['error_msg_service_green_head'];
                                            unset($_SESSION['error_msg_service_green_head']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Service sub Heading</label>
                                    <input type="text" name="service_sub_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_service_sub_head'])) {
                                            echo $_SESSION['error_msg_service_sub_head'];
                                            unset($_SESSION['error_msg_service_sub_head']);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <button class="btn btn-success" name="submit" type="submit">Add Service</button>
                            </form>

                        </div>

                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Service List </h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Service Green Heading</th>
                                        <th>Service Black Heading</th>
                                        <th>Service sub Heading</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM service_heads";
                                    $db_from = mysqli_query($db_conect, $get_query);

                                    $count = 0;

                                    foreach ($db_from as $service) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $service['service_black_head'] ?></td>
                                            <td><?= $service['service_green_head'] ?></td>
                                            <td><?= $service['service_sub_head'] ?></td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                                    <a href="service_edit.php?service_id=<?= $service['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="service_delete.php?service_id=<?= $service['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="service_delete.php?service_id=<?= $service['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>


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
    </section>
    <!-- /.col -->
</div>




<?php
require_once('inc/admin_footer.php');
?>