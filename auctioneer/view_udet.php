<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM users where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}
?>
<style type="text/css">
	
	.avatar {
	    max-width: calc(100%);
	    max-height: 27vh;
	    align-items: center;
	    justify-content: center;
	    padding: 5px;
	}
	.avatar img {
	    max-width: calc(100%);
	    max-height: 27vh;
	}
	p{ 
		margin:unset;
	}
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: block
	}
</style>
<div class="container-field">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<?php if($gender == 'Male' || $gender == 'male' ){
					$g=" He ";
					$g2='His';
				}
				else{
				$g=" She ";
				$g2='Her';} ?>
				<h5>Full Name: <b><?php echo ucwords($name).' '.ucwords($lname) ?></h5></h5>
					<hr>
				<h5>Age: <b><?php echo $age.'&nbsp;&nbsp;&nbsp;&nbsp;</b>Gender <b>'.$gender.'</b>' ?></h5>
				<hr>
				<h5><?php echo $g2." Email <b>".$email."</b>"; ?></h5>
				<hr>
				<h5>Contact Number: <b><?php echo $contact ?></b></h5>
				<hr>
				<h5>Address: <b><?php echo ucwords($address) ?></b></h5>
				<hr>
				<h5>Tax payment ID: <b><?php echo $TIN_number ?></b></h5>
				<hr>
				<h5>Joined Us On: <b><?php echo date('F j, Y, g:i a',strtotime($date_created)) ?></b></h5>
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
<script>
	
</script>
