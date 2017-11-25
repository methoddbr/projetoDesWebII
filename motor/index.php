<?php include ("control/conexao.php"); ?>	
<!DOCTYPE html>
<html>
<head>
	<title>Motor - index</title>
</head>
<body>
	<?php include ("view/menuIndex.php"); ?>
	<form action="busca.php" method="POST">
		<label for="busca">Buscar:</label>
		<input id="busca" type="text" name="busca" autofocus required size="30">
		<button  name="enviar" class="enviar" type="submit">Buscar</button>
	</form>
</body>
</html>