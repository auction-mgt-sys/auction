<?php 
include('db_connect.php');
session_start();
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM payment where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	
	<form action="" id="manage-payment">	
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="transaction_id">Transaction id</label>
			<input type="text" name="transaction_id" id="transaction_id" class="form-control" value="<?php echo isset($meta['transaction_id']) ? $meta['transaction_id']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="amount">Amount of money payed</label>
			<input type="number" name="amount" id="amount" class="form-control" value="<?php echo isset($meta['amount']) ? $meta['amount']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="lname">Reason</label>
			<input type="text" name="reason" id="reason" class="form-control" value="<?php echo isset($meta['reason']) ? $meta['reason']: '' ?>" required>
		</div>
	</form>
</div>
<script>
	
	$('#manage-payment').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_payment',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
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