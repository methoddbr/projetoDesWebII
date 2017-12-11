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
			<td>MARCA</td>
			<td>COR</td>
			<td>ANO</td>
			<td>MOTOR</td>
			<td>TIPO</td>
			<td>LOCADORA</td>
			<td>CIDADE</td>
		</tr>
	<?php  
		$busca = $_GET["busca"];
		$_SESSION["pagina"] = "../view/busca.php?busca=$busca";
		$consultar = "select MO.descricao, MA.descricao, V.cor, MO.ano, MO.motor, T.tipo, F.nome, C.descricao, V.chassi
					  	from veiculo V inner join modelo MO on V.id_modelo = MO.id_modelo 
							inner join marca MA on MO.id_marca = MA.id_marca
							inner join tipo T on MO.id_tipo = T.id_tipo
							inner join filial F on V.id_filial = F.id_filial
							inner join locadora L on F.id_locadora = L.id_locadora
							inner join cidade C on F.id_cidade = C.id_cidade
					  	where (MO.descricao = '$busca' or C.descricao = '$busca') and V.ativo = true";
		$executar = mysqli_query($conn, $consultar);
		if (mysqli_num_rows($executar) == 0) {
			echo "Não há registro compatível com a busca realizada!";
			$consultar = "select MO.descricao, MA.descricao, V.cor, MO.ano, MO.motor, T.tipo, F.nome, C.descricao, V.chassi
					  	from veiculo V inner join modelo MO on V.id_modelo = MO.id_modelo 
							inner join marca MA on MO.id_marca = MA.id_marca
							inner join tipo T on MO.id_tipo = T.id_tipo
							inner join filial F on V.id_filial = F.id_filial
							inner join locadora L on F.id_locadora = L.id_locadora
							inner join cidade C on F.id_cidade = C.id_cidade
						where V.ativo = true";
			$executar = mysqli_query($conn, $consultar);
		}
		while ($linha = mysqli_fetch_array($executar, MYSQLI_BOTH)) {
			$modelo = $linha[0];
			$marca = $linha[1];
			$cor = $linha[2];
			$ano = $linha[3];
			$motor = $linha[4];
			$tipo = $linha[5];
			$filial = $linha[6];
			$cidade = $linha[7];
			$chassi = $linha[8];
	?>
			<tr align = "center" >
				<td><a href="veiculo.php?id=<?php echo $chassi; ?>"><?php echo $modelo; ?></a></td>
				<td><?php echo $marca; ?></td>
				<td><?php echo $cor; ?></td>
				<td><?php echo $ano; ?></td>
				<td><?php echo $motor; ?></td>
				<td><?php echo $tipo; ?></td>
				<td><?php echo $filial; ?></td>
				<td><?php echo $cidade; ?></td>
			</tr>
	<?php 
		}
	?>
	</table>
</body>
</html>