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

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

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
                    <form method="POST" >
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
                <div style="widht: 800px" >
                    <div id='calendar'></div>
                </div>
            </main>
            <div class="overlay"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Modo inicial (grade mensal)
            locale: 'pt-br', // Tradução para português
            headerToolbar: {
            left: 'prev,next today', // Botões à esquerda
            center: 'title',         // Título no centro
            right: 'dayGridMonth,timeGridWeek,timeGridDay' // Botões à direita
            },
            events: [
            { title: 'Evento 1', start: '2024-12-05' },
            { title: 'Evento 2', start: '2024-12-07', end: '2024-12-10' },
            ]
        });

        calendar.render();
        });
    </script>

    <script>
        $(document).ready(function() {

        function verificarTipoPesq() {
            var tipoPesq = $('#tipoPesq').val();
            console.log(tipoPesq);

            $('#opcoesPesq').empty();

            if (tipoPesq !== "") {
                pesquisarOpcoes(tipoPesq);
            }
        }

        verificarTipoPesq();
        $('#tipoPesq').on('change', verificarTipoPesq);
        });

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