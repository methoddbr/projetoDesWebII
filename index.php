<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<?php	include("view/head.php");	?>
		<title>Motor - Index</title>
	</head>

	<body>
<!-- .......................... N A V - B A R ......................... -->
		<?php	include("view/navbar.php");	?>

<!-- ........................ C O N T E Ú D O ......................... -->
		
		<div class="conteudo"> 

			
			<div class="formulario">
				<form action="index.html" method="GET">
					<label for="pesquisa">Pesquisa </label>
					<input id="pesquisa" type="text" name="pesquisa" placeholder="Faça sua busca" autofocus required size="40">

					<button class="enviar" onclick="enviaSugestao();">Buscar</button>
				</form>
			</div>

		</div>

	</body>

</html>