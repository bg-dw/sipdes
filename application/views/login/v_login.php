<!DOCTYPE html>
<html lang="en">
<head>
	<title>SIPDES</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/dist/s_img/1fix.png">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/new_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/new_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/new_login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/new_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/new_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/new_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/new_login/css/main.css">
    <link href="<?php echo base_url();?>/assets/dist/css/style.css" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt  style="margin-top: -120px;" id="login_result">
	     			<img src="<?php echo base_url();?>assets/new_login/images/img-01.png" alt="IMG">
				</div>
				<!-- Menampilkan pesan error --> 
				<div class="login_result" ></div>
				<form class="login100-form validate-form"  style="margin-top: -120px;margin-bottom: 50px;" role="form" id="frmlogin" name="frmlogin" method="post">
					<span class="login100-form-title" id="text_result">
						Login
					</span>
					<div id="input">
						<div class="wrap-input100 validate-input" data-validate = "Valid email is required">
							<input class="input100" type="text" name="username" placeholder="Username" id="username">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>
						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="password" placeholder="Password" id="password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>
						<div class="container-login100-form-btn">
							<button type="submit" class="login100-form-btn" id="login">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url();?>assets/new_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/new_login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/new_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/new_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/new_login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/new_login/js/main.js"></script>

	<?php if($this->session->userdata('logged_in')) // Cek sesi login . . .
	      { ?>
	<?php } else { ?>
	<script type="text/javascript">
	$(document).ready(function(){
	 	$('#username').focus(); // Focus ke input username on body load
	 	$('#login').click(function(){ // membuat `click` event function untuk login
			var username = $('#username'); // Get the username field
			var password = $('#password'); // Get the password field
			var login_result = $('#login_result'); // Get the login result div
			var text_result = $('#text_result'); // Get the login result div
			text_result.html('Loading . . .');
		  
			if(username.val() == ''){ // cek username kosong atau tidak
				username.focus(); // focus ke username
				text_result.html('Isi Username!');
				return false;
			}
			if(password.val() == ''){
				password.focus();
				text_result.html('Isi Password!');
				return false;
			}
			if(username.val() != '' && password.val() != ''){ // Check the username and password values is 	not empty and make the ajax request
				var UrlToPass = 'action=login&username='+username.val()+'&password='+password.val();
				$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
					type : 'POST',
					data : UrlToPass,
					url  : '<?php echo base_url(); ?>index.php/login/cek_login',
					success: function(responseText){ // Get the result and asign to each cases
						if(responseText == 0){
							text_result.html('Data Tidak Cocok!');
						 	login_result.html('<img src="<?php echo base_url();?>assets/new_login/images/img-03.png" alt="IMG">');
						}else if(responseText == 1){
						 	window.location = '<?php echo base_url(); ?>index.php/page/';
						}else if(responseText == 2){
							text_result.html('Periode Tidak Berlaku!');
						 	login_result.html('<img src="<?php echo base_url();?>assets/new_login/images/img-03.png" alt="IMG">');
						}else{
						 alert('Problem with sql query');
						}
				   	}
		   		});
		  	}
		  	return false;
		});
	});
	</script>
<?php }?>

</body>
</html>