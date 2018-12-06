<?php
	// ob_start();
	// session_start();
	// unset($_SESSION['logado']);
	// header("Location: index.php");
	// exit();
	// ob_flush();
?>

<html>
    <head>
        <meta http-equiv="refresh" content="1;URL='index.php'">
    </head>
    <body>
        <center>
		<?php
			session_start();
			session_destroy();
		?>
		<br><br><h3><i>Aguarde...</i></h3>
		</center>
    </body>
</html>