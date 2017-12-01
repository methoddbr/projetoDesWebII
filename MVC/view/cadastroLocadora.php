<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<?php	include("view/head.php");	?>
		<title>Motor - Cadastro Locadora</title>
	</head>

	<body>
<!-- .......................... N A V - B A R ......................... -->
		<?php	include("view/navbar.php");	?>

<!-- ........................ C O N T E Ú D O ......................... -->
		
		<div style="position: absolute; height: 116px; top: 20%; width: 50%; left: 10%;">
		<div style="position: relative; height: 116px; top: -58px;">
		
				<h1>Cadastre sua locadora</h1>
				<form action="#" method="POST">
			
				<label for="nomeLocadora">Nome da locadora: </label><br>
				<input id="nomeLocadora" type="text" name="nomeLocadora" autofocus required size="20">
				<br>
				<label for="telefone">Telefone: </label><br>
				<input id="telefone" type="text" name="telefone" autofocus required size="20">
				<br>
				<label for="email">E-mail: </label><br>
				<input id="email" type="text" name="name" autofocus required size="30"><br>
				<label for="senha">Senha: </label><br>
				<input id="senha" type="password" name="senha" autofocus required size="13">
				<br>
				<label for="cnpj">CNPJ: </label><br>
				<input id="cnpj" type="text" name="cnpj" autofocus required size="20">
				<br>
				<label for="escritura">Escritura estadual: </label><br>
				<input id="escritura" type="text" name="escritura" autofocus required size="20">
				<br>
				<label for="endereco">Endereço: </label><br>
				<input id="endereco" type="text" name="endereco" autofocus required size="20">
				<br>
				</form>

				<button name="enviar" class="enviar" type="submit">Enviar</button>


		</div>
	</div>

	</body>

</html>

<?php 
	include("conexaoDB.php");

	if(isset($_POST['enviar'])){
		$nomeLocadora = $_POST['nomeLocadora'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$cnpj = $_POST['cnpj'];
		$escritura = $_POST['escritura'];
		$endereço = $_POST['endereco'];

	$inserir = "INSERT INTO locadora (nome) VALUES ('$nomeLocadora')";
	$inserir2 = "INSERT INTO filial (cnpj, ie, email, senha, telefone, endereco) VALUES ($cnpj, $escritura, $email, $senha, $telefone, $endereco)";

	$executar = mysqli_query($conn, $inserir);
	$executar2 = mysqli_query($conn, $inserir2);

	if($executar && $executar2){
		echo "Inserido com sucesso.";
	}
	}


?>