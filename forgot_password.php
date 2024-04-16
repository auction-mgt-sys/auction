<?php
session_start();

include('admin/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the users table
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email_sql);

    if (mysqli_num_rows($result) > 0) {
        $verification_code = mt_rand(100000, 999999); // Generate a 6-digit verification code

        // Insert the verification code into the password_reset table
        $sql = "INSERT INTO password (email, verification_code, created_at) VALUES ('$email', '$verification_code', NOW())";
        
        if (mysqli_query($conn, $sql)) {
            // Send the email with PHPMailer
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP();
            $mail->Host = 'smtp.example.com'; // Your SMTP server address
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@example.com'; // SMTP username
            $mail->Password = 'your-password'; // SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            
            $mail->setFrom('webmaster@example.com', 'Webmaster');
            $mail->addAddress($to);
            $mail->Subject = 'Password Reset Verification Code';
            $mail->Body    = 'Your verification code is: ' . $verification_code;

            if($mail->send()) {
                echo json_encode(['status' => 'success', 'message' => 'Verification code sent to your email!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to send email: ' . $mail->ErrorInfo]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
    } else {
        echo json_encode(['status' => 'email_not_found']);
    }

    exit;
}
?>


<div class="container-fluid">
    <form action="" method="post" id="forgot-password-frm">
        <div class="form-group">
            <label for="" class="control-label">Enter Your Email</label>
            <input type="email" name="email" required="" class="form-control">
        </div>
        <button class="button btn btn-primary btn-sm">Submit</button>
        <button class="button btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
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
    $('#forgot-password-frm').submit(function(e){
        e.preventDefault();
        start_load();
        if($(this).find('.alert-danger').length > 0 )
            $(this).find('.alert-danger').remove();
        $.ajax({
            url: 'forgot_password.php',
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
                        location.reload();
                    }, 4000);
                } else if(resp.status === 'email_not_found'){
                    $('#messageModal .modal-body').html('<div class="alert alert-danger">Email not found!</div>');
                    $('#messageModal').modal('show');
                    end_load();
                } else {
                    $('#messageModal .modal-body').html('<div class="alert alert-danger">Error occurred: ' + resp.message + '</div>');
                    $('#messageModal').modal('show');
                    end_load();
                }
            }
        });
    });
</script>
<html></html>