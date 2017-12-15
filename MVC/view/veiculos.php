<?php include ("../model/conexao.php"); ?>	
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<title>Motor - Veículos</title>
</head>
<body>
	<?php include ("menu.php"); ?>
	<form action="addModelo.php" method="POST">
		<button type="button" class= "btn btn-success" data-toggle="modal" data-target="#myModal">Add Modelo</button>
		<button type="button" class= "btn btn-success" data-toggle="modal" data-target="#myModal2">Add Veículo</button>
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
	<!-- Buscas no banco para a inclusao -->
	
	<?php
		$query = "SELECT id_filial, nome FROM filial";
		$executar = mysqli_query($conn, $query);
		
		while($id_filial = mysqli_fetch_array($executar)){
			if($id_filial['nome']==$filial){
				$idfilial = $id_filial['id_filial'];	
			}
		}
	?>

	</table>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Adicionar Modelo</h4>
        </div>
        <div class="modal-body">
          <form action="../model/addModelo.php" method="post">
          	  <label>Marca</label>
	          <?php
					$query = "SELECT id_marca, descricao FROM marca";
					$executar = mysqli_query($conn, $query);
				?>

				<select name="marca" class="form-control">
					<?php
					 	while($marca = mysqli_fetch_array($executar)) { 
					?>
 							<option value="<?php echo $marca['id_marca'] ?>"> 
 								<?php echo $marca['descricao'] ?>
 							</option>
 					<?php 
 						} 
 					?>
				</select>
			  <label>Tipo - Capacidade</label>
	          <?php
					$query = "SELECT id_tipo, tipo, capacidade FROM tipo";
					$executar = mysqli_query($conn, $query);
				?>

				<select name="tipo" class="form-control">
					<?php
					 	while($tipo = mysqli_fetch_array($executar)) { 
					?>
 							<option value="<?php echo $tipo['id_tipo'] ?>"> 
 								<?php echo $tipo['tipo']. " - " . $tipo['capacidade'] ?>
 							</option>
 					<?php 
 						} 
 					?>
				</select>	
	          <label>Nome</label>
	          <input type="text" required name="descricao" class="form-control">
	          <label>Ano</label>
	          <input type="text" required name="ano" class="form-control">
	          <label>Motor</label>
	          <input type="text" required name="motor" class="form-control">
	          <label>Nº de Portas</label>
	          <input type="text" required name="portas" class="form-control">
	          <label>Nº de Passageiros</label>
	          <input type="text" required name="npassageiros" class="form-control"><br>

         	  <input type="submit" name="send" value="Adicionar" class="btn btn-success">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal2 -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Adicionar veículo</h4>
        </div>
        <div class="modal-body">
          <form action="../model/addVeiculo.php" method="post">
          	  <label>Chassi (XXX000XXX000)</label>
	          <input type="text" required name="chassi" class="form-control">
          	  <label>Código da Filial</label>
	          <input type="text" required name="idfilial" class="form-control" value="<?php echo $idfilial; ?>" readonly="true">	
          	  <label>Modelo - Ano - Motor - Portas - Passageiros</label>
	          <?php
					$query = "SELECT id_modelo, descricao, ano, motor, nr_portas, nr_passageiros FROM modelo";
					$executar = mysqli_query($conn, $query);
				?>

				<select name="idmodelo" class="form-control">
					<?php
					 	while($modelo = mysqli_fetch_array($executar)) { 
					?>
 							<option value="<?php echo $modelo['id_modelo'] ?>"> 
 								<?php echo $modelo['descricao']."  -->  Ano: ".$modelo['ano']." Motor: ".$modelo['motor']." Nº Portas: ".$modelo['nr_portas']." Nº Passageiros: ".$modelo['nr_passageiros']; ?>
 							</option>
 					<?php 
 						} 
 					?>
				</select>
			  <label>Acessórios</label>
	          <?php
					$query = "SELECT id_acessorio, descricao FROM acessorios";
					$executar = mysqli_query($conn, $query);
				?>

				<select name="idacessorio" class="form-control">
					<?php
					 	while($acessorio = mysqli_fetch_array($executar)) { 
					?>
 							<option value="<?php echo $acessorio['id_acessorio'] ?>"> 
 								<?php echo $acessorio['descricao'] ?>
 							</option>
 					<?php 
 						} 
 					?>
				</select>	
	          <label>Placa</label>
	          <input type="text" required name="placa" class="form-control">
	          <label>Kilometragem</label>
	          <input type="text" required name="km" class="form-control">
	          <label>Cor</label>
	          <input type="text" required name="cor" class="form-control">
	          <label>Foto</label>
	          <input type="file" required name="img" class="form-control" readonly="true">
	          <label>Valor Aproximado</label>
	          <input type="text" required name="valor" class="form-control"><br>
         	  <input type="submit" name="send" value="Adicionar" class="btn btn-success">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>