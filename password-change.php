<?php
session_start();

$page_title ="password change update";
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

              <?php
              ?>

                <div class="card">
                    <div class="card-header">
                        <h5>change password</h5>
                    </div>
                    <div class="card-body p-4">

                    <form action="password-reset-code.php" method="POST">
                        <input type="hidden" name="password_token" value ="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>">


                        < class="form-group mb-3">
                            <label>Email Address</label>
                            <input type="text" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" class="form-control" placeholder="enter new password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>new Password</label>
                            <input type="text" name="new_password" class="form-control" placeholder="enter new password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>confirm Password</label>
                            <input type="text" name="confirm_password" class="form-control" placeholder="enter confirm password" required>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="password_update" class="btn btn-success w-100>Update</button>

                        </div>

                    </form>
                    </div>
                </div>
                

                

            </div>

        </div>   

    </div>

</div>