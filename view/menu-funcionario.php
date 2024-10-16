<!-- Toda página que puxar Navbar terá que ter essa base -->
<?php
    require_once "../control/validarUsuario.php";
 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>
    <link rel="stylesheet" href="./navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

</head>
<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <?php
        require_once "navbar.php";
        ?>

        <div class="layout">
        <header>
            <div>
                <span class="header-icon">
                    <i class="bi bi-grid-fill"></i>
                </span>
                <span class="header-title">MENU</span>
            </div>
        </header>
            <main class="content">
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                </div>
                <div style="display: flex; flex-direction: row; justify-content: space-between; padding: 20px; background-color: #ffffff;">

                <div class="col-sm-2" style="display:flex;flex-direction:column;align-content:flex-start" ><br>
                        <button type="button" id="btnAlterar" name="btnAlterar" value="Alterar" class="form-btn" style="background-color: #216EC0; border-color:#216EC0; margin-bottom: 15px;">Adicionar aviso</button>
                        <button type="button" id="btnExcluir" name="btnExcluir" value="Excluir" class="form-btn" style="background-color: #216EC0; border-color:#216EC0;">Excluir aviso</button>
                    </div>
                    </div>
            </main>
            <div class="overlay"></div>
        </div>
    </div>

        <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
</body>

</html>