
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="admin/assets/font-awesome/css/all.css">
<script src="sweetalert.min.js"></script>
<script src="darkmode.js"></script>

<body>
<body onload="checkDarkMode()">

</body>
    <?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
    if(!isset($_SESSION['login_id'])){
      header('location:index.php');
    }
    else if(isset($_SESSION['login_id'])){
      if($_SESSION['login_type']==1)
      {
        header('location:admin/index.php');
      }
      else if($_SESSION['login_type']==3)
      {
        header('location:auctioneer/index.php');
      }
      else if($_SESSION['login_type']==4)
      {
        header('location:committee/index.php');
      }
      else if($_SESSION['login_type']==5)
      {
        header('location:department/index.php');
      }
      else if($_SESSION['login_type']==6)
      {
        header('location:finance/index.php');
      }
      else if($_SESSION['login_type']==7)
      {
        header('location:president/index.php');
      }
      else {


        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    include('header.php'); 

	
    ?>

    <style>
      .header {
        position: relative;
        height: 450px;
        width: 200;
        background-image: url('images/wpcsc.jpg');
        background-size:cover;
        background-position: center;
        color: white;
        text-align: center;
    }
      #main-field{
        margin-top: 5rem!important;
      }
      .wpcsc {
  width: 55px;
  height: 55;
  margin-right: 10px;
}

      .wpcsc {
  width: 90px;
  height: 90px; /* Ensure height matches width for perfect circle */
  margin-right: 10px;
  border-radius: 50%; /* Make it circular */
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
                <a class="navbar-brand js-scroll-trigger" href="#"><img src="images/logo.png" class="wpcsc"><?php echo $_SESSION['system']['name'] ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="bidder.php?page=home"><img src="images/Home.png" class="ic"> Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about"><img src="images/about.png" class="ic"> About Organization</a></li>
                        
            
                        <?php if(isset($_SESSION['login_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/ajax.php?action=logout2"><?php echo "Welcome ".$_SESSION['login_username'] ?> <i class="fa fa-power-off"></i></a></li>
                      <?php else: ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now"><img src='images/Login.png' class='ic'> Login</a></li>
                      <?php endif; ?>
                      
                      <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle js-scroll-trigger" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <div class="profile-image">
        <img src="images/el.png" class="ic" id="profileImg">
    </div>
    Settings
</a>

<!-- Hidden file input -->
<input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" style="display: none;">
<i class="fa fa-camera" style="color: #fff; cursor: pointer;" onclick="document.getElementById('image').click();"></i>



<!-- Hidden field for storing user ID -->
<input type="hidden" name="id" value="<?php echo $sessionId; ?>">
<script>// Function to handle when an image is selected
document.getElementById('image').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
        document.getElementById('profileImg').src = e.target.result;
    };

    reader.readAsDataURL(file);
});

</script>


<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>j</title>
    <!-- Include darkmode.js -->
    <script src="darkmode.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body onload="checkDarkMode()"> <!-- Call checkDarkMode() here -->
    <a class="dropdown-item" href="#" onclick="toggleDarkMode()">
        <i class="fas fa-moon mr-2"></i>Dark Mode
    </a>


    <a class="dropdown-item" href="#" onclick="showManageAccountModal()">
    <i class="fas fa-key mr-2"></i>Manage Account
</a>

<!-- Modal for managing account -->
<div class="modal fade" id="manageAccountModal" tabindex="-1" role="dialog" aria-labelledby="manageAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="manageAccountModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Password change form -->
        <form id="passwordChangeForm">
            <div class="form-group">
                <label for="currentPassword">Current Password</label>
                <input type="password" class="form-control" id="currentPassword" name="currentPassword">
            </div>
            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword">
            </div>
            <div class="form-group">
                <label for="confirmNewPassword">Confirm New Password</label>
                <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword">
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <div class="dropdown-divider"></div>
</div>
</body>
</html>

</div>

</li>
                    </ul>
                </div>
            </div>
        </nav>
  <main id="main-field">
    <script>function showManageAccountModal() {
    $('#manageAccountModal').modal('show');
}

// Password change form submission
$('#passwordChangeForm').submit(function(e) {
    e.preventDefault();
    
    var currentPassword = $('#currentPassword').val();
    var newPassword = $('#newPassword').val();
    var confirmNewPassword = $('#confirmNewPassword').val();
    
    // Perform validation and password change logic here
    
    // Example: Check if new password and confirm password match
    if (newPassword !== confirmNewPassword) {
        alert("New password and confirm password do not match.");
        return;
    }
    
    // Proceed with password change logic
    // You can use AJAX to send the password change request to the server
    // For example:
    /*
    $.ajax({
        url: 'change_password.php',
        method: 'POST',
        data: { currentPassword: currentPassword, newPassword: newPassword },
        success: function(response) {
            // Handle success response
            alert(response);
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
        }
    });
    */
    
    // Close the modal after password change
    $('#manageAccountModal').modal('hide');
});
</script>
          <style>
/* Centering individual navigation items horizontally, adding padding, top margin, and bottom border */


/* Centering the navigation bar horizontally */
.navbar-nav {
    display: flex;
    justify-content: center;
}
#wpcsc {
  width: 50px; /* Adjust width as needed */
  height: 50px; /* Adjust height as needed */
  border-radius: 50%;
}
/* Adjusting padding on the top and bottom */
.navbar-nav {
    padding-top: 5px; /* Adjust as needed */
    padding-bottom: 5px; /* Adjust as needed */
}


            .profile-image {
    width: 50px; /* Adjust according to your design */
    height: 50px; /* Adjust according to your design */
    border-radius: 50%; /* Make it circular */
    overflow: hidden; /* Ensure the image stays within the circular container */
}

#profileImg {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintain aspect ratio and cover the container */
}

    #cat-list li{
        cursor: pointer;
    }
       #cat-list li:hover {
        color: white;
        background: #007bff8f;
    }
    .prod-item p{
        margin: unset;
    }
    .bid-tag {
    position: absolute;
    right: .5em;
}

