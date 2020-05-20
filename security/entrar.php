<?php
	session_start();

	include "../utils/funcoes.php";
	$hoje = dataCompletaExtenso();
	
	include "../database/conexao.php";
	
	$sqlBusca = "select * from usuarios where usuLogin='".$_POST['fUsuario']."' and usuSenha='".$_POST['fSenha']."'";
	$resultado = mysqli_query($conexao, $sqlBusca);
	$qtdLinhas = mysqli_num_rows($resultado);
	
	if ($qtdLinhas>0){
		$tbUsuarios = mysqli_fetch_array($resultado);
		$_SESSION['usu']=$tbUsuarios['usuCodigo'];
		
		header("Location: ../principal.php"); 
	}else{
		$mensagem = "Usuário inexistente ou senha incorreta!";
	}
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
				<h3> Erro! </h3>
				<p><?php echo $mensagem; ?></p>
				<a href="../login.php" class="linkReturnLogin"><img src="../styles/images/arrow-left.svg"> Voltar</a>
			</div>
		</div>	
		<video autoplay muted loop id="myVideo">
			<source src="../styles/videos/videoLogin.mp4" type="video/mp4">
		</video>
	</body>
</html>