
<style>
	.collapse a{
		text-indent:10px;
	}
</style>

<nav id="sidebar" class='mx-lt-6 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=itemrequest" class="nav-item itemrequest"><span class='icon-field'><i class="fa fa-shopping-cart"></i></span> Request item </a>
				<a href="index.php?page=sentitem" class="nav-item sentitem"><span class='icon-field'><i class="fa fa-angle-double-right"></i></span> sent </a>

				<a href="index.php?page=rejecteditem" class="nav-item rejecteditem"><span class='icon-field'><i class="fa fa-times-circle"></i></span> view rejected item </a>
				<a href="index.php?page=cancleitem" class="nav-item cancleitem"><span class='icon-field'><i class="fa fa-times-circle"></i></span> view cancle item </a>

			</div>
</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
