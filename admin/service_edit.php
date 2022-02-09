<?php
session_start();
ob_start();
require_once('../config.php');
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
if (!isset($_SESSION['user_status'])) {

    header('location:../login.php');
}


$id = $_GET['service_id'];
$get_query = "SELECT * FROM service_heads WHERE id=$id";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);
// header('location: guest_message.php');

if (isset($_POST['submit'])) {
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
        $update_query_service = "UPDATE `service_heads` SET `service_black_head`='$service_black_head',`service_green_head`='$service_green_head',`service_sub_head`='$service_sub_head' WHERE id=$id";
        mysqli_query($db_conect, $update_query_service);
        header('location: service.php');
        ob_end_flush();
    }
}


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Service Edit</h1>
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
                            <h3 class="card-title">Service Edit</h3>
                        </div>
                        <div class="card-body">
                            <form action=" " method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" class="form-control">


                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Service Black Heading</label>
                                    <input type="text" name="service_black_head" value="<?= $after_assoc['service_black_head'] ?>" class="form-control">
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
                                    <input type="text" name="service_green_head" value="<?= $after_assoc['service_green_head'] ?>" class="form-control">
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
                                    <input type="text" name="service_sub_head" value="<?= $after_assoc['service_sub_head'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_service_sub_head'])) {
                                            echo $_SESSION['error_msg_service_sub_head'];
                                            unset($_SESSION['error_msg_service_sub_head']);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <button class="btn btn-success" name="submit" type="submit">Update Service</button>
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