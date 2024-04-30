<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .dropdown-menu {
            min-width: auto;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Settings</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Settings
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="toggleDarkMode()">Dark Mode</a>
                    <a class="dropdown-item" href="#" onclick="updateProfile()">Update Profile</a>
                    <a class="dropdown-item" href="#" onclick="changePassword()">Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Other Settings</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <!-- Content area -->
</div>

<script>
    // Function to toggle dark mode
    function toggleDarkMode() {
        // Toggle dark mode logic here
        // For example, you can toggle a CSS class on the body element
        document.body.classList.toggle('dark-mode');
    }

    // Function to handle updating profile
    function updateProfile() {
        // Redirect to update profile page or show a modal
        alert('Update Profile clicked');
    }

    // Function to handle changing password
    function changePassword() {
        // Redirect to change password page or show a modal
        alert('Change Password clicked');
    }
</script>

<style>
    /* Custom CSS for dark mode */
    .dark-mode {
        background-color: #333;
        color: #fff;
    }
</style>

</body>
</html>
