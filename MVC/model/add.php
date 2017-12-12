<?php
include("conexao.php");

if(isset($_POST['send'])){
	/*Colocando em variaveis as entradas do form*/
	$idfilial = $_POST['idfilial'];
	$idlocadora = $_POST['idlocadora'];
	$cnpj = $_POST['cnpj'];
	$nome = $_POST['nome'];
	$cidade = $_POST['cidade'];
	$ie = $_POST['ie'];
	$telefone = $_POST['telefone'];
	$endereco = $_POST['end'];

	$query = "SELECT id_cidade, descricao FROM cidade";
	$executar = mysqli_query($conn, $query);
	
	while($cid = mysqli_fetch_array($executar)){
		if($cid['descricao']==$cidade){
			$idcidade = $cid['id_cidade'];	
		}
	}

	$inserir = "INSERT INTO filial (id_locadora, id_cidade, nome, cnpj, ie, telefone, endereco, ativa) VALUES ('$idlocadora', '$idcidade', '$nome', '$cnpj', '$ie', '$telefone', '$endereco', 1);";

	$executar = mysqli_query($conn, $inserir);

	if ($executar){
		echo "Inserido com sucesso.";
		header('Location: ../view/filiais.php');
	} 
}
?>