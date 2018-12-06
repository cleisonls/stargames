<?php
	session_start();
	require 'conexao.php';

	$id = 0;

	if(isset($_GET['id_usuario']) && !empty($_GET['id_usuario']))
	{
		$id = addslashes($_GET['id_usuario']);
	}

	if(isset($_POST['user']) && !empty($_POST['user']))
	{
		$nome = addslashes($_POST['nome']);
		$user = addslashes($_POST['user']);
		$email = addslashes($_POST['email']);
		$senha = md5(addslashes($_POST['pass']));

		$sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, usuario = :usuario, email = :email, senha = :senha WHERE id_usuario = :id;");

		$sql->bindValue(":nome", $nome ,PDO::PARAM_STR);
		$sql->bindValue(":usuario", $user ,PDO::PARAM_STR);
		$sql->bindValue(":email", $email ,PDO::PARAM_STR);
		$sql->bindValue("senha", $senha ,PDO::PARAM_STR);
		$sql->bindValue(":id", $id,PDO::PARAM_INT);
		$sql->execute();

		header("location: admin.php");
	}

	$sql = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = :id;");
	$sql->bindValue(":id", $id,PDO::PARAM_INT);
	$sql->execute();

	if($sql->rowCount() > 0)
	{
		$sql = $sql->fetch();

		$dado = $sql;
	}
	else
	{
		header("location: admin.php");
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Alteração de Usuário</title>
	<meta charset="utf-8"/>

	<!-- BOOTSTRAP, CSS -->
	<link rel="stylesheet" href="assets/css/style.css"/>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>

	<script src="assets/js/validation.js"></script>
</head>
<body>
	<div class="container-fluid d-flex justify-content-center" id="topo">
		<a href="index.php"><img src="assets/images/tech1.jpg"/></a>
	</div>

	<div class="container" id="corpo">
		<h1 class="text-secondary">Alteração de Dados</h1>
		<hr><br>
		<div class="row">
			<div class="col-md-3">&nbsp;</div>
			<div class="col-md-6">
				<form method="POST" name="formInsertion">
					<div class="form-group">
						<label for="nome">Nome</label>
						<input class="form-control" type="text" name="nome" id="nome" value="<?php echo $dado['nome']; ?>"/>
					</div>
					<div class="form-group">
						<label for="user">Usuário</label>
						<input class="form-control" type="text" name="user" id="user" value="<?php echo $dado['usuario']; ?>"/>
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input class="form-control" type="email" name="email" id="email" value="<?php echo $dado['email']; ?>"/>
					</div>
					<div class="form-group">
						<label for="pass">Senha</label>
						<input class="form-control" type="password" name="pass" id="pass" placeholder="Insira a nova senha..." />
					</div>

					<div class="row d-flex justify-content-around">
						<button class="btn btn-info col-md-4" type="submit">Alterar</button>
						<button class="btn btn-secondary col-md-4" type="reset">Limpar</button>
					</div>
				</form><br>
			</div>
			<div class="col-md-3">&nbsp;</div>
		</div>
	</div>

	<!-- JQUERY, POPPER, BOOTSTRAP JS -->
	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>