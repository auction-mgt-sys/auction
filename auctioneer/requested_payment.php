<?php 

?>
 
<div class="container-fluid">
	<br>
	
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<h4 class="text-center text-muted"><b>REQUESTED PAYMENTS</b></h4>
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Transaction ID</th>
					<th class="text-center">Bidder Name</th>
					<th class="text-center">Reason</th>
			<th class="text-center">business</th>
 <th class="text-center">Date</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$payments = $conn->query("SELECT * FROM payment where status = 0 order by date_payed desc");
 					$i = 1;
 					while($row= $payments->fetch_assoc()):
 						$get = $conn->query("SELECT * FROM users where id =".$row['bidder_id']." limit 1");
            			$uname = $get->num_rows > 0 ? $get->fetch_array()['name'] : '' ;
						$get_bphoto = $conn->query("SELECT bphoto FROM users WHERE id =" . $row['bidder_id'] . " LIMIT 1");
						$bphoto = '';
						if ($get_bphoto->num_rows > 0) {
							$bphoto = $get_bphoto->fetch_array()['bphoto'];
						}
					?> 
				 
				 <tr>
				 	<td class="text-center">
				 		<?php echo $i++ ?>
				 	</td>
				 	<td><!--ucwords()-->
				 		<?php echo $row['transaction_id'] ?>
				 	</td>
				 	<td><!--ucwords()-->
				 		<?php echo $uname ?>
				 	</td>
				 	<td>
				 		<?php echo ucwords($row['reason']) ?>
				 	</td>
					<td>
    <!-- Display user's profile picture -->
    <?php
if (!empty($bphoto)) {
    // Check if the image exists in the file system
    if (file_exists('../admin/' . $bphoto)) {
        // If the image exists in the file system, display it
        echo '<img src="../admin/' . htmlspecialchars($bphoto) . '" alt="" style="width: 150px; height: auto;">';
    } else {
        // If the image does not exist in the file system, assume it's base64-encoded and display it
        echo '<img src="data:image/jpeg;base64,' . base64_encode($bphoto) . '" alt="" style="width: 200px; height: auto;">';
    }
} else {
    // If no photo is available, display a message
    echo 'No photo available';
}
?>

<?php if (!empty($bphoto) && file_exists('uploads/' . $bphoto)) : ?>
    <!-- If the image exists in the file system, display it -->
    <img src="../uploads/<?php echo htmlspecialchars($bphoto); ?>" alt="P" style="width: 150px; height: auto;">
<?php else: ?>
    <!-- If the image does not exist in the file system, display a placeholder image -->
    <img src="../uploads/placeholder.jpg" alt="" style="width: 150px; height: auto;">
<?php endif; ?>

</td>

				 	<td>
				 		<?php echo $row['date_payed'] ?>
				 	</td>
				 	<td>
				 		<center>
								<div class="btn-group">								  
								    <a class="btn btn-primary Verify_payment" type='button' href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Accept</a>&nbsp;
								    <a class="btn btn-danger delet_payment" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
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
$('.Verify_payment').click(function(){
	uni_modal('Enter Amount of Money First!','Verify_payment.php?id='+$(this).attr('data-id'))
})
$('.delet_payment').click(function(){
	uni_modal('Set comment here below to delete!','Verify_comment.php?id='+$(this).attr('data-id'))
	})
</script>