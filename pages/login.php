<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../layout/css/style.css" type="text/css" />
        <link rel="shortcut icon" type="imagem/x-icon" href="#" />
        <script type="text/javascript" src="../script/js/listaLancaEventos.js"></script>
        <title>Biblioteca Particular</title>
    </head>
    <body>
        <div class="corpo">
            <div class="conteudo">
                <img src="../layout/images/icone.png" class="img-login">
                <form action="'../security/entrar.php'" method="post" >
                    <div>
                        <input class="input_login" id="fUsuario" name="fUsuario" type="text" placeholder="Usuário">
                    </div>
                    <div>
                        <input class="input_login" id="fSenha" name="fSenha" type="password" placeholder="Senha">
                    </div>
                    <div>
                        <a><p id="esqueceuSenha">Esqueceu a senha?</p></a>
                    </div>
                    <div style="text-align: center;">
                        <button class="button_login" type="submit">Acessar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="rodape">
            ©Copyright - Tiago Murilo Ochôa da Luz
        </div>
    </body>
</html>
