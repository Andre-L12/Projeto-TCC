<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Veículo</title>

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
                    <i class="bi bi-car-front-fill"></i>
                </span>
                <span class="header-title">VEÍCULOS</span>
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
                    <h1>Cadastrar Veículo</h1>
                    <form action="../control/cadastrarVeiculo.php" method="POST" name="formCadastroVeiculo">
                        <div>
                            <!-- ComboBox Categoria do veículo -->
                            <div>
                                <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria">
                                    <option value=""></option>
                                    <option value="ACC">ACC</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>

                            <!-- Radio: Veículo adaptado? -->
                            <div>
                                <label>Veículo adaptado?</label>
                                <div style="display: flex; align-items: center;">
                                    <input type="radio" name="adaptado" value="true" id="sim">
                                    <label for="sim">Sim</label>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <input type="radio" name="adaptado" value="false" id="nao">
                                    <label for="nao">Não</label>
                                </div>
                            </div>

                            <!-- Campo Placa -->
                            <div>
                                <label for="placa">Placa:</label>
                                <input type="text" name="txtPlaca" id="placa" placeholder="ex.: QTP5F71" maxlength="7">
                            </div>

                            <!-- Campo Marca -->
                            <div>
                                <label for="marca">Marca:</label>
                                <input type="text" name="txtMarca" id="marca" placeholder="ex.: Fiat">
                            </div>
                            
                            <!-- Campo Modelo -->
                            <div>
                                <label for="modelo">Modelo</label>
                                <input type="text" name="txtModelo" id="modelo" placeholder="ex.: Uno">
                            </div>
                            
                            <!-- Campo Ano -->
                            <div>
                                <label for="ano">Ano de fabricação:</label>
                                <input type="number" name="ano" id="ano" placeholder="ex.: 2013">
                            </div>

                            <div>
                                <button type="input">Cadastrar</button>
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
        document.getElementById('placa').addEventListener('input', function() {
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