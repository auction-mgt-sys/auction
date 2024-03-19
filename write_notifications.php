<style>
	.collapse a{
		text-indent:10px;
	}
</style>

<nav id="sidebar" class='mx-lt-6 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
                <a href="index.php?page=generatereport" class="nav-item nav-generatereport"><span class='icon-field'><i class="fa fa-file"></i></span> Generate report</a>
			    <a href="index.php?page=viewrequest" class="nav-item nav-viewrequest"><span class='icon-field'><i class="fa fa-eye"></i></span> View request</a>
			</div>
</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
	

	   <?php include('admin/db_connect.php');

       if (isset($_SESSION['login_id'])) {
       ?>
<div class="container-fluid d-flex">
	<div class="col-lg-3">
        <br>
    <a href="bidder.php" class="text-start"><b><img src="images/Backspace.png" style="width: 50px; height: 50px;"> BACK To HOME</b></a> 
    <ul class='list-group ' id='opp-list'>
        <a href="index.php?page=write_notifications" class='list-group-item list-write_notifications list' id="sids"> Write New</a>
        <a href="index.php?page=inbox_notifications" class='list-group-item list-inbox_notifications list' id="sids" >Inbox</a>
        <a href="index.php?page=sent_notification" class='list-group-item list-sent_notification list' id="sids">Sent</a>
    </ul> 
    </div>
    
    <?php
$bidder_id = $_SESSION['login_id'];
$user_type = $_SESSION['login_type'];
     ?>
	<div class="col-lg-6 justify-content-center">
		<div class="row">
            <!-- FORM Panel -->
            <div id="msg"></div>
            <!-- Table Panel -->
            <div class="col-md-12">
    		<br>
		<div class="card">
			<div class="card-body">
				<form action="" id="add_comments">
					<input type="hidden" name="id" value="<?php echo isset($bidder_id) ? $id :'' ?>">
					<h5>Write Your Message</h5>
					<hr>
					<div class="form-group row justify-content-end">
						<div class="col-md-4 ">
						  <label><b>Date:</b><i style="background: #e1e6e1;"> <?php echo strtolower((date('F j, Y'))); ?></i></label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6 ">
							<label for="" class="control-label"><b>From: </b></label>
							<label class="form-control">&nbsp;&nbsp; <?php echo $_SESSION['login_name'];?></label>
						</div>
						<div class="col-md-6">
						<label for="" class="control-label"><b>Send To: </b></label>
							<select class="custom-select" name="resiver_id" required>
								<option value="11">Auctioneer</option>
								<option value="5">Technical Commitee</option>
								<option value="1">Admin</option>
							</select>
						</div>
						
					</div>
					<div class="form-group row">
						<div class="col-md-9 ">
							Subject:
							<input type="text" class="form-control" name="Subject" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-12">
							<label for="" class="control-label">Details</label>
							<textarea name="description" id="description" class="form-control" cols="30" rows="5" required></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-sm btn-block btn-primary col-sm-2"> Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php } ?>
<script>
	$('#add_comments').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'admin/ajax.php?action=save_comment',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Message successfully Sent",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}else{
					$('#msg').html('<div class="alert alert-danger">something Wrong Please try again later!</div>')
					end_load()
				}
			}
		})
	})
	$('.list-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>

<style>
	
	.jqte_editor{
		min-height: 30vh !important
	}
	.d{
		background: light-gray;
	}
	#drop {
   	min-height: 15vh;
    max-height: 30vh;
    overflow: auto;
    width: calc(100%);
    border: 5px solid #929292;
    margin: 10px;
    border-style: dashed;
    padding: 10px;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}
	#uploads {
		min-height: 15vh;
	width: calc(100%);
	margin: 10px;
	padding: 10px;
	display: flex;
	align-items: center;
	flex-wrap: wrap;
	}
	#uploads .img-holder{
	    position: relative;
	    margin: 1em;
	    cursor: pointer;
	}
	#uploads .img-holder:hover{
	    background: #0095ff1f;
	}
	#uploads .img-holder .form-check{
	    display: none;
	}
	#uploads .img-holder.checked .form-check{
	    display: block;
	}
	#uploads .img-holder.checked{
	    background: #0095ff1f;
	}
	#uploads .img-holder img {
		height: 39vh;
    width: 22vw;
    margin: .5em;
		}
	#uploads .img-holder span{
	    position: absolute;
	    top: -.5em;
	    left: -.5em;
	}
	#dname{
		margin: auto 
	}
img.imgDropped {
    height: 16vh;
    width: 7vw;
    margin: 1em;
}
.imgF {
    border: 1px solid #0000ffa1;
    border-style: dashed;
    position: relative;
    margin: 1em;
}
span.rem.badge.badge-primary {
    position: absolute;
    top: -.5em;
    left: -.5em;
    cursor: pointer;
}
label[for="chooseFile"]{
	color: #0000ff94;
	cursor: pointer;
}
label[for="chooseFile"]:hover{
	color: #0000ffba;
}
.opts {
    position: absolute;
    top: 0;
    right: 0;
    background: #00000094;
    width: calc(100%);
    height: calc(100%);
    justify-items: center;
    display: flex;
    opacity: 0;
    transition: all .5s ease;
}
.img-holder:hover .opts{
    opacity: 1;

}
	input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  transform: scale(1.5);
  padding: 10px;
}
button.btn.btn-sm.btn-rounded.btn-sm.btn-dark {
    margin: auto;
}
img#img_path-field{
		max-height: 15vh;
		max-width: 8vw;
	}
	<style>
#sids{
  margin-bottom: 5px;
}
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
    margin: 10px;
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
 #opp-list a:hover {
        color: white;
        background: #007bff8f;
        text-decoration: none;
    }
    .list--active{
       background: #006cfa;
        color: #000;
        text-align: left;
        transition: background 0.2s;
      }
</style>
</style>