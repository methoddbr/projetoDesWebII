<?php include ("../control/conexao.php"); ?>	
<!DOCTYPE html>
<html>
<head>
	<title>Motor - login</title>
</head>
<body>
	[ <a href="../index.php">Início</a> ]
	</BR></BR>
	<div class="formulario">
		<form action="../control/verificaLogin.php" method="POST">
			<label for="user">Email:</label>
			<input id="user" type="text" name="user" autofocus required size="20">
			</BR></BR>
			<label for="senha">Senha:</label>
			<input type="password" id="senha" name="senha" size="20" required>
			</BR></BR>
			<button class="enviar" type="submit">Login</button>
		</form>
	</div>
</body>
</html>