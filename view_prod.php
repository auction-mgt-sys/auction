<?php include 'admin/db_connect.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $img_fname = $_FILES['img']['name'];
    $b_img_fname = $_FILES['bphoto']['name'];

    // Upload images
    if ($_FILES['img']['tmp_name'] != '') {
        $img_fname = strtotime(date('y-m-d H:i')).'_'.$img_fname;
        move_uploaded_file($_FILES['img']['tmp_name'], 'auctioner/'.$img_fname);
    }

    if ($_FILES['bphoto']['tmp_name'] != '') {
        $b_img_fname = strtotime(date('y-m-d H:i')).'_'.$b_img_fname;
        move_uploaded_file($_FILES['bphoto']['tmp_name'], 'auctioner/'.$b_img_fname);
    }

    // Insert into payment table
    $sql = "INSERT INTO payment (img_fname, b_img_fname) VALUES ('$img_fname', '$b_img_fname')";
    // Execute SQL query
    // Add your code to execute the SQL query here
}
?>

<?php
session_start();
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM products where id= ".$_GET['id']);
    $_SESSION['product_id'] = $_GET['id'];

    foreach($qry->fetch_array() as $k => $val){
        $$k=$val;
    }
    $cat_qry = $conn->query("SELECT * FROM categories where id = $category_id");
    $category = $cat_qry->num_rows > 0 ? $cat_qry->fetch_array()['name'] : '';
}
$_SESSION['pro_form_amount'] = $price_for_form;
?>

<style type="text/css">
    #bid-frm{
        display: none
    }
    .warn{
        color: red;
    }
    .d{
        background: gray;
        color: white;
    }
    .logo{
        width: 30%;
        margin-left: 35%;
    }
    .t{
        margin-left: 0px;
    }
</style>
<div class="container-fluid wh">
    <div class="payment_frm">
    <img src="admin/photos/logo.jpg" class="d-flex logo" alt="Logo">
    <h5 class="text-center">Payment For Bid Form</h5>
    <p >First you have to make a payment to get the bid-form by using <b>Mobile-Banking</b> or by <b>Tele-Birr</b> then after fill the form below with a correct information!</p>
    <h5 class="text-center" style="color: green">Name: <?php echo $name ?></h5>
    <b>Account Number: </b><p class="form-control"><b> 001122334455</b></p>
    <p class="form-control">Price For Form: <?php echo $price_for_form ?></p>
    

    <div class="col-md-12"> 
        <form id="manage-payment" method="POST">
                <input type="hidden" name="transaction_id" value="<?php echo $id ?>">
        <div class="form-group">
                    <label for="" class="control-label">Transaction ID</label>
                    <input type="text" class="form-control text-right" name="transaction_id" required="">
                    <small class="warn">Remember! One form payment is only for one bid!</small>
        </div>
        <div class="form-group">
                    <label for="" class="control-label">Payment Reason</label>
                    <input type="text" class="form-control text-right" name="reason" required="">
        </div>
        <div class="justify-content-start">
    <div class="p-1 col-4">
        <input type="file" class="form-control" name="img" onchange="displayImg2(this, $(this), 'img_path-field1')" required>
    </div>
    <div class="p-1 col-6">
        <div class="image-container">
            <img src="<?php echo isset($img_fname) ? 'auctioner/'.$img_fname : '' ?>" alt="" id="img_path-field1" style="display: none;">
        </div>
        <span id="img_error1" style="color: red; display: none;">Please upload an image.</span>
    </div>

    <div class="p-1 col-4">
        <input type="file" class="form-control" name="bphoto" onchange="displayImg2(this, $(this), 'img_path-field2')" required>
    </div>
    <div class="p-1 col-6">
        <div class="image-container">
            <img src="<?php echo isset($b_img_fname) ? 'auctioner/'.$b_img_fname : '' ?>" alt="" id="img_path-field2" style="display: none;">
        </div>
        <span id="img_error2" style="color: red; display: none;">Please upload an image.</span>
    </div>
</div>
<style>
.image-container {
    border: 2px solid #ccc;
    padding: 10px;
    max-width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    margin-bottom: 15px; /* Optional margin for spacing between image containers */
}

.image-container img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
}
</style>
<script>
    function displayImg2(input, element, imgId) {
        const img = document.getElementById(imgId);
        const error = document.getElementById(imgId.replace('img_path', 'img_error'));

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                img.src = e.target.result;
                img.style.display = 'block'; // Make sure the image is visible
                error.style.display = 'none'; // Hide the error message
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            img.src = ''; // Clear the image source
            img.style.display = 'none'; // Hide the image
            error.style.display = 'block'; // Show the error message
        }
    }
</script>

