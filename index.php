<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('admin/db_connect.php');
ob_start();
$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
    if (!is_numeric($key))
        $_SESSION['system'][$key] = $value;
}
ob_end_flush();
include('header.php');
?>

<style>
   #main-field {
        margin-top: 5rem!important;

    }

    .wpcsc {
        width: 50px; 
        height: auto; 
        border-radius: 50%; 
        margin-right: 5px; 
    }
    .navbar {
        background: black;
      }
    .notification-icon {
        position: relative;
    }

    .notification-count {
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 5px;
        font-size: 12px;
        position: absolute;
        top: -5px;
        right: -5px;
    }
</style>

<body id="page-top">
    <!-- Navigation-->
    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand js-scroll-trigger" href="./"><img src="images/logo.jpg" class="wpcsc"><?php echo $_SESSION['system']['name'] ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">

                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home"><img src="images/Home.png" class="ic"> Home</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about"><img src="images/about.png" class="ic"> About Organization</a></li>
                    <li class="nav-item notification-icon"><a class="nav-link js-scroll-trigger" href="index.php?page=event"><img src="images/auction_32px.png" class="ic"> Events <span class="notification-count">0</span></a></li>
                    
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=contact"><img src="images/help.png" class="ic"> contact us</a></li>

                    <?php if (isset($_SESSION['login_id'])) : ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=write_notifications"><img src="images/about.png" class="ic"> Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/ajax.php?action=logout2"><?php echo "Welcome " . $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now"><img src='images/Login.png' class='ic'> Login</a></li>
                    <?php endif; ?>



                </ul>
            </div>
        </div>
    </nav>
    <main id="main-field">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        include $page . '.php';
        ?>

    </main>
    <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                </div>
                <div class="modal-body">
                    <div id="delete_content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uni_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Done</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uni_modal_right" role='dialog'>
        <div class="modal-dialog modal-full-height  modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fa fa-arrow-right"></span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="viewer_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
                <img src="" alt="">
            </div>
        </div>
    </div>
    <div id="preloader"></div>


    <?php include('footer.php') ?>
</body>
<script type="text/javascript">
    $('#login').click(function() {
        uni_modal("Login", 'login.php')
    })
    $('.datetimepicker').datetimepicker({
        format: 'Y-m-d H:i',
    })
    $('#find-car').submit(function(e) {
        e.preventDefault()
        location.href = 'index.php?page=search&' + $(this).serialize()
    })

    // Simulated notification count update
    function updateNotificationCount(count) {
        $('.notification-count').text(count);
    }

    // Simulated function to update notification count
    function fetchNotificationCount() {
        // Fetch notification count from server or any other source
        // For demonstration, a random count between 0 and 10 is used
        var count = Math.floor(Math.random() * 11);
        updateNotificationCount(count);
    }

    // Call fetchNotificationCount function to update count periodically
    fetchNotificationCount();
    setInterval(fetchNotificationCount, 5000); // Update every 5 seconds
</script>
<?php $conn->close() ?>
<style>
    footer {
        background: rgba(216, 218, 217, 0.774);
    }
</style>

</html>
