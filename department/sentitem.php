<?php 
include 'db_connect.php';

// Retrieve the login_id from the session
$loginId = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : 0;

// Fetch department name using the loginId
$queryDept = "SELECT deptname FROM users WHERE id = ?";
$stmtDept = $conn->prepare($queryDept);
$stmtDept->bind_param("i", $loginId);
$stmtDept->execute();
$stmtDept->bind_result($deptname);
$stmtDept->fetch();
$stmtDept->close();

// Retrieve sent items for the logged-in user from the database
$query = "SELECT * FROM requesteditem WHERE deptname = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $deptname);
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
</head>
<body>

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row mb-4 mt-4">
            <div class="col-md-12">
                
            </div>
        </div>
        <div class="row">
            <!-- Table Panel -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Sent Item History</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-condensed table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Measurement</th>
                                    <th>Quantity</th>
                                    <th>Sent Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                foreach ($sentItems as $index => $item): ?>
                                    <tr class="<?php echo $i % 2 == 0 ? 'even' : 'odd'; ?>">
                                        <td class="text-center"><?php echo $i++ ?></td>
                                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                                        <td><?php echo htmlspecialchars($item['type']); ?></td>
                                        <td><?php echo htmlspecialchars($item['description']); ?></td>
                                        <td><?php echo htmlspecialchars($item['measurment']); ?></td>
                                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                                        <td><?php echo htmlspecialchars($item['sent_date']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
        </div>
    </div>  
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $('table').dataTable();
    });
</script>
<style>
    tr.even {
        background-color: #f2f2f2;
        height: 15px; /* Decrease row height */
    }
    tr.odd {
        background-color: #ffffff;
        height: 15px; /* Decrease row height */
    }
</style>

</body>
</html>