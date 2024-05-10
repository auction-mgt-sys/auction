<?php
require_once 'admin/db_connect.php'; // Include database connection code

// Check if user is logged in
if (isset($_SESSION['login_id'])) {
    $uid = $_SESSION['login_id'];
    // Test session variables here if needed
    // echo "User ID: " . $uid;

    // Check if it's a POST request and if a file named "photo" is uploaded
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
        // Check for file upload errors
        if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            $upload_dir = 'uploads/'; // Directory where images will be uploaded
            $temp_name = $_FILES['photo']['tmp_name'];
            $file_name = $_FILES['photo']['name'];
            $upload_path = $upload_dir . $file_name;

            // Move uploaded file to destination directory
            if (move_uploaded_file($temp_name, $upload_path)) {
                // Update the users table with the file name
                $update_query = "UPDATE users SET bphoto = ? WHERE id = ?";
                $stmt = $conn->prepare($update_query);
                $stmt->bind_param("si", $file_name, $uid);

                if ($stmt->execute()) {
                    echo json_encode(array("status" => "success", "message" => "Photo uploaded successfully!"));
                    exit; // Exit to prevent further execution
                } else {
                    echo json_encode(array("status" => "error", "message" => "Error updating photo: " . $conn->error));
                    exit; // Exit to prevent further execution
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "Error moving uploaded file."));
                exit; // Exit to prevent further execution
            }
        } 
    }
} else {
    echo json_encode(array("status" => "error", "message" => "User not logged in."));
    exit; // Exit to prevent further execution
}
?>
