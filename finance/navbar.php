<style>
	.collapse a{
		text-indent:10px;
	}
</style>

<nav id="sidebar" class='mx-lt-6 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
                <a href="index.php?page=generatereport" class="nav-item nav-generatereport"><span class='icon-field'><i class="fa fa-file"></i></span> Generate report</a>
			    <a href="index.php?page=viewrequest" class="nav-item nav-viewrequest"><span class='icon-field'><i class="fa fa-eye"></i></span> View request</a>
			</div>
</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
