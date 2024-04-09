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
    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
            echo "<script>showSweetAlert('Items have been priced successfully', 'success');</script>";

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
                      <button type='submit' name='submit_price'>Submit Price</button>
                      </form>";
            } else {
                echo "<script>showSweetAlert('No results found', 'info');</script>";
            }
        } else {
            echo "<script>showSweetAlert('Error inserting data into the report table: " . $conn->error . "', 'error');</script>";
        }

        $conn->close();
        ?>
    </div>

    <script>
        // JavaScript code

        // Function to calculate total price
        function calculateTotalPrice(requesteditemId, quantity) {
            var price = parseFloat(document.getElementById('price_' + requesteditemId).value);
            var totalPrice = price * quantity;
            document.getElementById('total_price_' + requesteditemId).value = totalPrice.toFixed(2);
        }

        // Function to show SweetAlert message
        function showSweetAlert(message, type) {
            Swal.fire({
                text: message,
                icon: type,
                timer: 2500, // Duration in milliseconds
                showConfirmButton: false
            });
        }
        // Function to submit the form
        function submitForm() {
            showSweetAlert('Prices have been submitted successfully', 'success');
            setTimeout(function () {
                document.querySelector('form').submit();
            }, 5000); // Delay form submission for 2 seconds to allow the SweetAlert to be displayed
        }
    </script>
</body>

</html>