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
     
   <!--Buscando os dados com php-->
     <?php
        require_once "../model/veiculoDAO.php";
        require_once "../model/aulaPraticaDAO.php";
        if(isset($_GET["id"])){
        $id = $_GET["id"];
        $resultado=pesquisarVeiculoPorPlaca($id);
        $row=mysqli_fetch_assoc($resultado);
        $marca=$row['marca'];
        $modelo=$row["modelo"];
        $categoria=$row["sigla_categoria"];
        $ano=$row["ano"];
        $adaptado=$row["adaptado"];
        if($adaptado==0){
            $x="não";
        }
        else{
            $x="sim";
        }
            
        //busca informações de aula
        $resultado2=pesquisarAulaPorPlaca($id);
        $aulas=mysqli_num_rows($resultado2);
        
        //busca informação de instrutores
        
        }
    ?>
</head>
<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <?php
            require_once "navbar-chamar.php";
            $navbar = chamarNavbar();              
            echo $navbar;
        ?>

        <di class="layout">
        <header>
            <div>
                <span class="header-icon">
                    <i class="bi bi-person-fill"></i>
                </span>
                <span class="header-title"><?php echo "$marca $modelo $id"; ?></span>
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
                    
                        <br>
                        <h3 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Aulas</h3>
                        <p><strong>Quantidade de Aulas com o veículo:</strong> <?php echo $aulas; ?></p>
                        <p><strong>Instrutor Vinculado:</strong>#pegar no banco veiculo-instrutor<br>#tamofazendo</p>
                    
                        
                        
                        
                    </div>

                    <!--BOTÕES DE AÇÃO CADASTRAR E EXCLUIR -->
                    <div class="col-sm-2" style="display:flex;flex-direction:column;align-content:flex-start" ><br>
                        <input type="button" id="btnExcluir" name="btnAlterar" value="Alterar" class="form-btn" style="background-color: #216EC0; border-color:#216EC0 ;">
                        <br><br>
                        <input type="button" id="btnExcluir" name="btnPesq" value="Excluir" class="form-btn" style="background-color: #216EC0; border-color:#216EC0 ;">
                    </div>
                  
                </div>
            </main>
            <div class="overlay"></div>
        </div>
    </div>
    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>