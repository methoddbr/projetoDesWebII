[ <a href="../index.php">Início</a> ]
<?php 
	session_start();
	if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
?>
		[ <a href="login.php">Login</a>
		<a href="cadastro.php">Cadastro</a> ]
<?php 
	}
	else {
		if ($_SESSION["locadora"] == TRUE) {
?>
			[ <a href="filiais.php">Filiais</a>
			<a href="veiculos.php">Veículos</a> ]
<?php		
		}
		echo " - Bem-vindo " . $_SESSION["user"] . " - ";
?>
		[ <a href="../control/logout.php">Logout</a> ]
<?php 
	} 
?>	
</br></br>
