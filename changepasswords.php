<?php
include("admin/db_connect.php");
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
}
else
{
  {
  }
?>

<?php
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head><br>
	<a href="bidder.php" class="text-start"><b><img src="images/Backspace.png" style="width: 50px; height: 50px;"> BACK To HOME</b></a>	
	</div>
  <title>WOLKITE POLYTHENIC COLLEGE </title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    #header {
      background-color: #f2f2f2;
      padding: 10px;
    }

    #navigation {
      background-color: #333;
      color: #fff;
      padding: 10px;	
    }

    #navigation ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    #navigation ul li {
      display: inline;
      margin-right: 10px;
    }

    #navigation ul li a {
      color: #fff;
      text-decoration: none;
    }

    #site_content {
      margin-top: 20px;
    }

    h2 {
      color: #333;
    }

    .form_settings {
      margin-bottom: 10px;
    }

    .submit {
      padding: 5px 10px;
      background-color: #333;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    #footer {
      background-color: #f2f2f2;
      padding: 10px;
      text-align: center;
      font-size: 12px;
    }
  </style>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
  var phone = /^\d{10}$/;

   if(document.getElementById("hintpassword").value =="")
   {
    alert('first fill old password text field !!');
    document.getElementById("hintpassword").focus();
    return false;
   }
      if(document.getElementById("newPassword").value =="")
   {
    alert('first fill new Password text field !!');
    document.getElementById("newPassword").focus();
    return false;
   }
      if(document.getElementById("confirmPassword").value =="")
   {
    alert('first fill confirmPassword field!!');
    document.getElementById("confirmPassword").focus();
    return false;
   }
        if(document.getElementById("password").length() !=  document.getElementById("confirmPassword").length())
   {
    alert('New password does not match!!');
    document.getElementById("confirmPassword").focus();
    return false;
   }
}
</script>
<script language="javascript">

function load() {
var load = window.open ('changepasswords.php','_self',false);

}
</script>
</head>


<body>

 <div id="main">

   
	  </div>
    </div>
</div>
      
</div><!--close menubar-->
   
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php
?>
 </div>
  <div id="site_content">
    <!--close menubar-->

  <?php
//session_start();
?>
<?php
if(isset($_POST['submit'])) {
    $oldpass = $_POST['hintpassword'];
    $newpass = $_POST['newPassword'];
    $confirmpass = $_POST['confirmPassword'];
    
    require('admin/db_connect.php');
    
    // Apply MD5 encryption to the old password entered by the user
    $oldpass_md5 = md5($oldpass);
    
    $query = "SELECT * FROM users WHERE Password = '$oldpass_md5'";
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    
    if (mysqli_num_rows($result) == 1) {
        if($newpass != $confirmpass) {
            echo '<p align="center"><font color="red" size="2">New Password and Confirm Password do not match!</font></p>';
            echo '<meta content="5;changepasswords.php" http-equiv="refresh" />';
        } else {
            // Apply MD5 encryption to the new password before updating it in the database
            $newpass_md5 = md5($newpass);
            
            $updateQuery = "UPDATE users SET Password = '$newpass_md5' WHERE Password = '$oldpass_md5'";
            $updateResult = mysqli_query($conn, $updateQuery);
            if ($updateResult) {
                echo '<p align="center"><font color="green" size="2">Your password has been changed successfully!</font></p>';
                echo '<meta content="changepasswords.php" http-equiv="refresh" />';
            } else {
                echo '<p align="center"><font color="red" size="2">Failed to update the password. Please try again later.</font></p>';
                echo '<meta content="5"changepasswords.php" http-equiv="refresh" />';
            }
        }
    } else {
        echo '<p align="center"><font color="red" size="2">Incorrect password hint!</font></p>';
        echo '<meta content="5;changepasswords.php" http-equiv="refresh" />';
    }
}
?>
</p>
	<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
      <p>

    <center> <fieldset>
	<table width="450" height="300" border="0" align="center" cellpadding="10" cellspacing="0" class="style1">


		<!--<?php if(isset($message)) { echo $message; }?> </script> -->
        <tr class="tableheader">
           <td colspan="2" bgcolor="white"align="center" class="style26">Change Password</h1></td>
        </tr>
         <tr>
           <td width="300" bgcolor="white"><label class="style7">Password Hint</label></td>
           <td width="300" bgcolor="white"><input type="password" name="hintpassword" id="hintpassword" class="form_settings"/>
               <span id="hintpassword" class="required"></span></td>
         </tr>
         <tr>
           <td bgcolor="white"><label class="style7">New Password</label></td>
           <td bgcolor="white"><input type="password" name="newPassword" id="newPassword" class="form_settings"/>
               <span id="newPassword" class="required"></span></td>
         </tr>
         <tr>
           <td bgcolor="white"><label class="style7">Confirm Password</label></td>
           <td bgcolor="white"><input type="password" name="confirmPassword" id="confirmPassword" class="form_settings"/>
               <span id="confirmPassword" class="required"></span></td>
         </tr>
		 
<table>
    <tr>
        <td colspan="2" bgcolor="white"><input type="submit" name="submit" value="Change" class="submit" onclick="return MM_validateForm(this.form);"/></td>
   

		 
      </table>
   <div style="text-align: center;">
    <a href="bidder.php" class="text-start"><b>cancel</b></a>
</div> </fieldset>
	
	  </center> 
	  

	  <p>&nbsp;</p>
	</form>

    <!--close content_item-->
    </div>
   </div>
   

	<div id="footer">
  <!--close footer-->

</div><!--close main-->
</div>




</body>
</html>
