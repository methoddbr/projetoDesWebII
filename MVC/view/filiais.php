<?php include ("../model/conexao.php");	?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Motor - Filiais</title>
</head>

<body>
<!-- INSERE O TOP MENU  -->
<?php include ("../view/menu.php"); ?>

<?php
$id = $_SESSION["idLocadora"];
$page = (isset($_GET['page'])?$_GET['page']:1);
$perPage = (isset($_GET['perPage']) && ($_GET['perPage'])<=50 ? $_GET['perPage'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
$sql = "select * from filial where id_locadora='$id' limit ".$start.",".$perPage." ";
$total = $db->query("select * from filial")->num_rows;
$pages = ceil($total / $perPage);
$rows = $db->query($sql);
?>
<!-- INICIA O CADASTRO DE FILIAIS -->
<div class="container">
	<div class="row" style="margin-top: 70px;">
	<center><h1>FILIAIS</h1></center>
	<div class="col-md-10 col-md-offset-1">
	<table class= "table">
	<button type="button" class= "btn btn-success" data-toggle="modal" data-target="#myModal">Add</button>
	<button type="button" class= "btn btn-default pull-right" onclick="print()">Print</button>
	<hr><br>
	
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Adicionar Filial</h4>
        </div>
        <div class="modal-body">
          <form action="../model/add.php" method="post">
          	  <label>Código da Locadora</label>
	          <input type="text" required name="idlocadora" class="form-control" value="<?php echo $id; ?>" readonly="true">
	          <label>Código da Filial</label>
	          <input type="text" required name="idfilial" class="form-control" value="<?php echo ++$total; ?>" readonly="true">		
	          <label>CNPJ</label>
	          <input type="text" required name="cnpj" class="form-control">
	          <label>Nome</label>
	          <input type="text" required name="nome" class="form-control">
	          <label>Cidade</label>
	          <?php
					$query = "SELECT id_cidade, descricao FROM cidade";
					$executar = mysqli_query($conn, $query);
				?>

				<select name="cidade" class="form-control">
					<?php
					 	while($cidade = mysqli_fetch_array($executar)) { 
					?>
 							<option value="<?php echo $cidade['id_cidade'] ?>"> 
 								<?php echo $cidade['descricao'] ?>
 							</option>
 					<?php 
 						} 
 					?>
				</select>  
	          <!-- <input type="text" required name="cidade" class="form-control"> -->
	          <label>Inscrição Estadual</label>
	          <input type="text" required name="ie" class="form-control">
	          <label>Telefone</label>
	          <input type="text" required name="telefone" class="form-control">
	          <label>Endereço</label>
	          <input type="text" required name="end" class="form-control"><br>
         	  <input type="submit" name="send" value="Adicionar" class="btn btn-success">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

	<thead>
		<tr>
			<th>Código</th>
			<th>Filial</th>
			<th>CNPJ</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $rows->fetch_assoc()){ ?>
		<tr>			
			<th><?php echo $row['id_filial']; ?></th>
			<td class="col-md-10"><?php echo $row['nome']; ?></td>
			<td class="col-md-10"><?php echo $row['cnpj']; ?></td>
			<!-- <td><a href="../model/update.php?id=<?php echo $row['id_filial'];?>" class ="btn btn-success">Edit</a></td> -->
			<td><a href="../model/delete.php?id=<?php echo $row['id_filial'];?>" class ="btn btn-danger">Delete</a></td>
		</tr>
		<?php } ?>
	</tbody>
	<table>
	<center>
	<ul class="pagination">
	<?php for($i=1;$i<=$pages;$i++){?>
	<li><a href="?page=<?php echo $i;?>&perPage=<?php echo $perPage;?>"><?php echo $i;?></a></li>
	<?php }?>
	</ul>
	</center>
</div>
</body>
</html>