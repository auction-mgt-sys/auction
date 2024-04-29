<?php 
session_start();
include('admin/db_connect.php');
ob_start();
if(!isset($_SESSION['login_id'])){
    header('location:index.php');
}elseif($_SESSION['login_type'] != 2){
    header('location:index.php');
}

include('header.php'); 
?>

<!-- Include CSS styles for the profile section -->
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Include jQuery for form submission -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Profile Section -->
<section class="profile-section">
    <form class="form" id="manage-account-form" action="ajax.php?action=save_user" enctype="multipart/form-data" method="post">
        <div class="upload">
            <img src="uploads/<?php echo isset($user['image']) ? $user['image'] : ''; ?>" width="125" height="125" title="<?php echo isset($user['image']) ? $user['image'] : ''; ?>">
            <div class="round">
                <input type="hidden" name="id" value="<?php echo $_SESSION['login_id']; ?>">
                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" style="display: none;">
                <i class="fa fa-camera" style="color: #fff; cursor: pointer;" onclick="document.getElementById('image').click();"></i>
            </div>
        </div>

        <!-- Additional fields for managing user account -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
        </div>
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" class="form-control" value="<?php echo isset($meta['lname']) ? $meta['lname']: '' ?>" required>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="<?php echo isset($meta['age']) ? $meta['age']: '' ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
            <?php if(isset($meta['id'])): ?>
                <small><i>Leave this blank if you don't want to change the password.</i></small>
            <?php endif; ?>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</section>

<!-- JavaScript for file upload -->
<script type="text/javascript">
    document.getElementById("image").onchange = function(){
        document.getElementById("manage-account-form").submit();
    };
</script>

<?php include('footer.php') ?>
