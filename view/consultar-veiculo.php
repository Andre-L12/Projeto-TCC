<?php
    require_once "../control/validarUsuario.php";
 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Veiculo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"> -->
    
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <!-- <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'> -->
    <link rel="stylesheet" href="./navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="icon" href="../img/AutoCFCicon.png" type="image/x-icon">

</head>
<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        
        <!--Buscando os dados com php-->
        <?php
            require_once "../model/veiculoDAO.php";
            require_once "../model/aulaPraticaDAO.php";
            if(isset($_GET["id"])){
            $id = $_GET["id"];
            $resultado = pesquisarVeiculoPorPlaca($id);
            $row = mysqli_fetch_assoc($resultado);
            $marca = $row['marca'];
            $modelo = $row["modelo"];
            $categoria = $row["sigla_categoria"];
            $ano = $row["ano"];
            $adaptado = $row["adaptado"];
            if ($adaptado == 0){
                $x = "Não";
            }
            else{
                $x = "Sim";
            }
                
            //busca informações de aula
            // $resultado2=pesquisarAulaPorPlaca($id);
            // $aulas=mysqli_num_rows($resultado2);
            
            //busca informação de instrutores
            
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
                <span class="header-title">VEÍCULOS > <?php echo "$marca $modelo $id"; ?></span>
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
                    <div class="col-sm-5" style="font-family: Arial, sans-serif; color: #333;">
                        <h3 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Dados do veículo</h3>
                        <p><strong>Placa:</strong> <?php echo $id; ?></p>
                        <p><strong>Modelo:</strong> <?php echo $modelo; ?></p>
                        <p><strong>Marca:</strong> <?php echo $marca; ?></p>
                        <p><strong>Ano:</strong> <?php echo $ano; ?></p>
                        <p><strong>Categoria:</strong> <?php echo $categoria; ?></p>
                        <p><strong>Adaptado:</strong> <?php echo $x; ?></p>

                        <h3 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Aulas</h3>
                        <p><strong>Quantidade de Aulas com o veículo:</strong> <?php //echo $aulas; ?></p>
                        <p><strong>Instrutor Vinculado:</strong>#pegar no banco veiculo-instrutor<br>#tamofazendo</p>
                    
                        
                        
                        
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
        var id = "<?php echo $id; ?>"; // Placa

        document.getElementById('btnAlterar').addEventListener('click', function() {
            window.location.href = 'cadastrar-veiculo.php?id=' + id;
        });

        document.getElementById('btnExcluir').addEventListener('click', function() {
            // CONFIRMAR ANTES DE EXCLUIR
            var confirmacao = confirm("Você tem certeza de que deseja excluir este veículo?");
            
            if (confirmacao) {
                window.location.href = '../control/excluirVeiculo.php?id=' + id;
            }
            
        });
    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>