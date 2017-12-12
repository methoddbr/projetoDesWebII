<?php 
	include ("../model/conexao.php");
	session_start();

	$chassi = $_GET['id'];
	$idCliente = $_SESSION["idCliente"];

	$insert = "INSERT INTO RESERVA (ID_CLIENTE, CHASSI, ATIVA) VALUES ('$idCliente', '$chassi', TRUE)";
	$executar = mysqli_query($conn, $insert);

	$update = "UPDATE VEICULO SET ATIVO = FALSE WHERE CHASSI = '$chassi'";
	$executar = mysqli_query($conn, $update);

	header('Location: ../view/minhasReservas.php');
?>