  <?php 
include 'admin/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 400px; padding: 10px; }
    </style>
</head>
<body class="justify-content-center">
 <div class="flex-nowrap">  
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><h5><img src="images/wku.png" class="wku">
      Wolkite University Auction System</h5></a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link-top1 active" aria-current="page" href="index.php"><img src="images/Home.png" class="ic"> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link-top1" href="#"><img src="images/about.png" class="ic">About Developers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link-top1" href="#"><img src="images/about.png" class="ic">About Organization</a>
          </li>
          <li class="nav-item">
            <a class="nav-link-top1" href="#"><img src="images/Help.png" class="ic">Help</a>
          </li>
          <li class="nav-item">
            <a class="nav-link-top1" href="#"><img src="images/Help.png" class="ic">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class='nav-link-top1' href='register.php'><img src='images/Login.png' class='ic'>Sign_Up</a>
             </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>

</body>
</html>