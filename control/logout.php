<?php
    session_start();
    session_destroy();

    header("Location:../view/tela-login.php?msg=Você saiu do sistema.");
?>