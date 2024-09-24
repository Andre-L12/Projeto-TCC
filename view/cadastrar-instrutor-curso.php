<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vincular Instrutor a Curso</title>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <link rel="stylesheet" href="./navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script> -->

</head>

<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <?php
        require_once "navbar-chamar.php";
        $navbar = chamarNavbar();
        echo $navbar;
        ?>

        <div class="layout">
            <header>
                <div>
                    <span class="header-icon">
                        <i class="bi bi-person-lines-fill"></i>
                    </span>
                    <span class="header-title">INSTRUTORES</span>
                </div>
            </header>
            <main class="content">
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                </div>
                <!-- Form Cadastrar Instrutor -->
                <div class="form-container">
                    <h2 class="form-titulo">Vincular Instrutor a Curso</h2>
                    <form action="../control/cadastrarInstrutorCurso.php" method="POST"
                        name="formCadastroInstrutorCurso">
                        <!-- Selecionar Instrutor -->
                        <div class="form-campo">
                            <label for="instrutor" class="form-subtitulo">Instrutor: </label>
                            <select name="instrutor" id="instrutor" class="form-input">
                                <?php
                                require_once "../model/funcoesBD.php";
                                $options = comboBoxInstrutor();
                                echo $options;
                                ?>
                            </select>
                        </div>

                        <!-- Selecionar Curso -->
                        <div class="form-campo">
                            <label for="curso" class="form-subtitulo">Atua no curso:</label>
                            <select name="curso" id="curso" class="form-input">
                                <?php
                                require_once "../model/funcoesBD.php";
                                $options = comboBoxCurso();
                                echo $options;
                                ?>
                            </select>
                        </div>

                        <!-- Checkbox Dias da semana-->
                        <div class="form-campo">
                            <label class="form-subtitulo">Dias da semana que atua nesse curso:</label>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="segunda" name="segunda" value="seg">
                                <label for="segunda">Segunda-feira</label>
                            </div>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="terca" name="terca" value="ter">
                                <label for="terca">Terça-feira</label>
                            </div>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="quarta" name="quarta" value="qua">
                                <label for="quarta">Quarta-feira</label>
                            </div>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="quinta" name="quinta" value="qui">
                                <label for="quinta">Quinta-feira</label>
                            </div>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="sexta" name="sexta" value="sex">
                                <label for="sexta">Sexta-feira</label>
                            </div>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="sabado" name="sabado" value="sab">
                                <label for="sabado">Sábado</label>
                            </div>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="domingo" name="domingo" value="dom">
                                <label for="domingo">Domingo</label>
                            </div>

                        </div>

                        <!-- Selecionar Veículo -->
                        <div class="form-campo">
                            <label for="veiculo" class="form-subtitulo">Veículo utilizado:</label>
                            <select name="veiculo" id="opcoesVeiculo" class="form-input">
                                <?php
                                require_once "../model/funcoesBD.php";
                                $options = comboBoxVeiculo();
                                echo $options;
                                ?>
                            </select>
                        </div>

                        <div class="form-div-btn">
                            <button type="submit" name="btnCadastrar" value="Cadastrar"
                                class="form-btn">Cadastrar</button>
                        </div>

                        <?php
                        // Exibir a mensagem header
                        if (isset($_GET["msg"])) {  // Verifica se tem mensagem
                            $mensagem = $_GET["msg"];
                            echo "<FONT color=red>$mensagem</FONT>";
                        }
                        ?>

                    </form>
                </div>
            </main>
            <div class="overlay"></div>
        </div>
    </div>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>