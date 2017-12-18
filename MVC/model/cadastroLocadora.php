<?php 
	include("conexao.php");

	$nomeLocadora = $_POST['nomeLocadora'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$cnpj = $_POST['cnpj'];
	$cidade = $_POST['id_cidade'];
	$ie = $_POST['ie'];
	$endereco = $_POST['endereco'];

	$inserir = "INSERT INTO locadora (nome, email, senha) VALUES ('$nomeLocadora', '$email', '$senha')";
	$executar = mysqli_query($conn, $inserir);

	$idLocadora = "SELECT id_locadora from locadora where nome = '$nomeLocadora'";
	$executar = mysqli_query($conn, $idLocadora);


	$linha = mysqli_fetch_array($executar, MYSQLI_BOTH);
		$id = $linha[0];


	$inserir2 = "INSERT INTO filial (id_locadora, id_cidade, nome, cnpj, ie, telefone, endereco, ativa) VALUES ('$id', '$cidade', '$nomeLocadora', '$cnpj', '$ie', '$telefone', '$endereco', 1)";

	$executar2 = mysqli_query($conn, $inserir2);

	if ($executar && $executar2){
		header('Location: ../view/login.php');
	} else {
		header('Location: ../view/cadastro.php');
	}
?>