<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php
session_start();

include('admin/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $verification_code = $_POST['verification_code'];
    $new_password = $_POST['new_password'];

    // Check if the verification code matches
    $check_code_sql = "SELECT * FROM password_reset WHERE email = '$email' AND verification_code = '$verification_code'";
    $result = mysqli_query($conn, $check_code_sql);

    if (mysqli_num_rows($result) > 0) {
        // Update the password in the users table
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_password_sql = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";
        
        if (mysqli_query($conn, $update_password_sql)) {
            // Delete the verification code from the password_reset table
            $delete_code_sql = "DELETE FROM password_reset WHERE email = '$email' AND verification_code = '$verification_code'";
            mysqli_query($conn, $delete_code_sql);

            echo json_encode(['status' => 'success', 'message' => 'Password updated successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update password']);
        }
    } else {
        echo json_encode(['status' => 'invalid_code', 'message' => 'Invalid verification code']);
    }

    exit;
}
?>

<div class="container-fluid">
    <form action="" method="post" id="reset-password-frm">
        <div class="form-group">
            <label for="" class="control-label">Email</label>
            <input type="email" name="email" required="" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Verification Code</label>
            <input type="text" name="verification_code" required="" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="control-label">New Password</label>
            <input type="password" name="new_password" required="" class="form-control">
        </div>
        <button class="button btn btn-primary btn-sm">Reset Password</button>
    </form>
</div>

<!-- Modal for displaying messages -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Message will be displayed here -->
            </div>
        </div>
    </div>
</div>

<style>
    #uni_modal .modal-footer {
        display: none;
    }
</style>

<script>
    $('#reset-password-frm').submit(function(e){
        e.preventDefault();
        start_load();
        if($(this).find('.alert-danger').length > 0 )
            $(this).find('.alert-danger').remove();
        $.ajax({
            url: 'reset_password.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            error: err => {
                console.log(err);
                end_load();
            },
            success: function(resp){
                if(resp.status === 'success'){
                    $('#messageModal .modal-body').html('<div class="alert alert-success">' + resp.message + '</div>');
                    $('#messageModal').modal('show');
                    setTimeout(function(){
                        location.href = 'login.php'; // Redirect to login page after successful password reset
                    }, 4000);
                } else {
                    $('#messageModal .modal-body').html('<div class="alert alert-danger">' + resp.message + '</div>');
                    $('#messageModal').modal('show');
                    end_load();
                }
            }
        });
    });
</script>

</body>
</html>
