<?php
include 'admin/db_connect.php'; // Include your database connection script
?>

<div class="container-fluid">
    <form action="#" method="post" id="forgot-password-form">
        <div class="form-group">
            <label for="username" class="control-label">Username</label>
            <input type="text" name="username" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="hint" class="control-label">Password Hint</label>
            <input type="text" name="hint" class="form-control" required="">
        </div>
        <div id="new-password-section" style="display: none;">
            <div class="form-group">
                <label for="new_password" class="control-label">New Password</label>
                <input type="password" name="new_password" id="new_password" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="confirm_password" class="control-label">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" required="">
            </div>
        </div>
        <button class="btn btn-primary">Reset Password</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#forgot-password-form').submit(function(e){
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: 'forgot_password_handler.php',
            method: 'POST',
            data: form.serialize(),
            success: function(response){
                console.log(response);
                if(response.success) {
                    $('#new-password-section').show();
                    $('#new_password').val(response.newPassword);
                    $('#confirm_password').val(response.newPassword);
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
            }
        });
    });
</script>
