<?php 
include('db_connect.php');
session_start();
if(isset($_GET['id'])){
    $user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
    foreach($user->fetch_array() as $k =>$v){
        $meta[$k] = $v;
    }
}

 


// Check if form data is submitted
if(isset($_POST['name'])){
    // Retrieve form data
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
    $type = $_POST['type'];
    $deptname = isset($_POST['deptname']) ? $_POST['deptname'] : ''; // Get the department name

    // Check if username already exists
    $check_user = $conn->query("SELECT * FROM users WHERE username = '$username'");
    if($check_user->num_rows > 0){
        echo 2; // Username already exists
        exit;
    }

    // Construct the insert query
    $insert_query = "INSERT INTO users (name, lname, age, username, password, type, deptname) 
                     VALUES ('$name', '$lname', '$age', '$username', '$password', '$type', '$deptname')";

    // Execute the insert query
    if($conn->query($insert_query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }

    exit; // Stop further execution
}
?>


<div class="container-fluid">
    <div id="msg"></div>
    
    <form action="" id="manage-user">   
        <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
        </div>
    
        <div class="form-group">
            <label for="lname">LastName</label>
            <input type="text" name="lname" id="lname" class="form-control" value="<?php echo isset($meta['lname']) ? $meta['lname']: '' ?>" required>
        </div>
        <div class="form-group">
            <label for="lname">age</label>
            <input type="number" name="age" id="age" class="form-control" value="<?php echo isset($meta['age']) ? $meta['age']: '' ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required  autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
            <?php if(isset($meta['id'])): ?>
            <small><i>Leave this blank if you dont want to change the password.</i></small>
        <?php endif; ?>
        </div>
        <?php if(isset($meta['type']) && $meta['type'] == 2): ?>
            <input type="hidden" name="type" value="2">
        <?php else: ?>
        <?php if(!isset($_GET['mtype'])): ?>
        <div class="form-group">
            <label for="type">User Type</label>
            <select name="type" id="type" class="custom-select">
                <option value="3" <?php echo isset($meta['type']) && $meta['type'] == 3 ? 'selected': '' ?>>Auctioneer</option>
            
                <option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected': '' ?>>Admin</option>
                <option value="4" <?php echo isset($meta['type']) && $meta['type'] == 4 ? 'selected': '' ?>>Committee</option>
                <option value="5" <?php echo isset($meta['type']) && $meta['type'] == 5 ? 'selected': '' ?>>department</option>
                <option value="6" <?php echo isset($meta['type']) && $meta['type'] == 6 ? 'selected': '' ?>>finance</option>
                <option value="7" <?php echo isset($meta['type']) && $meta['type'] == 7 ? 'selected': '' ?>>president</option>
            </select>
            <div class="form-group" id="department-input">
                <label for="deptname">Deptname</label>
                <input type="text" name="deptname" id="deptname" class="form-control" value="<?php echo isset($meta['deptname']) ? $meta['deptname']: '' ?>">
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        
    </form>
</div>
<script>
$(document).ready(function(){
    // Function to show or hide the department input box
    function toggleDepartmentInput() {
        var selectedType = $('#type').val();
        if (selectedType == 5) { // Check if "department" option is selected
            $('#department-input').show(); // Show the input box for department name
        } else {
            $('#department-input').hide(); // Hide the input box if any other option is selected
        }
    }

    // Call the function on page load
    toggleDepartmentInput();

    // Call the function whenever the select box value changes
    $('#type').change(function(){
        toggleDepartmentInput();
    });

    $('#manage-user').submit(function(e){
        e.preventDefault();
        start_load()
        $.ajax({
            url:'ajax.php?action=save_user',
            method:'POST',
            data:$(this).serialize(),
            success:function(resp){
                if(resp ==1){
                    alert_toast("Data successfully saved",'success')
                    setTimeout(function(){
                        location.reload()
                    },1500)
                }else{
                    $('#msg').html('<div class="alert alert-danger">Username already exist</div>')
                    end_load()
                }
            }
        })
    });
});
</script>
