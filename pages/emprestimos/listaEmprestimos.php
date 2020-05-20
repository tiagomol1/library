<?php
	include "../../security/seguranca.php";
	include "../../database/conexao.php";

	$sql = "select * from emprestimos e, livros l, amigos a 
			where e.livCodigo = l.livCodigo and
				  e.amiCodigo = a.amiCodigo and
				  e.empDataDev = ''
			order by e.empDataEmp
			";
	$resultado = mysqli_query($conexao, $sql);
	
	$listaEmprestimos = array();
	while ($emprestimo = mysqli_fetch_assoc($resultado)){
		$listaEmprestimos[] = $emprestimo;
	}
?>


<html>
	<head>
		<title>Biblioteca</title>
	</head>
	
	<body>
		<h1>Lista de Emprestimos </h1>
	
		<p><a href="formEmprestimo.php?acao=i">Emprestar Livro</a> | <a href="../../principal.php">Principal</a></p>
		<table border=1>
			<tr>
				<td>Data do Emprestimo</td>
				<td>Livro Emprestado</td>
				<td>Para Quem</td>
				<td colspan=2>Opções</td>
			</tr>
			
			<?php foreach ($listaEmprestimos as $emprestimo) : ?>
			<tr>
				<td><?php echo $emprestimo['empDataEmp']; ?></td>
				<td><?php echo $emprestimo['livTitulo']; ?></td>
				<td><?php echo $emprestimo['amiNome'];  ?></td>
				<td> <a href="formEmprestimo.php?acao=d&cod=<?php echo $emprestimo['empCodigo']; ?>">Devolver</a></td>
				<td> <a href="formEmprestimo.php?acao=e&cod=<?php echo $emprestimo['empCodigo']; ?>">Excluir</a></td>

			</tr>
			<?php endforeach; ?>
			
		</table>
	
	
	
	</body>
</html>