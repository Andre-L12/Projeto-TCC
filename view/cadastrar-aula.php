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
        require_once "navbar-chamar.php";
        $navbar = chamarNavbar();
        echo $navbar;
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
                <div>
                    <h1>Agendar Aula Prática</h1>
                    <form action="../../control/cadastrarAulaPratica.php" method="POST" name="formCadastroAulaPratica"  >
                        <div>
                            <!-- Campo Instrutor -->
                            <div>
                                <label for="instrutor">Instrutor:</label>
                                <select name="instrutor" class="form-control">
                                    <?php
                                        require_once "../model/funcoesBD.php";
                                        $options = comboBoxInstrutor();              
                                        echo $options;
                                    ?>
                                </select>
                            </div>
                            <!-- Campo Aluno -->
                            <div>
                                <label for="Aluno">Aluno:</label>
                                <select name="aluno" class="form-control">
                                <?php
                                    $options = comboBoxAluno();              
                                    echo $options;
                                ?>
                                </select>
                            </div>
                            <!-- Selecionar Veículo -->
                            <div>
                                <label for="veiculo">Veículo utilizado:</label>
                                <select name="veiculo" id="opcoesVeiculo">
                                    <?php
                                        require_once "../model/funcoesBD.php";
                                        $options = comboBoxVeiculo();              
                                        echo $options;
                                    ?>
                                </select>
                            </div>
                            <!-- Campo data -->
                            <div>
                                <label for="data">Data:</label>
                                <input type="date" name="data" id="data" >
                            </div>

                            <!-- Campo Hora -->
                            <div>
                                <label for="hora">Hora:</label>
                                <input type="time" name="hora" id="hora" >
                            </div>
                            <!-- Campo Obrigatoriedade -->
                            <div>
                                <label for="obrigatoria">Obrigatoria:</label>
                                <div style="display: flex; align-items: center;">
                                    <input type="radio" name="obrigatoria" value="1" id="sim">
                                    <label for="sim">SIM</label>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <input type="radio" name="obrigatoria" value="0" id="não">
                                    <label for="não">NÃO</label>
                                </div>
                            </div>
                            <!-- Campo status detran -->
                            <div>
                                <label for="obrigatoria">Status:</label>
                                <div style="display: flex; align-items: center;">
                                    <input type="radio" name="status_detran" value="1" id="sim">
                                    <label for="sim">Registrada</label>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <input type="radio" name="status_detran" value="0" id="não">
                                    <label for="não">Não registrada</label>
                                </div>
                            </div>

                            <div>
                                <button type="submit" name="btnCadastrar" value="Cadastrar">Cadastrar</button>
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