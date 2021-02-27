<?php
session_start();
  if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
  }else{
    $role = '';
  }
  if (isset($_SESSION['email']) && $role == 'user' ) {
    header("Location: index");
  } 
include 'config.php';
if(isset($_POST['register'])){
	$checkRecord = mysqli_query($con,"SELECT * FROM users WHERE email='".$_POST['email']."'");
	$totalrows = mysqli_num_rows($checkRecord);
	if ( $totalrows > 0) {
		$message = '<div class="alert alert-success" id="success-alert">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <strong>You have already registered.</strong>
					</div>';
	}else{
		if ($_POST['password']!=$_POST['confirm_pass']) {
			$message = '<div class="alert alert-danger" id="success-alert">
						  <button type="button" class="close" data-dismiss="alert">x</button>
						  <strong>Account password & Confirm password dose not match.</strong>
						</div>';
		}else{
		 	$query = "INSERT INTO `users`(`name`, `email`, `phone`, `password`, `address`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')"; 
			if(mysqli_query($con, $query)) {
				$_SESSION['id'] = mysqli_insert_id($con);
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['role'] = 'user';
		    	$message = '<div class="alert alert-success" id="success-alert">
							  <button type="button" class="close" data-dismiss="alert">x</button>
							  <strong>You have registered.</strong>
							</div>';
		    }else{
		    	$message = '<div class="alert alert-success" id="success-alert">
							  <button type="button" class="close" data-dismiss="alert">x</button>
							  <strong>'.mysqli_error($con).'</strong>
							</div>';
		    }
		}
		
	}
	
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>Book Shop – Register</title>
    <?php include 'css.php'; ?>
</head>
    <body class="home-4">

    	<?php include 'header.php'; ?>
		<!-- breadcrumbs-area-start -->
		<div class="breadcrumbs-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#" class="active">register</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs-area-end -->
		<!-- user-login-area-start -->
		<div class="user-login-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="login-title text-center mb-30">
							<h2>Sign Up</h2>
							<p>Please fill up required field.</p>
						</div>
					</div>
					<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
						<div class="billing-fields">
							<?php if(isset($message)){ echo $message; } ?>
							<form action="" method="Post" enctype="multipart/form-data">
								<div class="single-register">
									<label>Full Name<span>*</span></label>
									<input type="text" name="name" class="form-control input-lg" placeholder="Full Name" required autofocus />
								</div>
								<div class="single-register">
									<label>Phone<span>*</span></label>
									<input type="text" name="phone" class="form-control input-lg" placeholder="Phone" required />
								</div>
								<div class="single-register">
									<label>Email Address<span>*</span></label>
									<input type="email" name="email" class="form-control input-lg" placeholder="Email Address" />
								</div>
								<div class="single-register">
									<label>Address<span>*</span></label>
									<input type="text" name="address" class="form-control input-lg" placeholder="Address" />
								</div>
								<div class="single-register">
									<label>Account password<span>*</span></label>
									<input type="password" name="password" class="form-control input-lg" placeholder="Password" required />
								</div>
								<div class="single-register">
									<label>Confirm password<span>*</span></label>
									<input type="password" name="confirm_pass" class="form-control input-lg" placeholder="Password"/>
								</div>
								<div class="single-register">
									<input type="submit" class="btn btn-success btn-lg" name="register" value="Register">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- user-login-area-end -->
		<?php include 'footer.php'; ?>