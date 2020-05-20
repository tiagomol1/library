<?php
	include "../../security/seguranca.php";
	include "../../database/conexao.php";
	
	$acao = $_GET['acao'];
	
	if ($acao == "d" || $acao == "e"){
		//comando para devolver ou excluir
	}else{ // a ação é "i"
		$livro = array();
		$livro['livCodigo']  = null;
		$livro['livTitulo']  = "";
		$livro['livAutor']   = "";
		$livro['livPaginas'] = 0;
		$livro['genCodigo']  = 0;
	}
	
	
	if ($acao == "i"){
		$titulo = "Inclusão de Livro";
		$etiqueta = "Incluir Livro";
		$status = "";
		$msgConfirma = "Confirma Inclusão?";
	}else if ($acao == "a"){
			$titulo = "Alteração de Livro";
			$etiqueta = "Alterar Livro";
			$status = "";
			$msgConfirma = "Confirma Alteração?";
		}else if ($acao == "e"){
				$titulo = "Exclusão de Livro";
				$etiqueta = "Excluir Livro";
				$status = "readonly";
				$msgConfirma = "Confirma Exclusão?";
			}else{
				$titulo = "Erro";
			}
	
	// recupera a lista de generos
	$sql2 = "select * from generos";
	$resultado2 = mysqli_query($conexao, $sql2);
	
?>
<html>
	<head>
		<title>CRUD de Livros</title>
		
		<script type="text/javascript">
		
			function confirma(){
				if (  confirm("<?php echo $msgConfirma; ?>")  ){
					return true;
				}else{
					return false;
				}
			}
		
		</script>

	</head>
	
	<body>
		<h1>CRUD de Livros</h1>
		<h2><?php echo $titulo ?></h2>

		<form action="acaoLivro.php" method="POST">
			
			<input type="hidden" name="cAcao" id="cAcao" value="<?php echo $acao; ?>">
			
			<table border=0>

				<tr>
					<td>Código</td>
					<td><input readonly type="text" name="cCodigo" id="cCodigo" value="<?php echo $livro['livCodigo']; ?>" size="4"></td>
				</tr>
			
				<tr>
					<td>Título</td>
					<td><input <?php echo $status; ?> type="text" name="cTitulo" id="cTitulo" value="<?php echo $livro['livTitulo']; ?>" size="50"></td>
				</tr>
			
				<tr>
					<td>Autor</td>
					<td><input <?php echo $status; ?> type="text" name="cAutor" id="cAutor" value="<?php echo $livro['livAutor']; ?>" size="50"></td>
				</tr>
			
				<tr>
					<td>Páginas</td>
					<td><input <?php echo $status; ?> type="text" name="cPaginas" id="cPaginas" value="<?php echo $livro['livPaginas']; ?>" size="4"></td>
				</tr>
				
				<tr>
					<td>Genero</td>
					<td>
						<select name="cGenero" id="cGenero" <?php echo $status; ?>>
						
							<?php foreach( $resultado2 as $genero) { ?>
								<option value="<?php echo $genero['genCodigo']; ?>" <?php if ($livro['genCodigo'] == $genero['genCodigo']) echo "selected"; ?>> 
									<?php echo $genero['genNome']; ?>
								</option>
							<?php } ?>
							
						</select>
					</td>
				</tr>
				
				<tr>
					<td><input type="submit" value="<?php echo $etiqueta; ?>" onclick="return confirma();"></td>
					
					<td><input type="button" value="Voltar" onclick="history.go(-1);"> 
					    <input type="reset" value="Recarregar">
					</td>
				</tr>
			
			</table>
		</form>
		
	</body>
</html>