.card-header{
    width: 70vh;
    height: 10vh; /* Optionally, to center vertically as well */
}
.row {
    margin-right: 40px;
}
</style>


<?php 

$cid = isset($_GET['category_id']) ? $_GET['category_id'] : 0;
?>
<div class="contain-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <br><br>
                    <div class="card-header">CONTENTS ON THIS PAGE
                    </div>

                    <button type="button" class="accordion_button justify-content-left">Auctions</button>
                  <div class="accordion_content">
                    <div class="card-body">
                        <ul class='list-group' id='cat-list'>
                            <li class='list-group-item' data-id='all' data-href="bidder.php?page=bidder&category_id=all">All</li>
                            <?php
                                $cat = $conn->query("SELECT * FROM categories order by name asc");
                                while($row=$cat->fetch_assoc()):
                                    $cat_arr[$row['id']] = $row['name'];
                             ?>
                            <li class='list-group-item' data-id='<?php echo $row['id'] ?>' data-href="bidder.php?page=bidder&category_id=<?php echo $row['id'] ?>"><?php echo ucwords($row['name']) ?></li>

                            <?php endwhile; ?>
                        </ul>

                    </div>
                  </div>
                    <ul class='list-group ' id='opp-list'>
                            <a href="index.php?page=my_bids" class='list-group-item list' id="sids"> My Bids</a>
                            <a href="index.php?page=my_payments" class='list-group-item list' id="sids" >My Payments</a>
                            <a href="index.php?page=winners" class='list-group-item list' id="sids">Winners</a>
                            <a href="index.php?page=inbox_notifications" class='list-group-item list' id="sids">Messages</a>
                    </ul> 
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
<!--the center of the home page starts here-->
<div class="col-lg-12">
    <div>
        <header class="header">
            <div class="overlay"></div>
                <div class="container">

                    <div class="description text-center">
                    <section class="sec1">
                           
                         
                             <?php if(isset($_SESSION['login_username'])): ?>
                              <?php 
 echo  "<>"
?>
<br>

                               <?php echo "<h1>WOLKITE POLYTHECNIC COLLEGE </h1>"; ?>
                               <?php echo "<h3>WELCOME TO AUCTION  MANAGEMENT SYSTEM</h3>"; ?>

                                <?php echo "<div class='text-center'>"?>
                             <?php echo "<h4>Welcome ".$_SESSION['login_username']."</h4>"?>

                             <?php else:
                                                                                                                                  echo "<img src='images/logo.png' id='wpcsc'>

                                                                 <h1>WOLKITE POLYTHECHNIC COLLEGE</h1>
                                        
                             <h3>WELCOME TO AUCTION  MANAGEMENT SYSTEM</h3>; "?>  
                          
                                <?php echo "<div class='justify-content-center'>"?>
                                <?php 
                             echo "<a href='index.php?page=about' class='a btn btn-primary'>

                            >>About The Organization>>
                        </a>"; ?>
                             <?php echo "</div>"; ?>
                             <?php endif; ?>      
                         
                    </section>
                    </div>
            </div>
        </header>         
    </div>  

