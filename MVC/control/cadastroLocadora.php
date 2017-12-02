<?php 
	include("conexaoDB.php");

	if(isset($_POST['enviar'])){
		$nomeLocadora = $_POST['nomeLocadora'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$cnpj = $_POST['cnpj'];
		$escritura = $_POST['escritura'];
		$endereco = $_POST['endereco'];

	$inserir = "INSERT INTO locadora (nome) VALUES ('$nomeLocadora')";
	$executar = mysqli_query($conn, $inserir);

	$idLocadora = "SELECT id_locadora from locadora where nome = '$nomeLocadora'";
	$executar = mysqli_query($conn, $idLocadora);

		$linha = mysqli_fetch_array($executar, MYSQLI_BOTH);
 			$id = $linha[0];
 		



	$inserir2 = "INSERT INTO filial (id_locadora, id_cidade, cnpj, ie, email, senha, telefone, endereco) VALUES ('$id', '1', '$cnpj', '$escritura', '$email', '$senha', '$telefone', '$endereco')";


	$executar2 = mysqli_query($conn, $inserir2);

		if($executar && $executar2){
			echo "Inserido com sucesso.";
		}
	}


?>