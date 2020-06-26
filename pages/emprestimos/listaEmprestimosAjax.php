<?php
	include "../../security/seguranca.php";
	include "../../database/conexao.php";

	$tipoLista = $_GET['lista'];

	if ($tipoLista == 1){
		$sql = "select * from emprestimos e, livros l, amigos a
	        where e.livCodigo = l.livCodigo and 
			      e.amiCodigo = a.amiCodigo and
				  e.empDataDev = ''
			order by e.empDataEmp";
		$tit = "Livros Emprestados";
	}else if ($tipoLista == 0){
		$sql = "select * from emprestimos e, livros l, amigos a
	        where e.livCodigo = l.livCodigo and 
			      e.amiCodigo = a.amiCodigo and
				  e.empDataDev != ''
			order by e.empDataEmp";
		$tit = "Histórico de Emprestimos";
	}
	$resultado = mysqli_query($conexao, $sql);
	
	$listaEmprestimos = array();
	while ($emprestimo = mysqli_fetch_assoc($resultado)){
		$listaEmprestimos[] = $emprestimo;
	}
?>

		<h2><?php echo $tit; ?></h2>
		<table border=1>
			<tr>
				<td>Data do Emprestimo</td>
				
				<?php if ($tipoLista == 0) { ?>
				<td>Data da Devolucao</td>
				<?php } ?>
				
				<td>Livro emprestado</td>
				<td>Para quem</td>
			</tr>
			
			<?php foreach ($listaEmprestimos as $emprestimo) : ?>
			<tr>
				<td><?php echo $emprestimo['empDataEmp']; ?></td>
				
				<?php if ($tipoLista == 0) { ?>
				<td><?php echo $emprestimo['empDataDev']; ?></td>
				<?php } ?>
				
				<td><?php echo $emprestimo['livTitulo']; ?></td>
				<td><?php echo $emprestimo['amiNome'];  ?></td>
				<td> <a href="formEmprestimo.php?acao=d&cod=<?php echo $emprestimo['empCodigo']; ?>">Devolver</a></td>
				<td> <a href="formEmprestimo.php?acao=e&cod=<?php echo $emprestimo['empCodigo']; ?>">Excluir</a></td>

			</tr>
			<?php endforeach; ?>
			
		</table>
