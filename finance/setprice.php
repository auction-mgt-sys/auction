<?php
include('./db_connect.php');
ob_start();
if (!isset($_SESSION['system'])) {
    $system = $conn->query("SELECT * FROM requesteditem limit 1")->fetch_array();
    foreach ($system as $k => $v) {
        $_SESSION['system'][$k] = $v;
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">

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

        th,
        td {
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

            </thead>
            <tbody>
                <?php
                include("db_connect.php");

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Prepare update statement
                    $update_sql = "UPDATE report SET price = ?, total_price = ?, status = CASE WHEN price != 0 AND total_price != 0 THEN 1 ELSE 0 END WHERE requesteditem_id = ?";
                    $stmt = $conn->prepare($update_sql);

                    if (!$stmt) {
                        echo "Error preparing statement: " . $conn->error;
                    } else {
                        // Bind parameters outside the loop
                        $stmt->bind_param("dds", $price, $total_price, $requesteditem_id);

                        // Loop through each submitted item
                        foreach ($_POST['price'] as $requesteditem_id => $price) {
                            // Check if the requested item ID exists in the POST data
                            if (isset($_POST['total_price'][$requesteditem_id])) {
                                // Escape and assign values
                                $price = mysqli_real_escape_string($conn, $price);
                                $total_price = mysqli_real_escape_string($conn, $_POST['total_price'][$requesteditem_id]);
                                $requesteditem_id = mysqli_real_escape_string($conn, $requesteditem_id);

                                // Execute the statement
                                if (!$stmt->execute()) {
                                    echo "Error updating record: " . $stmt->error;
                                }
                            }
                        }
                        // Close the statement
                        $stmt->close();
                        // Close the database connection
                        $conn->close();
                        // Display success message styled with CSS
                        echo '<div class="success-message">Report submitted successfully</div>';
                    }
                } else {
                    echo "No data submitted";
                }
                ?>

                <script>
                    // JavaScript function to calculate total price
                    function calculateTotalPrice(requesteditemId, quantity) {
                        var price = parseFloat(document.getElementById('price_' + requesteditemId).value);
                        var totalPrice = price * quantity;
                        document.getElementById('total_price_' + requesteditemId).value = totalPrice.toFixed(2);
                    }

                    function confirmSubmit() {
                        var result = confirm('Report submitted successfully');
                        return result;
                    }
                </script>
            </tbody>
        </table>

        <?php
        // Insert data into the report table
        $insert_sql = "INSERT INTO report (requesteditem_name, requesteditem_type, requesteditem_description, requesteditem_measurment, requesteditem_quantity, requesteditem_id)
                SELECT DISTINCT name, type, description, measurment, quantity, id FROM requesteditem 
                 WHERE status = 1 and  id NOT IN (SELECT requesteditem_id FROM report)";

        if ($conn->query($insert_sql) === TRUE) {
            echo "Item hasn't been requested<br>";

            // Fetch data from the report table
            $select_sql = "SELECT * FROM report WHERE status = 0"; // Select only rows with status = 0
            $result = $conn->query($select_sql);

            if ($result->num_rows > 0) {
                echo "<form >
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Type</</th>
                        <th>Description</th>
                        <th>Measurement</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>";
                while ($row = $result->fetch_assoc()) {
                    $requesteditemId = $row['requesteditem_id'];
                    $requesteditemName = $row['requesteditem_name'];
                    $requesteditemType = $row['requesteditem_type'];
                    $requesteditemDescription = $row['requesteditem_description'];
                    $requesteditemMeasurement = $row['requesteditem_measurement'];
                    $requesteditemQuantity = $row['requesteditem_quantity'];
                    echo "<tr>
                        <td>$requesteditemName</td>
                        <td>$requesteditemType</td>
                        <td>$requesteditemDescription</td>
                        <td>$requesteditemMeasurement</td>
                        <td>$requesteditemQuantity</td>
                        <td><input type='number' id='price_$requesteditemId' name='price[$requesteditemId]' step='0.01' min='0' required onchange='calculateTotalPrice($requesteditemId, $requesteditemQuantity)'></td>
                        <td><input type='number' id='total_price_$requesteditemId' name='total_price[$requesteditemId]' step='0.01' min='0' readonly></td>
                    </tr>";
                }
                echo "</table>
                <input type='submit' value='Submit' onclick='return confirmSubmit()'>
            </form>";
            } else {
                echo "No items to display";
            }
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>

</html>