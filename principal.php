<?php
	include "security/seguranca.php";
	include "database/conexao.php";
?>


<html>
	<head>
		<title>Biblioteca</title>
	</head>
	
	<body>
		<h1>Principal</h1>

		<p><a href="pages/emprestimos/listaEmprestimos.php?lista=1">Emprestimos</a></p>
	
		<p><a href="pages/amigos/listaAmigos.php" id='amigos'>Amigos</a></p>
		
		<p><a href="pages/generos/listaGeneros.php">Generos</a></p>
		
		<p><a href="pages/livros/listaLivros.php">Livros</a></p>
	
	</body>
</html>