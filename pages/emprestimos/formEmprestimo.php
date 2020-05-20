<?php
	include "../../security/seguranca.php";
	include "../../database/conexao.php";
	
	$acao = $_GET['acao'];
	if ($acao == "d" || $acao == "e"){
		$codigo = $_GET['cod'];
		$sql = "select * from emprestimos where empCodigo=".$codigo;
		$readonly = "readonly";
		$selectDisabled = "disabled='disabled'";
		$resultado = mysqli_query($conexao, $sql);
		$emprestimo = mysqli_fetch_array($resultado);
	}else{// a ação é "i"
		$emprestimo = array();
		$emprestimo['empCodigo']  = null;
		$emprestimo['empDataEmp']  = "";
		$emprestimo['livCodigo']   = 0;
		$emprestimo['amiCodigo'] = 0;
		$emprestimo['empDataDev'] = 0;
		$readonly = "";
		$selectDisabled = "";
	}
	
	
	if ($acao == "i"){
		$titulo = "Emprestar um livro";
		$etiqueta = "Emprestar";
		$status = "";
		$msgConfirma = "Confirma emprestimo?";
	}else if ($acao == "d"){
			$titulo = "Devolver um livro";
			$etiqueta = "Devolver";
			$status = "";
			$msgConfirma = "Confirma devolução?";
		}else if ($acao == "e"){
				$titulo = "Excluir um Emprestimo";
				$etiqueta = "Excluir";
				$status = "";
				$msgConfirma = "Confirma exclusão?";
			}else{
					$titulo = "Erro";
				}
	
	
	
	// recupera a lista de livros
	$sql_livro = "select * from livros order by livTitulo";
	$resultado_livros = mysqli_query($conexao, $sql_livro);
	
	// recupera a lista de amigos
	$sql_amigos = "select * from amigos order by amiNome";
	$resultado_amigos = mysqli_query($conexao, $sql_amigos);
?>
<html>
	<head>
		<title>Emprestimo de Livros</title>
		
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
		<h1>Emprestimo de Livros</h1>
		<h2><?php echo $titulo ?></h2>
		
		
		<form action="acaoEmprestimo.php" method="POST">
			
			<input type="hidden" name="cAcao" id="cAcao" value="<?php echo $acao; ?>">
			
			<table border=0>
			
				<tr>
					<td>Código</td>
					<td><input readonly type="text" name="cCodigo" id="cCodigo" value="<?php echo $emprestimo['empCodigo']; ?>" size="4"></td>
				</tr>
			
				<tr>
					<td>Data do Emprestimo</td>
					<td><input <?php echo $status; ?> type="text" name="cDataEmp" id="cDataEmp" value="<?php echo $emprestimo['empDataEmp']; ?>" size="20" <?php echo $readonly; ?>></td>
				</tr>

				<tr>
					<td>Livro</td>
					<td>
						<select name="cCodLivro" id="cCodLivro" <?php echo $status; ?> <?php echo $selectDisabled ?>>
						
							<?php foreach( $resultado_livros as $livro) { ?>
								<option value="<?php echo $livro['livCodigo']; ?>" <?php if ($emprestimo['livCodigo'] == $livro['livCodigo']) echo "selected"; ?>> 
									<?php echo $livro['livTitulo']; ?>
								</option>
							<?php } ?>
							
						</select>
					</td>
				<tr>
				
			
				<tr>
					<td>Amigo</td>
					<td>
						<select name="cCodAmigo" id="cCodAmigo" <?php echo $status; ?> <?php echo $selectDisabled ?>>
						
							<?php foreach( $resultado_amigos as $amigo) { ?>
								<option value="<?php echo $amigo['amiCodigo']; ?>" <?php if ($emprestimo['amiCodigo'] == $amigo['amiCodigo']) echo "selected"; ?>> 
									<?php echo $amigo['amiNome']; ?>
								</option>
							<?php } ?>
							
						</select>
					</td>
				</tr>
				
				<?php if($acao == 'd' || $acao=='e'){ ?>
					<tr>
						<td>Data da Devolução</td>
						<td><input type="text" name="cDataDev" id="cDataDev" value="<?php echo $emprestimo['empDataDev']; ?>"></td>
					</tr>
				<?php }?>

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