<!-- Toda página que puxar Navbar terá que ter essa base -->

<?php
require_once "../control/validarUsuario.php";
require_once  "../model/aulaPraticaDAO.php";
$resultado = pesquisarAulaPorIDAluno($_SESSION["id_aluno"]);
$row = mysqli_fetch_assoc($resultado);
$qtd = mysqli_num_rows($resultado);
$idInstrutor = $row['id_instrutor'];
require_once "../model/instrutorDAO.php";
$resultado2 = pesquisarInstrutorPorID($idInstrutor);
$row2 = mysqli_fetch_assoc($resultado2);
$instrutor = $row2['nome'];

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Aluno</title>

  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
  <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>
  <link rel="stylesheet" href="./navbar-estilos.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

  <link rel="icon" href="../img/AutoCFCicon.png" type="image/x-icon">

</head>
<style>
  /* Estilos do calendário encapsulados */
  .custom-calendar * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  .custom-calendar body {
    display: flex;
    min-height: 100vh;
    padding: 5vh 5vw;
    color: #37474f;
    line-height: 1.5;
    font-family: Lato, sans-serif;
    background-color: #cfd8dc;
  }

  .custom-calendar .calendar-wrap {
    width: 350px;
    /* Diminuindo o tamanho do calendário */
    padding: 0.75em;
    margin-left: 20px;
    /* Movendo o calendário mais para a esquerda */
    font-size: 1rem;
    /* Ajustando o tamanho da fonte para menor */
    background-color: #fff;
    border-radius: 1.5em;
    user-select: none;
    box-shadow: 0 0.0625em 0.25em rgba(0, 20, 50, 0.2), 0 0.5em 0.5em 0.125em rgba(0, 20, 50, 0.1);
  }

  /*@media (min-width: 500px) {
      .custom-calendar .calendar-wrap {
        width: 350px;  Ajustando o tamanho para dispositivos maiores 
        font-size: 1rem;  Ajustando o tamanho da fonte para dispositivos maiores 
      }*/


  .custom-calendar .month-year {
    margin-bottom: 0.75em;
    font-weight: strong;
    font-size: 1.25em;
    text-align: center;
    color: #216EC0;

  }

  .custom-calendar .calendar {
    table-layout: fixed;
    width: 100%;
    margin-bottom: 0.75em;
    overflow: hidden;
    border-collapse: collapse;
    -webkit-tap-highlight-color: transparent;
  }

  .custom-calendar .day-title {
    width: 4em;
    height: 4em;
    color: #216EC0;
    vertical-align: top;
    font-weight: bold;
    font-size: 0.75em;
    text-transform: uppercase;
    letter-spacing: 0.0625em;
    box-shadow: inset 0 -0.875em #fff, inset 0 -1em rgba(0, 20, 50, 0.1);
  }

  .custom-calendar .day {
    position: relative;
    height: 3em;
  }

  .custom-calendar .day-number {
    display: flex;

    justify-content: center;
    align-items: center;
    height: 3em;
    border-radius: 50%;
  }

  .custom-calendar .marked-date {
    background-color: rgb(84, 144, 223);
    /* Cor dos dias com aula */
    color: white;
  }

  /* Estilo do modal */
  .custom-calendar .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
    padding-top: 60px;
  }

  .custom-calendar .modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
  }

  .custom-calendar .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .custom-calendar .close:hover,
  .custom-calendar .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  /* Estilos para telas grandes */
  .container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }

  /* Cada div individual terá o mesmo tamanho */
  .custom-calendar,
  .card {
    width: 45%;
    /* Ocupa 45% da tela cada um, ajustável conforme necessário */
    margin: 10px;
  }

  /* Estilos para telas menores (celulares) */
  @media (max-width: 768px) {
    .container {
      display: flex;
      flex-direction: column;
      /* Coloca os divs um embaixo do outro */
    }

    .custom-calendar,
    .card {
      width: 100%;
      /* Faz com que o div ocupe 100% da largura em telas menores */
      margin: 10px 0;
    }
  }

  .modal {
    display: none;
    position: fixed;
    z-index: 10;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
  }

  .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
  }

  .close {
    position: absolute;
    top: 10px;
    right: 15px;
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    cursor: pointer;
  }
</style>


