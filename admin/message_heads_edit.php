<?php
session_start();
require_once('../config.php');
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
if (!isset($_SESSION['user_status'])) {

    header('location:../login.php');
}

if (isset($_GET['message_heads_id'])) {
    $_SESSION['id'] = $_GET['message_heads_id'];
}
$id = $_SESSION['id'];

$get_query = "SELECT * FROM message_heads WHERE id=$id";
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
                    <h1>Message Head</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit From</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
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
                            <form action="message_head_edit_post.php" method="post">

                                <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>" class="form-control">


                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Black Heading</label>
                                    <input type="text" name="black_head" value="<?= $after_assoc['black_head'] ?>" class="form-control">
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
                                    <input type="text" name="green_head" value="<?= $after_assoc['green_head'] ?>" class="form-control">
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
                                    <input type="text" name="sub_head" value="<?= $after_assoc['sub_head'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_sub_head'])) {
                                            echo $_SESSION['error_msg_sub_head'];
                                            unset($_SESSION['error_msg_sub_head']);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <button class="btn btn-success" name="submit" type="submit">Update Message Head</button>
                            </form>

                        </div>

                    </div>


                </div>

            </div>
            <!-- /.card -->
        </div>
    </section> <!-- /.col -->
</div>


<?php
require_once('inc/admin_footer.php');

?>