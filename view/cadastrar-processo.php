<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Processo</title>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <!-- <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'> -->
    <link rel="stylesheet" href="./navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"> -->

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
                        <i class="bi bi-clipboard2-fill"></i>
                    </span>
                    <span class="header-title">PROCESSOS</span>
                </div>
            </header>
            <main class="content">
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                </div>

                <?php
                    if (isset($_GET['id'])){
                        // ALTERAR
                        require "../model/processoDAO.php";

                        $id = $_GET['id'];

                        $resProcesso = pesquisarProcessoPorID($id);
                        if ($resProcesso != null){
                            $registro = mysqli_fetch_assoc($resProcesso);

                            $aluno = $registro["cpf_aluno"];
                            // $aluno = mysqli_fetch_array(pesquisarAlunoPorCPF($cpf_aluno))["nome"];

                            $curso = $registro["curso"];
                            $inicio = $registro["data_inicio"];

                            $titulo = "Alterar Processo";
                            $botao = "Alterar";
                        }
                    } else {
                        // INSERIR
                        $aluno = "";
                        $curso = "";
                        $inicio = "";

                        $titulo = "Cadastrar Processo";
                        $botao = "Cadastrar";
                    }
                ?>

                <!-- Form Cadastrar Veículo -->
                <div class="form-container">
                    <h1 class="form-titulo"><?php echo $titulo?></h1>
                    <form action="../control/iniciarProcesso.php" method="POST" name="formCadastroProcesso">
                            <!-- Campo CPF -->
                            <div class="form-campo">
                                <label for="aluno" class="form-subtitulo">Aluno:</label>
                                <select name="aluno" class="form-input" value="<?php echo $aluno?>">
                                    <?php
                                    require_once "../model/funcoesBD.php";
                                    $options = comboBoxAluno();
                                    echo $options;
                                    ?>
                                </select>
                            </div>

                            <!-- Campo CURSO -->
                            <div class="form-campo">
                                <label for="curso" class="form-subtitulo">Curso:</label>
                                <select name="curso" class="form-input" value="<?php echo $curso?>">
                                    <?php
                                    $options = comboBoxCurso();
                                    echo $options;
                                    ?>
                                </select>
                            </div>

                            <!-- Campo DATA -->
                            <div class="form-campo">
                                <label for="data_inicio" class="form-subtitulo">Data de inicio:</label>
                                <input type="date" name="data_inicio" id="data_inicio" class="form-input" value="<?php echo $inicio?>">
                            </div>

                            <div>
                                <button type="submit" name="btnCadastrar" value="<?php echo $botao; ?>" class="form-btn"><?php echo $botao; ?></button>
                            </div>

                            <?php
                            // Exibir a mensagem de ERRO caso ocorra
                            if (isset($_GET["msg"])) {  // Verifica se tem mensagem de ERRO
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
        // Máscara para placa de veículo
        document.getElementById('placa').addEventListener('input', function () {
            this.value = this.value.toUpperCase();
        });

        // Define o ano para 2000 ao carregar a página;
        document.getElementById('ano').value = '2000';
    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>