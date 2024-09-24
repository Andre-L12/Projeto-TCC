<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Processo</title>

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
</head>
<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <!--Buscando os dados com php-->
        <?php
            require_once "../model/AlunoDAO.php";
            require_once "../model/aulaPraticaDAO.php";
            require_once "../model/processoDAO.php";
            require_once "../model/cursoDAO.php";
            if(isset($_GET["id"])){
            $id = $_GET["id"];
            $resultado=pesquisarProcessoPorID($id);
            $row=mysqli_fetch_assoc($resultado);
            $cpf_aluno=$row['cpf_aluno'];
            $data_inicio=$row["data_inicio"];
            $sigla=$row["curso"];

            function adicionarUmAno($data_inicio) {
                // Criar um objeto DateTime com a data original
                $data = new DateTime($data_inicio);
            
                // Adicionar um ano à data
                $data->modify('+1 year');
            
                // Retornar a nova data formatada como 'Y-m-d' (ano-mês-dia)
                return $data->format('Y-m-d');
            }

            $datafim = adicionarUmAno($data_inicio);
            function verificarPrazo($dataFim) {
                // Data atual
                $dataAtual = new DateTime();
            
                // Data de fim recebida como parâmetro
                $dataFinal = new DateTime($dataFim);
            
                // Calcula a diferença entre as duas datas
                $intervalo = $dataAtual->diff($dataFinal);
            
                // Transforma a diferença em meses totais (anos + meses)
                $mesesRestantes = ($intervalo->y * 12) + $intervalo->m;
            
                // Definir cor com base nos meses restantes
                if ($mesesRestantes < 3) {
                    $cor = 'red'; // Vermelha para menos de 3 meses
                } elseif ($mesesRestantes >= 3 && $mesesRestantes <= 6) {
                    $cor = 'yellow'; // Amarela entre 3 e 6 meses
                } else {
                    $cor = 'green'; // Verde para mais de 6 meses
                }
            
                // Exibe a data final com a cor correspondente
                return "<p style='color: $cor;'><strong>Data de fim: </strong>" . $dataFinal->format('d/m/y') . "</p>";
            }
            function converterData($dataBanco) {
                // Verifica se a data foi passada corretamente
                if (!$dataBanco || $dataBanco == '0000-00-00') {
                    return null; // Retorna null se a data não for válida
                }
            
                // Converte a data do formato Y-m-d para d/m/Y
                $dataConvertida = DateTime::createFromFormat('Y-m-d', $dataBanco)->format('d/m/Y');
            
                return $dataConvertida;
            }
            $dataInicio=converterData($data_inicio);

            $data_fim= verificarPrazo($datafim);

            //buscando pelo nome do aluno 
            $resultado3=pesquisarAlunoPorCPF($cpf_aluno);
            $row2=mysqli_fetch_assoc($resultado3);
            $nome=$row2["nome"];

            //buscando a descrição do curso vinculado ao processo
            $resultado2=pesquisarCursoPorSigla($sigla);
            $row3=mysqli_fetch_assoc($resultado2);
            $curso=$row3["descricao"];
            $categoria=$row3["categoria"];
            //busca veículo
            //busca cursos
            }
        ?>
        
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
                <span class="header-title"> PROCESSOS > <?php echo "$nome > $curso"; ?></span>
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
                    <div class="col-sm-5" style="font-family: Arial, sans-serif; color: #333;"><!--display:flex; flex-direction:column; justify-content:space-between;-->
                        <!--<div >-->
                            <h3 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Dados do processo</h3>
                            <p><strong>Nome do aluno:</strong> <?php echo $nome; ?></p>
                            <p><strong>CPF do alno:</strong> <?php echo $cpf_aluno; ?></p>
                            <p><strong>Processo Id:</strong> <?php echo $id; ?></p>
                            <p><strong>Data de inicio:</strong> <?php echo $dataInicio; ?></p>
                            <p><strong></strong> <?php echo $data_fim; ?></p>
                            
                            <br>
                            <h3 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Dados do Curso</h3>
                            <p><strong>Curso: </strong> <?php echo $curso; ?></p>
                            <p><strong>Sigla: </strong> <?php echo $sigla; ?></p>
                            <p><strong>Categoria: </strong> <?php echo $categoria; ?></p>
                            <br>
                       <!-- </div>-->

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
            window.location.href = 'cadastrar-processo.php?id='+ id;
        });

        document.getElementById('btnExcluir').addEventListener('click', function() {
            // CONFIRMAR ANTES DE EXCLUIR
            var confirmacao = confirm("Você tem certeza de que deseja excluir este processo?");
            
            if (confirmacao) {
                window.location.href = '../control/excluirProcesso.php?id=' + id;
            }
            
        });
    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>