<?php

    include "../security/conexao.php";
    include "../security/seguranca.php";

    $acaoLiv = $_GET['acao'];

    $titulo = "";
    $autor = "";
    $qtdPaginas = 0;

    if($acaoLiv != 'i'){

        $idLiv = $_GET['id'];
        $sql = "select * from livros where livCodigo=".$idLiv."";
        $resultado = mysqli_query($conexao, $sql);

        if($livro = mysqli_fetch_assoc($resultado)){
            $titulo = $livro['livTitulo'];
            $autor = $livro['livAutor'];
            $qtdPaginas = $livro['livPagina'];
        }
    }
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="layout/css/style.css" type="text/css" />
        <link rel="shortcut icon" type="imagem/x-icon" href="#" />
        <script type="text/javascript" src="../script/js/listaLancaEventos.js"></script>
        <title>Biblioteca Particular</title>
    </head>
    <body>
        <h1>Biblioteca Particular</h1>
        <h2>Lista de Livros</h2>

        <form action="insereLivro.php" method="post">
            <table border="1">
                <tbody>
                    <tr>
                        <td> Titulo </td>
                        <td> <input type="text" name="titulo" value="<?php echo $titulo; ?>"> </td>
                    </tr>
                    <tr>
                        <td>Autor</td>
                        <td> <input type="text" name="autor" value="<?php echo $autor; ?>"> </td>
                    </tr>
                    <tr>
                        <td>Qtd. Paginas</td>
                        <td> <input type="text" name="qtdpaginas" value="<?php echo $qtdPaginas; ?>">  </td>
                    </tr>
                    <tr>
                        <td> <button type="submit" name="button">Inserir</button> </td>
                        <td> <a href="listaLivro.php"> <button type="button" name="button">Cancelar</button> </a> </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
