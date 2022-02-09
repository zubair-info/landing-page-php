<?php
session_start();
require_once('../config.php');
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
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
                    <h1>Message Heads</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Message Heads</li>
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
                            <h3 class="card-title text-capitalize">Meaasge Head Add Form</h3>
                        </div>
                        <div class="card-body">
                            <?php

                            if (isset($_SESSION['error_msg'])) {

                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    echo $_SESSION['error_msg'];
                                    unset($_SESSION['error_msg']);

                                    ?>
                                </div>

                            <?php
                            }

                            ?>
                            <form action="message_head_post.php" method="post">

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Black Heading</label>
                                    <input type="text" name="black_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_black_head'])) {
                                            echo $_SESSION['error_msg_black_head'];
                                            unset($_SESSION['error_msg_black_head']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize"> Green Heading</label>
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
                                    <label for="" class="text-capitalize"> sub Heading</label>
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

                                <button class="btn btn-success" name="submit" type="submit">Add Message Head</button>
                            </form>

                        </div>

                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title text-capitalize">message head List</h3>
                        </div>

                        <div class="card-body box-body table-responsive no-padding">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th> Green Heading</th>
                                        <th>Black Heading</th>
                                        <th> sub Heading</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM message_heads";
                                    $db_from = mysqli_query($db_conect, $get_query);

                                    $count = 0;

                                    foreach ($db_from as $message_heads) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $message_heads['black_head'] ?></td>
                                            <td><?= $message_heads['green_head'] ?></td>
                                            <td><?= $message_heads['sub_head'] ?></td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                                    <a href="message_heads_edit.php?message_heads_id=<?= $message_heads['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="testimonial_delete.php?message_heads_id=<?= $message_heads['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="message_heads_delete.php?message_head_id=<?= $message_heads['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>



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