<?php 
include 'admin/db_connect.php'; 
?>
<script src="sweetalert.min.js"></script>
<style>
    .prod-item p {
        margin: unset;
    }

    .bid-tag {
        position: absolute;
        right: .5em;
    }

    .header {
        position: relative;
        height: 600px;
        background-image: url('images/wpcsc.jpg');
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
    }

    .header-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    
    #wpcsc {
  width: 100px; /* Adjust width as needed */
  height: 100px; /* Adjust height as needed */
  border-radius: 50%;
}

</style>

<?php 
$cid = isset($_GET['category_id']) ? $_GET['category_id'] : 0;
?>
<div class="contain-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <header class="header">
                            <div class="container">

                                <div class="overlay"></div>
                                
                                <div class="description text-center">
                    <section class="sec1">                                    
                                    <?php if(isset($_SESSION['login_name'])): ?>
                                       
                                        <?php echo " < h2>WPCSC AUCTION SYSTEM</h1>";?>
                                <?php echo "<div class='text-center'>"?>

                                <?php echo " <h4>Welcome " .$_SESSION['login_name']. "</h4>" ?>
                                        </div>
                                    <?php else: 
                                                                 echo "

                                         <h1>WOLKITE POLYTHECHNIC COLLEGE</h1>
                                        
                                        <h3>WELCOME TO AUCTION  MANAGEMENT SYSTEM</h3>; "?>
                                <?php echo "<div class='justify-content-center'>"?>
                                </section>
                                            </a>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </header>
                        </div>
                        <style>
                            .a {
                                margin-bottom: 15px;
                                font-family: 'Arial';
                            }
                        </style>

                        <div class="row">
                           
                        </div>
                    </div>
                    <?php
// Define and populate $cat_arr
$cat_arr = array();
$category_query = $conn->query("SELECT * FROM categories");
while($category_row = $category_query->fetch_assoc()) {
    $cat_arr[$category_row['id']] = $category_row['name']; // Assuming 'name' is the column name for category names
}
?>
<div class="product-container">
 <?php
// Your existing code starts here
$where = "";
if($cid > 0){
    $where  = " and category_id =$cid ";
}
$cat = $conn->query("SELECT * FROM products where unix_timestamp(bid_end_datetime) >= ".strtotime(date("Y-m-d H:i"))." $where order by name asc");
if($cat->num_rows <= 0){
    echo "<center><h4><i>No Available Product.</i></h4></center>";
    
} 
while($row = $cat->fetch_assoc()):
?>
<div class="col-sm-4">
    <div class="card row00">
        <div class="float-right align-top bid-tag">
            <span class="badge badge-pill badge-primary text-white"><i class="fa fa-tag"></i>Form Price: <?php echo number_format($row['price_for_form']) ?></span>
        </div>
        <img class="card-img-top" src="auctioneer/assets/uploads/<?php echo $row['img_fname'] ?>" alt="Card image cap" style="width: 300px; height: 300px;">
        <div class="float-right align-top d-flex">
            <span class="badge badge-pill badge-warning text-white"><i class="fa fa-hourglass-half"></i> <?php echo date("M d,Y h:i A",strtotime($row['bid_end_datetime'])) ?></span>
        </div>
        <div class="card-body prod-item">
            <p><?php echo $row['name'] ?></p>
            <p><small><?php echo isset($cat_arr[$row['category_id']]) ? $cat_arr[$row['category_id']] : 'Uncategorized'; ?></small></p>
            <p class="truncate"><?php echo $row['description'] ?></p>
            <button class="btn btn-primary btn-sm view_prod" type="button" data-id="<?php echo $row['id'] ?>"> View</button>
        </div>
    </div>
</div>
<?php endwhile; ?>
</div>

