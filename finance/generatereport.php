<!DOCTYPE html>
<html lang="en">
<?php 
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
    $system = $conn->query("SELECT * FROM requsteditem limit 1")->fetch_array();
    foreach($system as $k => $v){
        $_SESSION['system'][$k] = $v;
    }
}
ob_end_flush();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Request</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        
        th {
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Measurment</th>
                    <th>Quantity</th>
                    <th>price</th>
                    <th>Total_price</th>
                </tr>
            </thead>
            <tbody>
            <?php

include("db_connect.php");

// Check if the report table exists
$table_check_sql = "SHOW TABLES LIKE 'report'";
$table_check_result = $conn->query($table_check_sql);

if ($table_check_result->num_rows == 0) {
    // Create the report table if it doesn't exist
    $create_table_sql = "CREATE TABLE report (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        requesteditem_name VARCHAR(255) NOT NULL,
        requesteditem_type VARCHAR(255) NOT NULL,
        requesteditem_description VARCHAR(255),
        requesteditem_measurment VARCHAR(255),
        requesteditem_quantity INT(6),
        requesteditem_id INT(6),
        price DECIMAL(10, 2),
        total_price DECIMAL(10, 2)
    )";

    if ($conn->query($create_table_sql) === TRUE) {
        echo "Report table created successfully.<br>";
    } else {
        echo "Error creating report table: " . $conn->error . "<br>";
    }
}

$select_sql = "SELECT * FROM report";
$result = $conn->query($select_sql);

if ($result->num_rows > 0) {
    echo "Report already generated and stored in the database.";
} else {
    // Delete existing data from the report table
    $delete_sql = "DELETE FROM report";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Existing data deleted from the report table.<br>";
    } else {
        echo "Error deleting existing data from the report table: " . $conn->error . "<br>";
    }

    $insert_sql = "INSERT INTO report (requesteditem_name, requesteditem_type, requesteditem_description, requesteditem_measurment, requesteditem_quantity, requesteditem_id)
        SELECT name, type, description, measurment, quantity, id FROM requesteditem WHERE status = 1";

    if ($conn->query($insert_sql) === TRUE) {
        echo "Generated report<br>";

        $select_sql = "SELECT * FROM report";
        $result = $conn->query($select_sql);

        if ($result->num_rows > 0) {
            echo "<form action='submit_report.php' method='post'>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Measurment</th>
                            <th>Quantity</th>
                            <th>ID</th>
                            <th>Price</th>
                            <th>Total Price</th>
                        </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["requesteditem_name"] . "</td>
                        <td>" . $row["requesteditem_type"] . "</td>
                        <td>" . $row["requesteditem_description"] . "</td>
                        <td>" . $row["requesteditem_measurment"] . "</td>
                        <td>" . $row["requesteditem_quantity"] . "</td>
                        <td>" . $row["requesteditem_id"] . "</td>
                        <td><input type='text' name='price[]' value='" . $row["price"] . "'></td>
                        <td><input type='text' name='total_price[]' value='" . $row["total_price"] . "'></td>
                      </tr>";
            }
            echo "</table>
                  <input type='submit' value='Submit Report'>
                  </form>";
        } else {
            echo "0 results";
        }
    } else {
        if ($conn->errno == 1062) { // Duplicate entry error number
            echo "Error: Duplicate entry found. Please handle duplicates appropriately.";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
            </tbody>
        </table>
    </div>
</body>
</html>
