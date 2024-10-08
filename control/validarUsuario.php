<?php
    session_start();
    if(isset($_SESSION["nome"])){
        $nome= $_SESSION["nome"];
        $tipo=$_SESSION["tipo"];
        if(isset($_SESSION["matricula"])){
            $id=$_SESSION["matricula"];
        }
        elseif(isset($_SESSION["id_aluno"])){
            $id=$_SESSION["id_aluno"];
        }
    }
    else{
        header("Location:tela-login.php?msg= Você não está logado!");
    }
    $session_timeout = 1800; // 30 minutos

    if (isset($_SESSION['LAST_ACTIVITY'])) {
        if (time() - $_SESSION['LAST_ACTIVITY'] > $session_timeout) {
            // Última atividade foi há mais do que 30 minutos
            session_unset();
            session_destroy();
            header("Location: tela-login.php?msg= sua sessão terminou!");
            exit();
        }
    }

    $_SESSION['LAST_ACTIVITY'] = time(); // atualiza o timestamp
?>