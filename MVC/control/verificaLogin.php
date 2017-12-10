<?php 
	include ("../model/conexao.php");
	session_start();

	$user = $_POST['user'];
	$senha = $_POST['senha'];

	$consultar = "select email, senha, nome from cliente";
	$executar = mysqli_query($conn, $consultar);

	$encontrou = false;
	while ($linha = mysqli_fetch_array($executar, MYSQLI_BOTH)) {
		$u = $linha[0];
		$s = $linha[1];
		if ($user == $u && $senha == $s){
			$encontrou = true;
			$_SESSION["logado"] = TRUE;
			$_SESSION["locadora"] = false;
			$_SESSION["user"] = $linha[2];
			$pg = $_SESSION["pagina"];
			if (isset($_SESSION["pagina"])) {
				header("Location: $pg");
			} else {
				header('Location: ../index.php');
			}
		}
	}

	$consultar2 = "select email, senha, nome from locadora";
	$executar2 = mysqli_query($conn, $consultar2);

	while ($linha = mysqli_fetch_array($executar2, MYSQLI_BOTH)) {
		$u = $linha[0];
		$s = $linha[1];
		if ($user == $u && $senha == $s){
			$encontrou = true;
			$_SESSION["logado"] = TRUE;
			$_SESSION["locadora"] = true;
			$_SESSION["user"] = $linha[2];
			$pg = $_SESSION["pagina"];
			if (isset($_SESSION["pagina"])) {
				header("Location: $pg");
			} else {
				header('Location: ../index.php');
			}
		}
	}

	if (!$encontrou) {
		header('Location: ../view/login.php');
	}
?>