</div> 
    
<style>
 .card {
        /* Adjust the width as needed */
        width: 110%;
    }
    .col-md-3 {
        /* Adjust the width as needed */
        width: 20%;
    }

    .list-group {
        /* Adjust the width as needed */
        width: 100%;
    }

    .list-group-item {
        /* Adjust the width as needed */
        width: 100%;
    }

    /* You can add more specific styles if needed */


#sids{y
  margin-bottom: 1px;
}
.a {
    margin-bottom: 15px;
    font-family: 'Arial';
}
.mid_1 {
    margin-left: 20%;
    font-family: "Algerian";
    margin-top: 20px;
}
.mid_2 {
    margin-left: 40%;
    font-family: "Algerian";
    margin-top: 10px;
}
.mid_1 h3 {
    font-family: "Times New Roman";
    text-decoration: none;
    margin-top: 20px;
    font-style: italic;
}
#w {
    font-weight: bold;
}
#im1 {
    width: 100px;
    margin-left: 5%;
}
.row0 {
    padding-top: 25px;
    background: #f1f1f1;
    padding-bottom: 10px;
    margin-bottom: 20px;
    box-shadow: 0 0 5px black; 
    border-radius: 3px;
}
.row00 {
    background: #f1f1f1;
    margin: 10px;
    box-shadow: 0 0 5px black; 
    border-radius: 5px;
    width: 100%;
}
.row1 {
    margin-left: 10px;
}
.row2 {
    text-align: center;
    margin-top: 10px;
    padding-left: 10px;
    color: #1C2B5C;
    font-family: "Algerian";
} 
 .row4 {
    text-align: center;
    color: #1C2B5C;
    font-style: italic;
    font-family: "Algerian";
}   
 #opp-list a:hover {
        color: white;
        background: #007bff8f;
        text-decoration: none;
    }
</style>
<!--the mid ends here-->
                        <div class="row">
                            <?php
                                $where = "";
                                if($cid > 0){
                                    $where  = " and category_id =$cid ";
                                }
                                $cat = $conn->query("SELECT * FROM products where unix_timestamp(bid_end_datetime) >= ".strtotime(date("Y-m-d H:i"))." $where order by name asc");
                                if($cat->num_rows <= 0){
                                    echo "<center><h4><i>No Available Product.</i></h4></center>";
                                     ?>
                                    <script> swal("Sorry!", "There are no Currently Avalable Bids!");</script>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        </div>
                                    <?php 
                                } 
                                while($row=$cat->fetch_assoc()):
                             ?>
                             <div class="col-sm-4">
                                 <div class="card row00">
                                    <div class="float-right align-top bid-tag">
                                         <span class="badge badge-pill badge-primary text-white"><i class="fa fa-tag"></i>Form Price: <?php echo number_format($row['price_for_form']) ?></span>
                                     </div>
                                     <img class="card-img-top" src="auctioneer/assets/uploads/<?php echo $row['img_fname'] ?>" alt="Card image cap">
                                      <div class="float-right align-top d-flex">
                                         <span class="badge badge-pill badge-warning text-white"><i class="fa fa-hourglass-half"></i> <?php echo date("M d,Y h:i A",strtotime($row['bid_end_datetime'])) ?></span>
                                     </div>
                                     <div class="card-body prod-item">
                                         <p><?php echo $row['name'] ?></p>
                                         <p><small><?php echo $cat_arr[$row['category_id']] ?></small></p>
                                         <p class="truncate"><?php echo $row['description'] ?></p>
                                        <button class="btn btn-primary btn-sm view_prod" type="button" data-id="<?php echo $row['id'] ?>"> View</button>
                                     </div>
                                 </div>
                             </div>
                            <?php endwhile; ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.dark-mode {
    background-color: #333; /* Example background color for dark mode */
    color: #fff; /* Example text color for dark mode */
    /* Add additional styles for dark mode as needed */
}

</style>
<script>
    // Function to toggle dark mode
    // Function to toggle dark mode
