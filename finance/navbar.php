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
        .active {
            background-color: #333;
        }
    </style>
    </head>
<body> 
<nav id="sidebar" class="mx-lt-6 bg-dark">
    <div class="sidebar-list">
        <a href="index.php?page=home" class="nav-item nav-home">
            <span class="icon-field"><i class="fa fa-home"></i></span> Home
        </a>
        <a href="index.php?page=viewrequest" class="nav-item nav-viewrequest">
            <span class="icon-field"><i class="fa fa-eye"></i></span> View request
        </a>
        <a href="index.php?page=setprice" class="nav-item nav-setprice">
            <span class="icon-field"><i class="fas fa-dollar-sign"></i></span> Set price
            <?php
                include 'db_connect.php'; 
                $sql_setprice = "SELECT COALESCE(COUNT(*), 0) AS setprice_count FROM report WHERE price =0 and total_price = 0 and status =0";
                $result_setprice = $conn->query($sql_setprice);
                $setprice_count = 0; // Default value

                if ($result_setprice) {
                    // Fetch result
                    $row_setprice = $result_setprice->fetch_assoc();
                    $setprice_count = $row_setprice["setprice_count"];
                } else {
                    // Error handling
                    echo "Error: " . $conn->error;
                }

                // Close connection
                $conn->close();

                // Display notification count
                if ($setprice_count > 0) {
                    echo "<span class='notification-count'>$setprice_count</span>";
                }
                ?>
        </a>
        <a href="index.php?page=generatereport" class="nav-item nav-generatereport">
            <span class="icon-field"><i class="fas fa-history"></i></span> History
        </a>
    </div>
</nav>

<script>
        // Function to update notification count
        function updateNotificationCount() {
            $.ajax({
                url: 'index.php', // Same page
                type: 'GET',
                data: { refresh: true }, // Send a parameter to identify the AJAX request
                success: function(data) {
                    var notificationCount = $(data).find('.notification-count').text(); // Extract notification count from the returned HTML
                    $('.nav-setprice .notification-count').text(notificationCount); // Update the notification count
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any errors to console
                }
            });
        }

        // Update notification count initially
        updateNotificationCount();

        // Update notification count every 10 seconds
        setInterval(updateNotificationCount, 10000);

        // Highlight active page
        $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
    </script>
</body>
</html>