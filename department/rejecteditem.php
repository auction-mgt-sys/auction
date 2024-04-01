<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Requested Items</title>
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 40%;
        margin: auto;
        padding: 20px;
        border-radius: 5px;
        margin-top: 20px;
    }

    .container {
        padding: 2px 16px;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .card-column {
        width: 48%;
    }

    label {
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="card">
    <div class="container">
        <form method="post">
            <label for="depname">Enter depname:</label><br>
            <input type="text" id="depname" name="depname"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>

<?php
// Assuming the connection to the database is already established
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $depname = $_POST['depname'];

    // Prepare SQL statement to fetch requested items with status = 2 and depname provided by user
    $stmt = $conn->prepare("SELECT name, quantity, reason, type, depname FROM requesteditem WHERE status = 2 AND depname = ?");
    $stmt->bind_param("s", $depname);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any requested items
    if ($result->num_rows > 0) {
        echo '<div class="card-container">';
        // Output data in card format
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card-column">';
            echo '<div class="card">';
            echo '<div class="container">';
            echo '<p><strong>Name:</strong> ' . $row["name"] . '</p>';
            echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
            echo '<p><strong>Reason:</strong> ' . $row["reason"] . '</p>';
            echo '<p><strong>Type:</strong> ' . $row["type"] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>'; // close card-container
    } else {
        echo "<p>No requested items found for depname: $depname</p>";
    }

    $stmt->close();
}
?>

</body>
</html>
