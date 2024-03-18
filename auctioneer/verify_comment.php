<?php 
include('db_connect.php');
session_start();
if(isset($_GET['id'])){
	$idd = $_GET['id'];
$comment = $conn->query("SELECT * FROM payment where id =".$_GET['id']);
     while($row= $comment->fetch_assoc()){
     	$get = $conn->query("SELECT * FROM users where id =".$row['bidder_id']." limit 1");
            $uname = $get->num_rows > 0 ? $get->fetch_array()['name'] : '' ;
            $get = $conn->query("SELECT * FROM users where id =".$row['bidder_id']." limit 1");
            $bidder_id = $get->num_rows > 0 ? $get->fetch_array()['id'] : '' ;
}
$bidder=$bidder_id;
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	
	<form action="" id="manage-payment">	
		<input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id']: '' ?>">
		<input type="hidden" class="form-control" name="bidder_id" value="<?php echo $bidder_id ?>">
		<input type="hidden" class="form-control" name="pid" value="<?php echo $_GET['id'] ?>">
		<div class="form-label justify-content-end">
			<label><b>Date:</b><i style="background: #e1e6e1;"> <?php echo strtolower((date('F j, Y'))); ?></i></label>
		</div>
		<div class="form-group">
			<label class="form-control">&nbsp;&nbsp;From: <?php echo $_SESSION['login_name'];?></label>
		</div>
		<div class="form-group">
			<lable class="form-control">Send To: <?php echo $uname ?></lable>
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
	
	$('#manage-payment').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=Verify_comment',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data is successfully Deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})

</script>