<?php
	include "../../security/seguranca.php";
	include "../../database/conexao.php";
?>

<html>
	<head>
		<title>Biblioteca</title>
		<script type="text/javascript" src="ajax.js"></script>
	</head>
	
	<body>
		<h1>Lista de Emprestimos </h1>
	
		<p><a href="formEmprestimo.php?acao=i">Emprestar Livro</a> | <a href="../../principal.php">Principal</a></p>
		<p><a href="#" onClick="buscarDados(1)">Empréstimos Abertos</a> | <a href="#" onClick="buscarDados(0)">Histórico de Empréstimos</a></p>

		<div id="divResultado">
		</div>
	
	</body>
</html>