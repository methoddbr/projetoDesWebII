<?php include ("model/conexao.php"); ?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Motor - index</title>
</head>
<body>
	<?php include ("view/menuIndex.php"); ?>
	<form action="view/busca.php" method="POST">
		<label for="busca">Buscar:</label>
		<input id="busca" type="text" name="busca" size="30">
		<button  name="enviar" class="enviar" type="submit">Buscar</button>
	</form>
	<p style="font-size: 10px; margin-left: 55px;">Faça sua busca por cidade ou veículo.</p>
</body>
</html>