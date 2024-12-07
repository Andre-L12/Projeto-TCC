<?php
    require_once "../control/validarUsuario.php";
 ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"> -->

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <!-- <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'> -->
    <link rel="stylesheet" href="navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery.mask@1.14.16/jquery.mask.min.js"></script> -->

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    

    <link rel="icon" href="../img/AutoCFCicon.png" type="image/x-icon">

    <style>
        /* #eventModal {
            display: none !important;
        } */
    </style>

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
                        <i class="ri-calendar-fill"></i>
                    </span>
                    <span class="header-title">CALENDÁRIO</span>
                </div>
            </header>
            <main class="content">
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                </div>

                <div class="campo-pesquisa">
                    <form method="POST">
                        <select name="tipoPesq" id="tipoPesq" class="form-input" style="width: 100px">
                            <option value="aluno">Aluno</option>
                            <option value="instrutor">Instrutor</option>
                        </select>
                        <select name="opcoesPesq" id="opcoesPesq" class="form-input"></select>
                        <input type="button" id="btnPesq" name="btnPesq" value="Pesquisar" class="form-btn" style="background-color: #216EC0; border-color:#216EC0 ;">
                    </form>
                    <div id="div-erro-pesq"></div>
                </div>

                <!-- Calendário-->
                <div>
                    <div id='calendar'></div>
                </div>
            </main>
            <div class="overlay"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" tabindex="-1" id="eventModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Detalhes da aula</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Título:</strong> <span id="event-title"></span></p>
                        <p><strong>ID:</strong> <span id="event-id"></span></p>
                        <p><strong>Data e Hora:</strong> <span id="event-start"></span></p>
                        <p><strong>Instrutor:</strong> <span id="event-instrutor"></span></p>
                        <p><strong>Status Detran:</strong> <span id="event-detran-status"></span></p>
                        <p><strong>Aula Obrigatória:</strong> <span id="event-obrigatoria"></span></p>
                        <p><strong>Status da Aula:</strong> <span id="event-status"></span></p>
                        <p><strong>Veículo:</strong> <span id="event-veiculo"></span></p>
                        <p><strong>Processo:</strong> <span id="event-processo"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="editarBtn" data-bs-dismiss="modal">Editar</button>
                        <button type="button" class="btn btn-secondary" id="consultarBtn" data-bs-dismiss="modal">Consultar</button>
                        <button type="button" class="btn btn-secondary" id="excluirBtn" data-bs-dismiss="modal">Excluir</button>
                    </div>
                </div>
            </div>
        </div>

    <script>

        var calendar;

        document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Modo inicial (grade mensal)
            locale: 'pt-br', // Tradução para português
            headerToolbar: {
            left: 'prev,next today', // Botões à esquerda
            center: 'title',         // Título no centro
            right: 'dayGridMonth,timeGridWeek,timeGridDay' // Botões à direita
            },
            events: [],
            eventClick: function(info) {
                // Obter informações do evento
                const event = info.event;
                const props = event.extendedProps;

                // Atualizar o modal com as informações
                document.getElementById("event-title").innerText = event.title;
                document.getElementById("event-id").innerText = props.id_aula;
                document.getElementById("event-start").innerText = event.start.toISOString();
                document.getElementById("event-instrutor").innerText = props.nome_instrutor;
                document.getElementById("event-detran-status").innerText = props.status_detran;
                document.getElementById("event-obrigatoria").innerText = props.obrigatoria ? "Sim" : "Não";
                document.getElementById("event-status").innerText = props.status_aula;
                document.getElementById("event-veiculo").innerText = props.id_veiculo;
                document.getElementById("event-processo").innerText = props.id_processo;

                // Exibir o modal
                const modal = new bootstrap.Modal(document.getElementById('eventModal'));
                modal.show();

                document.getElementById('editarBtn').addEventListener('click', function () {
                    window.location.href = 'cadastrar-aula.php?id=' + props.id_aula;
                });
                document.getElementById('consultarBtn').addEventListener('click', function () {
                    window.location.href = 'consultar-aulaPratica.php?id=' + props.id_aula;
                });
                document.getElementById('excluirBtn').addEventListener('click', function () {
                    window.location.href = '../control/excluirAula.php?id=' + props.id_aula;
                });

            }               
        });        

        calendar.render();
        });

        $(document).ready(function() {

            function verificarTipoPesq() {
                var tipoPesq = $('#tipoPesq').val();

                $('#div-erro-pesq').empty();

                $('#opcoesPesq').empty();

                if (tipoPesq !== "") {
                    pesquisarOpcoes(tipoPesq);
                }
            }

            function limparErro(){
                $('#div-erro-pesq').empty();
            }

            verificarTipoPesq();
            $('#tipoPesq').on('change', verificarTipoPesq);
            $('#opcoesPesq').on('change', limparErro);
            
            $('#btnPesq').on('click', function() {
                // Obter os valores de #tipoPesq e de #opcoesPesq
                var tipoPesq = $('#tipoPesq').val();
                var idPessoa = $('#opcoesPesq').val();

                // Remove fontes antigas para evitar duplicação
                calendar.removeAllEvents();

                // Chamar a função com os valores obtidos
                pesquisarAulas(tipoPesq, idPessoa);
            });
        });

        function pesquisarAulas(tipoPesq, idPessoa){
            // console.log(calendar);
            if (tipoPesq == "aluno"){
                $.ajax({
                    url: '../control/pesquisarAulaPratica_JSON.php',
                    type: 'POST',
                    data: {
                        tipoPesq: tipoPesq,
                        idPessoa: idPessoa
                    },
                    dataType: 'json',
                    success: function (data) {

                        // Verifica se não há erro e se há dados válidos
                        if (data.erro === "" && Array.isArray(data.aulas)) {
                            
                            data.aulas.forEach(function (obj) {
                                // console.log("ID aula: " + obj.id);
                                calendar.addEvent({
                                    title: "Aula Prática Categoria " + obj.categoria,
                                    start: obj.data + "T" + obj.hora,
                                    extendedProps: {
                                        id_aula: obj.id,
                                        id_instrutor: obj.id_instrutor,
                                        nome_instrutor: obj.nome_instrutor,
                                        status_detran: obj.status_detran,
                                        obrigatoria: obj.obrigatoria,
                                        status_aula: obj.status_aula,
                                        id_veiculo: obj.id_veiculo,
                                        id_processo: obj.id_processo
                                    }
                                    
                                });
                            });

                        } else {
                            // console.error(data.erro || "Nenhuma aula encontrada.");
                            $('#div-erro-pesq').html("Nenhuma aula encontrada.").show();
                        }
                    },
                    error: function () {
                        console.error("Erro ao chamar o pesquisar do servidor.");
                    }
                });

            } else {
                $.ajax({
                    url: '../control/pesquisarAulaPratica_JSON.php',
                    type: 'POST',
                    data: {
                        tipoPesq: tipoPesq,
                        idPessoa: idPessoa
                    },
                    dataType: 'json',
                    success: function (data) {

                        // Verifica se não há erro e se há dados válidos
                        if (data.erro === "" && Array.isArray(data.aulas)) {
                            data.aulas.forEach(function (obj) {
                                calendar.addEvent({
                                    title: "Aula Prática Categoria " + obj.categoria,
                                    start: obj.data + "T" + obj.hora,
                                    // end: obj.data + "T" + obj.hora,
                                    extendedProps: {
                                        id_aula: obj.id,
                                        id_instrutor: obj.id_instrutor,
                                        nome_instrutor: obj.nome_instrutor,
                                        status_detran: obj.status_detran,
                                        obrigatoria: obj.obrigatoria,
                                        status_aula: obj.status_aula,
                                        id_veiculo: obj.id_veiculo,
                                        id_processo: obj.id_processo
                                    }
                                });
                            });

                        } else {
                            // console.error(data.erro || "Nenhuma aula encontrada.");
                            $('#div-erro-pesq').html("Nenhuma aula encontrada.").show();
                        }
                    },
                    error: function () {
                        console.error("Erro ao chamar o pesquisar do servidor.");
                    }
                });
            }
        }

        function pesquisarOpcoes(tipoPesq){
            var pesq_todos = 1;
            if (tipoPesq == "aluno"){
                $.ajax({
                url: '../control/PesquisarAluno_JSON.php',
                type: 'POST',
                data: { pesq_todos : pesq_todos },
                dataType: 'json',
                success: function(data) {
                    var mostrar = "";

                    if ( data.erro == "" )  {
                        data.alunos.forEach(function(obj,i) {
                            mostrar += "<OPTION value='" + obj.id_aluno + "'>" + obj.nome + " - " +  obj.cpf + "</OPTION>";
                        });
                        
                        $('#opcoesPesq').html(mostrar).show();

                    } else {
                        var mostrar = data.erro;
                        $('#div-erro-pesq').html(mostrar).show();
                    }
                },
                error: function(xhr, status, error) {
                    mostrar = "Erro ao chamar o pesquisar do servidor";
                    $('#div-erro-pesq').html(mostrar).show();
                }
                });
            } else {
                $.ajax({
                url: '../control/PesquisarInstrutor_JSON.php',
                type: 'POST',
                data: { pesq_todos : pesq_todos },
                dataType: 'json',
                success: function(data) {
                    var mostrar = "";

                    if ( data.erro == "" )  {
                        data.instrutores.forEach(function(obj,i) {
                            mostrar += "<OPTION value='" + obj.matricula + "'>" + obj.nome + "</OPTION>";
                        });
                        
                        $('#opcoesPesq').html(mostrar).show();


                    } else {
                        var mostrar = data.erro;
                        $('#div-erro-pesq').html(mostrar).show();
                    }
                },
                error: function(xhr, status, error) {
                    mostrar = "Erro ao chamar o pesquisar do servidor";
                    $('#div-erro-pesq').html(mostrar).show();
                }
                });
            }
            
        }
        
    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>