<?php
    require_once "../control/validarUsuario.php";
 ?>
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

                        <!-- Selecionar Veículo -->
                        <div class="form-campo">
                            <label for="veiculo" class="form-subtitulo">Veículo utilizado:</label>
                            <select name="veiculo" id="veiculo" class="form-input"></select>
                            <div id="div-erro-veiculo"></div>
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

    <script>
        $(document).ready(function() {

            function verificarCurso() {
                var id_curso = $('#curso').val();

                $('#veiculo').empty();
                $('#div-erro-veiculo').empty()

                if (id_curso !== "") {
                    pesquisarVeiculoPorCurso(id_curso);
                }
            }

            verificarCurso();
            $('#curso').on('change', verificarCurso);
        });

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


                    } else {
                        var mostrar = data.erro;
                        $('#div-erro-veiculo').html(mostrar).show();
                    }
                },
                error: function() {
                    mostrar = "Erro ao chamar o pesquisar do servidor";
                    $('#div-erro-veiculo').html(mostrar).show();
                }
            });
        }
    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>