<?php session_start() ?>
<script src="sweetalert.min.js"></script>
<div class="container-fluid">
    <form action="" id="signup-frm" enctype="multipart/form-data">
    <div class="form-group">
    <input type="text" name="name" class="form-control" required="" pattern="[a-zA-Z]{3,15}" title="Please enter a valid name (no numbers or special characters)" placeholder="First Name">
</div>

<div class="form-group">
    <input type="text" name="lname" class="form-control" required="" pattern="[a-zA-Z]{3,15}" title="Please enter a valid last name (no numbers or special characters)" placeholder="Last Name">
</div>

        <div class="form-group">
            <textarea cols="20" rows="2" name="address" required="" class="form-control" placeholder="Address"></textarea>
        </div>
        <div class="form-group">
            <input type="text" name="username" class="form-control" value="" placeholder="User Name">
        </div>
        <div class="d-flex justify-content-center">
            <div class="p-1 col-6">
                <div class="select">
                    <select name="gender" class="form-select form-control" required="">
                        <option value="" selected="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Femal">Femal</option>
                    </select>
                </div>
            </div>
            <div class="p-1 col-6">
                <input type="number" min="18" max="100" name="age" class="form-control" placeholder="Age" required="">
            </div>
        </div>
        <div class="d-flex justify-content-start">
        <div class="p-1 col-6">
    <div class="custom-input-container">
        <span class="country-code">+251</span>
        <input type="text" name="contact" class="custom-input" value="" oninput="this.value = this.value.replace(/[^790-9]/g, '').substring(0, 9);" required="" pattern="^[790][0-9]{8}$" title="Please enter a valid Ethiopian phone number starting with 9(ethiotelecom) or 7 (safaricom) followed by 8 digits" placeholder="Phone Number">
    </div>
</div>

<style>
    .custom-input-container {
        position: relative;
    }

    .country-code {
        position: absolute;
        left: 0px;
        top: 50%;
        transform: translateY(-50%);
        background-color: #f4f4f4;
        padding: 5px 10px;
        border-radius: 4px 0 0 4px;
        border-right: 1px solid #ccc;
    }

    .custom-input {
        padding-left: 60px;
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 0 4px 4px 0;
        height: 38px;
        font-size: 16px;
    }

    .custom-input:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>
<div class="p-1 col-6">
<input type="text" name="email" id="emailInput" class="form-control" value="" placeholder="Email" required="" oninput="validateEmail()" title="Please enter a valid Gmail email address (e.g., sss@gmail.com)">
<div id="emailError" style="color: red;"></div>


</div>
<script>
    function validateEmail() {
        const emailInput = document.getElementById('emailInput');
        const emailError = document.getElementById('emailError');
        const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

        // Validate email format
        if (!emailPattern.test(emailInput.value)) {
            emailError.textContent = 'Please enter a valid Gmail email address (sss@gmail.com)';
            emailInput.setCustomValidity('Invalid Gmail format');
            return;
        } else {
            emailError.textContent = '';
            emailInput.setCustomValidity('');
        }

        // Perform AJAX request to check if email is already registered
        $.ajax({
            url: "check_email.php", // Replace this with your server-side script
            method: "POST",
            data: { email: emailInput.value },
            success: function(response) {
                if (response == "exists") {
                    emailError.textContent = "The email is already registered.";
                    emailInput.setCustomValidity('Email already exists');
                } else {
                    emailError.textContent = '';
                    emailInput.setCustomValidity('');
                }
            }
        });
    }
</script>





        </div>
        <div class="d-flex justify-content-start">
        <div class="p-1 col-6">
    <div class="password-container">
        <input type="password" name="password" class="form-control password-input" id="passwordInput" placeholder="Password" required="" oninput="checkPasswordStrength(this.value)">
        <span class="toggle-password" onclick="togglePasswordVisibility()">
            <i class="fas fa-eye" id="toggleIcon"></i>
        </span>
    </div>
    <div id="passwordStrength" style="margin-top: 10px;"></div>
</div>

<style>
    .password-container {
        position: relative;
    }

    .password-input {
        padding-right: 40px;
    }

    .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .toggle-password i {
        font-size: 18px;
        color: #777;
    }

    .toggle-password i:hover {
        color: #333;
    }

    #passwordStrength {
        color: #333;
        font-size: 14px;
    }

    .weak {
        color: red;
    }

    .medium {
        color: orange;
    }

    .strong {
        color: green;
    }
