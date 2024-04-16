<?php
session_start();

include('admin/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verification_code = $_POST['verification_code'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $sql = "UPDATE users SET password = '$hashed_password' WHERE email = (SELECT email FROM password_reset WHERE verification_code = '$verification_code')";
        
        if (mysqli_query($conn, $sql)) {
            // Delete the verification code from the password_reset table
            $delete_sql = "DELETE FROM password_reset WHERE verification_code = '$verification_code'";
            mysqli_query($conn, $delete_sql);
            
            $success = "Password reset successfully!";
        } else {
            $error = "Error resetting password!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
    <!-- Add your CSS links here -->
</head>
<body>

<div class="container">
    <h2>Password Reset</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <div class="alert alert-success">
            <?php echo $success; ?>
        </div>
    <?php else: ?>
        <form action="" method="post">
            <input type="hidden" name="verification_code" value="<?php echo $_GET['code']; ?>">
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
