<?php 

?>

<div class="container-fluid">
	<br>
	<div class="row">
		<div class="card col-lg-12">

			<div class="card-body">
				<h3 class="text-center">Accepted Bidders</h3>
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">User Name</th>
					<th class="text-center">contact</th>
					<th class="text-center">Email</th>
					<th class="text-center">TIN</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$type = array("","bidder","Admin","Auctioneer","commitee","department","finance","president");
 					$users = $conn->query("SELECT * FROM users where type = 2 and status = 1 order by name asc");
 					$i = 1;
 					while($row= $users->fetch_assoc()):
				 ?>
				 <tr>
				 	<td class="text-center">
				 		<?php echo $i++ ?>
				 	</td>
				 	<td>
				 		<?php echo ucwords($row['username']) ?>
				 	</td>
				 	<td>
				 		<?php echo ucwords($row['contact']) ?>
				 	</td>
				 	<td>
				 		<?php echo ucwords($row['email']) ?>
				 	</td>
				 	<td>
				 		<?php echo ucwords($row['TIN_number']) ?>
				 	</td>
				 	<td>
				 		<center>
								<div class="btn-group">
								<a class="btn view_user btn-primary" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>View Detail</a>
								&nbsp;
								  <a type="button" class="btn btn-danger reject" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>reject</a>
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
$('#new_user').click(function(){
	uni_modal('New User','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
})
//get bidders detail
$('.view_user').click(function(){
		uni_modal("<i class'fa fa-card-id'></i> User Details","users_detail.php?id="+$(this).attr('data-id'))
		
}) 
//end#######
// $('.reject').click(function(){
// 		_conf("Are you sure to reject this user?","reject",[$(this).attr('data-id')])
// 	})
// 	function reject($id){
// 		start_load()
// 		$.ajax({
// 			url:'ajax.php?action=reject',
// 			method:'POST',
// 			data:{id:$id},
// 			success:function(resp){
// 				if(resp==1){
// 					alert_toast("The User is Successfully Rejected",'success')
// 					setTimeout(function(){
// 						location.reload()
// 					},1000)

// 				}
// 			}
// 		})
// 	}
$('.reject').click(function(){
	uni_modal('Why You Reject the Bidder?','user_reject_verify.php?id='+$(this).attr('data-id'))
	})	
</script>