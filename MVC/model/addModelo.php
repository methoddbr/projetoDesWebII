<?php
include("conexao.php");

if(isset($_POST['send'])){
	/*Colocando em variaveis as entradas do form*/
	$idmarca = $_POST['marca'];
	$idtipo = $_POST['tipo'];
	$descricao = $_POST['descricao'];
	$ano = $_POST['ano'];
	$motor = $_POST['motor'];
	$portas = $_POST['portas'];
	$npassageiros = $_POST['npassageiros'];


	$inserir = "INSERT INTO modelo (id_marca, id_tipo, descricao, ano, motor, nr_portas, nr_passageiros) VALUES ('$idmarca', '$idtipo', '$descricao', '$ano', '$motor', '$portas', '$npassageiros');";

	$executar = mysqli_query($conn, $inserir);

	if ($executar){
		echo "Inserido com sucesso.";
		header('Location: ../view/veiculos.php');
	} 
}
?>