<style>
    <style>
    .card.row00 {
        width: 150px; /* Decrease the width to make it smaller */
        height: 150px; /* Set height equal to width to make it square */
        background-color: grey; /* Add background color */
        border-radius: 10px; /* Add rounded corners */
        overflow: hidden; /* Hide overflowing content */
    }
    .card.row00 .prod-item {
        padding: 10px; /* Add padding inside the card */
    }

    .card.row00 .prod-item p {
        margin-bottom: 5px; /* Adjust spacing between paragraphs */
        font-size: 12px; /* Adjust font size as needed */
        color: #333; /* Change text color */
    }
</style>

<style>
    .card.row00:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Change box shadow on hover */
    }

    .card.row00 .card-img-top {
        max-width: 50%; /* Make sure the image doesn't exceed the card width */
        height: 50%; /* Maintain aspect ratio */
    }

    .card.row00 .prod-item p {
        margin-bottom: 5px; /* Adjust spacing between paragraphs */
        font-size: 14px; /* Adjust font size as needed */
    }

    .card.row00 .truncate {
        height: 30px; /* Limit the height of the description */
        overflow: hidden; /* Hide overflowing text */
    }
</style>


<style>.product-container {
    display: flex;
    flex-wrap: wrap;
}

.col-sm-4 {
    flex: 0 0 calc(50% - 20px); /* Adjust width to fit two products per row */
    max-width: calc(50% - 20px); /* Adjust max-width to fit two products per row */
    margin: 10px; /* Add margin between products */
}

</style>

                    <footer class=" py-2">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 text-center">
                                    <h2 class="mt-0 text-black">Contact us</h2>
                                    <hr class="divider my-1" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                                    <div class="text-black"><?php echo $_SESSION['system']['contact'] ?></div>
                                </div>
                                <div class="col-lg-4 mr-auto text-center">
                                    <i class="fas fa-file-export fa-3x mb-3 text-muted"></i>
                                    <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                                    <a class="d-block text-black" href="mailto:<?php echo $_SESSION['system']['email'] ?>"><?php echo $_SESSION['system']['email'] ?></a>
                                </div>
                                <div class="col-lg-4 mr-auto text-center">
                                    <i class="fas fa-info fa-3x mb-2 text-muted"></i>
                                    <a class="d-block" href="index.php?page=about">About Us</a>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <footer>
                            <br>
    <div class="container">
        <div class="text-center text-muted">
            <div class="social-icons">
                <a href="https://www.linkedin.com/in/Wolkite" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
                <a href="https://www.facebook.com/Wolkite" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
            </div>
        </div>
    </div>
</footer>
<style>
    .center-card {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50vh; /* Adjust height as needed */
    }
    
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h6 class="card-title">Explore Our Campus</h6>
                    <a href="https://www.google.com/maps/place/9.145,+40.489" target="_blank" class="btn btn-primary">View on Map</a>
                </div>
            </div>
        </div>
    </div>
</div>

       <br>
                        <div class="container"><div class=" text-center text-muted">Copyright © 2024 - <?php echo $_SESSION['system']['name'] ?> 
                    
                         <a href="https://wptc.edu.et//" target="_blank">Wolkite polytechnic college and satelite campus</a></div></div>
                          <br> 
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
<style>.social-icons {
    display: flex;
    justify-content: center; /* Center items horizontally */
}

.social-icons a {
    margin: 0 10px; /* Add space between icons */
}
</style>
<script>
    $('#cat-list li').click(function(){
        location.href = $(this).attr('data-href')
    })

    $('#LogIn').click(function(){
        if('<?php echo isset($_SESSION['login_id']) ? 1 : '' ?>' != 1){
            uni_modal("LOGIN",'login.php')
        }
    })

    $('.view_prod').click(function(){
        if('<?php echo isset($_SESSION['login_id']) ? 1 : '' ?>' != 1){
            uni_modal("LOGIN",'login.php')
        } else {
            uni_modal_right('BID FORM','view_prod.php?id='+$(this).attr('data-id'))
        }
    })
</script>
