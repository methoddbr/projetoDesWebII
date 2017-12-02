<?php include ("../control/conexao.php"); ?>	
<!DOCTYPE html>
<html>
<head>
<?php  
	if (isset($_POST['enviar'])){
		$rb = $_POST['cadastro'];
		if ($rb == "fisica" || $rb == "juridica") {
?>
			<title>Motor - cadastro cliente</title>
<?php  
		}
		else {		
?>
			<title>Motor - cadastro locadora</title>
<?php
		}
	}
	else {	
?>
		<title>Motor - cadastro</title>
<?php			
	}
?>
</head>
<body>
	[ <a href="../index.php">Início</a> ]
	</BR></BR>
	<div class="formulario">
		<form name="tipoCadastro" action="cadastro.php" method="POST">
<?php 
		if (isset($_POST['enviar'])){
			$rb = $_POST['cadastro'];
			if ($rb == "fisica") {
?>
				<input type="radio" name="cadastro" value="fisica" checked="checked" /> Cliente físico
				<input type="radio" name="cadastro" value="juridica"/> Cliente jurídico
				<input type="radio" name="cadastro" value="locadora"/> Locadora
<?php 
			} else if ($rb == "juridica") {
?>
				<input type="radio" name="cadastro" value="fisica" /> Cliente físico
				<input type="radio" name="cadastro" value="juridica" checked="checked" /> Cliente jurídico
				<input type="radio" name="cadastro" value="locadora"/> Locadora
<?php 
			} else if ($rb == "locadora") {
?>
				<input type="radio" name="cadastro" value="fisica" /> Cliente físico
				<input type="radio" name="cadastro" value="juridica" /> Cliente jurídico
				<input type="radio" name="cadastro" value="locadora" checked="checked" /> Locadora
<?php 
			}
		} else {
?>
			<input type="radio" name="cadastro" value="fisica" /> Cliente físico
			<input type="radio" name="cadastro" value="juridica"/> Cliente jurídico
			<input type="radio" name="cadastro" value="locadora"/> Locadora
<?php 			
		}
?>
			<button name="enviar" class="enviar" type="submit">Selecionar</button>
		</form>
	</div>
</body>
</html>

<?php 
	if (isset($_POST['enviar'])){
		$rb = $_POST['cadastro'];
		if ($rb == "fisica") {
?>
			<form name="cadastroFisico" action="cadastro.php" method="POST">
				</br></br>
				<label for="nome">Nome:</label>
				<input id="nome" type="text" name="nome" autofocus required size="20">
				<label for="sobrenome"> Sobrenome:</label>
				<input id="sobrenome" type="text" name="sobrenome">
				</br></br>
				<label for="cpf">CPF:</label>
				<input id="cpf" type="text" name="cpf">
				<label for="habilitacao">Habilitacao:</label>
				<input id="habilitacao" type="text" name="habilitacao">
				</br></br>
				<label for="email">Email:</label>
				<input id="email" type="text" name="email">
				<label for="senha">Senha:</label>
				<input id="senha" type="password" name="senha">
				</br></br>
				<label for="telefone">Telefone:</label>
				<input id="telefone" type="text" name="telefone">
				<label for="dtNascimento">Data Nascimento:</label>
				<input id="dtNascimento" type="text" name="dtNascimento">
				</br></br>
				<input type="radio" name="sexo" value="M"/> Masculino
			    <input type="radio" name="sexo" value="F"/> Feminino
				</br></br>
				<button name="cadastrar" class="enviar" type="submit">Cadastrar</button>
			</form>
<?php 
		}
		else if ($rb == "juridica") {
?>
			<form name="cadastroJuridico" action="cadastro.php" method="POST">
				</br></br>
				<label for="nome">Razão social:</label>
				<input id="nome" type="text" name="nome" autofocus required size="20">
				</br></br>
				<label for="cnpj">CNPJ:</label>
				<input id="cnpj" type="text" name="cnpj">
				<label for="ie">Inscrição Estadual:</label>
				<input id="ie" type="text" name="ie">
				</br></br>
				<label for="email">Email:</label>
				<input id="email" type="text" name="email">
				<label for="senha">Senha:</label>
				<input id="senha" type="password" name="senha">
				</br></br>
				<label for="telefone">Telefone:</label>
				<input id="telefone" type="text" name="telefone">
				</br></br>
				<button name="cadastrar" class="enviar" type="submit">Cadastrar</button>
			</form>
<?php
		}
		else if ($rb == "locadora") {
?>
			<form name="cadastroLocadora" action="../cadastroLocadora.php" method="POST">
				</br></br>
				<label for="nome">Razão social:</label>
				<input id="nome" type="text" name="nomeLocadora" autofocus required size="20">
				</br></br>
				<label for="cnpj">CNPJ:</label>
				<input id="cnpj" type="text" name="cnpj">
				<label for="ie">Inscrição Estadual:</label>
				<input id="ie" type="text" name="ie">
				</br></br>
				<label for="email">Email:</label>
				<input id="email" type="text" name="email">
				<label for="senha">Senha:</label>
				<input id="senha" type="password" name="senha">
				</br></br>
				<label for="telefone">Telefone:</label>
				<input id="telefone" type="text" name="telefone">
				<?php
					include("conexaoDB.php");
					$query = "SELECT id_cidade, descricao FROM cidade";
					$executar = mysqli_query($conn, $query);

					?>

				<select name="id_cidade">
					<?php
					 	while($cidade = mysqli_fetch_array($executar)) { 
					?>
 							<option value="<?php echo $cidade['id_cidade'] ?>"> 
 						<?php echo $cidade['descricao'] ?></option>
 					<?php } ?>

				</select>
				</br></br>
				<label for="endereco">Endereço:</label>
				<input id="endereco" type="text" name="endereco">
				</br></br>
				<button name="cadastrar" class="enviar" type="submit">Cadastrar</button>
			</form>
<?php
		}
	}
?>
