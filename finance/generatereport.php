<?php
// Include database connection
include("db_connect.php");

// Function to send email
function sendEmailToPresident($reportData, $presidentEmail) {
    // Prepare email content
    $subject = 'Report Submitted';
    $message = 'The following report has been submitted:' . PHP_EOL . PHP_EOL;
    foreach ($reportData as $report) {
        $message .= "Name: {$report['name']}" . PHP_EOL;
        $message .= "Type: {$report['type']}" . PHP_EOL;
        $message .= "Description: {$report['description']}" . PHP_EOL;
        $message .= "Status: {$report['status']}" . PHP_EOL;
        $message .= "Count: {$report['count_items']}" . PHP_EOL;
        $message .= "Price: {$report['price']}" . PHP_EOL;
        $message .= "Total Price: {$report['total_price']}" . PHP_EOL . PHP_EOL;
    }

    // Send email
    mail($presidentEmail, $subject, $message);
}

// Check if the submit report form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the submitted report
    // Assuming all items need to be processed together
    // Perform necessary operations with the submitted report data
    // ...
    
    // Fetch president's email from the database
    $presidentQuery = "SELECT email FROM users WHERE type = 7"; // Assuming type 7 corresponds to president
    $presidentResult = $conn->query($presidentQuery);
    if ($presidentResult->num_rows > 0) {
        $presidentRow = $presidentResult->fetch_assoc();
        $presidentEmail = $presidentRow['email'];

        // Fetch report data
        $reportData = array();
        $query = "SELECT ri.name, ri.type, ri.description, ri.status, COUNT(*) AS count_items, r.price, r.total_price
                  FROM requesteditem ri
                  LEFT JOIN report r ON ri.id = r.requesteditem_id
                  WHERE ri.status = 1"; // Assuming status 1 means the report is accepted
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $reportData[] = $row;
            }
        }

        // Send email to president
        sendEmailToPresident($reportData, $presidentEmail);

        // Display success message
        echo "<h2>Report Submitted Successfully!</h2>";
        echo "<p>Thank you for submitting the report.</p>";
    } else {
        echo "<p>Error: President's email not found.</p>";
    }
    exit; // Stop further execution of the script
}

// Query to fetch data
$query = "SELECT ri.id, ri.name, ri.type, ri.description, ri.status, COUNT(*) AS count_items, r.price, r.total_price
          FROM requesteditem ri
          LEFT JOIN report r ON ri.id = r.requesteditem_id
          GROUP BY ri.id, ri.name, ri.type, ri.description, ri.status";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .report-card {
            display: inline-block;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .report-card h3 {
            margin: 0;
            padding: 0;
        }

        .report-card p {
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        .report-card .status-rejected {
            color: red;
        }

        .report-card .status-accepted {
            color: green;
        }

        .report-button {
            display: block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px auto;
            cursor: pointer;
        }
    </style>

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <h2>Reports</h2>

    <form id="reportForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $itemId = $row['id']; // Assuming 'id' is the primary key of the requesteditem table
                $itemName = $row['name'];
                $itemType = $row['type'];
                $itemDescription = $row['description'];
                $itemStatus = $row['status'];
                $itemCount = $row['count_items'];
                $itemPrice = $row['price'];
                $itemTotalPrice = $row['total_price'];

                echo "<div class='report-card'>";
                echo "<h3>$itemName</h3>";
                echo "<p>Type: $itemType</p>";
                echo "<p>Description: $itemDescription</p>";
                echo "<p>Status: <span class='status-" . ($itemStatus == 1 ? 'accepted' : 'rejected') . "'>" . ($itemStatus == 1 ? 'Accepted' : 'Rejected') . "</span></p>";
                echo "<p>Count: $itemCount</p>";
                echo "<p>Price: $itemPrice</p>";
                echo "<p>Total Price: $itemTotalPrice</p>";
                echo "</div>";
            }
            echo "<button type='submit' class='report-button'>Submit Report for All Items</button>";
        } else {
            echo "No data available.";
        }
        ?>
    </form>

    <script>
        // Add event listener for form submission
        document.getElementById("reportForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            // Display SweetAlert message
            Swal.fire({
                icon: 'success',
                title: 'Report Submitted Successfully!',
                text: 'Thank you for submitting the report.'
            }).then((result) => {
                // Submit the form after SweetAlert is closed
                document.getElementById("reportForm").submit();
            });
        });
    </script>
</body>
</html>
