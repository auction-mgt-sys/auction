<?php
include("admin/db_connect.php");

// Define variables for display message
$displayMessage = '';
$displayColor = '';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $hint = $_POST['hint'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if new password and confirm password are empty
    if (empty($newPassword) || empty($confirmPassword)) {
        $displayMessage = 'New Password and Confirm Password cannot be empty!';
        $displayColor = 'red';
    } else {
        // Check if the hint matches the one in the database
        $query = "SELECT * FROM users WHERE hint = '$hint'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) == 1) {
            // Check if new password and confirm password match
            if ($newPassword != $confirmPassword) {
                $displayMessage = 'New Password and Confirm Password do not match!';
                $displayColor = 'red';
            } else {
                // Update the password in the database
                $newPassword_md5 = md5($newPassword);
                $updateQuery = "UPDATE users SET Password = '$newPassword_md5' WHERE hint = '$hint'";
                $updateResult = mysqli_query($conn, $updateQuery);

                if ($updateResult) {
                    $displayMessage = 'Your password has been changed successfully!';
                    $displayColor = 'green';
                } else {
                    $displayMessage = 'Failed to update the password. Please try again later.';
                    $displayColor = 'red';
                }
            }
        } else {
            $displayMessage = 'Hint does not match. Please try again.';
            $displayColor = 'red';
        }
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>Change Password</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            font-family: Arial, sans-serif;
            background-color: #EEF2F5;
            padding: 50px;
        }

        .card {
            width: 700px;
            padding: 20px;
            border-radius: 5px;
            background-color: #ffffff;
            animation: fade-in 0.5s ease;
        }

        #header {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
        }

        .form-label {
            font-size: 18px;
            color: #555;
            display: inline-block;
            width: 200px;
            vertical-align: top;
            margin-top: 10px;
        }

        .form-input {
            width: 400px;
            padding: 10px;
            font-size: 16px;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .submit-button {
            background-color: blue;
            color: white;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: darkblue;
        }

        .cancel-link {
            color: #555;
            font-size: 16px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .cancel-link:hover {
            color: #333;
        }
        .back-to-home-link {
            position: absolute;
            top: 10px;
            left: 10px;
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div id="header">
    <a href="index.php" class="text-start">
        <b><img src="images/Backspace.png" style="width: 50px; height: 50px;"> BACK To HOME</b>
    </a>
</div>
<div class="card">
    <h2>Change Password</h2>
    <?php if (!empty($displayMessage)) : ?>
        <p align="center"><font color="<?php echo $displayColor; ?>" size="2"><?php echo $displayMessage; ?></font></p>
    <?php endif; ?>
    <form name="frmChange" method="post" action="">
        <div>
            <label class="form-label" for="hint">Hint</label>
            <input type="text" name="hint" id="hint" class="form-input" />
        </div>

        <div>
            <label class="form-label" for="newPassword">New Password</label>
            <input type="password" name="newPassword" id="newPassword" class="form-input" />
        </div>

        <div>
            <label class="form-label" for="confirmPassword">Confirm Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-input" />
        </div>

        <div style="text-align: center;">
            <input type="submit" name="submit" value="Change" class="submit-button" />
        </div>
    </form>
    <div style="text-align: center;">
        <a href="bidder.php" class="cancel-link"><b>Cancel</b></a>
    </div>
</div>
</body>
</html>