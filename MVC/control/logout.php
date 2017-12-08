<?php
	session_start();
	if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
		header("Location: ../index.php");
	}
	else {
		session_destroy();
		header("Location: ../index.php");
	}
?>