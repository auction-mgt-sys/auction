<?php
include 'db_connect.php';

// Retrieve the login_id from the session
$loginId = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : 0;

// Pagination variables
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Retrieve sent items for the logged-in user from the database with pagination
$query = "SELECT * FROM requesteditem WHERE deptname = (SELECT deptname FROM users WHERE id = ?) LIMIT ?, ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("iii", $loginId, $offset, $limit);
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
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .pagination {
            justify-content: flex-end;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Sent Item History</h2>
    
    <!-- Search bar -->
    <div class="row mb-3">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Search...">
        </div>
    </div>

    <!-- Display sent items -->
    <?php if (!empty($sentItems)): ?>
        <table class="table table-striped">
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
                    <th>Sent Date</th>
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
                        <td><?php echo htmlspecialchars($item['sent_date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                </li>
                <li class="page-item <?php echo count($sentItems) < $limit ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                </li>
            </ul>
        </nav>
    <?php else: ?>
        <p>No items sent yet.</p>
    <?php endif; ?>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
