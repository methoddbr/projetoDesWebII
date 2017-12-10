<?php include ("../model/conexao.php"); ?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Motor - index</title>
</head>
<body>
	<?php 
		include ("menu.php"); 
		$chassi = $_GET["id"];
		$consultar = "select A.gps, A.ar, A.radio, A.camera, A.sensor, A.direcao, A.automatico, MO.descricao, MO.ano, MO.motor, MO.nr_portas, MA.descricao, T.tipo, T.capacidade, V.chassi, V.km, V.cor, V.valor, L.nome, C.descricao, C.uf
					  	from veiculo V inner join modelo MO on V.id_modelo = MO.id_modelo 
							inner join marca MA on MO.id_marca = MA.id_marca
							inner join tipo T on MO.id_tipo = T.id_tipo
							inner join filial F on V.id_filial = F.id_filial
							inner join locadora L on F.id_locadora = L.id_locadora
							inner join cidade C on F.id_cidade = C.id_cidade
							inner join acessorios A on V.id_acessorio = A.id_acessorio
					  	where V.chassi = '$chassi'";
		$executar = mysqli_query($conn, $consultar);
		$linha = mysqli_fetch_array($executar, MYSQLI_BOTH);
		$aGps = $linha[0];
		$aAr = $linha[1];
		$aRadio = $linha[2];
		$aCamera = $linha[3];
		$aSensor = $linha[4];
		$aDirecao = $linha[5];
		$aAutomatico = $linha[6];
		$moModelo = $linha[7];
		$moAno = $linha[8];
		$moMotor = $linha[9];
		$moNrPortas = $linha[10];
		$maMarca = $linha[11];
		$tTipo = $linha[12];
		$tCapacidade = $linha[13];
		$vChassi = $linha[14];
		$vKm = $linha[15];
		$vCor = $linha[16];
		$vValor = $linha[17];
		$lNome = $linha[18];
		$cCidade = $linha[19];
		$cUf = $linha[20];
	?>
	<h2><?php echo $moModelo . " " . $maMarca ?></h2>
	<input type="checkbox" <?php if ($aGps){ ?> checked="checked" <?php } ?> disabled >GPS</input></br>
	<input type="checkbox" <?php if ($aAr){ ?> checked="checked" <?php } ?> disabled >Ar-condicionado</input></br>
	<input type="checkbox" <?php if ($aRadio){ ?> checked="checked" <?php } ?> disabled >Radio</input></br>
	<input type="checkbox" <?php if ($aCamera){ ?> checked="checked" <?php } ?> disabled >Câmera Traseira</input></br>
	<input type="checkbox" <?php if ($aSensor){ ?> checked="checked" <?php } ?> disabled >Sensor estacionamento</input></br>
	<input type="checkbox" <?php if ($aDirecao){ ?> checked="checked" <?php } ?> disabled >Direção Hidráulica</input></br>
	<input type="checkbox" <?php if ($aAutomatico){ ?> checked="checked" <?php } ?> disabled >Câmbio automático</input></br></br>
	<p><?php echo $moModelo . " " . $vCor . " " . $moAno . ", motor " . $moMotor . ", " . $vKm . "km, " . $moNrPortas . " portas, " . $tTipo . " com capacidade de " . $tCapacidade . "L para transporte, por R$" . $vValor . " a diária.</br> Em " . $cCidade . " - " . $cUf . ", na locadora de veículos " . $lNome ?></p></br>
	<form action="reserva.php" method="POST">
		<button name="reserva" class="enviar" type="submit" <?php if (!isset($_SESSION["logado"]) || $_SESSION["locadora"]){ ?> disabled <?php } ?> >Reservar</button>
	</form>
	<p style="font-size: 10px;">Faça seu login para efetuar a reserva deste veículo.</p>
</body>
</html>