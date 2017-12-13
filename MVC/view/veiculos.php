<?php include ("../model/conexao.php"); ?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Motor - index</title>
</head>
<body>
	<?php include ("menu.php"); ?>
	<form action="incluirVeiculo.php" method="POST">
		<button  name="incluir" class="incluir" type="submit">Incluir</button>
	</form>
	</br>
	<table border="1">
		<tr align = "center" >
			<td>MARCA</td>
			<td>MODELO</td>
			<td>PLACA</td>
			<td>MOTOR</td>
			<td>FILIAL</td>
			<td>CIDADE</td>
			<td>STATUS</td>
			<td>L/B</td>
		</tr>
	<?php  
		$idLocadora = $_SESSION["idLocadora"];
		$consultar = "select MA.descricao, MO.descricao, V.placa, MO.motor, F.nome, C.descricao, V.ativo, V.chassi
					  	from veiculo V inner join modelo MO on V.id_modelo = MO.id_modelo
					  		inner join marca MA on MO.id_marca = MA.id_marca
							inner join filial F on V.id_filial = F.id_filial
							inner join cidade C on F.id_cidade = C.id_cidade
					  	where F.id_locadora = '$idLocadora' order by F.id_filial";
		$executar = mysqli_query($conn, $consultar);
		while ($linha = mysqli_fetch_array($executar, MYSQLI_BOTH)) {
			$marca = $linha[0];
			$modelo = $linha[1];
			$placa = $linha[2];
			$motor = $linha[3];
			$filial = $linha[4];
			$cidade = $linha[5];
			$status = $linha[6];
			$chassi = $linha[7];
	?>
			<tr align = "center" >
				<td><?php echo $marca; ?></td>
				<td><?php echo $modelo; ?></td>
				<td><?php echo $placa; ?></td>
				<td><?php echo $motor; ?></td>
				<td><?php echo $filial ?></td>
				<td><?php echo $cidade; ?></td>
				<?php 
					if (!$status){ 
						$consultar2 = "select count(*) from reserva R where R.ativa = true and R.chassi = '$chassi'";
						$executar2 = mysqli_query($conn, $consultar2); 
						$linha2 = mysqli_fetch_array($executar2, MYSQLI_BOTH);
						if ($linha2[0]) { ?>
							<td style="color: red;">Locado</td>
						<?php } else{ ?>
							<td style="color: red;">Bloqueado</td>	
						<?php } ?>
						<td><a href="../control/liberaVeiculo.php?id=<?php echo $chassi ?>">Liberar</a></td> <?php 
					} else { ?> 
				 		<td style="color: green;">Livre</td>
						<td><a href="../control/bloqueiaVeiculo.php?id=<?php echo $chassi ?>">Bloquear</a></td> <?php 
				 	} 
				?>
			</tr>
	<?php 
		}
	?>
	</table>
</body>
</html>