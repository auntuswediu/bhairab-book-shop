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
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * from users where email = '$email' and role ='user'";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
      $row_user = mysqli_fetch_array($query);
      if($row_user['email'] != $email){
        $error = '<div class="alert alert-danger" id="success-alert">
				  <button type="button" class="close" data-dismiss="alert">x</button>
				  <strong>Wrong email address</strong>
				</div>';
      }
      else{
        if($row_user['password'] != $password){
        	$error = '<div class="alert alert-danger" id="success-alert">
				  <button type="button" class="close" data-dismiss="alert">x</button>
				  <strong>Wrong password</strong>
				</div>';
        }
        else{
          $_SESSION['id'] = $row_user['id'];
          $_SESSION['img'] = $row_user['img'];
          $_SESSION['email'] = $row_user['email'];
          $_SESSION['name'] = $row_user['name'];
          $_SESSION['role'] = $row_user['role'];
          $_SESSION['created_at'] = $row_user['created_at'];
          $_SESSION['loggedin'] = true;
          header("Location: index");
        }
      }
    }else{
    	$error = '<div class="alert alert-danger" id="success-alert">
				  <button type="button" class="close" data-dismiss="alert">x</button>
				  <strong>Do not have account</strong>
				</div>';
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
								<li><a href="index">Home</a></li>
								<li><a href="#" class="active">login</a></li>
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
							<h2>Login</h2>
						</div>
					</div>
					<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
						<?php 
						if (isset($error)) {
							echo $error;
							$error='';
						} 
						if (isset($_SESSION['error'])) {
							echo $_SESSION['error'];
							$_SESSION['error']='';
						}
						?>
						<form action="" method="post" class="login-form">
							<div class="single-login">
								<label>Username or email<span>*</span></label>
								<input type="email" name="email" />
							</div>
							<div class="single-login">
								<label>Passwords <span>*</span></label>
								<input type="password" name="password" />
							</div>
							<div class="single-login single-login-2">
								<button type="submit" name="login" class="btn btn-block btn-success btn-lg">Login</button>
							</div>
							<!-- <a href="register">Register</a> -->
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- user-login-area-end -->
<?php include 'footer.php'; ?>