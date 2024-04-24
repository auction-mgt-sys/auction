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
   
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 2000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
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

        th {
            background-color: #3498db;
            color: #fff;
        }

        .total-price-input {
            width: 100px; /* Adjust the width of the total price input */
        }
        .price-input {
            width: 100px; /* Adjust the width of the total price input */
        }
        tr.even {
            background-color: #f2f2f2;
            height: 30px; /* Decrease row height */
        }
        tr.odd {
            background-color: #ffffff;
            height: 30px; /* Decrease row height */
        }
        .bold{
            font weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include("db_connect.php");

        // Insert data into the report table
        $insert_sql = "INSERT INTO report (requesteditem_name, requesteditem_type, requesteditem_description, requesteditem_measurment, requesteditem_quantity,requesteditem_deptname, requesteditem_id)
                        SELECT DISTINCT name, type, description, measurment, quantity,deptname, id FROM requesteditem 
                        WHERE status = 1 and  id NOT IN (SELECT requesteditem_id FROM report)";
        if ($conn->query($insert_sql) === TRUE) {
            // Fetch data from the report table
            $select_sql = "SELECT * FROM report WHERE status = 0"; // Select only rows with status = 0
            $result = $conn->query($select_sql);
            if ($result->num_rows > 0) {
                echo "<form id='submitPriceForm' method='post' action=''>
                        <table id='reportTable' class='display'>
                        <h2 id= 'h2' class='bold' >Set price</h2>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Measurement</th>
                                    <th>Quantity</th>
                                    <th>Deptname</th>
                                    <th>ID</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>";
                            
                while ($row = $result->fetch_assoc()) {
                    echo "<tr id='row_" . $row["requesteditem_id"] . "'>
                            <td>" . $row["requesteditem_name"] . "</td>
                            <td>" . $row["requesteditem_type"] . "</td>
                            <td>" . $row["requesteditem_description"] . "</td>
                            <td>" . $row["requesteditem_measurment"] . "</td>
                            <td>" . $row["requesteditem_quantity"] . "</td>
                            <td>" . $row["requesteditem_deptname"] . "</td>
                            <td>" . $row["requesteditem_id"] . "</td>
                            <td><input type='text' class='price-input' name='price[" . $row["requesteditem_id"] . "]' id='price_" . $row["requesteditem_id"] . "' value='" . $row["price"] . "' oninput='calculateTotalPrice(" . $row["requesteditem_id"] . ", " . $row["requesteditem_quantity"] . ")'></td>
                            <td><input type='text' class='total-price-input' name='total_price[" . $row["requesteditem_id"] . "]' id='total_price_" . $row["requesteditem_id"] . "' value='" . ($row["price"] * $row["requesteditem_quantity"]) . "'></td>
                        </tr>";
                }
                echo "</tbody>
                    </table>
                    <button type='submit' name='submit_price'>Submit Price</button>
                    </form>";
            } else {
                echo " No Item hasn't been requested<br>";
            }
        } else {
            echo "Error inserting data into report table: " . $conn->error;
        }

        if (isset($_POST['submit_price'])) {
            $prices = $_POST['price'];
            $totalPrices = $_POST['total_price'];

            // Update prices and status in the report table
            foreach ($prices as $requesteditemId => $price) {
                // Escape the values to prevent SQL injection
                $requesteditemId = $conn->real_escape_string($requesteditemId);
                $price = $conn->real_escape_string($price);
                $totalPrice = $conn->real_escape_string($totalPrices[$requesteditemId]);

                if ($price != 0 || $totalPrice != 0) {
                    // Update the price and status for the specified requesteditem_id
                    $update_sql = "UPDATE report SET price = '$price', total_price = '$totalPrice', status = 1 WHERE requesteditem_id = '$requesteditemId'";
                    $conn->query($update_sql);

                    // Remove the row from the table
                    echo "<script>document.getElementById('row_" . $requesteditemId . "').remove();</script>";
                }
            }

            // Display success message
            echo "<div class='success-message'>Price submitted successfully</div>";
        }
        ?>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#reportTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                scrollY: false, // Disable vertical scrolling
            });
        });

        // JavaScript function to calculate total price
        function calculateTotalPrice(requesteditemId, quantity) {
            var price = parseFloat(document.getElementById('price_' + requesteditemId).value);
            var totalPrice = price * quantity;
            document.getElementById('total_price_' + requesteditemId).value = totalPrice.toFixed(2);
        }
    </script>
</body>

</html>