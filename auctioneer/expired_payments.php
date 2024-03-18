<?php 

?>
 
<div class="container-fluid">
	<br>
	<div class="row">
		
		<div class="card col-lg-12">

			<div class="card-body">
				<h4 class="text-center text-muted"><b>EXPIRED PAYMENTS</b></h4>
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
 					$payments = $conn->query("SELECT * FROM payment where status = 2 order by date_payed desc");
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
								    <a class="btn btn-danger delet_payment" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
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
	uni_modal('Set comment here below to delete!','Verify_comment.php?id='+$(this).attr('data-id'))
	})
</script>