<?php
session_start();

include('admin/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $verification_code = $_POST['verification_code'];
    $new_password = $_POST['new_password'];

    // Check if the verification code matches
    $check_code_sql = "SELECT * FROM password WHERE email = '$email' AND verification_code = '$verification_code'";
    $result = mysqli_query($conn, $check_code_sql);

    if (mysqli_num_rows($result) > 0) {
        // Update the password in the users table
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_password_sql = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";
        
        if (mysqli_query($conn, $update_password_sql)) {
            // Delete the verification code from the password table
            $delete_code_sql = "DELETE FROM password WHERE email = '$email' AND verification_code = '$verification_code'";
            mysqli_query($conn, $delete_code_sql);

            echo json_encode(['status' => 'success', 'message' => 'Password updated successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update password: ' . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(['status' => 'invalid_code', 'message' => 'Invalid verification code']);
    }

    exit;
}
?>
