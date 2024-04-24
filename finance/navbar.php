<?php
include 'db_connect.php'; 

// Count the number of rows in the report table where price and total price are 0, and status is 0
$sql_setprice = "SELECT COUNT(*) AS setprice_count FROM report WHERE price = 0 AND total_price = 0 AND status = 0";
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
?>

<style>
    .collapse a {
        text-indent: 10px;
    }

    /* Add custom styles for notification badge */
    .notification-badge {
        position: absolute;
        top: 8px;
        right: 8px;
        background-color: red;
        color: white;
        font-size: 12px;
        padding: 2px 5px;
        border-radius: 50%;
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
            <span class="notification-count"><?php echo $setprice_count; ?></span>
        </a>
        <a href="index.php?page=generatereport" class="nav-item nav-generatereport">
            <span class="icon-field"><i class="fas fa-history"></i></span> History
        </a>
    </div>
</nav>

<script>
    // Function to update the notification count
    function updateNotificationCount(count) {
        $('.nav-setprice .notification-count').text(count);
    }

    // Function to check for new items in the requesteditem table
    function checkForNewItems() {
        // Make an AJAX request to the backend to check for new items
        $.ajax({
            url: 'backend/setprice.php', // Replace with your backend endpoint
            method: 'GET',
            success: function(response) {
                var count = parseInt(response); // Assuming the response is the count of new items
                updateNotificationCount(count);
            },
            error: function() {
                console.error('Error occurred while checking for new items.');
            }
        });
    }

    // Call the function initially
    checkForNewItems();

    // Add event listener to periodically check for new items
    setInterval(checkForNewItems, 60000); // Check every minute

    // Add event listener to the form submission
    $('form').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Make an AJAX request to decrease the price and update the notification count
        $.ajax({
            url: 'backend/decrease_price.php', // Replace with your backend endpoint
            method: 'POST',
            data: $(this).serialize(), // Serialize the form data
            success: function(response) {
                var count = parseInt(response); // Assuming the response is the updated count of new items
                updateNotificationCount(count);
            },
            error: function() {
                console.error('Error occurred while updating the price.');
            }
        });
    });

    $('.nav_collapse').click(function() {
        console.log($(this).attr('href'));
        $($(this).attr('href')).collapse();
    });

    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : ''; ?>').addClass('active');
</script>