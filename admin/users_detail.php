<?php include '../admin/db_connect.php' ?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $qry = $conn->query("SELECT * FROM users where id= $id");
    $data = $qry->fetch_assoc();
    foreach($data as $k => $val){
        $$k = htmlspecialchars($val);
    }
}
?>
<style type="text/css">
    .avatar-container {
        max-width: 100%;
        max-height: 27vh;
        align-items: center;
        justify-content: center;
        padding: 5px;
    }
    .avatar-container img {
        max-width: 100%;
        max-height: 27vh;
    }
    .user-info {
        text-align: left; /* Aligning user info to the left */
        margin-top: 20px;
    }
    .user-info p {
        margin: unset;
    }
    #uni_modal .modal-footer{
        display: none;
    }
    #uni_modal .modal-footer.display{
        display: block;
    }
</style>

<div class="container-field">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="avatar-container">
                <?php 
                    if(!empty($photo)) { 
                        if (file_exists('../admin/'.$photo)) {
                            echo '<img src="../admin/'.htmlspecialchars($photo).'" alt="User Photo">'; 
                        } else {
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($photo).'" alt="User Photo">'; 
                        }
                    } else {
                        echo 'No photo available';
                    }
                    ?>
                    <?php 
                    if(!empty($bphoto)) { 
                        if (file_exists('../admin/'.$bphoto)) {
                            echo '<img src="../admin/'.htmlspecialchars($bphoto).'" alt="User Photo">'; 
                        } else {
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($bphoto).'" alt="User Photo">'; 
                        }
                    } else {
                        echo 'No photo available';
                    }
                    ?>
                </div>
                <div class="user-info">
                    <p>Full Name: <b><?php echo htmlspecialchars($name)." ".htmlspecialchars($lname) ?></b> </p>
                    <p>Username: <b><?php echo htmlspecialchars($username) ?></b></p>
                    <p>Gender: <b><?php echo htmlspecialchars($gender) ?></b></p>
                    <p>Age: <b><?php echo htmlspecialchars($age) ?></b></p>
                    <p>Contact: <b><?php echo htmlspecialchars($contact) ?></b></p>
                    <p>Email: <b><?php echo htmlspecialchars($email) ?></b></p>
                    <p>Address: <b><?php echo htmlspecialchars($address) ?></b></p>
                    <p>User Type: <b><?php echo htmlspecialchars($type) ?></b></p>
                    <p>Registration Date: <b><?php echo htmlspecialchars($data_created) ?></b></p>
                    <p>Tax Payment ID: <b><?php echo htmlspecialchars($TIN_number) ?></b></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer display">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
