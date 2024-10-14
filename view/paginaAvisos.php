<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avisos</title>

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
<style>
    /* Estilos dos cards */
    .card {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border-radius: 10px;
      padding: 1em;
      background-color: #fff;
      box-shadow: 0 0.0625em 0.25em rgba(0, 20, 50, 0.2), 0 0.5em 0.5em 0.125em rgba(0, 20, 50, 0.1);
      font-family: Arial, sans-serif;
      color: #333;
      margin-bottom: 20px;
    }

    .card-title {
      font-size: 1.2em;
      margin-bottom: 10px;
      font-weight: bold;
      border-bottom: 2px solid #007bff;
      padding-bottom: 5px;
    }

    .card-body {
      font-size: 1em;
      margin-bottom: 10px;
    }

    .card-footer {
      text-align: right;
      font-size: 0.8em;
      color: #777;
    }
</style>
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
                    <i class="bi bi-bell-fill"></i>
                </span>
                <span class="header-title">Avisos</span>
            </div>
        </header>
            <main class="content">

            <div class="container" id="avisos" style="width:90%;">
                <!-- Espaço onde os avisos do banco de dados serão inseridos com PHP -->

                <?php
                  // Aqui vai a lógica para buscar avisos do banco de dados
                  // Supondo que $avisos seja o array com os avisos do banco:
                  /*
                  foreach ($avisos as $aviso) {
                      echo '
                      <div class="card">
                        <div class="card-title">' . $aviso["titulo"] . '</div>
                        <div class="card-body">' . $aviso["conteudo"] . '</div>
                        <div class="card-footer">Publicado em: ' . $aviso["data"] . '</div>
                      </div>';
                  }
                  */
                ?>

                <!-- Exemplo de avisos estáticos para visualização -->
                <div class="card">
                  <div class="card-title">Aviso 1</div>
                  <div class="card-body">Este é o conteúdo do primeiro aviso.</div>
                  <div class="card-footer">Publicado em: 2024-10-12</div>
                </div>

                <div class="card">
                  <div class="card-title">Aviso 2</div>
                  <div class="card-body">Este é o conteúdo do segundo aviso.</div>
                  <div class="card-footer">Publicado em: 2024-10-11</div>
                </div>

                <div class="card">
                  <div class="card-title">Aviso 3</div>
                  <div class="card-body">Este é o conteúdo do terceiro aviso.</div>
                  <div class="card-footer">Publicado em: 2024-10-10</div>
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