<?php
    require_once "../control/validarUsuario.php";
 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Aluno</title>

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
            require_once "../model/AlunoDAO.php";
            require_once "../model/aulaPraticaDAO.php";
            require_once "../model/processoDAO.php";
            require_once "../model/cursoDAO.php";
            require_once "../control/funçoesUteis.php";

            if(isset($_GET["id"])){
            $id = $_GET["id"];
            $resultado = pesquisarAlunoPorID($id);
            $row = mysqli_fetch_assoc($resultado);
            $nome = $row['nome'];
            $cpf = $row["cpf"];
            $id = $row["id_aluno"];
            $email = $row["email"];
            $celular = $row["celular"];
            $foto = $row["foto"];
            $imageBase64 = base64_encode($foto);
            $resultado2 = pesquisarAulaPorCPFAluno($cpf);
             $aulas = mysqli_num_rows($resultado2);
             $row2=mysqli_fetch_assoc($resultado2);
             $instrutor = "Nenhuma aula marcada.";
             if ($aulas > 0) {
               require_once "../model/instrutorDAO.php";
               $idInstrutor = $row2['id_instrutor'];
           
               $resultado2 = pesquisarInstrutorPorID($idInstrutor);
               $row2 = mysqli_fetch_assoc($resultado2);
               $instrutor = $row2['nome'];
             } 
            $aulasObrigatorias="20 cada processo";
             

            //buscando processos
            $resultado_processo = pesquisarProcessoPorIDAluno($id);
            $qtd_processos = mysqli_num_rows($resultado_processo);
            $cursos = [];
            if($qtd_processos > 0){
                while ($registro = mysqli_fetch_assoc($resultado_processo)){
                    $id_curso = $registro["id_curso"];
                    $descricao_curso = mysqli_fetch_array(pesquisarCursoPorSigla($id_curso))["descricao"];
                    $cursos[] = [$descricao_curso, $registro["id_processo"], $registro["data_inicio"]];
                }
            }

            while ($registro = mysqli_fetch_assoc($resultado)) {
                // Pegar os campos do REGISTRO
                $id = $registro["id_instrutor"];
                $nome = $registro["nome"];
        
                $options = $options . "<OPTION value='$id'>$nome</OPTION>";
            }
            
            //buscando a quantidade de aulas| depois podemos filtrar quantas são obrigatorias e quatas não são

            // $resultado2 = pesquisarAulaPorCPFAluno($cpf);
            // $aulas = mysqli_num_rows($resultado2);

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
                <span class="header-title"><a href="pesquisar-aluno.php" style="color:inherit"> ALUNOS </a>> <?php echo $nome; ?></span>
            </div>
        </header>
            <main class="content">
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                </div>
                <!-- Form Cadastrar Aluno -->
                <div style="display: flex; flex-direction: row; justify-content: space-between; padding: 20px; background-color: #f4f4f4; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="col-sm-5" style="font-family: Arial, sans-serif; color: #333; width: 500px"><!--display:flex; flex-direction:column; justify-content:space-between;-->
                        <!--<div >-->
                            <h2 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Dados Pessoais</h3>
                            <p><strong>Foto:</strong><br><img src='data:image/jpeg;base64,<?php echo $imageBase64; ?>' height='100' width='100' style="border-radius: 50%; object-fit: cover;"></p>
                            <p><strong>Nome:</strong> <?php echo $nome; ?></p>
                            <p><strong>CPF:</strong> <?php echo $cpf; ?></p>
                            <p><strong>Email:</strong> <?php echo $email; ?></p>
                            <p><strong>Celular:</strong> <?php echo $celular; ?></p>
                        <!--</div>-->
                        <!--<div >-->
                            <h2 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Processos</h3>
                            <p><strong>Quantidade de Processos:</strong> <?php echo $qtd_processos; ?></p>
                        <!--</div>-->
                        <!--<div >-->
                            <?php 
                                foreach ($cursos as $curso) {
                                    echo "<h3 style=\"border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;\">$curso[0]</h3>";
                                    echo "<p><strong>Data Início: </strong>" . converterDataParaPadraoBR($curso[2]) . "</p>";

                                    $resultado_aulas = pesquisarAulaPorProcesso($curso[1]);
                                    $qtd_aulas = mysqli_num_rows($resultado_aulas);

                                    if ($qtd_aulas == 1) {
                                        echo "<p><strong>Andamento: </strong>$qtd_aulas aula realizada de 20.</p>";
                                    } else {
                                        echo "<p><strong>Andamento: </strong>$qtd_aulas aulas realizadas de 20.</p>";
                                    }
                                    
                                }
                            ?>
                            <!-- <h3 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;"></h3> -->
                            <!-- <h2 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Aulas</h2> -->
                            <!-- <p><strong>Quantidade de Aulas:</strong>
                                <?php echo $aulas; ?>
                            </p>
                            <p><strong>Instrutor: </strong><?php echo $instrutor; ?></p>
                            <p><strong>Aulas Obrigatórias:</strong> <?php echo $aulasObrigatorias=20;?></p>
                            <br> -->
                       <!-- </div>-->

                    </div>

                    <!--BOTÕES DE AÇÃO CADASTRAR E EXCLUIR -->
                    
                    <div class="col-sm-2" style="display:flex;flex-direction:column;align-content:flex-start; width: 250px" ><br>
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
            
            window.location.href = 'cadastrar-aluno.php?id=' + id;
        });

        document.getElementById('btnExcluir').addEventListener('click', function() {
            var id = "<?php echo $id; ?>";

            // CONFIRMAR ANTES DE EXCLUIR
            var confirmacao = confirm("Você tem certeza de que deseja excluir este aluno?");
            
            if (confirmacao) {
                window.location.href = '../control/excluirAluno.php?id=' + id;
            }
            
        });
    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>