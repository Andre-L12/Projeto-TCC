<?php
    require_once "../control/validarUsuario.php";
 ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
                                    $options = comboBoxAlunoCPF();
                                    echo $options;
                                    ?>
                                </select>
                            </div>

                            <!-- Campo Processo -->
                            <div class="form-campo">
                                <label for="processo" class="form-subtitulo">Processo:</label>
                                <select name="processo" id="processo" class="form-input">
                                    
                                </select>
                                <div id="div-erro"></div>
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

            function verificarAluno() {
                var cpf_aluno = $('#aluno').val();

                if (cpf_aluno !== "") {
                    pesquisarProcessosPorAluno(cpf_aluno);
                }
            }

            // Acionar a função ao carregar a página
            verificarAluno();

            // Acionar a função ao selecionar outra opção no combobox
            $('#aluno').on('change', verificarAluno);
        });

        function pesquisarProcessosPorAluno(pesq){
            $.ajax({
                url: '../control/pesquisarProcesso_JSON.php',
                type: 'POST',
                data: { pesq : pesq },
                dataType: 'json',
                success: function(data) {

                    var mostrar = "";

                    if ( data.erro == "" )  {
                        data.processos.forEach(function(obj,i) {
                            const dataBanco = obj.data_inicio;
                            const dataConvertida = converterData(dataBanco);

                            mostrar += "<OPTION value='" + obj.id_processo + "'>" + obj.id_curso + "</OPTION>";
                        });
                        $('#processo').empty();
                        $('#processo').html(mostrar).show();
                    } else {
                        mostrar += "Esse aluno não possui nenhum processo.";
                        $('#div-erro').html(mostrar).show();
                    }
                },
                error: function() {
                    var mostrar = "";

                    mostrar += "Erro ao chamar o pesquisar do servidor";
                    $('#div-erro').html(mostrar).show();
                }
            });
        }
    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
