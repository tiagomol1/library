<?php
	include "utils/funcoes.php";
   
	$hoje = dataCompletaExtenso();
?>
<html lang="pt">
	<head>
		<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>
		<title>Biblioteca Particular</title>
		<link rel="stylesheet" href="styles/global.css">
		<link rel="stylesheet" href="styles/login.css">
	</head>
	
	<body>
		<div class="conteudo">
			<h1>Biblioteca Particular</h1>
			<h3><?php echo $hoje; ?></h3>
			<div class="loginContainer">
				<form action="security/entrar.php" method="post" onSubmit="return preencherCampo()" >
					<img src="styles/images/book.png" width="70px">
					<br>
					<br>
					<div class="inputs_login">
						<input type="text" id="fUsuario" name="fUsuario" placeholder="Usuário"><br><br>
						<input type="password" id="fSenha" name="fSenha" placeholder="Senha"><br><br>
					</div>
					<button type="submit" id="btnEntrar">Entrar</button>
				</form>	
			</div>
		</div>	
		<video autoplay muted loop id="myVideo">
			<source src="styles/videos/videoLogin.mp4" type="video/mp4">
		</video>
		<script>
			function preencherCampo(){
				if(document.getElementById('fUsuario').value == ""){
					alert("Você não preencheu o campo 'Usuário'");
					return false;
				}else if(document.getElementById('fSenha').value == ""){
						alert("Você não preencheu o campo 'Senha'");
						return false;
					}
				return true;
			}
		</script>
	</body>
</html>

