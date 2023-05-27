<?php
	unset($_SESSION['user_name']);
	header('Location: adminAuthorizations.php');
	exit();
?>