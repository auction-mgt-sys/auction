<?php session_start() ?>
<div class="container-fluid">
	<form action="" method="post" id="login-frm" >
		<div class="form-group">
			<label for="" class="control-label">Username</label>
			<input type="text" name="username" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" class="form-control">
			<a href="javascript:void(0)" id="new_account">Create New Account</a>
		</div>
		<button class="button btn btn-primary btn-sm">Login</button>
		<button class="button btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
	</form>
</div>

<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>

<script>
	$('#new_account').click(function(){
		uni_modal("Account Page",'signup.php?redirect=index.php?page=checkout')
	})
	$('#login-frm').submit(function(e){
		e.preventDefault()
		start_load()
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		end_load()

			},
			success:function(resp){
				if(resp == 1){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'admin/index.php' ?>';
				}
				else if(resp == 2){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'bidder.php' ?>';
				}
				else if(resp == 3){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'auctioneer/' ?>';
				}
				else if(resp == 4){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'committee/' ?>';
				}
                else if(resp == 5){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'department/' ?>';
				}
                else if(resp == 6){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'finance/' ?>';
				}
                else if(resp == 7){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'president/' ?>';
				}
				else if(resp == 8){
					$('#login-frm').prepend('<div class="alert alert-danger">Unassigned username</div>')
				end_load()
				}
				else if(resp == 9){
					$('#login-frm').prepend('<div class="alert alert-danger">username or password is incorrect.</div>')
				end_load()
				}
				else if(resp == 14){
					alert_toast("Your Registration Is In Process! Please Try Again Later.",'warning')
					setTimeout(function(){
						location.reload()
					},4000)
				}

				else{
					$('#login-frm').prepend('<div class="alert alert-danger">username or password is incorrect.</div>')
				end_load()
				}
			}
		})
	})
</script>