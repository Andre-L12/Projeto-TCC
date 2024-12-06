<!-- Toda página que puxar Navbar terá que ter essa base -->
<?php
require_once "../control/validarUsuario.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>
    <link rel="stylesheet" href="./navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    <link rel="icon" href="../img/AutoCFCicon.png" type="image/x-icon">

</head>
<style>
    .modal {
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        display: none;
        /* Inicialmente escondido */
    }

    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 400px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-btn {
        padding: 10px 20px;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .form-btn:hover {
        background-color: #184E8C;
    }
</style>

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
                <div style="display: flex; align-items: center; justify-content: center; flex-direction: column; background-color: #f7f7f7; padding: 20px; border-radius: 15px; margin: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <img src="../img/AutoCFCicon.png" alt="Logo Auto CFC" style="width: 150px; height: auto; margin-bottom: 15px;">
                    <h1 style="font-family: 'Poppins', sans-serif; color: #216EC0; margin: 0;">Boas-vindas ao Sistema da Auto CFC!</h1>
                    <p style="font-family: 'Poppins', sans-serif; color: #555; text-align: center; max-width: 400px; margin-top: 10px;">
                        Estamos felizes em ter você aqui. Utilize o menu ao lado para navegar pelo sistema. Caso precise de ajuda, clique em "Adicionar Aviso" para registrar sua solicitação.
                    </p>
                </div>
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                </div>
                <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 15px; padding: 20px; background-color: #f7f9fc; border: 1px solid #dfe6ed; border-radius: 10px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                    <button type="button" id="btnAlterar" name="btnAlterar" class="form-btn"
                        style="flex: 1; min-width: 100px; padding: 10px; font-size: 16px; background-color: #216EC0; color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
                        Adicionar Aviso
                    </button>
                    <form method="post" action="../control/excluirAviso.php" style="display: flex; flex: 2; flex-wrap: wrap; gap: 10px; justify-content: space-between;">
                        <select name="id" id="combo-box" required
                            style="flex: 1; min-width: 100px; padding: 8px; font-size: 14px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer;">
                            <?php
                            require_once "../model/funcoesBD.php";
                            echo comboBoxAvisos();
                            ?>
                        </select>
                        <button type="submit"
                            style="flex: 1; min-width: 100px; padding: 10px; font-size: 16px; background-color: #e74c3c; color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
                            Excluir Aviso
                        </button>
                    </form>
                </div>

            </main>
            <div class="overlay"></div>
            <!-- Modal para adicionar aviso -->
            <div id="modalAviso" class="modal" style="display:none;">
                <div class="modal-content" style="border-radius: 15px" ;>
                    <span id="closeModal" class="close">&times;</span>
                    <h2>Adicionar Aviso</h2>
                    <form id="formAviso" method="post" nome="formAviso" action="../control/cadastrarAviso.php">
                        <label for="avisoTexto">Título:</label>
                        <input type="text" id="tituloAviso" name="tituloAviso" required>
                        <label for="avisoTexto">Aviso:</label>
                        <input type="text" id="avisoTexto" name="avisoTexto" required style="height: 100px;">
                        <button type="submit" class="form-btn" style="background-color: #216EC0; border-color:#216EC0;">Salvar Aviso</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script>
        // Get modal and buttons
        var modal = document.getElementById("modalAviso");
        var btnAlterar = document.getElementById("btnAlterar"); // Corrigido para o ID correto
        var span = document.getElementById("closeModal");

        // When the user clicks the button, open the modal
        btnAlterar.onclick = function() { // Corrigido para usar btnAlterar
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
<?php
if (isset($_GET["msg"])) {
    $mensagem = $_GET["msg"];
    echo "<script>alert('$mensagem');</script>"; // Alerta em JavaScript
}
?>