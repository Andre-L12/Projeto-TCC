<?php
    require_once "../control/validarUsuario.php";
 ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Instrutor</title>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <!-- <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'> -->
    <link rel="stylesheet" href="./navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <link rel="icon" href="../img/AutoCFCicon.png" type="image/x-icon">

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

                <?php
                if (isset($_GET['id'])) {
                    // ALTERAR
                    require "../model/instrutorDAO.php";

                    $id = $_GET['id'];

                    $resInstrutor = pesquisarInstrutorPorID($id);
                    if ($resInstrutor != null) {
                        $registro = mysqli_fetch_assoc($resInstrutor);

                        $nome = $registro["nome"];
                        $cpf = $registro["cpf"];
                        $sexo = $registro["sexo"];

                        if ($sexo == 'M') {
                            $sexoM = "checked";
                            $sexoF = "";
                        } else {
                            $sexoM = "";
                            $sexoF = "checked";
                        }

                        $dias_semana = $registro["dias_semana"];
                        $dias_semana = str_split($dias_semana); // Transformando String em Array

                        $check_dias_semana = array(
                            "dom" => "",
                            "seg" => "",
                            "ter" => "",
                            "qua" => "",
                            "qui" => "",
                            "sex" => "",
                            "sab" => ""
                        );

                        // Dias da semana para as chaves array
                        $dias = [ "dom", "seg", "ter", "qua", "qui", "sex", "sab"];
                        
                        foreach ($dias_semana as $index => $valor) {
                            if ($valor == "1") {
                                // Dia da semana recebe 'checked' se o valor for 1
                                $check_dias_semana[$dias[$index]] = "checked";
                            }
                        }

                        $titulo = "Alterar Instrutor";
                        $botao = "Alterar";
                    }

                } else {
                    // INSERIR
                    $nome = "";
                    $cpf = "";
                    $sexo = "";

                    $sexoM = "";
                    $sexoF = "";

                    $check_dias_semana = array(
                        "dom" => "",
                        "seg" => "",
                        "ter" => "",
                        "qua" => "",
                        "qui" => "",
                        "sex" => "",
                        "sab" => ""
                    );

                    $titulo = "Cadastrar Instrutor";
                    $botao = "Cadastrar";
                }
                ?>

                <!-- Form Cadastrar Instrutor -->
                <div class="form-container">
                    <h1 class="form-titulo"><?php echo $titulo ?></h1>
                    <form action="../control/cadastrarInstrutor.php" method="POST" name="formCadastroInstrutor">
                        <!-- Campo nome -->
                        <div class="form-campo">
                            <label for="nome" class="form-subtitulo">Nome completo:</label>
                            <input type="text" name="txtNome" id="nome" placeholder="Digite o nome aqui"
                                class="form-input" value="<?php echo $nome ?>">
                        </div>

                        <!-- Campo CPF -->
                        <div class="form-campo">
                            <label for="cpf" class="form-subtitulo">CPF:</label>
                            <input type="text" name="txtCPF" id="cpf" placeholder="ex.: 000.000.000-00"
                                class="form-input" value="<?php echo $cpf ?>">
                        </div>

                        <!-- Radio Sexo -->
                        <div class="form-campo">
                            <label class="form-subtitulo">Sexo:</label>
                            <div style="display: flex; align-items: center;">
                                <input type="radio" name="sexo" value="M" id="masc" <?php echo $sexoM; ?>>
                                <label for="masc">Masculino</label>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <input type="radio" name="sexo" value="F" id="fem" <?php echo $sexoF; ?>>
                                <label for="fem">Feminino</label>
                            </div>
                        </div>

                        <!-- Checkbox Dias da semana-->
                        <div class="form-campo">
                            <label class="form-subtitulo">Dias da semana que atua nesse curso:</label>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="segunda" name="segunda" value="seg" <?php echo $check_dias_semana["seg"] ?>>
                                <label for="segunda">Segunda-feira</label>
                            </div>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="terca" name="terca" value="ter" <?php echo $check_dias_semana["ter"] ?>>
                                <label for="terca">Terça-feira</label>
                            </div>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="quarta" name="quarta" value="qua" <?php echo $check_dias_semana["qua"] ?>>
                                <label for="quarta">Quarta-feira</label>
                            </div>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="quinta" name="quinta" value="qui" <?php echo $check_dias_semana["qui"] ?>>
                                <label for="quinta">Quinta-feira</label>
                            </div>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="sexta" name="sexta" value="sex" <?php echo $check_dias_semana["sex"] ?>>
                                <label for="sexta">Sexta-feira</label>
                            </div>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="sabado" name="sabado" value="sab" <?php echo $check_dias_semana["sab"] ?>>
                                <label for="sabado">Sábado</label>
                            </div>
                            <div class="form-campo-checkbox">
                                <input type="checkbox" id="domingo" name="domingo" value="dom" <?php echo $check_dias_semana["dom"] ?>>
                                <label for="domingo">Domingo</label>
                            </div>

                        </div>

                        <div class="form-div-btn">
                            <button type="submit" name="btnCadastrar" value="<?php echo $botao; ?>"
                                class="form-btn"><?php echo $botao; ?></button>
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

    <script>
        // Máscara para CPF
        $(document).ready(function () {
            $('#cpf').mask('000.000.000-00');
        });
    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>