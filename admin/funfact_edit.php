<?php
session_start();
require_once('../config.php');
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}


$id = $_GET['funfact_id'];
$get_query = "SELECT * FROM funfact WHERE id=$id";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);
// header('location: guest_message.php');

?>

<div class="container">
    <div class="row m-auto">
        <div class="col-lg-8 m-auto">
            <div class="card mt-5">
                <div class="card-header bg-info">
                    <h5 class="cadr-title text-capitalize">Funfact Edit From</h5>
                </div>
                <div class="card-body">

                    <form action="funfact_edit_post.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>" class="form-control">

                            <label for="" class="text-capitalize">Funfact White Heading</label>
                            <input type="text" name="white_head" value="<?= $after_assoc['white_head'] ?>" class="form-control">
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
                            <label for="" class="text-capitalize">Funfact Green Heading</label>
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
                            <label for="" class="text-capitalize">Funfact sub Heading</label>
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
                        <div class="mb-3">
                            <label for="" class="text-capitalize">Funfuct Pragradh One</label>
                            <textarea rows="4" cols="50" class="form-control" name="para_one"><?= $after_assoc['para_one'] ?></textarea>
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
                            <label for="" class="text-capitalize">Funfuct Pragradh Two</label>
                            <textarea rows="4" cols="50" class="form-control" name="para_two"><?= $after_assoc['para_two'] ?></textarea>
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
                            <label for="" class="text-capitalize">Funfuct Image</label>
                            <input type="file" name="funfact_image" class="form-control">
                            <span class="text-danger" style="color:red;">
                                <?php
                                if (isset($_SESSION['error_msg_funfact_image'])) {
                                    echo $_SESSION['error_msg_funfact_image'];
                                    unset($_SESSION['error_msg_funfact_image']);
                                }
                                ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <img src="../<?= $after_assoc['image_location'] ?>" alt="" width="250">
                        </div>


                        <button class="btn btn-success" type="submit">Update Funfact</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
</section>


<?php
require_once('inc/admin_footer.php');


?>