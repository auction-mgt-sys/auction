<?php
session_start();
include('admin/db_connect.php');

if(isset($_SESSION['login_id'])) {
    $sessionId = $_SESSION["login_id"];

    if(isset($_FILES["image"]["name"])) {
        $imageName = $_FILES["image"]["name"];
        $imageSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];

        if($error === 0) {
            $uploadDir = 'uploads/';
            $newImageName = uniqid() . '_' . $imageName;
            $uploadPath = $uploadDir . $newImageName;

            if(move_uploaded_file($tmpName, $uploadPath)) {
                // Update database with new image name
                $updateQuery = "UPDATE profle SET image = '$newImageName' WHERE id = $sessionId";
                if(mysqli_query($conn, $updateQuery)) {
                    // Database update successful
                    echo "Profile picture updated successfully.";
                } else {
                    // Database update failed
                    echo "Error updating database.";
                }
            } else {
                // File upload failed
                echo "Error uploading file.";
            }
        } else {
            // File upload error
            echo "File upload error: $error";
        }
    } else {
        // No file uploaded
        echo "No file uploaded.";
    }
} else {
    // User not logged in
    header("Location: index.php");
    exit;
}
?>
