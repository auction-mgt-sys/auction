<?php
session_start();

include('admin/db_connect.php');

$email = $_GET['email'] ?? '';

// Your reset password form and logic goes here
?>

<div class="container-fluid">
    <h2>Reset Password</h2>
    <form action="" method="post" id="reset-password-frm">
        <div class="form-group">
            <label for="" class="control-label">Verification Code</label>
            <input type="text" name="verification_code" required="" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="control-label">New Password</label>
            <input type="password" name="new_password" required="" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Confirm Password</label>
            <input type="password" name="confirm_password" required="" class="form-control">
        </div>
        <button class="button btn btn-primary btn-sm">Reset Password</button>
        <button class="button btn btn-secondary btn-sm" type="button" onclick="window.location.href='forgot_password.php';">Back to Forgot Password</button>
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
    // Add your JavaScript code for reset password form submission and validation here
</script>
