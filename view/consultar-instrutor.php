<?php
    require_once "../control/validarUsuario.php";
 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Instrutor</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"> -->
    
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <!-- <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'> -->
    <link rel="stylesheet" href="./navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

    <link rel="icon" href="../img/AutoCFCicon.png" type="image/x-icon">

</head>
<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        
        <!--Buscando os dados com php-->
        <?php
            require_once "../model/instrutorDAO.php";
            require_once "../model/aulaPraticaDAO.php";
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $resultado = pesquisarInstrutorPorID($id);
                $row = mysqli_fetch_assoc($resultado);
                $nome = $row['nome'];
                $cpf = $row["cpf"];
                $sexo = $row["sexo"];
                if ($sexo=="M"){
                    $x="Masculino";
                } else {
                    $x="Feminino";
                }
                $resultado2=pesquisarAulaPorIDInstrutor($id);
                $aulas=mysqli_num_rows($resultado2);
                $resultado3=selecionarCursoPorIdInstrutor($id);
                if($resultado3!=""){
                    $cursos=$resultado3;
                }else{
                    $cursos="Nenhum curso vinculado";
                }
                $resultado4=selecionarVeiculoPorIdInstrutor($id);
                if($resultado4!=""){
                    $veiculos=$resultado4;
                }else{
                    $veiculos="Nenhum veículo vinculado";
                }
                //busca aula
                // $resultado2=pesquisarAulaPorInstrutor($cpf);
                // $aulas=mysqli_num_rows($resultado2);

                //busca veículo
                //busca cursos
            }
        ?>
        
        <?php
        require_once "navbar.php";
        ?>

        <di class="layout">
        <header>
            <div>
                <span class="header-icon">
                    <i class="bi bi-person-fill"></i>
                </span>
                <span class="header-title">INSTRUTORES > <?php echo $nome; ?></span>
            </div>
        </header>
            <main class="content">
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                </div>

                

                <!-- Form Cadastrar Aluno -->
                <div style="display: flex; flex-direction: row; justify-content: space-between; padding: 20px; background-color: #f4f4f4;   border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="col-sm-5" style="font-family: Arial, sans-serif; color: #333; width: 500px">
                        <h2 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Dados Pessoais</h3>
                        <p><strong>Nome:</strong> <?php echo $nome; ?></p>
                        <p><strong>CPF:</strong> <?php echo $cpf; ?></p>
                        <p><strong>Sexo:</strong> <?php echo $x; ?></p>
                        <p><strong>ID:</strong> <?php echo $id; ?></p>
                        <h2 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Aulas</h3>
                        <p><strong>Quantidade de Aulas:</strong> <?php  echo $aulas; ?></p>
                        <p><strong>Cursos:</strong> <?php echo $cursos; ?></p>
                        <p><strong>Veículos:</strong> <?php echo $veiculos; ?></p>
                        
                    </div>

                    <!--BOTÕES DE AÇÃO CADASTRAR E EXCLUIR -->
                    <div class="col-sm-2" style="display:flex;flex-direction:column;align-content:flex-start" ><br>
                        <button type="button" id="btnAlterar" name="btnAlterar" value="Alterar" class="form-btn" style="background-color: #216EC0; border-color:#216EC0; margin-bottom: 15px;">Alterar</button>
                        <button type="button" id="btnExcluir" name="btnExcluir" value="Excluir" class="form-btn" style="background-color: #216EC0; border-color:#216EC0;">Excluir</button>
                    </div>
                  
                </div>
            </main>
            <div class="overlay"></div>
        </div>
    </div>

    <script>
        document.getElementById('btnAlterar').addEventListener('click', function() {
            var id = "<?php echo $id; ?>";
            
            window.location.href = 'cadastrar-instrutor.php?id=' + id;
        });

        document.getElementById('btnExcluir').addEventListener('click', function() {
            var id = "<?php echo $id; ?>";

            // CONFIRMAR ANTES DE EXCLUIR
            var confirmacao = confirm("Você tem certeza de que deseja excluir este instrutor?");
            
            if (confirmacao) {
                window.location.href = '../control/excluirInstrutor.php?id=' + id;
            }
            
        });
    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>