<!DOCTYPE html>
<?php include("conexao.php");
$id = $_GET['id'];
$sql = "select * from filial where id_filial = '$id'";
$rows = $db->query($sql);
$row = $rows->fetch_assoc();
if(isset($_POST['send'])){
	$nome = $_POST['task'];
	$sql2 = "update filial set nome = '$nome' where id_filial = '$id'";
	$db->query($sql2);
	header('Location: ../view/filiais.php');
}
?>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>CRUD</title>
</head>
<body>
<div class="container">
	<div class="row" style="margin-top: 70px;">
	<center><h1>ALTERAR FILIAL</h1></center>
	<div class="col-md-10 col-md-offset-1">	

	<hr><br>
          <form method="post" action="../view/filiais.php">
          <label>FILIAL</label>
          <input type="text" required name="task" value="<?php echo $row['nome'];?>" class="form-control">
          <input type="submit" name="send" value="Atualizar" class="btn btn-success">
          <a href="../view/filiais.php" class="btn btn-warning">Voltar</a>          
          </form>
	</div>
	</div>
</div>
</body>
</html>