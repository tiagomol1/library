<?php
	include "../../security/seguranca.php";
	include "../../database/conexao.php";

	$sql = "select * from livros";
	$resultado = mysqli_query($conexao, $sql);
	
	$listaLivros = array();
	while ($livro = mysqli_fetch_assoc($resultado)){
		$listaLivros[] = $livro;
	}
?>


<html>
	<head>
		<title>Biblioteca</title>
	</head>
	
	<body>
		<h1>Lista de Livros </h1>
	
		<p><a href="formlivro.php?acao=i">Incluir</a> | <a href="../../principal.php">Principal</a></p>
		<table border=1>
			<tr>
				<td>Código</td>
				<td>Título</td>
				<td>Autor</td>
				<td colspan=2>Opções</td>
			</tr>
			
			<?php foreach ($listaLivros as $livro) : ?>
			<tr>
				<td><?php echo $livro['livCodigo']; ?></td>
				<td><?php echo $livro['livTitulo']; ?></td>
				<td><?php echo $livro['livAutor'];  ?></td>
                <td> <a href="formlivro.php?acao=a&cod=<?php echo $livro['livCodigo']; ?>">Alterar</a></td>
                <td> <a href="formlivro.php?acao=e&cod=<?php echo $livro['livCodigo']; ?>">Excluir</a></td>

			</tr>
			<?php endforeach; ?>
			
		</table>
	
	
	
	</body>
</html>