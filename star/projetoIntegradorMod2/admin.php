<?php
	session_start();
	require 'conexao.php';

	if(empty($_SESSION['logado']))
	{
		header("Location: login.php");
		exit();
	}

	$id = $_SESSION['logado'];

	$sql = $pdo->prepare("SELECT nome FROM usuarios WHERE id_usuario = :id");
	$sql->bindValue(":id", $id, PDO::PARAM_INT);
	$sql->execute();

	if($sql->rowCount() > 0)
	{
		$sql = $sql->fetch();
		$nome = $sql['nome'];
	}
	else
	{
		header("Location: login.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Home Page - Administrator</title>
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
			<h1 class="text-secondary col-md-7 col-lg-9">Página do Administrador</h1>
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
					header("Location: login.php");
					exit();
				}
			?>
		</div>
		<hr><br>

		<a href='adicionar.php' class="btn btn-info">Adicionar novo usuário</a><br><br>

		<table class="table table-striped">
			<thead>
				<tr class="text-secondary">
					<th scope="col">#</th>
					<th scope="col">Nome</th>
					<th scope="col">Usuário</th>
					<th scope="col">E-mail</th>
					<th scope="col">Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT * FROM usuarios";
					$sql = $pdo->query($sql);

					if($sql->rowCount() > 0)
					{
						foreach($sql->fetchAll() as $usuario)
						{
							echo "<tr>";
							echo "<td>".$usuario['id_usuario']."</td>";
							echo "<td>".$usuario['nome']."</td>";
							echo "<td>".$usuario['usuario']."</td>";
							echo "<td>".$usuario['email']."</td>";

							echo "<td>".'<a href="editar.php?id_usuario='.$usuario['id_usuario'].'" class="btn btn-outline-info">Editar</a>  <a href="excluir.php?id_usuario='.$usuario['id_usuario'].'" class="btn btn-outline-danger">Excluir</a>'."</td>";
							echo "</tr>";
						}
					}
				?>
			</tbody>
		</table>
	</div>

	<!-- JQUERY, POPPER, BOOTSTRAP JS -->
	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>