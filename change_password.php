<?php
include("admin/db_connect.php");

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $hint = $_POST['hint'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if the hint matches the one in the database
    $query = "SELECT * FROM users WHERE hint = '$hint'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {
        // Check if new password and confirm password match
        if ($newPassword != $confirmPassword) {
            echo '<p align="center"><font color="red" size="2">New Password and Confirm Password do not match!</font></p>';
        } else {
            // Update the password in the database
            $newPassword_md5 = md5($newPassword);
            $updateQuery = "UPDATE users SET Password = '$newPassword_md5' WHERE hint = '$hint'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                echo '<p align="center"><font color="green" size="2">Your password has been changed successfully!</font></p>';
            } else {
                echo '<p align="center"><font color="red" size="2">Failed to update the password. Please try again later.</font></p>';
            }
        }
    } else {
        echo '<p align="center"><font color="red" size="2">Hint does not match. Please try again.</font></p>';
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title>Change Password</title>
    <!-- Add your stylesheets and other head elements here -->
</head>

<body>
    <div id="main">
        <!-- Header -->
        <div id="header">
            <a href="index.php" class="text-start"><b><img src="images/Backspace.png" style="width: 50px; height: 50px;"> BACK To HOME</b></a>
        </div>
        <!-- Navigation -->
        <div id="navigation">
            <ul>
                <!-- Add navigation links if needed -->
            </ul>
        </div>

        <!-- Site Content -->
        <div id="site_content">
            <form name="frmChange" method="post" action="">
                <fieldset>
                    <table width="450" height="300" border="0" align="center" cellpadding="10" cellspacing="0">
                        <tr class="tableheader">
                            <td colspan="2" bgcolor="white" align="center">Change Password</td>
                        </tr>
                        <tr>
                            <td width="300" bgcolor="white"><label>Hint</label></td>
                            <td width="300" bgcolor="white"><input type="text" name="hint" id="hint" class="form_settings" /></td>
                        </tr>
                        <tr>
                            <td bgcolor="white"><label>New Password</label></td>
                            <td bgcolor="white"><input type="password" name="newPassword" id="newPassword" class="form_settings" />
                                <span id="newPassword" class="required"></span></td>
                        </tr>
                        <tr>
                            <td bgcolor="white"><label>Confirm Password</label></td>
                            <td bgcolor="white"><input type="password" name="confirmPassword" id="confirmPassword" class="form_settings" />
                                <span id="confirmPassword" class="required"></span></td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="white"><input type="submit" name="submit" value="Change" class="submit" /></td>
                        </tr>
                    </table>
                    <div style="text-align: center;">
                        <a href="bidder.php" class="text-start"><b>Cancel</b></a>
                    </div>
                </fieldset>
            </form>
        </div><!-- close site content -->
    </div><!-- close main -->
</body>

</html>
