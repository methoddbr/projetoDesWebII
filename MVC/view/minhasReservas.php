<?php include ("../model/conexao.php"); ?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Motor - index</title>
</head>
<body>
	<?php include ("menu.php"); ?>
	<table border="1">
		<tr align = "center" >
			<td>MODELO</td>
			<td>COR</td>
			<td>MOTOR</td>
			<td>LOCADORA</td>
			<td>CIDADE</td>
			<td>TELEFONE</td>
			<td>STATUS</td>
		</tr>
	<?php  
		$idCliente = $_SESSION["idCliente"];
		$consultar = "select MO.descricao, V.cor, MO.motor, F.nome, C.descricao, F.telefone, V.chassi, R.ativa, L.nome
					  	from veiculo V inner join modelo MO on V.id_modelo = MO.id_modelo
							inner join reserva R on V.chassi = R.chassi
							inner join cliente CL on R.id_cliente = CL.id_cliente
							inner join filial F on V.id_filial = F.id_filial
							inner join locadora L on F.id_locadora = L.id_locadora
							inner join cidade C on F.id_cidade = C.id_cidade
					  	where R.id_cliente = '$idCliente'";
		$executar = mysqli_query($conn, $consultar);
		while ($linha = mysqli_fetch_array($executar, MYSQLI_BOTH)) {
			$modelo = $linha[0];
			$cor = $linha[1];
			$motor = $linha[2];
			$filial = $linha[3];
			$cidade = $linha[4];
			$telefone = $linha[5];
			$chassi = $linha[6];
			$ativa = $linha[7];
			$locadora = $linha[8];
	?>
			<tr align = "center" >
				<td><?php echo $modelo; ?></td>
				<td><?php echo $cor; ?></td>
				<td><?php echo $motor; ?></td>
				<td><?php echo $filial . " - " . $locadora; ?></td>
				<td><?php echo $cidade; ?></td>
				<td><?php echo $telefone; ?></td>
				<?php 
					if ($ativa){ ?> 
						<td style="color: green;">Aberta</td> <?php 
					} else { ?> 
				 		<td style="color: red;">Fechada</td> <?php 
				 	} 
				?>
			</tr>
	<?php 
		}
	?>
	</table>
</body>
</html>