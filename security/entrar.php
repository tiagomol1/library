<?php
    include "seguranca.php";
    include "conexao.php";

    $usuario = $_POST["fUsuario"];
    $senha = $_POST["fSenha"];

    $sql = "SELECT * FROM usuarios WHERE usuLogin = '".$usuario."' AND usuSenha = '".$senha."'";
    $resultado = mysqli_query($conexao, $sql);

    $qtdLinha = mysqli_num_rows($resultado);

    if($qtdLinha == 1){
        $usuario = mysqli_fetch_array($resultado);
        session_start();
        $_SESSION['usuario'] = $usuario['usuLogin'];
        header("Location:  ../pages/listaLivro.php");
    }else{
        header("Location:  ../pages/errologin.php");
    }
?>
