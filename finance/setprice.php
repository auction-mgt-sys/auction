<?php
include('./db_connect.php');
ob_start();
if (!isset($_SESSION['system'])) {
    $system = $conn->query("SELECT * FROM requesteditem LIMIT 1")->fetch_array();
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
        /* CSS styles */

    </style>
    <!-- Include Toastify library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
    <div class="container">
        <?php
        // PHP code

        include("db_connect.php");

        // Insert data into the report table
        $insert_sql = "INSERT INTO report (requesteditem_name, requesteditem_type, requesteditem_description, requesteditem_measurment, requesteditem_quantity, requesteditem_id, price, total_price)
        SELECT DISTINCT name, type, description, measurment, quantity, id, 0 AS price, (0 * quantity) AS total_price 
        FROM requesteditem 
        WHERE status = 1 AND id NOT IN (SELECT requesteditem_id FROM report)";

        if ($conn->query($insert_sql) === TRUE) {
            echo "<p>Items have been priced successfully</p>";

            // Fetch data from the report table
            $select_sql = "SELECT * FROM report WHERE status = 0"; // Select only rows with status = 0
            $result = $conn->query($select_sql);

            if ($result->num_rows > 0) {
                echo "<form action='submit_price.php' method='POST' onsubmit='return confirmSubmit()'>
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Measurement</th>
                                    <th>Quantity</th>
                                    <th>ID</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>";
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
                echo "</tbody>
                      </table>
                      <button type='submit' name='submit_price' onclick='submitForm()'>Submit Price</button>
                      </form>";
            } else {
                echo "<p>0 results</p>";
            }
        } else {
            echo "Error inserting data into the report table: " . $conn->error;
        }

        $conn->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
        // Function to calculate total price
        function calculateTotalPrice(requesteditemId, quantity) {
            var price = parseFloat(document.getElementById('price_' + requesteditemId).value);
            var totalPrice = price * quantity;
            document.getElementById('total_price_' + requesteditemId).value = totalPrice.toFixed(2);
        }

        // Function to show toast message
        function showToast(message, type) {
            Toastify({
                text: message,
                backgroundColor: type === 'success' ? '#28a745' : '#dc3545',
                duration: 2500, // Duration in milliseconds

                gravity: 'top',
                close: true
            }).showToast();
        }

        // Function to submit the form
        function submitForm() {
            showToast('Prices have been submitted successfully', 'success');
            setTimeout(function () {
                document.querySelector('form').submit();
            }, 50); // Delay form submission for 50 milliseconds to allow the toast message to be displayed
        }
    </script>
</body>

</html>