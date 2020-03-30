<?php

    include "../security/conexao.php";
    include "../security/seguranca.php";

    $sql = "select * from livros";
    $resultado = mysqli_query($conexao, $sql);

    $listaLivros = array();
    while($livro = mysqli_fetch_assoc($resultado)){
        $listaLivros[] = $livro;
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

        <a href="formLivro.php?acao=i">incluir</a>
        <table border="1">
            <thead>
                <tr>
                    <td>Código</td>
                    <td>Titulo</td>
                    <td>Autor</td>
                    <td>Qtd. Paginas</td>
                    <td colspan="2">Opções</td>
                </tr>
            </thead>
            <tbody>

            <?php
            foreach ($listaLivros as $livro) {
            ?>

                <tr>
                    <td> <?php echo $livro['livCodigo']; ?> </td>
                    <td> <?php echo $livro['livTitulo']; ?> </td>
                    <td> <?php echo $livro['livAutor'];  ?> </td>
                    <td> <?php echo $livro['livPagina']; ?> </td>
                    <td> <a href="formLivro.php?acao=a&id=<?php echo $livro['livCodigo']; ?>">Alterar</a> </td>
                    <td> <a href="formLivro.php?acao=e&id=<?php echo $livro['livCodigo']; ?>">Excluir</a> </td>
                </tr>

            <?php
            }
            ?>

            </tbody>
        </table>
    </body>
</html>
