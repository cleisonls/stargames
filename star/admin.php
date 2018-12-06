

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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/index1.css" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="icon" href="assets/img/star.png"/>
	<title>StarGames</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg" style="background-color:#1C1C1C;height: 105px;">
			<div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/starlogo.png" width="80" height="80" alt="">
                  </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
				<span class="navbar-toggler-icon" style="color:white;"><i class="fas fa-bars"></i></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <div class="nov2">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">STAR <span class="sr-only">(current)</span></a>
                            </li>
                        </div>
                    </ul>
                    
				
					<div class="form-inline my-2 my-lg-0">
						<ul class="navbar-nav mr-auto nov4">
                            <div class="nov4 row">
                            <?php
                                if (!empty($_SESSION['logado']))
                                {
                                    ?>
                                    <li class="nav-item" id="usuario">
                                        <?php echo "Olá, " . $nome . "!"."&nbsp;"."&nbsp;"; ?>
                                    </li>
                                    <li id="separador">|</li>
							        <li>
                                        <a href="logout.php">Sair</a>
                                    </li>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                        <!-- <div class="col-md-5 col-lg-3" id="line">
                                            <a href="login.php">Login</a>
                                            <span id="separador">|</span>
                                            <a href="cadastro.php">Cadastre-se</a>
                                        </div> -->
                                    
                                    <li>
                                        <a href="cadastro.php" class="nav-link"><li class="nav-item">Cadastre-se</a>
                                    </li>
                                    <li id="separador">|</li>
                                    <li class="nav-item">
                                        <a href="login.php" class="nav-link"><li class="nav-item">Login</li></a>
                                    </li>
                                    <?php
                                }
                            ?>          
                            </div>    
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<hr><br>

		<a href='cadastro.php' class="btn btn-info">Adicionar novo usuário</a><br><br>

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