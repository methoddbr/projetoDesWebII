[ <a href="index.php">Início</a> ]
<?php 
	session_start();
	if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
?>
		[ <a href="view/login.php">Login</a>
		<a href="view/cadastro.php">Cadastro</a> ]
<?php 
	}
	else {
		if ($_SESSION["locadora"] == TRUE) {
?>
			[ <a href="view/filiais.php">Filiais</a>
			<a href="view/veiculos.php">Veículos</a> ]
<?php		
		} else {
?>			
			[ <a href="view/minhasReservas.php">Minhas Reservas</a> ]
<?php
		}
		echo " - Bem-vindo " . $_SESSION["user"] . " - ";
?>
		[ <a href="control/logout.php">Logout</a> ]
<?php 
	} 
?>	
</br></br>
