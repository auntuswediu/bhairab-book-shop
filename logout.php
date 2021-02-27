<?php
	session_start();
	session_destroy();
	session_start();
	$_SESSION['error'] = '<div class="alert alert-danger" id="success-alert">
				  <button type="button" class="close" data-dismiss="alert">x</button>
				  <strong>Logged out successful</strong>
				</div>';
	header("Location: login");
?>