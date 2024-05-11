
<?php
include('session.php');
include("modal_style.php"); 
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>HU CEP FMS</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="css/login.css" />


	<link rel="stylesheet" type="text/css" href="css/form.css">
	
	<link rel="stylesheet" type="text/css" href="css/tableCss.css" />
	
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.dropotron-1.0.js"></script>
<script type="text/javascript" src="js/jquery.slidertron-1.1.js"></script>
<script type="text/javascript">
		$(function() {
		$('#menu > ul').dropotron({
			mode: 'fade',
			globalOffsetY: 11,
			offsetY: -15
		});
		
	});

</script>
</head>
<body>
<div id="wrapper">
	<br>

	<div id="menu"  > 
		<ul >
		    <li><h3>HU CEP FMS</h3></li>
			<li><a href="studentPage.php?hm=">Home</a></li>
			<li><a href="studentPage.php?vg=">View Grade Report<a></li>
			<li><a href="studentPage.php?wz=">Withdrawal Request<a></li>
			<li><a href="studentPage.php?chnps=">Change Password</a></li>
			<li class="last"><a href="logout.php">LogOut</a></li>
		</ul>
		<br class="clearfix" />
	</div>
		
	<div id="page">
	
			<div id="sidebars" >
			<div class="box" style="padding-top: 30px;padding-left: 60px;">
				<h3>User Profile</h3>
				<?php
					
					$run = mysql_query("select * from student where user_name = '$session_username'");
					$row = mysql_fetch_array($run);
					$fname = ucfirst($row['first_name']);
					$mname = ucfirst($row['middle_name']);
					$astat = ucfirst($row['accademic_status']);
				?>
				<p><img src="UserImages/<?php echo $row['profile_image'];?>" style="height: 150px; width: 150px; padding-top: 5px; border-radius:50%;" /></p>
				<p style = "margin-left: -25px"><strong>Name : <?php echo $fname." ".$mname?> <br>
				Acc Status : <?php echo $astat?> <br>
				Edit Account : <a href="studentPage.php?chnps=">Change Password</a></strong></p>
			</div>
		</div>
		<div id="contents">
		
		<?php 
		
		
				 if(isset($_GET["vg"])) {
				 include("view_grade_report.php");
				 }
				 else if(isset($_GET["wz"])){
				 include("withdrawal_request.php");
				 }
				 else if(isset($_GET["chnps"])){
				 include("change_password.php");
				 }
				 else if(isset($_GET["hm"])){
				 include("pages/studHome.php");
				 }
				 else{
				 include("pages/studHome.php");
				 }
				 
				?>
			
		</div>
		<br class="clearfix" />
	</div>
	<div id="page-bottom">
		<div id="page-bottom-content" >
			<center>Copyright (c) 2015 hucepfms.com.</center>
		</div>
	
	</div>
</div>

</body>
</html>