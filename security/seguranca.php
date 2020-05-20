<?php
	session_start();
	if ($_SESSION['usu']==""){
		header("Location: security/safadinho.php");
	}
?>