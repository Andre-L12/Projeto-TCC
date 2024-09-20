<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Instrutor</title>

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
                <div>
                    <h1>Cadastrar Instrutor</h1>
                    <form action="../control/cadastrarInstrutor.php" method="POST" name="formCadastroInstrutor">
                        <div>
                            <!-- Campo nome -->
                            <div>
                                <label for="nome">Nome completo:</label>
                                <input type="text" name="txtNome" id="nome" placeholder="Digite o nome aqui">
                            </div>

                            <!-- Campo CPF -->
                            <div>
                                <label for="cpf">CPF:</label>
                                <input type="text" name="txtCPF" id="cpf" placeholder="ex.: 000.000.000-00">
                            </div>

                            <!-- Radio Sexo -->
                            <div>
                                <label>Sexo:</label>
                                <div style="display: flex; align-items: center;">
                                    <input type="radio" name="sexo" value="M" id="masc">
                                    <label for="masc">Masculino</label>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <input type="radio" name="sexo" value="F" id="fem">
                                    <label for="fem">Feminino</label>
                                </div>
                            </div>

                            <!-- Selecionar Curso -->
                            <div>
                                <label for="curso">Atua nos cursos:</label>
                                <select name="curso" id="opcoesCurso">
                                    <?php
                                        require_once "../model/cursoDAO.php";
                                        $options = comboBoxCursos();              
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
        // Máscara para CPF
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00');
        });
        // Máscara para Celular
         const handlePhone = (event) => {
        let input = event.target
        input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g,'')
        value = value.replace(/(\d{2})(\d)/,"($1) $2")
        value = value.replace(/(\d)(\d{4})$/,"$1-$2")
        return value
        }   
    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>