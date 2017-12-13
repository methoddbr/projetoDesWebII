<?php
	include ("../model/conexao.php");

	$chassi = $_GET["id"];
	$update = "update veiculo set ativo = false where chassi = '$chassi'";
	$executar = mysqli_query($conn, $update); 
	header('Location: ../view/veiculos.php');
?>