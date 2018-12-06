<?php
	session_start();
	require 'conexao.php';

	if (!empty($_POST['email']) AND !empty($_POST['pass']))
	{
		$email = addslashes($_POST['email']);
		$pass = md5(addslashes($_POST['pass']));

		$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :pass;");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":pass", $pass);
		$sql->execute();

		if ($sql->rowCount() > 0)
		{
			$sql = $sql->fetch();
			$_SESSION['logado'] = $sql['id_usuario'];

			if ($_SESSION['logado'] == 1)
			{
				header("Location: admin.php");
				exit();
			}
			else
			{
				header("Location: index.php");
				exit();
			}
		}
		else
		{
			?>
				<script>
					alert("e-mail e/ou senha inválidos!");
				</script>
			<?php
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Página de Login</title>

	<!-- METADADOS -->
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width; initial-scale=1"/>

	<!-- BOOTSTRAP, CSS -->
	<link rel="stylesheet" href="assets/css/styleLogin.css"/>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>

	<script src="assets/js/validationLogin.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-lg-6" id="left">
				<div class="row" id="logo">
					<figure class="col-4 col-md-12">
						<img src="assets/images/starlogo.png"/>
					</figure>
					<a href="index.php" class="col-8 col-md-12">Star Games</a>
				</div>
			</div>
			<div class="col-lg-6" id="right">
				<div class="container">
					<header><h3>Login</h3></header>
					<hr>

					<section>
						<form method="POST" name="myFormLog">
							<div class="form-group">
								<label for="email">E-mail</label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Insira seu e-mail...">
							</div>
							<div class="form-group">
								<label for="senha">Senha</label>
								<input type="password" name="pass" id="senha" class="form-control" placeholder="Digite sua senha...">
							</div>
							<div class="form-group d-flex justify-content-around">
								<button id="button" type="button" class="btn btn-danger col-md-12" onclick="validation();">Entrar</button>
							</div>
						</form>

						<div class="d-flex justify-content-center" id="other">
							<ul class="nav navbar row">
								<a href="cadastro.php"><li class="navbar">Crie sua conta aqui</li></a>
								<li class="navbar" id="separador">|</li>
								<a href="#other"><li class="navbar">Esqueci minha senha</li></a>
							</ul>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>




	<!-- JQUERY, POPPER, BOOTSTRAP JS -->
	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>