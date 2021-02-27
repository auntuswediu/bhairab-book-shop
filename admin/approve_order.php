<?php 
	session_start();
	include '../config.php';
	if (!empty($_GET['invoice_id'])) {
		$query = mysqli_query($con, "UPDATE `invoice` SET `delivery_status`=1 WHERE `id`='".$_GET['invoice_id']."'");
		if ($query) {
			$_SESSION['flash_success_message']="Order approve successful";
		}else{
			$_SESSION['flash_error_message']="Error: ".mysqli_error($con);
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	if (!empty($_GET['delete_invoice_id'])) {
		$query_invoice = mysqli_query($con, "DELETE FROM `invoice` WHERE `id`='".$_GET['delete_invoice_id']."'");
		$query_delivery_info = mysqli_query($con, "DELETE FROM `delivery_info` WHERE `invoice_id`='".$_GET['delete_invoice_id']."'");
		$query_order_products = mysqli_query($con, "DELETE FROM `order_products` WHERE `invoice_id`='".$_GET['delete_invoice_id']."'");

		if ($query_invoice && $query_delivery_info && $query_order_products) {
			$_SESSION['flash_success_message']="Successfully delete all order record";
		}else{
			$_SESSION['flash_error_message']="Error: ".mysqli_error($con);
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>