<body>

  <div class="layout has-sidebar fixed-sidebar fixed-header">
    <?php
    require_once "navbar-aluno.php";
    ?>

    <div class="layout">
      <header>
        <div>
          <span class="header-icon">
            <i class="bi bi-grid-fill"></i>
          </span>
          <span class="header-title">MENU ALUNO</span>
        </div>
      </header>
      <main class="content">
        <div style="display: flex; align-items: center; justify-content: center; flex-direction: column; background-color: #eef6fd; padding: 20px; border-radius: 15px; margin: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
          <img src="../img/AutoCFCicon.png" alt="Logo Auto CFC" style="width: 120px; height: auto; margin-bottom: 15px;">
          <h1 style="font-family: 'Poppins', sans-serif; color: #216EC0; margin: 0; font-size: 24px;">Bem-vindo(a), <?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Usuário não logado'; ?>!</h1>
          <p style="font-family: 'Poppins', sans-serif; color: #333; text-align: center; max-width: 600px; margin-top: 10px; font-size: 16px;">
            Estamos felizes em tê-lo no nosso sistema! Aqui você poderá acompanhar suas aulas, visualizar conteúdos importantes e progredir rumo à sua habilitação com facilidade.
            Qualquer dúvida, não hesite em entrar em contato com a equipe da Auto CFC. Boa jornada!
          </p>
        </div>


        <div>
          <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
            <i class="ri-menu-line ri-xl"></i>
          </a>
          <div class="container">
            <div class="custom-calendar">
              <div class="calendar-wrap">
                <h2 class="month-year" id="monthYear"></h2>
                <table class="calendar">
                  <thead>
                    <tr>
                      <th class="day-title">Sun</th>
                      <th class="day-title">Mon</th>
                      <th class="day-title">Tue</th>
                      <th class="day-title">Wed</th>
                      <th class="day-title">Thu</th>
                      <th class="day-title">Fri</th>
                      <th class="day-title">Sat</th>
                    </tr>
                  </thead>
                  <tbody id="calendarBody"></tbody>
                </table>
                <button id="prevMonth">←</button>
                <button id="nextMonth">→</button>
              </div>
            </div>
            <!-- Card Processo -->
            <div class="card" style="border-radius: 15px; width: 350px; padding: 1em; background-color: #fff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease;">
              <div style="text-align: left;">
                <h3 style="border-bottom: 2px solid #216EC0; color: #216EC0; padding-bottom: 10px; font-family: 'Poppins', sans-serif;">Processo</h3>
                <p style="margin: 0.5em 0; color: #333; font-size: 1.5em; line-height: 1.6;">
                  <strong>Quantidade de Aulas:</strong> <?php echo $qtd; ?>
                </p>
                <p style="margin: 0.5em 0; color: #333; font-size: 1.5em; line-height: 1.6;">
                  <strong>Instrutor:</strong> <?php echo $instrutor; ?>
                </p>
                <p style="margin: 0.5em 0; color: #333; font-size: 1.5em; line-height: 1.6;">
                  <strong>Aulas Obrigatórias:</strong> 20
                </p>
                <p style="margin: 0.5em 0; color: #333; font-size: 1.5em; line-height: 1.6;">
                  <strong>Aulas Restantes:</strong> <?php echo (20 - $qtd); ?>
                </p>
              </div>
            </div>

            <!-- Card Etapa -->
            <div class="card" style="border-radius: 15px; width: 350px; padding: 1em; background-color: #fff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease;">
              <div style="text-align: left;">
                <h3 style="border-bottom: 2px solid #216EC0; color: #216EC0; padding-bottom: 10px; font-family: 'Poppins', sans-serif;">
                  Etapa <?php echo $_SESSION["id_aluno"]; ?>
                </h3>
                <p>
                  <img src="../img/aula pratica.jpg" alt="Imagem relacionada à etapa" style="width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                </p>
              </div>
            </div>
          </div>


      </main>
      <div class="overlay"></div>
    </div>
  </div>

  <script src='https://unpkg.com/@popperjs/core@2'></script>
  <script src="navbar-script.js"></script>

  <div id="lessonModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Detalhes da Aula</h2>
      <p id="lessonDetails"></p>
    </div>
  </div>

  <script>
    <?php
    // Exemplo de array com as datas
    require_once "../model/funcoesBD.php";
    $datasMarcadas = pesquisarDatas($_SESSION["id_aluno"]);
    // Convertendo o array PHP para um array JavaScriptm
    echo "const markedDates = " . json_encode($datasMarcadas) . ";";
    echo "const id = " . json_encode($_SESSION["id_aluno"]) . ";";
    ?>

    let currentDate = new Date();

    function renderCalendar() {
      const monthYearDisplay = document.getElementById("monthYear");
      const calendarBody = document.getElementById("calendarBody");

      const year = currentDate.getFullYear();
      const month = currentDate.getMonth();

      monthYearDisplay.textContent = currentDate.toLocaleDateString("en-US", {
        month: "long",
        year: "numeric"
      });

      const firstDayOfMonth = new Date(year, month, 1).getDay();
      const daysInMonth = new Date(year, month + 1, 0).getDate();

      calendarBody.innerHTML = ""; // Limpar o calendário

      let row = document.createElement("tr");
      for (let i = 0; i < firstDayOfMonth; i++) {
        row.appendChild(document.createElement("td"));
      }

      for (let day = 1; day <= daysInMonth; day++) {
        const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const cell = document.createElement("td");
        cell.classList.add("day");

        const span = document.createElement("span");
        span.classList.add("day-number");
        span.textContent = day;

        if (markedDates.includes(dateStr)) {
          span.classList.add("marked-date");

          span.addEventListener("click", function() {
            openModal(dateStr, id); // Função para abrir o modal e passar a data
          });

          // Fechar o modal ao clicar no X
          document.querySelector(".close").addEventListener("click", function() {
            document.getElementById("lessonModal").style.display = "none";
          });

          // Fechar o modal ao clicar fora dele
          window.addEventListener("click", function(event) {
            const modal = document.getElementById("lessonModal");
            if (event.target === modal) {
              modal.style.display = "none";
            }
          })
        }


        cell.appendChild(span);
        row.appendChild(cell);

        if ((day + firstDayOfMonth) % 7 === 0) {
          calendarBody.appendChild(row);
          row = document.createElement("tr");
        }
      }
      if (row.children.length > 0) {
        calendarBody.appendChild(row);
      }
    }

    document.getElementById("prevMonth").addEventListener("click", function() {
      currentDate.setMonth(currentDate.getMonth() - 1);
      renderCalendar();
    });

    document.getElementById("nextMonth").addEventListener("click", function() {
      currentDate.setMonth(currentDate.getMonth() + 1);
      renderCalendar();
    });

    renderCalendar();

    function openModal(date, id) {
      const modal = document.getElementById("lessonModal");
      const lessonDetails = document.getElementById("lessonDetails");

      lessonDetails.textContent = `<p>` + date + ` - ` + id + `</p>`;
      modal.style.display = "block"; // Exibe o modal
      return;

      $.ajax({
        url: '../control/miniCalendario_JSON.php', // URL para o script PHP
        type: 'POST', // Método POST
        data: {
          data: date,
          id: id
        }, // Dados enviados para o servidor
        dataType: 'json', // Especifica que o retorno será JSON
        success: function(data) {
          if (data.erro) {
            lessonDetails.textContent = `<p>` + data.erro + `</p>`;
          } else {
            data.aula.forEach(function(obj, i) {
              lessonDetails.textContent = `
                    <p><strong>ID Aula:</strong>` + obj.id_aula + `</p>
                    <p><strong>Data:</strong> ` + obj.data + `</p>
                    <p><strong>Hora:</strong> ` + obj.hora + `</p>
                    <p><strong>Instrutor:</strong>` + obj.instrutor + `</p>
                    <p><strong>Placa:</strong> ` + obj.placa + `</p>
                    <p><strong>Marca:</strong> ` + obj.marca + `</p>
                    <p><strong>Modelo:</strong> ` + obj.modelo + `</p>
                    <p><strong>ID Processo:</strong> ` + obj.processo + `</p>
                    <p><strong>Obrigatória:</strong> ` + obj.obrigatoria + `</p>`;
            });

          }

          modal.style.display = "block"; // Exibe o modal
        },
        error: function() {
          lessonDetails.textContent = "<p>Erro ao carregar os dados. Tente novamente mais tarde.</p>";
          modal.style.display = "block"; // Exibe o modal mesmo em caso de erro
        }
      })
    }
  </script>
</body>

</html>