<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Bids</b>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Bidder Name</th>
									<th class="">Product</th>
									<th class="">Amount</th>
									<th class="">Status</th>
									<th class="">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cat = array();
								$cat[] = '';
								$qry = $conn->query("SELECT * FROM categories "); 
								while($row = $qry->fetch_assoc()){
									$cat[$row['id']] = $row['name'];
								}
								$books = $conn->query("SELECT b.*, u.name as uname,p.name,p.bid_end_datetime bdt FROM bids b inner join users u on u.id = b.user_id inner join products p on p.id = b.product_id ");
								while($row=$books->fetch_assoc()){
									$get = $conn->query("SELECT * FROM bids where product_id = {$row['product_id']} order by bid_amount asc limit 1 ");
									$uid = $get->num_rows > 0 ? $get->fetch_array()['user_id'] : 0 ;
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p> <b><?php echo ucwords($row['uname']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['name']) ?></b></p>
									</td>
									
									<td class="text-right">
										 <p> <b><?php echo number_format($row['bid_amount'],2) ?></b></p>
									</td>
									<td class="text-center">
										<?php if($row['status'] == 1): ?>
										<?php if(strtotime(date('Y-m-d H:i')) < strtotime($row['bdt'])): ?>
										<span class="badge badge-secondary">Bidding Stage</span>
										<?php else: ?>
										<?php if($uid == $row['user_id']): ?>
										<span class="badge badge-primary">Winning in Bidding process</span>
										<?php else: ?>
										<span class="badge badge-secondary">Loose in Bidding</span>
										<?php endif; ?>
										<?php endif; ?>
										<?php elseif($row['status'] == 2): ?>
										<span class="badge badge-success">The Victory of the bid</span>
										<?php else: ?>
										<span class="badge badge-danger">Canceled bid</span>
										<?php endif; ?>
									</td>
									<td>
										<button class="btn btn-primary btn-sm view_user" type="button" data-id ='<?php echo $row['user_id'] ?>'>Details</button>
										<?php if($row['status'] == 1 && $uid == $row['user_id'] && strtotime(date('Y-m-d H:i')) > strtotime($row['bdt'])) { ?>
										<a class="btn btn-success btn-sm winner" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Winner</a>
									<?php } ?>
									<?php if($row['status'] == 2 || ($row['status'] == 1 && strtotime(date('Y-m-d H:i')) < strtotime($row['bdt']))) { ?>
										<a class="btn btn-warning btn-sm bid_cancl" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Cancel</a>
									<?php } ?>
									<?php if($row['status'] == 3 ) { ?>
										<a class="btn btn-danger btn-sm delete_bid" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
									<?php } ?>

									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable() 
	})
	
	$('.view_user').click(function(){
		uni_modal("<i class'fa fa-card-id'></i> Bidder Details","view_udet.php?id="+$(this).attr('data-id'))
		
	})
	$('#new_book').click(function(){
		uni_modal("New Book","manage_booking.php","mid-large")
		
	})
	$('.edit_book').click(function(){
		uni_modal("Manage Book Details","manage_booking.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_book').click(function(){
		_conf("Are you sure to delete this book?","delete_book",[$(this).attr('data-id')])
	})
	
	function delete_book($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_book',
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
	//assign as winner
	$('.winner').click(function(){
		_conf("Is this bidder is the winner?","winner",[$(this).attr('data-id')])
	})
	function winner($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=winner',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("You Have Successfully Assign The Winner of The Bid",'success')
					setTimeout(function(){
						location.reload()
					},2000)

				}
			}
		})
	}
	$('.bid_cancl').click(function(){
	uni_modal('Set comment below Why you Cancel!','bid_cancel_Verify_comment.php?id='+$(this).attr('data-id'))
	})
	// $('.delete_bid').click(function(){
	// 	_conf("Are you sure to Delete this Bid?","delete_bid",[$(this).attr('data-id')])
	// })
	$('.delete_bid').click(function(){
	uni_modal('Set comment here below to delete!','bid_Verify_comment.php?id='+$(this).attr('data-id'))
	})
</script>