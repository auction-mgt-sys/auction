<?php 
include('db_connect.php');
session_start();
if(isset($_GET['id'])){
	$c = $_GET['id'];
$user = $conn->query("SELECT * FROM comment where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v; 
}
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	<?php 

$get = $conn->query("SELECT * FROM users where id =".$meta['sender_id']."  order by 'date' asc limit 1");
                        $uname = $get->num_rows > 0 ? $get->fetch_array()['name'] : '' ;
	?>
	<form action="" id="manage-comment_detail">	
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		
		<p><small>sent from:&nbsp; <?php echo ' '.$uname; ?></small></p>
		<p class="center"> <small>Subject:<?php echo ' '.$meta['title']; ?></small></p>
		<p class="text-start"><small><b>Details</b> <?php echo ' '.$meta['detail']; ?></small></p>
		<p class="text-end"><small><i>Sent in <?php echo ''.date('F j, Y',strtotime($meta['date'])); ?></i></small></p>
	</form>
</div>
<script>
	
	$('#manage-comment_detail').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=Verify_comment_detail',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
						location.reload()
				}
				else if(resp==0){
					$('#msg').html('<div class="alert alert-danger">empty fild exist</div>')
					end_load()
				}
				else{
					$('#msg').html('<div class="alert alert-danger">Transaction ID already exist</div>')
					end_load()
				}
			}
		})
	})

</script>
<style type="text/css">
	
	.avatar {
	    max-width: calc(100%);
	    max-height: 27vh;
	    align-items: center;
	    justify-content: center;
	    padding: 5px;
	}
	.avatar img {
	    max-width: calc(100%);
	    max-height: 27vh;
	}
	p{
		margin:unset;
	}
	#uni_modal .modal-footer .btn-secondary{
		display: none
	}
	#uni_modal .modal-footer .btn-secondary{
		background: gray;
	}
</style>