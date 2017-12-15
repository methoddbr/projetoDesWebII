<<<<<<< HEAD
<?php 
	include ("../model/conexao.php");
	session_start();

	$user = $_POST['user'];
	$senha = $_POST['senha'];


	$consultar = "select email, senha, nome from cliente";
	$executar = mysqli_query($conn, $consultar);

	$encontrou = false;
	while ($linha = mysqli_fetch_array($executar, MYSQLI_BOTH)) {
		$u = $linha[0];
		$s = $linha[1];
		$id = $linha[2];
		if ($user == $u && $senha == $s){
			$encontrou = true;
			$_SESSION["logado"] = TRUE;
			$_SESSION["locadora"] = false;
			$_SESSION["user"] = $linha[2];
			
			setcookie("usuario", $id, time()+3600, "/mvc/view/"); 

			header('Location: ../index.php');
		}
	}

	$consultar2 = "select email, senha, nome, id_locadora from locadora";
	$executar2 = mysqli_query($conn, $consultar2);

	while ($linha = mysqli_fetch_array($executar2, MYSQLI_BOTH)) {
		$u = $linha[0];
		$s = $linha[1];
		$id = $linha[3];
		if ($user == $u && $senha == $s){
			$encontrou = true;
			$_SESSION["logado"] = TRUE;
			$_SESSION["locadora"] = true;
			$_SESSION["user"] = $linha[2];
			
			//setcookie("usuario", $user, time()+3600); 
			setcookie("usuario", $id, time()+3600, "/mvc/view/");

			header('Location: ../index.php');
		}
	}

	if (!$encontrou) {
		header('Location: ../view/login.php');
	}
=======
<?php 
	include ("../model/conexao.php");
	session_start();

	$user = $_POST['user'];
	$senha = $_POST['senha'];

	$consultar = "select email, senha, nome, id_cliente from cliente";
	$executar = mysqli_query($conn, $consultar);

	$encontrou = false;
	while ($linha = mysqli_fetch_array($executar, MYSQLI_BOTH)) {
		$u = $linha[0];
		$s = $linha[1];
		if ($user == $u && $senha == $s){
			$encontrou = true;
			$_SESSION["logado"] = TRUE;
			$_SESSION["locadora"] = false;
			$_SESSION["user"] = $linha[2];
			$_SESSION["idCliente"] = $linha[3];
			$pg = $_SESSION["pagina"];
			if (isset($_SESSION["pagina"])) {
				header("Location: $pg");
			} else {
				header('Location: ../index.php');
			}
		}
	}

	$consultar2 = "select email, senha, nome, id_locadora from locadora";
	$executar2 = mysqli_query($conn, $consultar2);

	while ($linha = mysqli_fetch_array($executar2, MYSQLI_BOTH)) {
		$u = $linha[0];
		$s = $linha[1];
		if ($user == $u && $senha == $s){
			$encontrou = true;
			$_SESSION["logado"] = TRUE;
			$_SESSION["locadora"] = true;
			$_SESSION["user"] = $linha[2];
			$_SESSION["idLocadora"] = $linha[3];
			$pg = $_SESSION["pagina"];
			if (isset($_SESSION["pagina"])) {
				header("Location: $pg");
			} else {
				header('Location: ../index.php');
			}
		}
	}

	if (!$encontrou) {
		header('Location: ../view/login.php');
	}
>>>>>>> c8ea6e5f99f370532623fec2635854d75c5c8e57
?>