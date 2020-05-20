<?php
	include "../../security/seguranca.php";
	include "../../database/conexao.php";

	$sql = "select * from amigos order by aminome";
	$resultado = mysqli_query($conexao, $sql);
	
	$listaAmigos = array();
	while ($ami = mysqli_fetch_assoc($resultado)){
		$listaAmigos[] = $ami;
	}
?>


<html>
	<head>
		<title>Biblioteca</title>
	</head>
	
	<body>
		<h1>Lista de Amigos</h1>
	
		<p><a href="formAmigo.php?acao=i">Incluir</a> | <a href="../../principal.php">Principal</a></p>
		<table border=1>
			<tr>
				<td>Código</td>
				<td>Nome</td>
				<td>Email</td>
				<td>Telefone</td>
				<td colspan=2>Opções</td>
			</tr>
			
			<?php foreach ($listaAmigos as $ami) : ?>
			<tr>
				<td><?php echo $ami['amiCodigo']; ?></td>
				<td><?php echo $ami['amiNome']; ?></td>
				<td><?php echo $ami['amiEmail']; ?></td>
				<td><?php echo $ami['amiTelefone']; ?></td>
                <td><a href="formAmigo.php?acao=a&cod=<?php echo $ami['amiCodigo']; ?>">Alterar</a></td>
                <td><a href="formAmigo.php?acao=e&cod=<?php echo $ami['amiCodigo']; ?>">Excluir</a></td>

			</tr>
			<?php endforeach; ?>
			
		</table>
	
	
	
	</body>
</html>