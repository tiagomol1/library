<?php
	include "../../security/seguranca.php";
	include "../../database/conexao.php";

	$tipoLista = $_GET['lista'];

	if($tipoLista == 1){
		$titulo = "Lista de Empréstimos Abertos";
		$sql = "select * from emprestimos e, livros l, amigos a 
				where e.livCodigo = l.livCodigo and
						e.amiCodigo = a.amiCodigo and
						e.empDataDev = ''
				order by e.empDataEmp
				";
	}else if($tipoLista == 0){
		$titulo = "Histórico de Empréstimos";
		$sql = "select * from emprestimos e, livros l, amigos a 
		where e.livCodigo = l.livCodigo and
				e.amiCodigo = a.amiCodigo and
				e.empDataDev != ''
		order by e.empDataEmp
		";
	}
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
	
		<p><a href="formEmprestimo.php?acao=i">Emprestar Livro</a> 
		| <a href="../../principal.php">Principal</a></p>
		<p><a href="listaEmprestimos.php?lista=1">Empréstimos Abertos</a> 
		| <a href="listaEmprestimos.php?lista=0">Histórico de Empréstimos</a></p>
	
		<h2><?php echo $titulo ?></h2>
		<table border=1>
			<tr>
				<td>Data do Emprestimo</td>
				<?php if($tipoLista == 0){?>

					<td>Data de Devolução</td>

				<?php } ?>
				<td>Livro Emprestado</td>
				<td>Para Quem</td>	
				<?php if($tipoLista == 1){ ?>
					<td colspan=2>Opções</td>
				<?php }?>
			</tr>
			
			<?php foreach ($listaEmprestimos as $emprestimo) : ?>

				<tr>
					<td><?php echo $emprestimo['empDataEmp']; ?></td>
					
					<?php if($tipoLista == 0){?>

						<td><?php echo $emprestimo['empDataDev']; ?></td>
					
					<?php } ?>

					<td><?php echo $emprestimo['livTitulo']; ?></td>
					<td><?php echo $emprestimo['amiNome'];  ?></td>
					
					<?php if($tipoLista == 1){ ?>
						<td> <a href="formEmprestimo.php?acao=d&cod=<?php echo $emprestimo['empCodigo']; ?>">Devolver</a></td>
						<td> <a href="formEmprestimo.php?acao=e&cod=<?php echo $emprestimo['empCodigo']; ?>">Excluir</a></td>
					<?php }?>

				</tr>

			<?php endforeach; ?>
			
		</table>
	
	
	
	</body>
</html>