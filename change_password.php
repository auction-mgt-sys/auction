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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light gray background */
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        .back-home-link img {
            width: 50px;
            height: 50px;
        }

        nav {
            /* Add styles if needed */
        }

        main {
            /* Add styles if needed */
        }

        /* Form styles */
        legend {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-table {
            width: 100%;
        }

        .form-input {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .form-submit,
        .cancel-link {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-submit {
            background-color: #007bff; /* Bootstrap primary color */
            color: #fff;
            margin-right: 10px;
        }

        .form-submit:hover {
            background-color: #0056b3; /* Darker shade of primary color on hover */
        }

        .cancel-link {
            color: #007bff;
            text-decoration: none;
        }

        .cancel-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <a href="index.php" class="back-home-link"><img src="images/Backspace.png" alt="Back to Home"></a>
        </header>
        <nav>
            <!-- Add navigation links if needed -->
        </nav>
        <main>
            <form name="frmChange" method="post" action="">
                <fieldset>
                    <legend>Change Password</legend>
                    <table class="form-table">
                        <tr>
                            <td><label for="hint">Hint</label></td>
                            <td><input type="text" name="hint" id="hint" class="form-input" required></td>
                        </tr>
                        <tr>
                            <td><label for="newPassword">New Password</label></td>
                            <td><input type="password" name="newPassword" id="newPassword" class="form-input" required></td>
                        </tr>
                        <tr>
                            <td><label for="confirmPassword">Confirm Password</label></td>
                            <td><input type="password" name="confirmPassword" id="confirmPassword" class="form-input" required></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Change" class="form-submit">
                                <a href="bidder.php" class="cancel-link">Cancel</a>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </main>
    </div><!-- close container -->
</body>
</html>
