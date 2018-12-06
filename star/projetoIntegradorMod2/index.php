<?php
	session_start();
	require 'conexao.php';

	if (!empty($_SESSION['logado']))
	{
		$id = $_SESSION['logado'];

		$sql = $pdo->prepare("SELECT nome FROM usuarios WHERE id_usuario = :id");
		$sql->bindValue(":id", $id, PDO::PARAM_INT);
		$sql->execute();

		if($sql->rowCount() > 0)
		{
			$sql = $sql->fetch();
			$nome = $sql['nome'];
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Home Page</title>
	<meta charset="utf-8"/>

	<!-- BOOTSTRAP, CSS -->
	<link rel="stylesheet" href="assets/css/style.css"/>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<body>
	<div class="container-fluid d-flex justify-content-center" id="topo">
		<a href="index.php"><img src="assets/images/tech1.jpg"/></a>
	</div>

	<div class="container" id="corpo">
		<div class="row">
			<h1 class="text-secondary col-md-7 col-lg-9">Esta é a Página Index</h1>
			<?php
				if (!empty($_SESSION['logado']))
				{
					?>
						<div class="col-md-5 col-lg-3" id="line">
							<?php echo "Olá, " . $nome . "!"; ?>
							<span id="separador">|</span>
							<a href="logout.php">Sair</a>
						</div>
					<?php
				}
				else
				{
					?>
						<div class="col-md-5 col-lg-3" id="line">
							<a href="login.php">Login</a>
							<span id="separador">|</span>
							<a href="cadastro.php">Cadastre-se</a>
						</div>
					<?php
				}
			?>
		</div>
		<hr><br>
	</div>






















	<!-- JQUERY, POPPER, BOOTSTRAP JS -->
	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>