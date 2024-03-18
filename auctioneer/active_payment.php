<?php 

?>
 
<div class="container-fluid">
	<br>
	<div class="row">

	<div class="col-lg-12">
			<button class="btn btn-primary float-right btn-sm" id="new_payment"><i class="fa fa-plus"></i> New Payment</button>
	</div>
	
	</div>
	<div class="row">
		<h5></h5>
		<div class="card col-lg-12">

			<div class="card-body">
				<h4 class="text-center text-muted"><b>ACTIVE PAYENTS</b></h4>
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Transaction ID</th>
					<th class="text-center">Reason</th>
					<th class="text-center">Amount</th>
					<th class="text-center">Date</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$payments = $conn->query("SELECT * FROM payment where status = 1 order by date_payed desc");
 					$i = 1;
 					while($row= $payments->fetch_assoc()):
				 ?>
				 <tr>
				 	<td class="text-center">
				 		<?php echo $i++ ?>
				 	</td>
				 	<td><!--ucwords()-->
				 		<?php echo $row['transaction_id'] ?>
				 	</td>
				 	
				 	<td>
				 		<?php echo ucwords($row['reason']) ?>
				 	</td>
				 	<td>
				 		<?php echo $row['amount'] ?>
				 	</td>
				 	<td>
				 		<?php echo $row['date_payed'] ?>
				 	</td>
				 	<td>
				 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary">Action</button>
								  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_payment" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delet_payment" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
								  </div>
								</div>
								</center>
				 	</td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>

</div>
<script>
	$('table').dataTable();
$('#new_payment').click(function(){
	uni_modal('New Payment','manage_payment.php')
})
$('.edit_payment').click(function(){
	uni_modal('Edit Payment','manage_payment.php?id='+$(this).attr('data-id'))
})
$('.delet_payment').click(function(){
		_conf("Are you sure to delete this payment?","delet_payment",[$(this).attr('data-id')])
	})
	function delet_payment($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delet_payment',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>