<?php include ("../model/conexao.php"); ?>	
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
		} else {		
?>
			<title>Motor - cadastro locadora</title>
<?php
		}
	} else {	
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
			<form name="cadastroFisico" action="../model/cadastroFisico.php" method="POST">
				</br></br>
				<label for="nome">Nome:</label>
				<input id="nome" type="text" name="nome" autofocus required size="30">
				<label for="sobrenome"> Sobrenome:</label>
				<input id="sobrenome" type="text" name="sobrenome" autofocus required size="30">
				</br></br>
				<label for="cpf">CPF:</label>
				<input id="cpf" type="text" name="cpf" autofocus required pattern="^\d{3}\x2E\d{3}\x2E\d{3}\x2D\d{2}$">
				<label for="habilitacao">Habilitacao:</label>
				<input id="habilitacao" type="text" name="habilitacao" autofocus required pattern="[^a-z][0-9]{10}$">
				</br></br>
				<label for="email">Email:</label>
				<input id="email" type="email" name="email" autofocus required>
				<label for="senha">Senha:</label>
				<input id="senha" type="password" name="senha" autofocus required size="15">
				</br></br>
				<label for="telefone">Telefone:</label>
				<input id="telefone" type="text" name="telefone" autofocus required pattern="^\(?\d{2}\)?[\s-]?[\s9]?\d{4}-?\d{4}$">
				<label for="dtNascimento">Data Nascimento:</label>
				<input id="dtNascimento" type="text" name="dtNascimento" autofocus required pattern="^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$">
				</br></br>
				<input type="radio" name="sexo" value="M" required="required" /> Masculino
			    <input type="radio" name="sexo" value="F" required="required" /> Feminino
				</br></br>
				<button name="cadastrar" class="enviar" type="submit">Cadastrar</button>

			</form>
<?php 
		}
		else if ($rb == "juridica") {
?>
			<form name="cadastroJuridico" action="../model/cadastroJuridico.php" method="POST">
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
			<form name="cadastroLocadora" action="../model/cadastroLocadora.php" method="POST">
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
					$query = "SELECT id_cidade, descricao FROM cidade";
					$executar = mysqli_query($conn, $query);
				?>

				<select name="id_cidade">
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