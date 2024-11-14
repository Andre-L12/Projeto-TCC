<?php
    require_once "../control/validarUsuario.php";
 ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Veículo</title>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <link rel="stylesheet" href="./navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
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

                <?php
                if (isset($_GET['id'])) {
                    // ALTERAR
                    require "../model/veiculoDAO.php";

                    $placa = $_GET['id'];

                    $resVeiculo = pesquisarVeiculoPorPlaca($placa);
                    if ($resVeiculo != null) {
                        $registro = mysqli_fetch_assoc($resVeiculo);

                        $selecaoCategorias = array(
                            "ACC" => "",
                            "A" => "",
                            "B" => "",
                            "C" => "",
                            "D" => "",
                            "E" => ""
                        );

                        $sigla = $registro["sigla_categoria"];
                        $selecaoCategorias[$sigla] = "selected";

                        $adaptado = $registro["adaptado"];
                        $placa = $registro["placa"];
                        $marca = $registro["marca"];
                        $modelo = $registro["modelo"];
                        $ano = $registro["ano"];

                        if ($adaptado == '0') {
                            $adaptadoN = "checked";
                            $adaptadoS = "";
                        } else {
                            $adaptadoN = "";
                            $adaptadoS = "checked";
                        }

                        $titulo = "Alterar Veículo";
                        $botao = "Alterar";
                    }
                } else {
                    // INSERIR
                    $selecaoCategorias = array(
                        "ACC" => "",
                        "A" => "",
                        "B" => "",
                        "C" => "",
                        "D" => "",
                        "E" => ""
                    );
                        
                    $adaptado = "";
                    $placa = "";
                    $marca = "";
                    $modelo = "";
                    $ano = "";

                    $adaptadoN = "";
                    $adaptadoS = "";

                    $titulo = "Cadastrar Veículo";
                    $botao = "Cadastrar";
                }
                ?>

                <!-- Form Cadastrar Veículo -->
                <div class="form-container">
                    <h1 class="form-titulo"><?php echo $titulo ?></h1>
                    <form action="../control/cadastrarVeiculo.php" method="POST" name="formCadastroVeiculo">
                        
                    <!-- ComboBox Categoria do veículo -->
                        <div class="form-campo">
                            <label for="categoria" class="form-subtitulo">Categoria:</label>
                            <select name="categoria" id="categoria" class="form-input" >
                                <option value="ACC" <?php echo $selecaoCategorias["ACC"] ?>>ACC</option>
                                <option value="A" <?php echo $selecaoCategorias["A"] ?>>A</option>
                                <option value="B" <?php echo $selecaoCategorias["B"] ?>>B</option>
                                <option value="C" <?php echo $selecaoCategorias["C"] ?>>C</option>
                                <option value="D" <?php echo $selecaoCategorias["D"] ?>>D</option>
                                <option value="E" <?php echo $selecaoCategorias["E"] ?>>E</option>
                            </select>
                        </div>

                        <!-- Radio: Veículo adaptado? -->
                        <div class="form-campo">
                            <label class="form-subtitulo">Veículo adaptado?</label>
                            <div style="display: flex; align-items: center;">
                                <input type="radio" name="adaptado" value="true" id="sim" <?php echo $adaptadoS; ?>>
                                <label for="sim">Sim</label>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <input type="radio" name="adaptado" value="false" id="nao" <?php echo $adaptadoN; ?>>
                                <label for="nao">Não</label>
                            </div>
                        </div>

                        <!-- Campo Placa -->
                        <div class="form-campo">
                            <label for="placa" class="form-subtitulo">Placa:</label>
                            <input type="text" name="txtPlaca" id="placa" placeholder="ex.: QTP5F71" maxlength="7"
                                class="form-input" value="<?php echo $placa ?>">
                        </div>

                        <!-- Campo Marca -->
                        <div class="form-campo">
                            <label for="marca" class="form-subtitulo">Marca:</label>
                            <input type="text" name="txtMarca" id="marca" placeholder="ex.: Fiat" class="form-input"
                                value="<?php echo $marca ?>">
                        </div>

                        <!-- Campo Modelo -->
                        <div class="form-campo">
                            <label for="modelo" class="form-subtitulo">Modelo</label>
                            <input type="text" name="txtModelo" id="modelo" placeholder="ex.: Uno" class="form-input"
                                value="<?php echo $modelo ?>">
                        </div>

                        <!-- Campo Ano -->
                        <div class="form-campo">
                            <label for="ano" class="form-subtitulo">Ano de fabricação:</label>
                            <input type="number" name="ano" id="ano" placeholder="ex.: 2013" class="form-input"
                                value="<?php echo $ano ?>">
                        </div>

                        <div class="form-div-btn">
                            <button type="input" class="form-btn" name="btnCadastrar" value="<?php echo $botao ?>"><?php echo $botao ?></button>
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
        // document.getElementById('ano').value = '2000';
    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>