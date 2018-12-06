<?php
	require "conexao.php";

	if(isset($_POST['nome']) && !empty($_POST['nome']))
	{
		$nome = addslashes($_POST['nome']);
		$usu = addslashes($_POST['usu']);
		$email = addslashes($_POST['email']);
		$pass = md5(addslashes($_POST['pass']));

		$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email;");
		$sql->bindValue(":email", $email, PDO::PARAM_STR);
		$sql->execute();

		if ($sql->rowCount() == 0)
		{
			$sql = $pdo->prepare("INSERT INTO usuarios(nome,usuario,email,senha) VALUES (:nome, :usu, :email, :pass);");
			$sql->bindValue(":nome", $nome, PDO::PARAM_STR);
			$sql->bindValue(":usu", $usu, PDO::PARAM_STR);
			$sql->bindValue(":email", $email, PDO::PARAM_STR);
			$sql->bindValue(":pass", $pass, PDO::PARAM_STR);
			$sql->execute();

			header("Location: login.php");
			exit();
		}
		else
		{
			?>
				<script>
					alert("O usuário informado já está cadastrado!");
				</script>
			<?php
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Página de Cadastro</title>

	<!-- METADADOS -->
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width; initial-scale=1"/>

	<!-- BOOTSTRAP, CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/css/styleCadastro.css"/>

	<script src="assets/js/validation.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-6" id="left">
				<div class="row" id="logo">
					<figure class="col-4 col-md-12">
						<img src="assets/images/starlogo.png"/>
					</figure>
					<a href="index.php" class="col-8 col-md-12">Star Games</a>
				</div>
			</div>
			<div class="col-12 col-md-6" id="right">
				<div class="container">
					<header><h3>Cadastro</h3></header>
					<hr>

					<section>
						<form method="POST" name="myFormCad">
							<div class="form-group">
								<label for="name">Nome</label>
								<input type="text" name="nome" id="name" class="form-control" placeholder="Digite seu nome...">
							</div>
							<div class="form-group">
								<label for="user">Usuário</label>
								<input type="text" name="usu" id="user" class="form-control" placeholder="Insira um usuário...">
							</div>
							<div class="form-group">
								<label for="email">E-mail</label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Insira seu e-mail...">
							</div>
							<div class="form-group">
								<label for="senha">Senha</label>
								<input type="password" name="pass" id="senha" class="form-control" placeholder="Digite sua senha...">
							</div>
							<div class="form-group d-flex justify-content-around">
								<button id="button" type="button" class="btn btn-danger col-md-12" onclick="validation();">Cadastrar</button>
							</div>
						</form>
					</section>
				</div>
			</div>
		</div>
	</div>

	<!-- JQUERY, POPPER, BOOTSTRAP -->
	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>