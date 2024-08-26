<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Auto CFC</title>

    <link rel="stylesheet" href="estilos.css">
</head>
<body class="fundo-azul-claro">
    <div class="login">
        <div class="quadro-azul">
            <img class="logo-quadro-azul" src="../img/AutoCFC.svg" alt="Logotipo AutoCFC">
        </div>
        <form action="../control/login.php" method="POST">
            <div class="formulario-login">
                <h1 class="titulo-formulario">ENTRAR</h1>
                <div class="campos-login">
                    <div class="campo-login-1">
                        <p class="titulo-campo">CPF: </p>
                        <input class="input-campo" type="text" placeholder="Digite seu CPF" name="cpf" id="cpf">
                    </div>
                    <div class="campo-login-1">
                        <p class="titulo-campo">Senha: </p>
                        <input class="input-campo" type="password" placeholder="Digite sua senha" name="senha" id="senha">
                    </div>
                </div>
                <button class="botao-enviar" type="submit">Acessar</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_GET["msg"])){
        $mensagem = $_GET["msg"];
        echo "<script>alert('$mensagem');</script>"; // Alerta em JavaScript
    }
?>