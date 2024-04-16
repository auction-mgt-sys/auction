<?php
include 'db_connect.php';   

// Assuming you have set the user_id in the session (replace it with your actual way of identifying the user)
$userId = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : 0; // Replace 'login_id' with your session variable name

// Fetch department name associated with the logged-in user
$departmentName = "";
if ($userId != 0) {
    $query = "SELECT deptname FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($departmentName);
    $stmt->fetch();
    $stmt->close();
}

// Fetch rejected items from the requesteditem table for the department associated with the logged-in user
$rejectedItems = array();
$query = "SELECT id, name, type, measurment, quantity, reason FROM requesteditem WHERE status = 2 AND deptname = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $departmentName);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rejectedItems[] = $row;
    }
}

$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejected Item View</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Rejected Items</h2>
    <?php if (!empty($rejectedItems)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Measurement</th>
                    <th>Quantity</th>
                    <th>Reason</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rejectedItems as $item): ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['type']; ?></td>
                        <td><?php echo $item['measurment']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo $item['reason']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No rejected items found.</p>
    <?php endif; ?>
    <!-- Your HTML content here -->
</body>
</html>
