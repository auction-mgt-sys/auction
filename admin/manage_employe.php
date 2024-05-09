<?php 

?>
 
<div class="container-fluid">
	
	<div class="row">
	<div class="col-lg-12">
			<button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> New user</button>
	</div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Name</th>
					<th class="text-center">Username</th>
					<th class="text-center">Type</th>
                    <th class="text-center">department</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$type = array("","admin","bidder","auctioneer","commitee","deparment","finance","president");
                     $users = $conn->query("SELECT * FROM users WHERE type IN (1,3,4,5,6,7) ORDER BY name ASC");
 					$i = 1;
 					while($row= $users->fetch_assoc()):
				 ?>
				 <tr>
				 	<td class="text-center">
				 		<?php echo $i++ ?>
				 	</td>
				 	<td>
				 		<?php echo ucwords($row['name']) ?>
				 	</td>
				 	
				 	<td>
				 		<?php echo $row['username'] ?>
				 	</td>
				 	<td>
				 		<?php echo $type[$row['type']] ?>
						
				 	</td>
					 <td>
				 		<?php echo $row['deptname'] ?>
				 	</td>
				 	<td>
				 		<center>
                         <div class="btn-group">
    <button type="button" class="btn btn-<?php echo $row['sta'] == 0 ? 'success' : 'danger' ?> toggle_active" data-id="<?php echo $row['id'] ?>">
        <?php echo $row['sta'] == 0 ? 'Active' : 'Deactive' ?>
    </button>
</div>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary">Action</button>
								  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
									<div class="dropdown-content"></div>
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
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){
    $('.toggle_active').click(function(){
        var id = $(this).data('id');
        var currentStatus = $(this).hasClass('btn-success') ? 0 : 1; // Assuming 'success' class indicates active state

        // Toggle the button class and text
        $(this).toggleClass('btn-success btn-danger');
        $(this).text(currentStatus == 0 ? 'Deactivate' : 'Activate');

        // Send AJAX request to update status in the database
        $.post('update_status.php', { id: id, status: currentStatus }, function(data){
            if (data == 0) {
                alert('sucessfully  update stats.');
            }
        });
    });
});
</script>

<script>

	
	$('table').dataTable();
$('#new_user').click(function(){
	uni_modal('New User','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
})
$('.delete_user').click(function(){
		_conf("Are you sure to delete this user?","delete_user",[$(this).attr('data-id')])
	})
	function delete_user($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
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