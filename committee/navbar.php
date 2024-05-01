<?php
include 'db_connect.php'; 

$sql = "SELECT COUNT(*) AS new_bidders_count FROM users WHERE type = 2 AND status = 3";
$result = $conn->query($sql);

$new_bidders_count = 0; // Default value

if ($result) {
    // Fetch result
    $row = $result->fetch_assoc();
    $new_bidders_count = $row["new_bidders_count"];
} else {
    // Error handling
    echo "Error: " . $conn->error;
}
$sql_requestitems = "SELECT COUNT(*) AS requestitems_count FROM requesteditem WHERE status = 0";
$result_requestitems = $conn->query($sql_requestitems);
$requestitems_count = 0; // Default value

if ($result_requestitems) {
    // Fetch result
    $row_requestitems = $result_requestitems->fetch_assoc();
    $requestitems_count = $row_requestitems["requestitems_count"];
} else {
    // Error handling
    echo "Error: " . $conn->error;
}

// Close connection
$conn->close();
?>
<style>
	.collapse a{
		text-indent:10px;
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

<nav id="sidebar" class='mx-lt-6 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> All Bidders</a>
				<a href="index.php?page=new_users" class="nav-item nav-new_users">
				<a href="index.php?page=new_users" class="nav-item nav-new_users">
            <span class='icon-field'><i class="fa fa-user"></i></span> New Bidders
            <?php
            // PHP code to display notification count
            if ($new_bidders_count > 0) {
                echo "<span class='notification-count'>$new_bidders_count</span>";
            }
            ?>
							<a href="index.php?page=accepted_users" class="nav-item nav-accepted_users"><span class='icon-field'><i class="fa fa-user"></i></span> Accepted Bidders <span class='icon-field'><img src="../admin/photos/Checkmark.png"> </span></a>
				<a href="index.php?page=rejected_users" class="nav-item nav-rejected_users"><span class='icon-field'><i class="fa fa-user"></i></span> Rejected Bidders <span class='icon-field'><img src="../admin/photos/Unavailable3.png"> </span></a>
				<a href="index.php?page=requestitems" class="nav-item nav-requestitems">
    <span class='icon-field'><i class="fa fa-requestitems"></i></span> View Requested Items
    <?php
    // PHP code to display notification count for requested items
    if ($requestitems_count > 0) {
        echo "<span class='notification-count'>$requestitems_count</span>";
    }
    ?> </a>
    				<a href="index.php?page=cancelled_items" class="nav-item nav-cancelled_items"><span class='icon-field'><i class="fa fa-user"></i></span> cancelled_items</a>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
</body>
</html>