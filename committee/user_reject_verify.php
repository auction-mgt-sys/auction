<?php 
include('db_connect.php');
session_start();
if(isset($_GET['id'])){
	$pid = $_GET['id'];
$user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
$bidder = $_GET['id'];
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	
	<form action="" id="manage-rejection">	
		<input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id']: '' ?>">
		<input type="hidden" class="form-control" name="bidder_id" value="<?php echo $bidder?>">
		<input type="hidden" class="form-control" name="pid" value="<?php echo $_GET['id'] ?>">
		<div class="form-label justify-content-end">
			<label><b>Date:</b><i style="background: #e1e6e1;"> <?php echo strtolower((date('F j, Y'))); ?></i></label>
		</div>
		<div class="form-group">
			<label class="form-control">&nbsp;&nbsp;From: <?php echo $_SESSION['login_name'];?></label>
		</div>
		<div class="form-group">
			<lable class="form-control">Send To: <?php echo $meta['name'] ?></lable>
		</div>

		

		<div class="form-group">
			<label for="Subject">Subject:</label>
			<input type="text" class="form-control" name="Subject" required>
		</div>
		<div class="form-group">
			<label for="detail">Details</label>
			<textarea name="detail" id="description" class="form-control" cols="30" rows="5" required></textarea>
		</div>	
	</form>
</div>
<script>
	
	$('#manage-rejection').submit(function(e){
		e.preventDefault();//verify_comment
		start_load()
		$.ajax({
			url:'ajax.php?action=user_reject_verify',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("User is successfully Rejected",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})

</script>