<?php
include 'db_connect.php';


// Retrieve the login_id from the session
$loginId = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : 0;

// Retrieve sent items for the logged-in user from the database
$query = "SELECT * FROM requesteditem WHERE deptname = (SELECT deptname FROM users WHERE id = ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $loginId);
$stmt->execute();

$result = $stmt->get_result();

$sentItems = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sentItems[] = $row;
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sent Item History</title>
    <style>
        /* Your CSS styles here */
        .container {
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Sent Item History</h2>
    <!-- Display sent items -->
    <?php if (!empty($sentItems)): ?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Measurement</th>
                    <th>Quantity</th>
                    <th>Department</th>
                    <th>Department Head</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sentItems as $index => $item): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo htmlspecialchars($item['type']); ?></td>
                        <td><?php echo htmlspecialchars($item['description']); ?></td>
                        <td><?php echo htmlspecialchars($item['measurment']); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($item['deptname']); ?></td>
                        <td><?php echo htmlspecialchars($item['depheadname']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No items sent yet.</p>
    <?php endif; ?>
</div>

</body>
</html>
