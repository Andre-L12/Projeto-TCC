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

  <link rel="icon" href="../img/AutoCFCicon.png" type="image/x-icon">
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
          require_once "../model/funcoesBD.php";
          $cards = comboBoxCardAvisos();
          if ($cards == "") {
            echo '<div style="text-align: center; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 5px; color: #666; font-family: Arial, sans-serif; font-size: 16px;">
                              <p><strong>Não há avisos no momento.</strong></p>
                          </div>';
          } else {
            echo $cards;
          }
          ?>


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