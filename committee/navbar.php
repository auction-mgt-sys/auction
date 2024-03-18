
<style>
	.collapse a{
		text-indent:10px;
	}
</style>

<nav id="sidebar" class='mx-lt-6 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> All Bidders</a>
				<a href="index.php?page=new_users" class="nav-item nav-new_users"><span class='icon-field'><i class="fa fa-user"></i></span> New Bidders <span class='icon-field'><img src="../admin/photos/Add.png"> </span></a>
				<a href="index.php?page=accepted_users" class="nav-item nav-accepted_users"><span class='icon-field'><i class="fa fa-user"></i></span> Accepted Bidders <span class='icon-field'><img src="../admin/photos/Checkmark.png"> </span></a>
				<a href="index.php?page=rejected_users" class="nav-item nav-rejected_users"><span class='icon-field'><i class="fa fa-user"></i></span> Rejected Bidders <span class='icon-field'><img src="../admin/photos/Unavailable3.png"> </span></a>
				<a href="index.php?page=requestitems" class="nav-item nav-requestitems"><span class='icon-field'><i class="fa fa-requestitems"></i></span> request item <span class='icon-field'><img src="../admin/photos/Add.png"> </span></a>

			</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