</style>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('passwordInput');
        const toggleIcon = document.getElementById('toggleIcon');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }

    function checkPasswordStrength(password) {
        const strengthText = document.getElementById('passwordStrength');
        const strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})");

        if (strongRegex.test(password)) {
            strengthText.innerHTML = 'Strong password';
            strengthText.className = 'strong';
            document.getElementById('passwordInput').setCustomValidity('');
        } else {
            strengthText.innerHTML = 'Password must contain at least uppercase letter,lowercase letter, digit, special character, and be at least 8 characters long.';
            strengthText.className = 'weak';
            document.getElementById('passwordInput').setCustomValidity('Password is not strong enough');
        }
    }
</script>

<div class="p-1 justify-content-start">
    <div class="password-container">
        <input type="password" name="con-password" class="form-control password-input" id="confirmPasswordInput" placeholder="Confirm Password" required="" oninput="checkConfirmPassword()">
        <span class="toggle-password" onclick="toggleConfirmPasswordVisibility()">
            <i class="fas fa-eye" id="toggleConfirmIcon"></i>
        </span>
    </div>
    <div id="confirmPasswordStrength" style="margin-top: 10px;"></div>
</div>

<style>
    .password-container {
        position: relative;
    }

    .password-input {
        padding-right: 40px;
    }

    .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .toggle-password i {
        font-size: 18px;
        color: #777;
    }

    .toggle-password i:hover {
        color: #333;
    }

    #confirmPasswordStrength {
        color: #333;
        font-size: 14px;
    }

    .weak {
        color: red;
    }

    .medium {
        color: orange;
    }

    .strong {
        color: green;
    }
</style>

<script>
    function toggleConfirmPasswordVisibility() {
        const confirmPasswordInput = document.getElementById('confirmPasswordInput');
        const toggleConfirmIcon = document.getElementById('toggleConfirmIcon');

        if (confirmPasswordInput.type === "password") {
            confirmPasswordInput.type = "text";
            toggleConfirmIcon.classList.remove('fa-eye');
            toggleConfirmIcon.classList.add('fa-eye-slash');
        } else {
            confirmPasswordInput.type = "password";
            toggleConfirmIcon.classList.remove('fa-eye-slash');
            toggleConfirmIcon.classList.add('fa-eye');
        }
    }

    function checkConfirmPassword() {
        const confirmPassword = document.getElementById('confirmPasswordInput').value;
        const password = document.getElementById('passwordInput').value;
        const confirmPasswordStrength = document.getElementById('confirmPasswordStrength');

        if (confirmPassword === password && password.length >= 8) {
            confirmPasswordStrength.innerHTML = 'Passwords match';
            confirmPasswordStrength.className = 'strong';
            document.getElementById('confirmPasswordInput').setCustomValidity('');
        } else {
            confirmPasswordStrength.innerHTML = 'Passwords do not match ';
            confirmPasswordStrength.className = 'weak';
            document.getElementById('confirmPasswordInput').setCustomValidity('Passwords do not match    ');
        }
    }
</script>

        </div>
       <div class="d-flex justify-content-start">
    <div class="p-1 col-12">
        <input type="text" name="hint" id="hint" class="form-control" placeholder="Password Hint 1" required>
        <div id="error-message" style="display: none; color: red;">Password hint already exists!</div>
    </div>
</div>

<script>
document.getElementById('hint').addEventListener('input', function() {
    var hintValue = this.value;
    var errorMessage = document.getElementById('error-message');
    
    // Make an AJAX request to check if the hint already exists
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'check_hint.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status == 200) {
            if (xhr.responseText === 'exists') {
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        }
    };
    xhr.send('hint=' + hintValue);
});
</script>


<script>
    // Function to check if the hint already exists
    function checkHint() {
        var hintValue = document.getElementById("hint").value;
        // Send an AJAX request to the server to check if hintValue exists
        // Assuming you have a function called checkHintValue on the server that returns true if the hint exists and false otherwise
        // Example: var hintExists = checkHintValue(hintValue);
        var hintExists = false; // Example, replace this with your server call

        if (hintExists) {
            document.getElementById("error-message").style.display = "block";
            return false;
        } else {
            document.getElementById("error-message").style.display = "none";
            return true;
        }
    }

    // Attach the checkHint function to the input's onchange event
    document.getElementById("hint").onchange = checkHint;
</script>

<br>
        <div class="form-group">
            <input type="text" name="TIN" class="form-control" placeholder="Taxpayment ID (TIN)" required="">
        </div>
        <div class="justify-content-start" style="white-space: nowrap;">
    <div class="p-1 col-4">scan your TIN CARD and upload image
        <input type="file" class="form-control" name="img" onchange="displayImg2(this,$(this)), img_path-field1" required>
    </div>
</div>

