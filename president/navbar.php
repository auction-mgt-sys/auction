<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* CSS styles */
        .collapse a {
            text-indent: 10px;
        }
        .notification-count {
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 5px;
            font-size: 12px;
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
</head>
<body>
    <nav id="sidebar" class='mx-lt-5 bg-dark'>
        <div class="sidebar-list">
            <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
            <a href="index.php?page=reports" class="nav-item nav-reports">
                <span class='icon-field'><i class="fa fa-file"></i></span> View Reports
                <?php
                include 'db_connect.php'; 
                $sql_reports = "SELECT COUNT(*) AS reports_count FROM report WHERE auctionstatus = 0";
                $result_reports = $conn->query($sql_reports);
                $reports_count = 0; // Default value

                if ($result_reports) {
                    // Fetch result
                    $row_reports = $result_reports->fetch_assoc();
                    $reports_count = $row_reports["reports_count"];
                } else {
                    // Error handling
                    echo "Error: " . $conn->error;
                }

                // Close connection
                $conn->close();

                // Display notification count
                if ($reports_count > 0) {
                    echo "<span class='notification-count'>$reports_count</span>";
                }
                ?>
            </a>
            <a href="index.php?page=approved_items" class="nav-item nav-approved_items"><span class='icon-field'><i class="fa fa-file"></i></span> Approved Items</a>
            <a href="index.php?page=cancelled_items" class="nav-item nav-cancelled_items"><span class='icon-field'><i class="fa fa-file"></i></span> Cancelled Items</a>
        </div>
    </nav>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Function to update notification count
        function updateNotificationCount() {
            $.ajax({
                url: 'index.php', // Same page
                type: 'GET',
                data: { refresh: true }, // Send a parameter to identify the AJAX request
                success: function(data) {
                    var notificationCount = $(data).find('.notification-count').text(); // Extract notification count from the returned HTML
                    $('.notification-count').text(notificationCount); // Update the notification count
                }
            });
        }

        // Update notification count every 10 seconds
        setInterval(updateNotificationCount, 10000);

        // Highlight active page
        $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
    </script>
</body>
</html>
