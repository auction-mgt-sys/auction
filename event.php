<?php 
include 'admin/db_connect.php'; 

// Fetch category names from the database
$category_result = $conn->query("SELECT * FROM categories");
$cat_arr = array();
while ($cat_row = $category_result->fetch_assoc()) {
    $cat_arr[$cat_row['id']] = $cat_row['name'];
}
?>
<script src="sweetalert.min.js"></script>
<style>
    /* ... (styles remain unchanged) ... */
    .expired-tag {
        position: absolute;
        right: .5em;
        top: .5em;
        background-color: #dc3545;
        color: white;
        padding: 3px 10px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: bold;   }
</style>
<?php 

$cid = isset($_GET['category_id']) ? $_GET['category_id'] : 0;
?>

<!-- ... (rest of the code remains unchanged) ... -->

<div class="row">
    <?php
    $where = "";
    if($cid > 0){
        $where = " and category_id =$cid ";
    }
    $cat = $conn->query("SELECT * FROM products $where order by name asc");

    if($cat->num_rows <= 0){
        echo "<center><h4><i>No Available Product.</i></h4></center>";
        ?>
        <script> swal("Sorry!", "There are no Currently Available Bids!");</script>
    <?php 
    } 
    while($row = $cat->fetch_assoc()):
    ?>
    <div class="col-sm-4" style="margin-top: 40px;">
        <div class="card row00">
            <?php if(strtotime($row['bid_end_datetime']) < strtotime(date("Y-m-d H:i"))): ?>
                <div class="expired-tag">Expired</div>
            <?php endif; ?>
            <img class="card-img-top" src="auctioneer/assets/uploads/<?php echo $row['img_fname'] ?>" alt="Card image cap" style="width: 200px; height: 200px;">
            <div class="float-right align-top d-flex">
                <span class="badge badge-pill badge-warning text-white"><i class="fa fa-hourglass-half"></i> <?php echo date("M d,Y h:i A",strtotime($row['bid_end_datetime'])) ?></span>
            </div>
            <div class="card-body prod-item">
                <p><?php echo $row['name'] ?></p>
                <p><small><?php echo $cat_arr[$row['category_id']] ?></small></p>
                <p class="truncate"><?php echo $row['description'] ?></p>
                <?php if(strtotime($row['bid_end_datetime']) >= strtotime(date("Y-m-d H:i"))): ?>
                    <button class="btn btn-primary btn-sm view_prod" type="button" data-id="<?php echo $row['id'] ?>"> View</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<!-- ... (rest of the code remains unchanged) ... -->


  
  <style>


.a {
    margin-bottom: 15px;
    font-family: 'Arial';
}
.mid_1 {
    margin-left: 20%;
    font-family: "Algerian";
    margin-top: 20px;
}
.mid_2 {
    margin-left: 40%;
    font-family: "Algerian";
    margin-top: 10px;
}
.mid_1 h3 {
    font-family: "Times New Roman";
    text-decoration: none;
    margin-top: 20px;
    font-style: italic;
}
#w {
    font-weight: bold;
}
#im1 {
    width: 100px;
    margin-left: 5%;
}
.row0 {
    padding-top: 25px;
    background: #f1f1f1;
    padding-bottom: 10px;
    margin-bottom: 20px;
    box-shadow: 0 0 5px black; 
    border-radius: 3px;
}
.row00 {
    background: #f1f1f1;
    margin-left: 12px;
    margin-top: 15px;
    box-shadow: 0 0 5px black; 
    border-radius: 5px;
    width: 100%;
}
.row1 {
    margin-left: 10px;
}
.row2 {
    text-align: center;
    margin-top: 10px;
    padding-left: 10px;
    color: #1C2B5C;
    font-family: "Algerian";
} 

 .row4 {
    text-align: center;
    color: #1C2B5C;
    font-style: italic;
    font-family: "Algerian";
}   
</style>


<script>
    $('#cat-list li').click(function(){
        location.href = $(this).attr('data-href')
    })
     $('#cat-list li').each(function(){
        var id = '<?php echo $cid > 0 ? $cid : 'all' ?>';
        if(id == $(this).attr('data-id')){
            $(this).addClass('active')
        }
    })
      $('#LogIn').click(function(){
      if('<?php echo isset($_SESSION['login_id']) ? 1 : '' ?>' != 1){
             uni_modal("LOGIN",'login.php')
        }
     })
     // $('.view_prod').click(function(){
     //    uni_modal_right('View Product','view_prod.php?id='+$(this).attr('data-id'))
     // })
      $('.view_prod').click(function(){
      if('<?php echo isset($_SESSION['login_id']) ? 1 : '' ?>' != 1){
             uni_modal("LOGIN",'login.php')
        }
        else
         {
          uni_modal_right('BID FORM','view_prod.php?id='+$(this).attr('data-id'))
         }
     })
</script>