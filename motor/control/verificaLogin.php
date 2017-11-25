<?php 
	include ("conexao.php");
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
			header('Location: ../index.php');
		}
	}

	$consultar2 = "select F.email, F.senha, L.nome from filial F inner join locadora L on F.id_locadora = L.id_locadora";
	$executar2 = mysqli_query($conn, $consultar2);

	while ($linha = mysqli_fetch_array($executar2, MYSQLI_BOTH)) {
		$u = $linha[0];
		$s = $linha[1];
		if ($user == $u && $senha == $s){
			$encontrou = true;
			$_SESSION["logado"] = TRUE;
			$_SESSION["locadora"] = true;
			$_SESSION["user"] = $linha[2];
			header('Location: ../index.php');
		}
	}

	if (!$encontrou) {
		header('Location: ../pages/login.php');
	}
?>