<?php
session_start();

$page_title ="password Reset Form";
include('admin/db_connect.php');
include('includes/header.php');
?>

<div class="py-5">  
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if(isset($_SESSION['status'])) 
                {
                    ?>
                    <div class="alert alert-success">
                        <h5><?= $_SESSION['status'];?></h5>
            </div>
            <?php
            
        </div>

    </div>
</div>

