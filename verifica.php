<?php 
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$sugestao = $_POST['sugestao'];

	if (strlen($nome) <= 0){
		header('Location: contato.php');
	}

	if (strlen($sugestao) <= 0){
		header('Location: contato.php');
	}

	if (VerificarEnderecoEmail($email)) {
		header('Location: index.php');
	}
	else {
		header('Location: contato.php');
	}
	
	function VerificarEnderecoEmail($e) {  
	   $syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';  
	   if(preg_match($syntaxe,$e)){
	      return true;  
	   }
	   else  {
	     return false;  
	   }
	}
?>