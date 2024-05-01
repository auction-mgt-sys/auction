

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>WOLKITE TOWN WATER SUPPLY CUSTOMER SERVICE</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
  
<script language="javascript">

function load() {
var load = window.open ('index.php','_self',false);

}

</script>
</head>

<body>
 <div id="main">
   <?php
if (!isset($_SESSION)) {
 // session_start();
}
?>
  <div id="header">
    <div id="banner">

     <img width="918" height="105" src="images/gg.jpg">
  </div><!--close banner-->
   </div><!--close header-->
  
   <style>
    #sub-menu {
      text-align: right;
    }

    #navigation {
      width: 100%;
      background-color: #f2f2f2;
    }

    #navigation ul {
      list-style-type: none;
      margin: 0;
      padding: 1;
      overflow: hidden;
    }

    #navigation li {
      float: left;
    }

    #navigation li a {
      display: block;
      color: #333;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-weight: bold;
    }

    #navigation li a:hover {
      background-color: #ddd;
    }

    #navigation .current a {
      background-color: #4CAF50;
      color: white;
    }

    #navigation .sub-menu {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    #navigation .sub-menu li {
      position: relative;
    }

    #navigation .sub-menu li a {
      color: #333;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    #navigation .sub-menu li a:hover {
      background-color: #f1f1f1;
    }

    #navigation li:hover .sub-menu {
      display: block;
    }
  </style>
</head>
<body>
  <div id="navigation">
    <ul>
      <li class="current">
        <div align="center"><a href="index.php">Home</a></div>
      </li>
      <li class="curren">
        <div align="center"><a href="admin.html">Admin</a></div>
      </li>   

      <li>
        <div align="center">
          <a href="background.php">About Us</a>
          <ul class="sub-menu">
            <li><a href="background.php">Background</a></li>
          </ul>
        </div>
      </li>
      <li>
        <div align="center">
          <a href="recordOffice.html">Offices</a>
          <ul class="sub-menu">
            <li><a href="billOffi.html">Bill manager</a></li>
            <li><a href="read.html">Reader</a></li>
            <li><a href="technci.html">Technician Office</a></li>
          </ul>
        </div>
      </li>
      <li>
          <div align="left">
            <a href="NewCustRegstration.php">Service</a>
                <ul class="sub-menu">
                      <li>
                        <div align="left"><a href="NewCustRegstration.php"> Registration</a></div>
                  </li>
				  
                  <li>
                    <div align="left"><a href="index.php"> Maintanance </a></div>
                  </li>
                  <li>
                    <div align="left"><a href="index.php"> Bill payment</a></div>
                  </li>
      
</div>
<li>
        <div align="center"><a href="index.php">Contact Us</a></div>
      </li>
      <li>
        <div align="center"><a href="view_message.php">View message</a></div>
      </li>
       <li>
       <!-- <div id="sub-menu"> -->
  <span class="style1"><font color="#000000">Language/ቋንቋ</font></span>
  <div class="dropdown">
    <select onchange="location = this.value;">
      <option value="index.php">English</option>
      <option value="indexx.php">አማርኛ (Amharic)</option>
    </select>
  </div>
       </li>
        </div>
     
      
    </ul>
  </div>

	    <!-- <select name="language" size="1" >
		<option value="eng" onClick="loadEng()">English</option>
        <option value="amh" onClick="load()">አማርኛ(Amharic)</option>		     
    </select>  -->
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php
// echo "<b>".date('l\, F jS\, Y ')."</b>";
?>
   </div>
	 
   
  
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    #clockbox {
      font-size: 24px;
      text-align: center;
    }

    #site_content {
      margin: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .sidebar {
      width: 100%;
      margin-bottom: 20px;
    }

    .sidebar_item {
      padding: 10px;
      background-color: #f0f0f0;
      border: 1px solid #ddd;
    }

    h2.style3 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .style8 {
      font-weight: bold;
    }

    .style9 {
      text-align: justify;
    }

    .input_wrapper {
      display: flex;
      flex-direction: column;
      margin-bottom: 10px;
    }

    .input_wrapper label {
      font-weight: bold;
    }

    .input_wrapper input[type="text"],
    .input_wrapper input[type="password"] {
      width: 150px;
    }

    #content {
      margin: 20px;
    }

    .content_item {
      padding: 10px;
      background-color: #f0f0f0;
      border: 1px solid #ddd;
    }

    h1.style6 {
      color: green;
    }

    p {
      text-align: justify;
    }

    #footer {
      background-color: #f0f0f0;
      padding: 10px;
      text-align: center;
    }
  </style>

<style>
  #clockbox {
    font-size: 24px;
    text-align: center;
  }

  #site_content {
    display: flex;
    flex-direction: row;
  }

  .sidebar {
    flex: 1;
    margin-right: 20px; /* Add space between sidebar and content */
  }

  .content {
    flex: 2;
  }

  .sidebar_item {
    margin-bottom: 20px;
  }

  .sidebar_item img {
    width: 200px;
    height: 100px;
  }

  .input_wrapper {
    margin-bottom: 10px;
  }

  label {
    display: block;
    margin-bottom: 5px;
  }

  .style2 {
    margin-top: 10px;
  }

  .content_item {
    margin-bottom: 20px;
  }

  .style6 {
    color: green;
  }

  p {
    text-align: justify;
  }
</style>

<div id="clockbox"></div>

<div id="site_content">
  <div class="sidebar">
    <div class="sidebar_item">
      <img src="images/key.jpg">
      <form action="login.php" method="post" id="form1" onsubmit="MM_validateForm('username','','R','password','','R');return document.MM_returnValue">
        <div class="input_wrapper">
          <label for="username">User Name:</label>
          <input type="text" name="username" id="username">
        </div>
        <div class="input_wrapper">
          <label for="password">Password:</label>
          <input type="password" name="password" id="password">
        </div>
        <input name="send" type="Submit" class="style2" value="Sign In">
      </form>
    </div>
  </div>

  <div class="content">
    <div class="content_item">
      <h1 class="style6">WOLKITE TOWN WATER SUPPLY CUSTOMER SERVICE</h1>
      <p align="justify">It is known that, in the past two decades our region as well as the country as a whole has recorded a significant economic and social development which has never seen before in our history. His achievements assure that the dimensions of our policies and strategies are developmental and the directions we follow are appropriate to our situation and objective realities.</p>
    </div>
  </div>
</div>
    <div id="footer">
      <p>&copy; 2024 GC </p>
    </div><!--close footer-->
  </div><!--close site_content-->
</body>
</html>