
<style>
	.collapse a{
		text-indent:10px;
	}
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark'>
    <div class="sidebar-list">
        <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
        <a href="index.php?page=reports" class="nav-item nav-reports"><span class='icon-field'><i class="fa fa-file"></i></span> View Reports</a>
        <a href="index.php?page=history" class="nav-item nav-history"><span class='icon-field'><i class="fa fa-file"></i></span> History</a>
        </div>
    </div>
    
</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
