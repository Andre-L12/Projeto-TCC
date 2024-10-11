
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dúvidas</title>

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
            /* require_once "../model/AlunoDAO.php";
            require_once "../model/aulaPraticaDAO.php";
            require_once "../model/processoDAO.php";
            if(isset($id_aluno)){
            $id = $id_aluno;
            $resultado = pesquisarAlunoPorID($id);
            $row = mysqli_fetch_assoc($resultado);
            $nome = $row['nome'];
            $cpf = $row["cpf"];
            $id = $row["id_aluno"];
            $email = $row["email"];
            $celular = $row["celular"];
            $foto = $row["foto"];
            $imageBase64 = base64_encode($foto);

            //buscando processos
            $resultado3 = pesquisarProcessoPorIDAluno($id);
            $qtd_processos = mysqli_num_rows($resultado3);
            $processos = comboBoxProcessoAluno($cpf); */
            
            //buscando a quantidade de aulas| depois podemos filtrar quantas são obrigatorias e quatas não são

            // $resultado2 = pesquisarAulaPorCPFAluno($cpf);
            // $aulas = mysqli_num_rows($resultado2);

            //busca veículo
            //busca cursos
            //}
         
        ?>
        
        <?php
        require_once "navbar-aluno.php";
        ?>

        <di class="layout">
        <header>
            <div>
                <span class="header-icon">
                    <i class="bi bi-question-diamond-fill   "></i>
                </span>
                <span class="header-title">Dúvidas</span>
            </div>
        </header>
            <main class="content">
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                </div>
                <!-- Form Cadastrar Aluno -->
                <div style=" padding: 20px; border-radius: 10px;">
                <div class="col-sm-5" style="font-family: Arial, sans-serif; color: #333; padding: 20px; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
                    <h3 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Perguntas Frequentes</h3>

                    <!-- Inserindo a imagem de dúvidas com carros repetidos -->
                    <img src="../img/duvidas.png" alt="Dúvidas sobre habilitação" style="max-width: 100%; height: auto; margin-bottom: 20px; border-radius: 10px;">

                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #007bff;">1. Quais são as etapas para tirar a habilitação?</h4>
                        <p style="line-height: 1.6;">O processo de habilitação no Brasil envolve várias etapas: a inscrição no Centro de Formação de Condutores (CFC), realização do exame médico e psicológico, aulas teóricas, exame teórico, aulas práticas e, finalmente, o exame prático de direção.</p>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #007bff;">2. Quanto tempo demora para tirar a habilitação?</h4>
                        <p style="line-height: 1.6;">O tempo varia de acordo com a disponibilidade do candidato e do CFC, mas, em média, o processo leva de 3 a 6 meses, dependendo de fatores como aprovação nos exames e tempo de agendamento das aulas.</p>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #007bff;">3. Qual a idade mínima para tirar a habilitação?</h4>
                        <p style="line-height: 1.6;">A idade mínima para se inscrever no processo de habilitação é 18 anos, e o candidato precisa estar em posse de um CPF e RG válidos.</p>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #007bff;">4. O que acontece se eu reprovar no exame prático?</h4>
                        <p style="line-height: 1.6;">Se você reprovar no exame prático, é necessário esperar um período de 15 dias para poder refazer o teste. Durante esse tempo, você pode realizar mais aulas práticas, caso necessário.</p>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #007bff;">5. Quais documentos são necessários para iniciar o processo?</h4>
                        <p style="line-height: 1.6;">Você precisa de RG, CPF, comprovante de residência atualizado e o pagamento das taxas de inscrição no CFC.</p>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #007bff;">6. Qual é a validade da CNH provisória?</h4>
                        <p style="line-height: 1.6;">A CNH provisória tem validade de 12 meses. Durante esse período, o condutor não pode cometer infrações graves, gravíssimas ou ser reincidente em infrações médias, sob pena de ter o documento suspenso.</p>
                    </div>
                </div>

                <!-- Nova div para informações sobre categoria e tipo de veículo -->
                <div class="col-sm-5" style="font-family: Arial, sans-serif; color: #333; padding: 20px; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-left: 20px;">
                    <h3 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;"> Categoria e Tipo de Veículo</h3>
                    <img src="../img/veiculos.jpg" alt="Veículo x Categoria dth: 100%;" style="max-width: 100%; height: auto; margin-bottom: 20px; border-radius: 10px;">

                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #007bff;">Categoria A</h4>
                        <p style="line-height: 1.6;">Permite conduzir motocicletas, motonetas e ciclomotores, sem limite de potência, além de permitir o uso de veículos da categoria B.</p>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #007bff;">Categoria B</h4>
                        <p style="line-height: 1.6;">Permite conduzir veículos automotores, exceto os que excedam 3.500 kg de peso bruto e com mais de 8 lugares, sem contar o do motorista. Inclui carros e utilitários.</p>
                    </div>


                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #007bff;">Categoria C</h4>
                        <p style="line-height: 1.6;">Permite conduzir veículos de carga com mais de 3.500 kg e veículos da categoria B.</p>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #007bff;">Categoria D</h4>
                        <p style="line-height: 1.6;">Permite conduzir veículos para transporte de passageiros, com mais de 8 lugares, além de permitir o uso de veículos das categorias B e C.</p>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #007bff;">Categoria E</h4>
                        <p style="line-height: 1.6;">Permite conduzir combinações de veículos, como reboques ou semi-reboques, além de permitir o uso de veículos das categorias B, C e D.</p>
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