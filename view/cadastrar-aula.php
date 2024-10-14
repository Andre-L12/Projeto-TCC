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
    <link rel="stylesheet" href="./navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
                    <form action="" method="POST" name="formCadastroAulaPratica">
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
                                <select name="processo" id="processo" class="form-input"></select>
                                <div id="div-erro-processo"></div>
                            </div>

                            <!-- Campo Instrutor -->
                            <div class="form-campo">
                                <label for="instrutor" class="form-subtitulo">Instrutor:</label>
                                <select name="instrutor" id="instrutor" class="form-input"></select>
                                <div id="div-erro-instrutor"></div>
                            </div>

                            <!-- Selecionar Veículo -->
                            <div class="form-campo">
                                <label for="veiculo" class="form-subtitulo">Veículo utilizado:</label>
                                <select name="veiculo" id="veiculo" class="form-input"></select>
                                <div id="div-erro-veiculo"></div>
                            </div>

                            <!-- Campo data -->
                            <div class="form-campo">
                                <label for="data" class="form-subtitulo">Data:</label>
                                <div class="form-campo-input-btn">
                                    <input type="date" name="data" id="data" class="form-input-menor">
                                    <button type="button" id="consultar-horarios" class="form-btn-menor"><i class='bi bi bi-search'></i></button> 
                                </div>
                            </div>

                            <!-- Campo Hora -->
                            <div class="form-campo">
                                <label for="hora" class="form-subtitulo">Hora:</label>
                                <select name="hora" id="hora" class="form-input"></select>
                                <div id="div-erro-hora"></div>
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
                                <button type="submit" name="btnCadastrar" value="Cadastrar" class="form-btn">Cadastrar</button>
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

            // ===========================================================
            // Para carregar instrutores de curso:
            function verificarCurso() {
                var id_curso = $('#processo').val();

                $('#instrutor').empty();
                $('#div-erro-instrutor').empty();

                $('#veiculo').empty();
                $('#div-erro-veiculo').empty()

                if (id_curso !== "") {
                    pesquisarIntrutorPorCurso(id_curso);
                    pesquisarVeiculoPorCurso(id_curso);
                }
            }

            // ===========================================================
            // Para carregar processos de aluno:
            function verificarAluno() {
                var cpf_aluno = $('#aluno').val();

                $('#processo').empty();
                $('#div-erro-processo').empty();

                if (cpf_aluno !== "") {
                    pesquisarProcessosPorAluno(cpf_aluno);
                }
            }

            // ===========================================================
            // - Acionar a função ao carregar a página
            verificarAluno();

            // - Acionar a função ao selecionar outra opção de aluno
            $('#aluno').on('change', verificarAluno);
            
            // - Acionar a função ao selecionar outra opção de processo
            $('#processo').on('change', verificarCurso);

            // - Acionar a função ao apertar botão
            $('#consultar-horarios').on('click', function() {
                // Obter os valores de #data e de #instrutor
                var data = $('#data').val();
                var instrutor = $('#instrutor').val();

                $('#hora').empty();
                $('#div-erro-hora').empty();

                // Chamar a função com os valores obtidos
                pesquisarHorario(data, instrutor);
            });
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
                            mostrar += "<OPTION value='" + obj.id_curso + "'>" + obj.id_curso + "</OPTION>";
                        });
                        
                        $('#processo').html(mostrar).show();

                        // Forçar a seleção do primeiro processo carregado
                        $('#processo').val($('#processo option:first').val());

                        // Disparar o evento 'change' manualmente após a alteração
                        $('#processo').trigger('change');
                    } else {
                        mostrar += "Esse aluno não possui nenhum processo.";
                        $('#div-erro-processo').html(mostrar).show();
                    }
                },
                error: function() {
                    var mostrar = "";

                    mostrar += "Erro ao chamar o pesquisar do servidor.";
                    $('#div-erro-processo').html(mostrar).show();
                }
            });
        }


        function pesquisarIntrutorPorCurso(pesq){
            $.ajax({
                url: '../control/pesquisarCursoInstrutor_JSON.php',
                type: 'POST',
                data: { pesq : pesq },
                dataType: 'json',
                success: function(data) {

                    var mostrar = "";

                    if ( data.erro == "" )  {
                        data.vinculos.forEach(function(obj,i) {
                            mostrar += "<OPTION value='" + obj.id_instrutor + "'>" + obj.id_instrutor + "</OPTION>";
                        });
                        
                        $('#instrutor').html(mostrar).show();

                    } else {
                        var mostrar = data.erro;
                        $('#div-erro-instrutor').html(mostrar).show();
                    }
                },
                error: function() {
                    mostrar = "Erro ao chamar o pesquisar do servidor.";
                    $('#div-erro-instrutor').html(mostrar).show();
                }
            });
        }

        function pesquisarVeiculoPorCurso(pesq_curso){
            $.ajax({
                url: '../control/PesquisarVeiculo_JSON.php',
                type: 'POST',
                data: { pesq_curso : pesq_curso },
                dataType: 'json',
                success: function(data) {

                    var mostrar = "";

                    if ( data.erro == "" )  {
                        data.veiculos.forEach(function(obj,i) {
                            var iconeAdaptado = obj.adaptado == 1 ? " - ♿" : "";

                            mostrar += "<OPTION value='" + obj.placa + "'>" + obj.marca + " " + obj.modelo + " - " + obj.placa + iconeAdaptado + "</OPTION>";
                        });
                        
                        $('#veiculo').html(mostrar).show();

                        // if (veiculo_instrutor != "") {
                        //     $('#veiculo').val(veiculo_instrutor);
                        // }
                        
                    } else {
                        var mostrar = data.erro;
                        $('#div-erro-veiculo').html(mostrar).show();
                    }
                },
                error: function() {
                    mostrar = "Erro ao chamar o pesquisar do servidor.";
                    $('#div-erro-veiculo').html(mostrar).show();
                }
            });
        }

        function pesquisarHorario(data, instrutor){
            $.ajax({
                url: '../control/pesquisarHorario_JSON.php',
                type: 'POST',
                data: {
                    data : data,
                    instrutor : instrutor
                },
                dataType: 'json',
                success: function(data) {

                    var mostrar = "";
                    if ( data.erro == "" )  {
                        data.horarios.forEach(function(obj,i) {
                            mostrar += "<OPTION value='" + obj + "'>" + obj + "</OPTION>";
                        });
                        
                        $('#hora').html(mostrar).show();
                        
                    } else {
                        var mostrar = data.erro;
                        $('#div-erro-hora').html(mostrar).show();
                    }
                },
                error: function() {
                    mostrar = "Erro ao chamar o pesquisar do servidor.";
                    $('#div-erro-hora').html(mostrar).show();
                }
            });
        }

        // =======================================================
        // Ativar/Desativar botão consultar-horarios
        $(document).ready(function() {
            // Desabilitar o botão inicialmente
            $('#consultar-horarios').prop('disabled', true);

            // Função para verificar se os campos estão preenchidos
            function verificarInstrutorHora() {
                const instrutorPreenchido = $('#instrutor').val() !== "";
                const dataPreenchida = $('#data').val() !== "";

                // Habilitar ou desabilitar o botão com base nos campos preenchidos
                if (instrutorPreenchido && dataPreenchida) {
                    $('#consultar-horarios').prop('disabled', false);
                } else {
                    $('#consultar-horarios').prop('disabled', true);
                }
            }

            // Verificar campos quando eles mudarem
            $('#instrutor, #data').on('change input', verificarInstrutorHora);

            // Inicializar verificação ao carregar a página
            verificarInstrutorHora();
        });

    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
