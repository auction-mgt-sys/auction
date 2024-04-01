<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .collapse a {
            text-indent: 10px;
        }
    </style>
</head>
<body>

<nav id="sidebar" class='mx-lt-5 bg-dark'>
    <div class="sidebar-list">
        <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
        <a href="index.php?page=reports" class="nav-item nav-reports"><span class='icon-field'><i class="fa fa-file"></i></span> View Reports</a>
        <a href="#" class="nav-item nav-manage auction nav_collapse" data-toggle="collapse" data-target="#auctionSubMenu"><span class='icon-field'><i class="fa fa-gavel"></i></span>Manage Auction</a>
        <div id="auctionSubMenu" class="collapse">
            <a href="index.php?page=Approve_auction" class="nav-item"><span class='icon-field'><i class="fa fa-plus-circle"></i></span> Approve Auction</a>
            <a href="index.php?page=close_auction" class="nav-item"><span class='icon-field'><i class="fa fa-lock"></i></span> Close Auction</a>
            <a href="index.php?page=cancel_auction" class="nav-item"><span class='icon-field'><i class="fa fa-times-circle"></i></span> Cancel Auction</a>
        </div>
    </div>
</nav>

<script>
    $('.nav_collapse').click(function () {
        console.log($(this).attr('href'))
        $($(this).attr('href')).collapse()
    })
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>

<!-- Placeholder code for reports -->
<?php
if (isset($_GET['page']) && $_GET['page'] == 'reports') {
    echo '<div id="report1">Report 1 content goes here.</div>';
    // Add similar code for other reports (report2, report3, etc.)
}
?>
</body>
</html>
