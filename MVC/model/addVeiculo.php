<?php
include("conexao.php");

if(isset($_POST['send'])){
	/*Colocando em variaveis as entradas do form*/
	$chassi = $_POST['chassi'];
	$idfilial = $_POST['idfilial'];
	$idmodelo = $_POST['idmodelo'];
	$idacessorio = $_POST['idacessorio'];
	$placa = $_POST['placa'];
	$km = $_POST['km'];
	$cor = $_POST['cor'];
	$img = $_POST['img'];
	$valor = $_POST['valor'];
	

	$inserir = "INSERT INTO veiculo (chassi, id_filial, id_modelo, id_acessorio, placa, km, cor, valor, ativo) VALUES ('$chassi', '$idfilial', 'idmodelo','$idacessorio', '$placa', '$km', '$cor', '$valor', 1);";

	$executar = mysqli_query($conn, $inserir);

	if ($executar){
		echo "Inserido com sucesso.";
		header('Location: ../view/veiculos.php');
	} 
}
?>