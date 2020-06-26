<?php
	include "../../security/seguranca.php";
	include "../../database/conexao.php";
	
	$acao = $_GET['acao'];
	

	if ($acao != "i"){
		$codigo = $_GET['cod'];
		$sql = "select * from amigos where amiCodigo=".$codigo;
	
		$resultado = mysqli_query($conexao, $sql);
		$ami = mysqli_fetch_array($resultado);
	}else{
		$ami = array();
		$ami['amiCodigo']  = null;
		$ami['amiNome']  = "";
		$ami['amiEmail']  = "";
		$ami['amiTelefone']  = "";
	}
	
	
	if ($acao == "i"){
		$titulo = "Inclusão de amigo";
		$etiqueta = "Incluir amigo";
		$status = "";
		$msgConfirma = "Confirma Inclusão?";
	}else if ($acao == "a"){
			$titulo = "Alteração de amigo";
			$etiqueta = "Alterar amigo";
			$status = "";
			$msgConfirma = "Confirma Alteração?";
		}else if ($acao == "e"){
				$titulo = "Exclusão de amigo";
				$etiqueta = "Excluir amigo";
				$status = "readonly";
				$msgConfirma = "Confirma Exclusão?";
			}else{
					$titulo = "Erro";
			}
	
	
?>
<html>
	<head>
		<title>CRUD de amigos</title>
		
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
		<h1>CRUD de amigos</h1>
		<h2><?php echo $titulo ?></h2>
		
		
		<form action="acaoAmigo.php" method="POST">
			
			<input type="hidden" name="cAcao" id="cAcao" value="<?php echo $acao; ?>">
			
			<table border=0>
			
				<tr>
					<td>Código</td>
					<td><input readonly type="text" name="cCodigo" id="cCodigo" value="<?php echo $ami['amiCodigo']; ?>" size="4"></td>
				</tr>
			
				<tr>
					<td>Nome</td>
					<td><input <?php echo $status; ?> type="text" name="cNome" id="cNome" value="<?php echo $ami['amiNome']; ?>" size="50"></td>
				</tr>
			
				<tr>
					<td>Email</td>
					<td><input <?php echo $status; ?> type="text" name="cEmail" id="cEmail" value="<?php echo $ami['amiEmail']; ?>" size="50"></td>
				</tr>
			
				<tr>
					<td>Telefone</td>
					<td><input <?php echo $status; ?> type="text" name="cTelefone" id="cTelefone" value="<?php echo $ami['amiTelefone']; ?>" size="25"></td>
				</tr>
			
				<tr>
					<td><input type="submit" value="<?php echo $etiqueta; ?>" onclick="return confirma();" id='btnAcao'></td>
					
					<td><input type="button" value="Voltar" onclick="history.go(-1);"> 
					    <input type="reset" value="Recarregar">
					</td>
				</tr>
			
			</table>
		</form>
		
		
		
	</body>
</html>