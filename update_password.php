 <?php
 include('admin/db_connect.php');
 $new_password  = $_POST['new_password'];
 mysqli_query($conn,"update users set password = '$new_password' where users_id = '$session_id'")or die(mysqli_error($conn));
 ?>