// Function to toggle dark mode
function toggleDarkMode() {
    // Toggle dark mode class on the body
    document.body.classList.toggle('dark-mode');

    // Check if dark mode is enabled
    var isDarkMode = document.body.classList.contains('dark-mode');

    // Save the user's preference to local storage
    localStorage.setItem('darkMode', isDarkMode ? 'true' : 'false');
}

// Function to check and set initial dark mode state
function checkDarkMode() {
    // Check if dark mode preference is stored in local storage
    var darkMode = localStorage.getItem('darkMode');

    // Set dark mode based on stored preference
    if (darkMode === 'true') {
        document.body.classList.add('dark-mode');
    }
}


    // Function to handle updating profile
    <?php

?>




    // Function to handle changing password
    
</script>


<script>
    $('#cat-list li').click(function(){
        location.href = $(this).attr('data-href')
    })
    $('#opp-list li').click(function(e){
        location.href = 'bidder.php?page=my_bids'
      })
     $('#cat-list li').each(function(){
        var id = '<?php echo $cid > 0 ? $cid : 'all' ?>';
        if(id == $(this).attr('data-id')){
            $(this).addClass('active')
        }
    })
     $('.view_prod').click(function(){
        uni_modal_right('BID FORM PAGE ','view_prod.php?id='+$(this).attr('data-id'))
     })
</script>


<!--
accordion style start


-->    
     <style>
        .accordion_button {
        display: block;
        width: 100%;
        padding: 15px;
        margin-bottom: 5px;
        border:none;
        outline: none;
        cursor: pointer;
        background: #006cfa;
        color: white;
        text-align: left;
        transition: background 0.2s;
      }
      .list{
         background: #006cfabe;
        color: white;
        text-align: left;
        transition: background 0.2s;
      }
      .list--active{
       background: #006cfa;
        color: #000;
        text-align: left;
        transition: background 0.2s;
      }
      .accordion_button::after {
        content: '\25be';
        float: right;
        transform: scale(1.5);
      }
      .accordion_content ul li:active .accordion_button{  
        background: #1e1e47ad; 
        box-shadow: 3px 3px 3px rgba(11, 13, 37, 0.89);
        border-radius: 4px;
        color: #979292fd;
      }
      .accordion_button:hover {      
      background: #0081faa9;
        color: white; 
        box-shadow: 3px 2px 2px lightgray;}

      .accordion_button--active::after { content: '\25b4'}
      .accordion_content {
        overflow: hidden;
        max-height: 0;
        transition: max-height 0.2s;
        font-family: sans-serif;
        background: white;
      }
      </style>
  <script>
    document.querySelectorAll('.accordion_button').forEach(button => {
      button.addEventListener('click', () => {
        const accordionContent = button.nextElementSibling;
        button.classList.toggle('accordion_button--active');
        if(button.classList.contains('accordion_button--active')){
          accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';

        } else {
          accordionContent.style.maxHeight = 0;
        }
      });
    });
  </script>

<!--accordion end-->
<!--#####################################################-->
          <!--home page ends-->
       
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
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
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
        <footer class=" py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0 text-black">Contact us</h2>
                        <hr class="divider my-4" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone-square fa-3x mb-2 text-muted"></i>
                        <div class="text-black"><?php echo $_SESSION['system']['contact'] ?></div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-2 text-muted"></i>
                        <a class="d-block" href="mailto:<?php echo $_SESSION['system']['email'] ?>"><?php echo $_SESSION['system']['email'] ?></a>
                    </div>
                    <br>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-info fa-3x mb-2 text-muted"></i>
                        <a class="d-block" href="index.php?page=about">About Us</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="container"><div class="small text-center text-muted">Copyright © 2024 - <?php echo $_SESSION['system']['name'] ?> | <a href="https://www.wpcsc.edu.et//" target="_blank">Wolkite polythecnc</a></div></div>
        </footer>
        
       <?php include('footer.php') ?>
       <?php   }
    }?>
    </body>
    <script type="text/javascript">
      $('#login').click(function(){
        uni_modal("Login",'login.php')
      })
      $('.datetimepicker').datetimepicker({
          format:'Y-m-d H:i',
      })
      $('#find-car').submit(function(e){
        e.preventDefault()
        location.href = 'bidder.php?page=search&'+$(this).serialize()
      })
    </script>
    <?php $conn->close() ?>

</html>
