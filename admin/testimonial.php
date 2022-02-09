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
                    <h1>Testimonal</h1>
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
                            <h3 class="card-title text-capitalize">Terstimonial Add Form</h3>
                        </div>
                        <div class="card-body">
                            <?php

                            if (isset($_SESSION['error_msg_testimonal'])) {

                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    echo $_SESSION['error_msg_testimonal'];
                                    unset($_SESSION['error_msg_testimonal']);

                                    ?>
                                </div>

                            <?php
                            }

                            ?>
                            <form action="testimonal_post.php" method="post">

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">testimonal Black Heading</label>
                                    <input type="text" name="testimonal_black_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_testimonal_black_head'])) {
                                            echo $_SESSION['error_msg_testimonal_black_head'];
                                            unset($_SESSION['error_msg_testimonal_black_head']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">testimonal sub Heading</label>
                                    <input type="text" name="testimonal_green_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_testimonal_green_head'])) {
                                            echo $_SESSION['error_msg_testimonal_green_head'];
                                            unset($_SESSION['error_msg_testimonal_green_head']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">testimonal sub Heading</label>
                                    <input type="text" name="testimonal_sub_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_testimonal_sub_head'])) {
                                            echo $_SESSION['error_msg_testimonal_sub_head'];
                                            unset($_SESSION['error_msg_testimonal_sub_head']);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <button class="btn btn-success" name="submit" type="submit">Add Testimonal</button>
                            </form>

                        </div>

                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title text-capitalize">Testimonal head List</h3>
                        </div>

                        <div class="card-body box-body table-responsive no-padding">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Testimonal Green Heading</th>
                                        <th>Testimonal Black Heading</th>
                                        <th>Testimonal sub Heading</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM testimonal_heads";
                                    $db_from = mysqli_query($db_conect, $get_query);

                                    $count = 0;

                                    foreach ($db_from as $testimonal) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $testimonal['testimonal_black_head'] ?></td>
                                            <td><?= $testimonal['testimonal_green_head'] ?></td>
                                            <td><?= $testimonal['testimonal_sub_head'] ?></td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                                    <a href="testimonial_edit.php?testimonal_id=<?= $testimonal['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="testimonial_delete.php?testimonal_id=<?= $testimonal['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="testimonial_delete.php?testimonal_id=<?= $testimonal['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>



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
<!-- 
<?php if (isset($_SESSION['testimonial_success'])) : ?>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
    icon: 'success',
    title: '<?php echo $_SESSION['testimonial_success'] ?>'
    })
</script>

<?php endif ?> -->