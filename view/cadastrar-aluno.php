<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"> -->
    
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <!-- <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'> -->
    <link rel="stylesheet" href="navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

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
                    <i class="bi bi-person-fill"></i>
                </span>
                <span class="header-title">ALUNOS</span>
            </div>
        </header>
            <main class="content">
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                </div>
                <!-- Form Cadastrar Aluno -->
                <div class="form-container">
                    <h1 class="form-titulo">Cadastrar Aluno</h1>
                    <form action="../control/cadastrarAluno.php" method="POST" name="formCadastroAluno" enctype="multipart/form-data">
                        <!-- Campo nome -->
                        <div class="form-campo">
                            <label for="nome" class="form-subtitulo">Nome completo:</label>
                            <input type="text" name="txtNome" id="nome" placeholder="Digite o nome aqui" class="form-input">
                        </div>

                        <!-- Campo CPF -->
                        <div class="form-campo">
                            <label for="cpf" class="form-subtitulo">CPF:</label>
                            <input type="text" name="txtCPF" id="cpf" placeholder="ex.: 000.000.000-00" class="form-input">
                        </div>

                        <!-- Campo EMAIL -->
                        <div class="form-campo">
                            <label for="email" class="form-subtitulo">Email:</label>
                            <input type="email" name="email" id="email" placeholder="ex.: aluno10@gmail.com" class="form-input">
                        </div>

                        <!-- Campo CELULAR -->
                        <div class="form-campo">
                            <label for="celular" class="form-subtitulo">Celular:</label>
                            <input type="tel" name="celular" id="celular" onkeyup="handlePhone(event)" placeholder="ex.: (27) 99955-1899" class="form-input">
                        </div>

                        <!-- Campo foto -->
                        <div class="form-campo">
                            <label for="foto" class="form-subtitulo">Foto:</label>
                            <input type="file" name="foto" style="margin-top: 5px;">
                        </div>

                        <!-- Botão cadastrar -->
                        <div>
                            <button type="submit" name="btnCadastrar" value="Cadastrar" class="form-btn">Cadastrar</button>
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