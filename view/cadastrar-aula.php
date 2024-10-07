<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Aula</title>

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
        require_once "navbar.html";
        ?>

        <div class="layout">
            <header>
                <div>
                    <span class="header-icon">
                        <i class="bi bi-cone-striped"></i>
                    </span>
                    <span class="header-title">AULAS PRÁTICAS</span>
                </div>
            </header>
            <main class="content">
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                </div>
                <!-- Form Cadastrar Veículo -->
                <div class="form-container">
                    <h1 class="form-titulo">Agendar Aula Prática</h1>
                    <form action="../control/cadastrarAulaPratica.php" method="POST" name="formCadastroAulaPratica">
                        <div>
                            <!-- Campo Aluno -->
                            <div class="form-campo">
                                <label for="aluno" class="form-subtitulo">Aluno:</label>
                                <select name="aluno" id="aluno" class="form-input">
                                    <?php
                                    require_once "../model/funcoesBD.php";
                                    $options = comboBoxAluno();
                                    echo $options;
                                    ?>
                                </select>
                            </div>

                            <!-- Campo Processo -->
                            <div class="form-campo">
                                <label for="processo" class="form-subtitulo">Processo:</label>
                                <select name="processo" id="processo" class="form-input">
                                    <?php
                                    // Exibir apenas os processos do aluno selecionado
                                    ?>
                                </select>
                            </div>

                            <!-- Campo Instrutor -->
                            <div class="form-campo">
                                <label for="instrutor" class="form-subtitulo">Instrutor:</label>
                                <select name="instrutor" class="form-input">
                                    <?php
                                    // Exibir apenas instrutores vinculados ao curso do processo
                                    ?>
                                </select>
                            </div>

                            <!-- Selecionar Veículo -->
                            <div class="form-campo">
                                <label for="veiculo" class="form-subtitulo">Veículo utilizado:</label>
                                <select name="veiculo" id="opcoesVeiculo" class="form-input">
                                    <?php
                                    // Apenas veículos da categoria do curso do processo selecionado
                                    ?>
                                </select>
                            </div>

                            <!-- Campo data -->
                            <div class="form-campo">
                                <label for="data" class="form-subtitulo">Data:</label>
                                <input type="date" name="data" id="data" class="form-input">
                            </div>

                            <!-- Campo Hora -->
                            <div class="form-campo">
                                <label for="hora" class="form-subtitulo">Hora:</label>

                                <!-- Exibir horas disponíveis do instrutor no dia -->

                                <!-- <input type="time" name="hora" id="hora" class="form-input"> -->
                            </div>

                            <!-- Campo Obrigatoriedade -->
                            <div class="form-campo">
                                <label for="obrigatoria" class="form-subtitulo">Obrigatoria:</label>
                                <div style="display: flex; align-items: center;">
                                    <input type="radio" name="obrigatoria" value="1" id="sim">
                                    <label for="sim">Sim</label>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <input type="radio" name="obrigatoria" value="0" id="não">
                                    <label for="não">Não</label>
                                </div>
                            </div>

                            <div class="form-div-btn">
                                <button type="submit" name="btnCadastrar" value="Cadastrar" class="form-btn"> Cadastrar</button>
                            </div>

                            <?php
                            // Exibir a mensagem de ERRO caso ocorra
                            if (isset($_GET["msg"])) {  // Verifica se tem mensagem de ERRO
                                $mensagem = $_GET["msg"];
                                echo "<FONT color=red>$mensagem</FONT>";
                            }
                            ?>

                        </div>
                    </form>
                </div>
            </main>
            <div class="overlay"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#aluno').on('blur', function() {
                var id_aluno = $(this).val();

                if (id_aluno !== "") {
                    pesquisarProcessosPorAluno(id_aluno); // criar essa função
                }
                
            });
        });
    </script>

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
