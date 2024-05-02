<?php
include('admin/db_connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Get the user's current password from the database
    $login_id = $_SESSION['login_id'];
    $query = "SELECT password FROM users WHERE id = $login_id";
    $result = mysqli_query($conn, $query);

    // Check if query executed successfully
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $db_password = $row['password'];
        
        // Verify if the current password matches the one in the database
        if (password_verify($current_password, $db_password)) {
            // Check if the new password and confirm password match
            if ($new_password === $confirm_password) {
                // Hash the new password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                // Update the password in the database
                $update_query = "UPDATE users SET password = '$hashed_password' WHERE id = $login_id";
                $update_result = mysqli_query($conn, $update_query);
                if ($update_result) {
                    // Show a success toastr message
                    echo "<script>$(document).ready(function() {
                            toastr.success('Password updated successfully', 'Success');
                        });</script>";
                } else {
                    echo "Error updating password: " . mysqli_error($conn);
                }
            } else {
                echo "New password and confirm password do not match.";
            }
        } else {
            echo "Incorrect current password.";
        }
    } else {
        echo "Error fetching current password: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Account</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file -->
    <!-- Include Toastr CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
    <div class="container-fluid d-flex h">
        <div class="col-lg-3">
            <br>
            <a href="bidder.php" class="text-start"><b><img src="images/Backspace.png" style="width: 50px; height: 50px;"> BACK To HOME</b></a>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <h5 class="text-center">change your password</h5>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <b>Change Password</b>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="current_password">Current Password:</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password:</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password:</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                </div>
                            
                                <button type="submit" class="btn btn-primary" name="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
