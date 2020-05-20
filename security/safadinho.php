<?php
	include "../utils/funcoes.php";
	$hoje = dataCompletaExtenso();
?>

<html>

	<head>
		<title>Biblioteca Particular</title>
		<link rel="stylesheet" href="../styles/global.css">
		<link rel="stylesheet" href="../styles/login.css">
	</head>
	
	<body>
		<div class="conteudo">
			<h1>Biblioteca Particular</h1>
			<h3><?php echo $hoje; ?></h3>
			<div class="loginErrorContainer">
				<h3> Safadinho! </h3>
				<p>Querendo entrar sem login hein...</p>
				<a href="../login.php" class="linkReturnLogin"><img src="../styles/images/arrow-left.svg"> Voltar</a>
			</div>
		</div>	
		<video autoplay muted loop id="myVideo">
			<source src="../styles/videos/videoLogin.mp4" type="video/mp4">
		</video>
	</body>
	
</html>