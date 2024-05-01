<?php
include 'config.php';

if (isset($_POST['submit'])) {
    if (isset($_GET['Customer_ID'])) {
        $from = $_GET['Customer_ID'];
        // Fetch sender details
        $sql = "SELECT * FROM customer WHERE Customer_ID='$from'";
        $query = mysqli_query($conn, $sql);
        $sql1 = mysqli_fetch_array($query);

        if ($sql1) {
            $to = $_POST['to'];
            $amount = $_POST['amount'];

            // constraint to check input of negative value by user
            if ($amount < 0) {
                echo '<script type="text/javascript">';
                echo ' alert("Oops! Negative values cannot be transferred")';
                echo '</script>';
            } elseif ($amount > $sql1['balance']) {
                echo '<script type="text/javascript">';
                echo ' alert("Sorry, Insufficient Balance")';
                echo '</script>';
            } elseif ($amount == 0) {
                echo "<script type='text/javascript'>";
                echo "alert('Oops! Zero value cannot be transferred')";
                echo "</script>";
            } else {
                // Fetch receiver details
                $sql = "SELECT * FROM customer WHERE Customer_ID='$to'";
                $query = mysqli_query($conn, $sql);
                $sql2 = mysqli_fetch_array($query);

                if ($sql2) {
                    // deducting amount from sender's account
                    $newbalance = $sql1['balance'] - $amount;
                    $sql = "UPDATE customer SET balance=$newbalance WHERE Customer_ID=$from";
                    mysqli_query($conn, $sql);

                    // adding amount to receiver's account
                    $newbalance = $sql2['balance'] + $amount;
                    $sql = "UPDATE customer SET balance=$newbalance WHERE Customer_ID=$to";
                    mysqli_query($conn, $sql);

                    $sender = $sql1['First_Name'];
                    $receiver = $sql2['Last_Name'];
                    $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                    $query = mysqli_query($conn, $sql);

                    if ($query) {
                        echo "<script> alert('Transaction Completed');
                                     window.location='transactionhistory.php';
                           </script>";
                    }
                } else {
                    echo '<script type="text/javascript">';
                    echo ' alert("Receiver not found")';  // showing an alert box.
                    echo '</script>';
                }

                $newbalance = 0;
                $amount = 0;
            }
        } else {
            echo '<script type="text/javascript">';
            echo ' alert("Sender not found")';  // showing an alert box.
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo ' alert("Customer ID not provided")';  // showing an alert box.
        echo '</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}

    </style>
</head>

<body style="background-color : #ececec;">
 
<?php
  include 'navbar.php';
?>

	<div class="container">
        <h2 class="text-center pt-4" style="color : #6c757d;">Transaction</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customer where Customer_ID=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered table-dark">
                <tr style="color : white;">
                    <th class="text-center">Customer_Id</th>
                    <th class="text-center">First_Name</th>
                    <th class="text-center">Last_Name</th>
                    <!-- <th class="text-center">Total Balance</th> -->
                </tr>
                <tr style="color : white;">
                    <td class="py-2"><?php echo $rows['Customer_ID'] ?></td>
                    <td class="py-2"><?php echo $rows['First_Name'] ?></td>
                    <td class="py-2"><?php echo $rows['Last_Name'] ?></td>
                    <!-- <td class="py-2"><?php echo $rows['balance'] ?></td> -->
                </tr>
            </table>
        </div>
        <hr><br>
        
        <div class="row">
        
            <div class="col-6">
        <label style="color : #6c757d;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Select Account</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM user2 where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        </div>


        <div class="col-6">
            <label style="color : #6c757d;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required> 
        </div>
        
        </div>
              
            <br><br>
                <div class="text-center" >
            <button class="btn" name="submit" type="submit" id="myBtn" >Transfer Amount</button>
            </div>
        </form>
    </div>
    <footer class="text-center mt-5 py-2">
            <p>&copy 2024</b></p>
    </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>