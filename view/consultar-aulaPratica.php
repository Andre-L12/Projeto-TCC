<?php
    require_once "../control/validarUsuario.php";
 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Aula Prática</title>

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
            require_once "../model/aulaPraticaDAO.php";
            require_once "../model/processoDAO.php";
            require_once "../model/instrutorDAO.php";   
            require_once "../model/cursoDAO.php";
            require_once "../model/AlunoDAO.php";
            require_once "../control/funçoesUteis.php";

            if(isset($_GET["id"])){
                $id = $_GET["id"];

                // Pegando dados da aula
                $resultado = pesquisarAulaPorId($id);
                $row = mysqli_fetch_assoc($resultado);

                $data = $row['data_aula'];
                
                $dataConvertida = converterDataParaPadraoBR($data);

                $hora = $row['hora_aula'];
                $status_detran = $row['status_detran'];
                $obrigatoria = $row['obrigatoria'];
                $status_aula = $row['status_aula'];
                $id_veiculo = $row['id_veiculo'];
                $id_instrutor = $row['id_instrutor'];
                $id_processo = $row['id_processo'];

                // Pegando dados do processo
                $resultado_processo = pesquisarProcessoPorID($id_processo);
                $row_processo = mysqli_fetch_assoc($resultado_processo);
                
                $id_aluno = $row_processo['id_aluno'];
                $id_curso = $row_processo['id_curso'];

                // Pegando dados do aluno
                $resultado_aluno = pesquisarAlunoPorID($id_aluno);
                $row_aluno = mysqli_fetch_assoc($resultado_aluno);

                $nome_aluno = $row_aluno['nome'];

                // Pegando dados do instrutor
                $resultado_instrutor = pesquisarInstrutorPorID($id_instrutor);
                $row_intrutor = mysqli_fetch_assoc($resultado_instrutor);

                $nome_instrutor = $row_intrutor['nome'];

                // Pegando dados do curso
                $resultado_curso = pesquisarCursoPorSigla($id_curso);
                $row_curso = mysqli_fetch_assoc($resultado_curso);

                $descricao_curso = $row_curso['descricao'];


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
                <!-- Form Cadastrar Aluno -->
                <div style="display: flex; flex-direction: row; justify-content: space-between; padding: 20px; background-color: #f4f4f4;   border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="col-sm-5" style="font-family: Arial, sans-serif; color: #333; width: 500px"><!--display:flex; flex-direction:column; justify-content:space-between;-->
                        <!--<div >-->
                            <h2 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Dados de Aula Prática</h3>
                            <p><strong>Aluno:</strong><a href='consultar-aluno.php?id=<?php echo $id_aluno?>'> <?php echo $nome_aluno; ?></a></p>
                            <p><strong>Instrutor:</strong> <?php echo $nome_instrutor; ?></p>
                            <p><strong>Curso:</strong> <?php echo $descricao_curso; ?></p>
                            <p><strong>Data:</strong> <?php echo $dataConvertida; ?></p>
                            <p><strong>Hora:</strong> <?php echo substr($hora, 0, 5); ?></p>
                            <p><strong>Obrigatória:</strong> <?php echo $obrigatoria == 1 ? "Sim" : "Não"; ?></p>
                            <p><strong>Status Detran:</strong> <?php echo $obrigatoria == 1 ? ($status_detran == 1 ? "Atualizada no sistema" : "<FONT color=red>Não atualizada no sistema</FONT>") : "-"; ?></p>
                            <p><strong>Status da aula:</strong> <?php echo $status_aula; ?></p>

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
            
            window.location.href = 'cadastrar-aula.php?id=' + id;
        });

        document.getElementById('btnExcluir').addEventListener('click', function() {
            var id = "<?php echo $id; ?>";

            // CONFIRMAR ANTES DE EXCLUIR
            var confirmacao = confirm("Você tem certeza de que deseja excluir este aluno?");
            
            if (confirmacao) {
                window.location.href = '../control/excluirAula.php?id=' + id; 
            }
            
        });
    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>