<div class="p-1 col-6">
    <div class="image-container">
        <img src="<?php echo isset($photo) ? 'pho/'.$photo :'' ?>" alt="" id="img_path-field">
        <span id="img_error1" style="color: red; display: none;">Please upload an image.</span>
    </div>
</div>

<style>
    .image-container {
        border: 2px solid #ccc;
        padding: 10px;
        max-width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .image-container img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }
</style>
<div class="justify-content-start" style="white-space: nowrap;">

<div class="justify-content-start">
        <div class="p-1 col-4">scan your BUSINESS CARD and upload image
    <input type="file" class="form-control" name="bphoto" onchange="displayImg2(this,$(this), img_path-field2)" required>
</div>
<div class="p-1 col-6">
    <div class="image-container">
        <img src="<?php echo isset($bphoto) ? 'pho/'.$bphoto :'' ?>" alt="" id="img_path-field">
        <span id="img_error2" style="color: red; display: none;">Please upload an image.</span>
    </div>
</div>

<style>
    .image-container {
    border: 2px solid #ccc;
    padding: 10px;
    max-width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    margin-bottom: 15px; /* Optional margin for spacing between image containers */
}

.image-container img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
}

</style>

<script>
   function displayImg2(input, element, imgId) {
        const img = document.getElementById(imgId);
        const error = document.getElementById(imgId.replace('img_path', 'img_error'));

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                img.src = e.target.result;
                img.style.display = 'block'; // Make sure the image is visible
                error.style.display = 'none'; // Hide the error message
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            img.src = ''; // Clear the image source
            img.style.display = 'none'; // Hide the image
            error.style.display = 'block'; // Show the error message
        }
    }
       
</script>


		</div>
        <div> <a href="javascript:void(0)" id="login"> ◄ Back to login</a></div>
       
        <button class="button btn btn-primary btn-sm">Create</button>
        <button class="button btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
    </form>
</div>
<style>
    #uni_modal .modal-footer {
        display: none;
    }
    .row {
        justify-content: start;
    }
    img#img_preview {
        max-height: 50px;
        max-width: 50px;
    }
</style>
<script>
    $('#login').click(function () {
        uni_modal("Login", 'login.php?redirect=index.php?page=checkout')
    })

    $('#signup-frm').submit(function (e) {
        e.preventDefault()
        start_load()
        if ($(this).find('.alert-danger').length > 0)
            $(this).find('.alert-danger').remove();
        $.ajax({
            url: 'admin/ajax.php?action=signup',
            method: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            error: err => {
                console.log(err)
                $('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
            },
            success: function (resp) {
                if (resp == 0) {
                    $('#signup-frm').prepend('<div class="alert alert-danger">username already exists.</div>')
                    end_load()
                } else if (resp == 1) {
                    $('#signup-frm').prepend('<div class="alert alert-danger">The contact number already exists.</div>')
                    end_load()
                } else if (resp == 2) {
                    $('#signup-frm').prepend('<div class="alert alert-danger">TIN Number is already taken.</div>')
                    end_load()
                } else if (resp == 3) {
                    $('#signup-frm').prepend('<div class="alert alert-danger">Please make your password strong.</div>')
                    end_load()
                } else if (resp == 10) {
                    $('#signup-frm').prepend('<div class="alert alert-danger">Passwords did not match!</div>')
                    end_load()
                } else {
                    alert_toast("successfully Registered! Please wight Until the your registrations verified by comittee.", 'success')
                    setTimeout(function () {
                        location.reload()
                    }, 3000)
                }
            }
        })
    })

    function displayImg2(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#img_path-field').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?php


// Directory where images will be stored
$imageDirectory = "/uploads";

// Create the directory if it doesn't exist
if (!file_exists($imageDirectory)) {
    mkdir($imageDirectory, 0777, true);
}

// Handle form submission
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'signup') {
    // Your existing form handling code here
    
    // Example code for handling image upload
    if (isset($_FILES['img'])) {
        // Debugging: Inspect $_FILES array
        echo '<pre>';
        var_dump($_FILES);
        echo '</pre>';

        // Directory where images will be stored
        $imageDirectory = "/uploads";

        // Create the directory if it doesn't exist
        if (!file_exists($imageDirectory)) {
            mkdir($imageDirectory, 0777, true);
        }

        $target_dir = $imageDirectory;
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["img"]["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow only certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // File upload failed
            echo "Sorry, your file was not uploaded.";
        } else {
            // File upload successful, move uploaded file to target directory
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                // File uploaded successfully
                // You can save the file path to your database or do any other necessary processing
                echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
            } else {
                // File upload failed
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Rest of your form handling code
}

?>

