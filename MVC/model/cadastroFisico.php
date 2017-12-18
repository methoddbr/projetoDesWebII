<?php 
	include("conexao.php");

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$cpf = $_POST['cpf'];
	$habilitacao = $_POST['habilitacao'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$telefone = $_POST['telefone'];
	$dtNascimento = $_POST['dtNascimento'];
	$sexo = $_POST['sexo'];


	$inserir = "INSERT INTO cliente (nome, email, senha, telefone) VALUES ('$nome', '$email', '$senha', '$telefone')";
	$executar = mysqli_query($conn, $inserir);

	$idcliente = "SELECT id_cliente from cliente where nome = '$nome'";
	$executar = mysqli_query($conn, $idcliente);

	$linha = mysqli_fetch_array($executar, MYSQLI_BOTH);
		$id = $linha[0];

	$inserir2 = "INSERT INTO pessoa_fisica (id_cliente, sobrenome, cpf, habilitacao, dt_nascimento, sexo) VALUES ('$id', '$sobrenome', '$cpf', '$habilitacao', '$dtNascimento', '$sexo')";

	$executar2 = mysqli_query($conn, $inserir2);

	if ($executar && $executar2){
		header('Location: ../view/login.php');
	}  else {
		header('Location: ../view/cadastro.php');
	}
?>