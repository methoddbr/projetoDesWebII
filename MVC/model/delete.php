<?php
include("conexao.php");
$id = $_GET['id'];
$sql = "delete from filial where id_filial = '$id'";
$val = $db->query($sql);
if($val){
	header('Location: ../view/filiais.php');
}
?>