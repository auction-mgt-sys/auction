<?php
// Placeholder for database connection
// Replace with your actual database connection code

// Check for bids (mock data)
$hasBid = false; // Assume no bid by default
// Replace this mock data with your actual database query to check for bids
// Example:
// $sql = "SELECT * FROM bids";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     $hasBid = true;
// }

$response = array('hasBid' => $hasBid);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid Notification System</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            margin-top: 50px;
        }

        #notification {
            background-color: #f2f2f2;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bid Notification System</h1>
        <div id="notification"></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setInterval(checkForBids, 5000); // Check for bids every 5 seconds

            function checkForBids() {
                fetch('check_bids.php')
                    .then(response => response.json())
                    .then(data => {
                        if (data.hasBid) {
                            document.getElementById('notification').innerHTML = "<p>New bid has been placed.</p>";
                        } else {
                            document.getElementById('notification').innerHTML = "<p>No bids available at the moment.</p>";
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });
    </script>
</body>
</html>
