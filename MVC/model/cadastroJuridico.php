<?php 
	include("conexao.php");

	$nome = $_POST['nome'];
	$cnpj = $_POST['cnpj'];
	$ie = $_POST['ie'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$telefone = $_POST['telefone'];

	$inserir = "INSERT INTO cliente (nome, email, senha, telefone) VALUES ('$nome', '$email', '$senha', '$telefone')";
	$executar = mysqli_query($conn, $inserir);

	$idcliente = "SELECT id_cliente from cliente where nome = '$nome'";
	$executar = mysqli_query($conn, $idcliente);

	$linha = mysqli_fetch_array($executar, MYSQLI_BOTH);
		$id = $linha[0];

	$inserir2 = "INSERT INTO pessoa_juridica (id_cliente, cnpj, ie) VALUES ('$id', '$cnpj', '$ie')";

	$executar2 = mysqli_query($conn, $inserir2);

	if ($executar && $executar2){
		header('Location: ../view/login.php');
	}  else {
		header('Location: ../view/cadastro.php');
	}
?>