<?php
	include "../../security/seguranca.php";
	include "../../database/conexao.php";

	$sql = "select * from generos";
	$resultado = mysqli_query($conexao, $sql);
	
	$listaGeneros = array();
	while ($gen = mysqli_fetch_assoc($resultado)){
		$listaGeneros[] = $gen;
	}
?>


<html>
	<head>
		<title>Biblioteca</title>
	</head>
	
	<body>
		<h1>Lista de Generos</h1>
	
		<p><a href="formGenero.php?acao=i">Incluir</a> | <a href="../../principal.php">Principal</a></p>
		<table border=1>
			<tr>
				<td>Código</td>
				<td>Nome</td>
				<td colspan=2>Opções</td>
			</tr>
			
			<?php foreach ($listaGeneros as $gen) : ?>
			<tr>
				<td><?php echo $gen['genCodigo']; ?></td>
				<td><?php echo $gen['genNome']; ?></td>
                <td><a href="formGenero.php?acao=a&cod=<?php echo $gen['genCodigo']; ?>">Alterar</a></td>
                <td><a href="formGenero.php?acao=e&cod=<?php echo $gen['genCodigo']; ?>">Excluir</a></td>

			</tr>
			<?php endforeach; ?>
			
		</table>
	
	
	
	</body>
</html>