<button class="btn btn-primary btn-block btn-sm ">Submit</button>
    </form>
    </div>   
    </div>
   <!-- ########## check the payment -->
    <div id="bid-frm">
        <div class="float-right align-top bid-tag">
    <span class="badge badge-pill badge-secondary text-white"><i class="fa fa-calendar-times"></i> DATE: <?php echo strtolower((date('F j, Y'))); ?></span>
    </div>
    <img src="auctioneer/assets/uploads/<?php echo $img_fname ?>" class="d-flex w-100" alt="">
    <p><large> Auction Title:- <?php echo $category ?></large></p>
    <p>Our Organization Needs to buy a property <b><?php echo $name ?></b></p>
    <p class=""><?php echo $description ?></p>
    <p>This Auction is avalable every where through this website Until: <b><?php echo date("m d,Y h:i A",strtotime($bid_end_datetime)) ?></b></p>
       
        <div class="col-md-12">
            <form id="manage-bid">
                <input type="hidden" name="product_id" value="<?php echo $id ?>">
                
                <div class="form-group">
                    <label for="" class="control-label">Bid Amount</label>
                    <input type="number" class="form-control text-right" name="bid_amount" required="">
                </div>
                
                <div class="row justify-content-between">
                    
                    <button class="btn col-sm-5 btn-primary btn-block btn-sm mr-2">Submit</button>
                    
                    <button class="btn col-sm-5 btn-secondary mt-0 btn-block btn-sm" type="button" id="cancel_bid">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#imagesCarousel img,#banner img').click(function(){
        viewer_modal($(this).attr('src'))
    })
    $('#participate').click(function(){
        _conf("Are you sure to commit that you will participate to this event?","participate",[<?php echo $id ?>],'mid-large')
    })
    var _updateBid = setInterval(function(){
        $.ajax({
            url:'admin/ajax.php?action=get_latest_bid',
            method:'POST',
            data:{product_id:'<?php echo $id ?>'},
            success:function(resp){
                if(resp && resp > 0){
                    $('#hbid').text(parseFloat(resp).toLocaleString('en-US',{style:'decimal',maximumFractionDigits:2,minimumFractionDigits:2}))
                }
            }
        })
    },1000)
// ########---bid form payment

    $('#manage-payment').submit(function(e){
        e.preventDefault()
        start_load()
        if($(this).find('.alert-danger').length > 0 )
            $(this).find('.alert-danger').remove();
            $.ajax({
                url:'admin/ajax.php?action=check_payment',
                method:'POST',
                data:$(this).serialize(),
                success:function(resp){
                     if(resp==1){
                        alert_toast("your payment registration is in process. please try again later!",'warning')
                        end_load()
                    }
                     
                    else if(resp==3){
                        alert_toast("Not registered!",'danger')
                        end_load()
                    }
                   else if(resp==4){
                        alert_toast("Please wight Until the payment is verified by auctioneers!",'warning')
                        end_load()
                    }
                   else if(resp==5){
                        alert_toast("your payment can not fully cover the bid price. please contact us!",'danger')
                        end_load()
                    }
                    
                    else if(resp==6){
                        alert_toast("Payment Success!",'success')
                       end_load()
                   $('.payment_frm').hide()
                        $('#bid-frm').show()
                    }
                  else if(resp==7){
                        alert_toast("you may have used an Exipered payment!",'warning')
                        end_load()
                    }
                   else if(resp==8){
                        alert_toast("This payment belongs to another bid-form!",'warning')
                        end_load()
                    }
                     else if(resp==0){
                        alert_toast("empity bidder id!",'warning')
                        end_load()
                    }
                    else{
                        alert_toast("Requesting the payment!",'success')
                        end_load()
                    }
                }
            })
        })
// ##########--end of form payment    
    $('#manage-bid').submit(function(e){
        e.preventDefault()
            start_load()
            var latest = $('#hbid').text()
            latest = latest.replace(/,/g,'')
            // if(parseFloat(latest)  < $('[name="bid_amount"]').val()){
            //     alert_toast("Bid amount must be less than the Estimation Bid.",'danger')
            //     end_load()
            //     return false;
            // }
            $.ajax({
                url:'admin/ajax.php?action=save_bid',
                method:'POST',
                data:$(this).serialize(),
                success:function(resp){
                    if(resp==1){
                        alert_toast("Bid successfully submited",'success')
                         setTimeout(function(){
                        location.reload()
                    },1000)
                    }else if(resp==2){
                        alert_toast("You have a Bid already!",'danger')
                        end_load()
                    }
                    else if(resp==0){
                        alert_toast("error on expiredation of payment!",'danger')
                        setTimeout(function(){
                        location.reload()
                    },1000)
                    }
                }
            })
        })
    // $('#bid').click(function(){
    //     if('<?php //echo isset($_SESSION['login_id']) ? 1 : '' ?>' != 1){
    //         $('.modal').modal('hide')
    //          uni_modal("LOGIN",'login.php')
    //          return false;
    //     }
    //     $('.payment_frm').hide()
    //     $('#bid-frm').show()
    // })
    $('#cancel_bid').click(function(){
        $('.payment_frm').show()
        $('#bid-frm').hide()
    })
</script>
