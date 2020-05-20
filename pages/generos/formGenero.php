<?php
	include "../../security/seguranca.php";
	include "../../database/conexao.php";
	
	$acao = $_GET['acao'];
	

	if ($acao != "i"){
		$codigo = $_GET['cod'];
		$sql = "select * from generos where genCodigo=".$codigo;
		$resultado = mysqli_query($conexao, $sql);
		$gen = mysqli_fetch_array($resultado);
	}else{
		$gen = array();
		$gen['genCodigo']  = null;
		$gen['genNome']  = "";
	}
	
	
	if ($acao == "i"){
		$titulo = "Inclusão de genero";
		$etiqueta = "Incluir genero";
		$status = "";
		$msgConfirma = "Confirma Inclusão?";
	}else if ($acao == "a"){
			$titulo = "Alteração de genero";
			$etiqueta = "Alterar genero";
			$status = "";
			$msgConfirma = "Confirma Alteração?";
		}else if ($acao == "e"){
				$titulo = "Exclusão de genero";
				$etiqueta = "Excluir genero";
				$status = "readonly";
				$msgConfirma = "Confirma Exclusão?";
			}else{
					$titulo = "Erro";
				}
	
	
?>
<html>
	<head>
		<title>CRUD de Generos</title>
		
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
		<h1>CRUD de Generos</h1>
		<h2><?php echo $titulo ?></h2>
		
		
		<form action="acaoGenero.php" method="POST">
			
			<input type="hidden" name="cAcao" id="cAcao" value="<?php echo $acao; ?>">
			
			<table border=0>
			
				<tr>
					<td>Código</td>
					<td><input readonly type="text" name="cCodigo" id="cCodigo" value="<?php echo $gen['genCodigo']; ?>" size="4"></td>
				</tr>
			
				<tr>
					<td>Nome</td>
					<td><input <?php echo $status; ?> type="text" name="cNome" id="cNome" value="<?php echo $gen['genNome']; ?>" size="50"></td>
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