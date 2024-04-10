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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
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
            position: relative;
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

        .success-message {
            background-color: lightgreen;
            color: green;
            padding: 10px;
            border-radius: 4px;
            width: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include("db_connect.php");

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
                echo "<form id='submitPriceForm'>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Measurement</th>
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
                            <td><input type='text' name='price[" . $row["requesteditem_id"] . "]' id='price_" . $row["requesteditem_id"] . "' value='" . $row["price"] . "' oninput='calculateTotalPrice(" . $row["requesteditem_id"] . ", " . $row["requesteditem_quantity"] . ")'></td>
                            <td><input type='text' name='total_price[" . $row["requesteditem_id"] . "]' id='total_price_" . $row["requesteditem_id"] . "' value='" . ($row["price"] * $row["requesteditem_quantity"]) . "'></td>
                        </tr>";
                }
                echo "</table>
                    <button type='button' onclick='submitForm()'>Submit Price</button>
                    </form>";
            } else {
                echo "0 results";
            }
        } else {
            echo "Error inserting data into report table: " . $conn->error;
        }

        $conn->close();
        ?>

        <div id="successMessage" class="success-message">Price submitted successfully</div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        // JavaScript function to calculate total price
        function calculateTotalPrice(requesteditemId, quantity) {
            var price = parseFloat(document.getElementById('price_' + requesteditemId).value);
            var totalPrice = price * quantity;
            document.getElementById('total_price_' + requesteditemId).value = totalPrice.toFixed(2);
        }

        // JavaScript function to submit form and display success message
        function submitForm() {
            // Display success message for 5 seconds
            document.getElementById('successMessage').style.display = 'block';
            setTimeout(function () {
                document.getElementById('successMessage').style.display = 'none';
            }, 5000);
            // Submit form
            document.getElementById('submitPriceForm').submit();
        }
    </script>
</body>

</html>