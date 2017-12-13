<?php
	include ("../model/conexao.php");

	$chassi = $_GET["id"];
	$consultar = "select count(*), R.id_reserva from reserva R where R.ativa = true and R.chassi = '$chassi'";
	$executar = mysqli_query($conn, $consultar); 
	$linha = mysqli_fetch_array($executar, MYSQLI_BOTH);
	$locado = $linha[0];
	$idReserva = $linha[1]; 
	if ($locado) { 
		$update = "update reserva set ativa = false where id_reserva = '$idReserva'";
		$executar = mysqli_query($conn, $update);
		$update = "update veiculo set ativo = true where chassi = '$chassi'";
		$executar = mysqli_query($conn, $update); 
		header('Location: ../view/veiculos.php');
	} else { 
		$update = "update veiculo set ativo = true where chassi = '$chassi'";
		$executar = mysqli_query($conn, $update); 
		header('Location: ../view/veiculos.php');
	} 
?>