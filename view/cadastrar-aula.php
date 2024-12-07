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

                <?php
                if (isset($_GET['id'])) {
                    // ALTERAR
                    require "../model/aulaPraticaDAO.php";
                    require "../model/processoDAO.php";

                    $id_aula = $_GET['id'];

                    $resAula = pesquisarAulaPorId($id_aula);
                    if ($resAula != null) {
                        $registro = mysqli_fetch_assoc($resAula);

                        $data = $registro["data_aula"];

                        $hora = $registro["hora_aula"];
                        $hora = substr($hora, 0, 5);

                        $status_detran = $registro["status_detran"];
                        $obrigatoria = $registro["obrigatoria"];

                        if ($obrigatoria == '1') {
                            $obrSIM = "checked";
                            $obrNAO = "";
                        } else {
                            $obrSIM = "";
                            $obrNAO = "checked";
                        }

                        $status_aula = $registro["status_aula"];
                        $id_veiculo = $registro["id_veiculo"];
                        $id_instrutor = $registro["id_instrutor"];
                        $id_processo = $registro["id_processo"];

                        // Pegando dados do processo
                        $resultado_processo = pesquisarProcessoPorID($id_processo);
                        $row_processo = mysqli_fetch_assoc($resultado_processo);
                
                        $id_aluno = $row_processo['id_aluno'];
                        // $id_curso = $row_processo['id_curso'];

                        if ($obrigatoria == '1'){
                            $campo_statusDetran = "<div class='form-campo'>
                                <label for='statusDetran' class='form-subtitulo'>Status Detran:</label>
                                <select name='statusDetran' id='statusDetran' class='form-input'>";

                            if ($status_detran == 0) {
                                $campo_statusDetran .= "<OPTION value='0' checked>Não atualizada no sistema</OPTION>
                                        <OPTION value='1'>Atualizada no sistema</OPTION>";
                            } else {
                                $campo_statusDetran .= "<OPTION value='0'>Não atualizada no sistema</OPTION>
                                        <OPTION value='1' checked>Atualizada no sistema</OPTION>";
                            }

                            $campo_statusDetran .= "</select>
                                    <div id='div-erro-statusDetran'></div>
                                </div>";

                        } else {
                            $campo_statusDetran = "";
                        }

                        $titulo = "Alterar Aula Prática";
                        $botao = "Alterar";
                    }
                } else {
                    // INSERIR

                    $id_aula = "";
                    $data = "";
                    $hora = "";
                    $status_detran = "";

                    $obrSIM = "";
                    $obrNAO = "";

                    $status_aula = "";
                    $id_veiculo = "";
                    $id_instrutor = "";
                    $id_processo = "";

                    $id_aluno = "";

                    $titulo = "Agendar Aula Prática";
                    $botao = "Agendar";

                    $campo_statusDetran = "";
                }
                ?>

                <!-- Form Cadastrar Aula -->
                <div class="form-container">
                    <h1 class="form-titulo"><?php echo $titulo?></h1>
                    <form action="../control/cadastrarAulaPratica.php?" method="POST" name="formCadastroAulaPratica">
                        <div>
                            <input type="hidden" name="id" value="<?php echo $id_aula ?>" >

                            <!-- Campo Aluno -->
                            <div class="form-campo">
                                <label for="aluno" class="form-subtitulo">Aluno:</label>
                                <select name="aluno" id="aluno" class="form-input">
                                    <?php
                                    require_once "../model/funcoesBD.php";
                                    $options = comboBoxAluno($id_aluno);
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
                                    <input type="date" name="data" id="data" class="form-input" value="<?php echo $data?>" >
                                    <!-- <button type="button" id="consultar-horarios" class="form-btn-menor"><i class='bi bi bi-search'></i></button> -->
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
                                    <input type="radio" name="obrigatoria" value="1" id="sim" <?php echo $obrSIM ?>>
                                    <label for="sim">Sim</label>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <input type="radio" name="obrigatoria" value="0" id="não" <?php echo $obrNAO ?>>
                                    <label for="não">Não</label>
                                </div>
                            </div>

                            <!-- Campo Status Detran -->
                            <?php echo $campo_statusDetran ?>

                            <div class="form-div-btn">
                                <button type="submit" name="btnCadastrar" class="form-btn" value="<?php echo $botao ?>" ><?php echo $botao ?></button>
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
                var id_processo = $('#processo').val();

                $('#instrutor').empty();
                $('#div-erro-instrutor').empty();

                $('#veiculo').empty();
                $('#div-erro-veiculo').empty()

                if (id_processo !== "") {
                    pesquisarIntrutorPorProcesso(id_processo); 
                    pesquisarVeiculoPorProcesso(id_processo);
                }
            }

            // ===========================================================
            // Para carregar processos de aluno:
            function verificarAluno() {
                var id_aluno = $('#aluno').val();

                $('#processo').empty();
                $('#div-erro-processo').empty();

                if (id_aluno !== "") {
                    pesquisarProcessosPorAluno(id_aluno);
                }
            }

            // ===========================================================
            // - Acionar a função ao carregar a página
            verificarAluno();

            // - Acionar a função ao selecionar outra opção de aluno
            $('#aluno').on('change', verificarAluno);
            
            // - Acionar a função ao selecionar outra opção de processo
            $('#processo').on('change', verificarCurso);

            // ===========================================================
            // - Verificador horário/data (importante para alterar)
            
            // Passando o valor PHP para o JavaScript
            let dataPhp = "<?php echo $data; ?>";  // O valor de $data
            let horaPhp = "<?php echo $hora; ?>";  // O valor de $hora
            let hora_data = "";  // Variável que será ajustada

            // Função para verificar o valor da data e atribuir valor à hora_data
            document.getElementById('data').addEventListener('change', function() {
                let dataSelecionada = this.value;  // Valor da data do input

                if (dataSelecionada !== dataPhp && dataPhp !== "") {
                    hora_data = "";  // Se a data for diferente de $data, hora_data será ""
                } else {
                    hora_data = horaPhp;  // Caso contrário, hora_data receberá o valor de $hora
                }

            });
            
            // Carregar horários na página Alterar
            if ('<?php echo $botao ?>' === "Alterar") {
                
                hora_data = horaPhp;
                pesquisarHorario(dataPhp, '<?php echo $id_instrutor ?>', hora_data);

            }

            $('#data').on('change', function() {
                // Obter os valores de #data e de #instrutor
                var data = $('#data').val();
                var instrutor = $('#instrutor').val();

                $('#hora').empty();
                $('#div-erro-hora').empty();

                // Chamar a função com os valores obtidos
                pesquisarHorario(data, instrutor, hora_data);
            });
        });

        function definindoHora_data(){
            
        }

        function pesquisarProcessosPorAluno(pesq_aluno){
            $.ajax({
                url: '../control/pesquisarProcesso_JSON.php',
                type: 'POST',
                data: { pesq_aluno : pesq_aluno },
                dataType: 'json',
                success: function(data) {

                    var mostrar = "";

                    if ( data.erro == "" )  {
                        data.processos.forEach(function(obj,i) {
                            if (obj.id_processo == '<?php echo $id_processo ?>') {
                                mostrar += "<OPTION value='" + obj.id_processo + "' selected>" + obj.desc_curso + "</OPTION>";
                            } else {
                                mostrar += "<OPTION value='" + obj.id_processo + "'>" + obj.desc_curso + "</OPTION>";
                            }
                            
                        });
                        
                        $('#processo').html(mostrar).show();

                        // Forçar a seleção do primeiro processo carregado
                        // $('#processo').val($('#processo option:first').val());

                        // Disparar o evento 'change' manualmente após a alteração
                        $('#processo').trigger('change');
                    } else {
                        mostrar += "Esse aluno não possui nenhum processo.";
                        console.log(data.erro);
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


        function pesquisarIntrutorPorProcesso(pesq){
            $.ajax({
                url: '../control/pesquisarCursoInstrutor_JSON.php',
                type: 'POST',
                data: { pesq : pesq },
                dataType: 'json',
                success: function(data) {

                    var mostrar = "";

                    if ( data.erro == "" )  {
                        data.vinculos.forEach(function(obj,i) {
                            if (obj.id_processo == '<?php echo $id_instrutor ?>') {
                                mostrar += "<OPTION value='" + obj.id_instrutor + "' selected>" + obj.nome_instrutor + "</OPTION>";
                            } else {
                                mostrar += "<OPTION value='" + obj.id_instrutor + "'>" + obj.nome_instrutor + "</OPTION>";
                            }
                            
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

        function pesquisarVeiculoPorProcesso(pesq_processo){
            $.ajax({
                url: '../control/PesquisarVeiculo_JSON.php',
                type: 'POST',
                data: { pesq_processo : pesq_processo },
                dataType: 'json',
                success: function(data) {

                    var mostrar = "";

                    if ( data.erro == "" )  {
                        data.veiculos.forEach(function(obj,i) {
                            var iconeAdaptado = obj.adaptado == 1 ? " - ♿" : "";

                            if (obj.id_processo == '<?php echo $id_instrutor ?>') {
                                mostrar += "<OPTION value='" + obj.placa + "' selected>" + obj.marca + " " + obj.modelo + " - " + obj.placa + iconeAdaptado + "</OPTION>";
                            } else {
                                mostrar += "<OPTION value='" + obj.placa + "'>" + obj.marca + " " + obj.modelo + " - " + obj.placa + iconeAdaptado + "</OPTION>";
                            }

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

        function pesquisarHorario(data, instrutor, hora_data){

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
                        // data.horarios.forEach(function(obj,i) {
                        //     mostrar += "<OPTION value='" + obj + "'>" + obj + "</OPTION>";
                        // });

                        if (hora_data != ""){
                            mostrar += "<OPTION value='" + '<?php echo $hora?>' + " selected'>" + '<?php echo $hora?>' + "</OPTION>"
                        }

                        for (var key in data.horarios) {
                            if (data.horarios.hasOwnProperty(key)) {
                                var horario = data.horarios[key];
                                
                                mostrar += "<OPTION value='" + horario + "'>" + horario + "</OPTION>";

                            }
                        }
                        
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
