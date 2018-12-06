<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Exclusão de Usuário</title>
	<meta charset="utf-8"/>
	<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'/>

	<!-- BOOTSTRAP, CSS -->
	<link rel="stylesheet" href="assets/css/style.css"/>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<body>
	<div class="container-fluid d-flex justify-content-center" id="topo">
		<a href="index.php"><img src="assets/images/tech1.jpg"/></a>
	</div><br><br><br><br>

	<div class="container d-flex justify-content-center align-items-center" id="confirm">
	<?php
	session_start();
	require 'conexao.php';

	$id = 0;

	if(isset($_GET['id_usuario']) && !empty($_GET['id_usuario']))
	{
		$id = addslashes($_GET['id_usuario']);
	
		$sql = "DELETE FROM usuarios WHERE id_usuario = $id;";
		$pdo->query($sql);

		header("location: admin.php");
	}else{
		header("location: admin.php");
	}
?>
	</div>

	<!-- JQUERY, POPPER, BOOTSTRAP JS -->
	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>