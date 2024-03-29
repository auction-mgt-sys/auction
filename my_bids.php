 <!-- Masthead-->

       <?php include('admin/db_connect.php');

       if (isset($_SESSION['login_id'])) {
       ?>
<div class="container-fluid d-flex">
	<div class="col-lg-2">
		<br>
	<a href="bidder.php" class="text-start"><b><img src="images/Backspace.png" style="width: 50px; height: 50px;"> BACK To HOME</b></a>	
	</div>
    
    
    <div class="col-lg-9">
        
        <div class="row">
            <!-- FORM Panel -->

            <!-- Table Panel -->
            <div class="col-md-12">
            	<br>
              <h1 class="text-center text-muted">Your Bid History</h1>
              <br>
                <div class="card">
                    <div class="card-header">
                        <b>List of Bids</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-condensed table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="">Bid Created Date </th>
                                    <th class="">Product</th>
                                    <th class="">Amount</th>
                                    <th class="">Status</th>
                                    <th class="">Bid Close Date </th>
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
                                    $get = $conn->query("SELECT * FROM bids where product_id = {$row['product_id']} order by date_created asc limit 1 ");
                                    $uid = $get->num_rows > 0 ? $get->fetch_array()['user_id'] : 0 ;
                                ?>
                                <?php if($row['user_id'] == $_SESSION['login_id']): ?>
                                <tr>
                                	
                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td class="">
                                         <p> <b><?php echo $row['date_created'] ?></b></p>
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
                                        <span class="badge">Bidding Stage</span>
                                        <?php else: ?>
                                        <?php if($uid == $row['user_id']): ?>
                                        <span class="badge badge-primary">Winning in Bidding process</span>
                                        <?php else: ?>
                                        <span class="badge badge-secondary">You Loos The Bid</span>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php elseif($row['status'] == 2): ?>
                                        <span class="badge badge-success">You Won</span>
                                        <?php else: ?>
                                        <span class="badge badge-danger">Canceled bid</span>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td class="">
                                         <p> <b><?php echo $row['bdt'] ?></b></p>
                                    </td>

                                    
                                </tr>
                            <?php endif; ?>
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
<?php exit; } ?>
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
</script>
