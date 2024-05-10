<?php
require_once 'admin/db_connect.php'; // Include database connection code

// Check if user is logged in
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['login_id']) && isset($_FILES["photo"])) {
    $uid = $_SESSION['login_id'];

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
                
                echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">';
                echo '<div style="text-align: center;">';
                echo json_encode(array(  "Thanks your business licences  updated  successfully!"));
                echo '</div>';
                echo '</div>';
                exit;
            }
            
 else {
                echo json_encode(array("status" => "error", "message" => "Error updating photo: " . $conn->error));
                exit; // Exit to prevent further execution
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Error moving uploaded file."));
            exit; // Exit to prevent further execution
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "File upload error: " . $_FILES['photo']['error']));
        exit; // Exit to prevent further execution
    }
}
?>

<!-- HTML content -->
<!-- HTML content -->
<div class="container-fluid" style="position: relative;">
    <br>

    <div class="row">
        <div class="col-lg-3">
            <a href="bidder.php" class="text-start"><b><img src="images/Backspace.png" style="width: 50px;"> BACK To HOME</b></a>
        </div>
        <div class="card col-lg-9">
            <div class="card-body">
                <br>
                <!-- HTML form for uploading photo -->
                <form id="uploadForm" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label for="business_license">Upload Your Renewed Business License:</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
        <img id="preview" src="#" alt="Preview" style="display: none; max-width: 100%; margin-top: 10px;">
    </div>
    <button type="submit" class="btn btn-primary">Upload Photo</button>
</form>

<script>
    document.getElementById('photo').addEventListener('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>


            </div>
        </div>
    </div>
</div>

<!-- Toast container -->
<div class="fixed-top-bar">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-header bg-success text-white">
            <strong class="mr-auto">Success</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <!-- Success message will be displayed here -->
        </div>
    </div>
</div>
<style>/* Style for toast notification container */
.fixed-top-bar {
    position: fixed;
    top: 10px;
    width: 100%;
    z-index: 1000;
    padding: 15px;
}

/* Style for toast notification */
.toast {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
}

/* Style for success toast header */
.toast-header.bg-success {
    background-color: #28a745;
}

/* Style for error toast header */
.toast-header.bg-danger {
    background-color: #dc3545;
}

/* Style for toast message body */
.toast-body {
    color: #fff;
}
 
</style>
<script>

<$(document).ready(function() {
    $('#uploadForm').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = new FormData(this);

        $.ajax({
            url: '<?php echo $_SERVER['PHP_SELF']; ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status === 'success') {
                    // Display success message in the toast
                    $('.toast-body').text(response.message);
                    $('.toast').removeClass('bg-danger').addClass('bg-success').toast('show');
                } else {
                    // Display error message in the toast
                    $('.toast-body').text(response.message);
                    $('.toast').removeClass('bg-success').addClass('bg-danger').toast('show');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error occurred while uploading photo.');
            }
        });
    });
});

        
</script>