<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoCFC - Tela início</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">

    <link rel="icon" href="../img/AutoCFCicon.png" type="image/x-icon">
    
</head>
<body class="fundo-branco-azulado">
    <div style="display: flex;">
      <header>

        <!-- Barra de Navegação -->
        <nav>
          <!-- Cabeçalho -->
          <div class="cabecalho-navbar">
            <a class="logo-navbar" href="/"><img class="logo-icon-navbar" src="../img/AutoCFC.svg" alt="Logotipo AutoCFC">AutoCFC</a>
            <div class="seta-divbar">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
              </svg> 
            </div>
          </div>

          <!-- Usuário -->
          <div class="usuario-navbar">
            <img class="foto-usuario" src="../img/foto-perfil.jpg" alt="Foto de perfil">
            <div class="informacoes-usuario">
              <p class="nome-usuario">André Luiz Mendes Siqueira de Freitas</p>
              <p class="cpf-usuario">111.111.111-11</p>
            </div>
            <a class="botao-sair-usuario" href="tela-login.php">
              <svg class="sair-usuario" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
              </svg>
            </a>
            
          </div>

          <!-- Lista de navegação -->
          <ul class="lista-navbar">
            <li><a href="/">MENU</a></li>
            <li><a href="/">CALENDÁRIO</a></li>
            <li><a href="">ALUNOS</a></li>
            <li><a href="">INSTRUTORES</a></li>
            <li><a href="">AULAS PRÁTICAS</a></li>
            <li><a href="">VEÍCULOS</a></li>
            <li><a href="">PROCESSOS</a></li>
            <li><a href="">CURSOS</a></li>
          </ul>
          
        </nav>
      </header>
    
    <main>
      <div class="cabecalho-pagina">
        <a class="texto-cabecalho-pagina" href="/">MENU</a>
      </div>
      
      <section style="margin: 20px;">
        <button id="open-modal1" class="btn btn-primary" data-toggle="modal" data-target="#modal1" style="background-color: var(--Azul-Claro);">Cadastrar Instrutor</button>
        <button id="open-modal2" class="btn btn-primary" data-toggle="modal" data-target="#modal2" style="background-color: var(--Azul-Claro);">Cadastrar Aluno</button>
        <button id="open-modal3" class="btn btn-primary" data-toggle="modal" data-target="#modal3" style="background-color: var(--Azul-Claro);">Cadastrar Veículo</button>
        <button id="open-modal4" class="btn btn-primary" data-toggle="modal" data-target="#modal4" style="background-color: var(--Azul-Claro);">Aula Prática</button>
      </section>

      <!-- Button to open the modal -->
    
        <!-- Modal de cadastro de Instrutor -->
        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal1ModalLabel" style="color: var(--Azul-Claro)">Cadastro de Instrutor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="cadastrarInstrutorForm" action="../control/cadastrarInstrutor.php" method="POST">

                  <div class="form-group">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome">
                  </div>

                  <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF">
                  </div>

                  <div class="form-group">
                    <label>Sexo:</label>
                    <div style="display:flex; justify-items:flex-start; align-items: center;">
                      <input type="radio" id="masculino" name="sexo" value="M">
                      <label for="masculino" style="margin: 0; padding-left: 5px;">Masculino</label> 
                    </div>
                    <div style="display:flex; justify-items:flex-start; align-items: center;">
                      <input type="radio" id="feminino" name="sexo" value="F">
                      <label for="feminino" style="margin: 0; padding-left: 5px">Feminino</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="curso">Curso:</label>
                    <select name="curso" class="form-control">
                      <?php
                        require "../model/funcoesBD.php";
                        $options = ComboBoxCurso();              
                        echo $options;
                      ?>
                    </select>
                  </div>
                  <!-- <div class="form-group">
                    <label for="veiculos">Veículos:</label>
                    <select id="veiculos" class="form-control">
                      <option value="veiculo0"></option>
                      <option value="veiculo1">Veículo 1</option>
                      <option value="veiculo2">Veículo 2</option>
                      <option value="veiculo3">Veículo 3</option>
                    </select>
                  </div> -->

                  <div id="erroMensagem" class="text-danger"></div>
                
                  <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: var(--Cinza); color: var(--Preto-azulado); border: 0px solid var(--Cinza);">Cancelar</button>
                    <button type="submit" class="btn btn-outline-success bt-sm" style="background-color: var(--Azul-Claro); color: var(--Branco);" id="cadastrarInstrutorBotao" value="Cadastrar">Salvar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div id="notificacaoSucesso" class="alert alert-success" style="display: none;" role="alert">
          Cadastro realizado com sucesso!
        </div>

        <!-- Verificado até aqui pela Anna -->
        
        <!-- The Modal aluno -->
        <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2" style="color: #007bff">Cadastro de Aluno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="name">Nome Completo:</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf">
                  </div>
                  <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input type="text" class="form-control" id="celular" name="celular">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #007bff; color: #ffffff;">Close</button>
                <button type="button" class="btn btn-primary" style="background-color: #007bff; color: #ffffff;">Salvar</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- The Modal veículo -->
        <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3" style="color: #007bff">Cadastro de Veículo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="placa">Placa:</label>
                    <input type="text" class="form-control" id="placa" name="placa">
                  </div>
                  <div class="form-group">
                    <label for="modelo">Modelo:</label>
                    <input type="text" class="form-control" id="modelo" name="modelo">
                  </div>
                  <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select id="categoria" class="form-control">
                      <option value="categoria1">A</option>
                      <option value="categoria2">B</option>
                      <option value="categoria3">C</option>
                      <option value="categoria3">D</option>
                      <option value="categoria3">E</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Modificado:</label>
                    <div style="display: flex; justify-items:flex-start;">
                      <input type="radio" id="modificado_sim" name="modificado" value="sim">
                      <label for="modificado_sim">Sim</label>
                    </div>
                    <div style="display: flex; justify-items:flex-start;">
                      <input type="radio" id="modificado_nao" name="modificado" value="não">
                      <label for="modificado_nao">Não</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ano">Ano:</label>
                    <input type="number" class="form-control" id="ano" name="ano">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #007bff; color: #ffffff;">Close</button>
                <button type="button" class="btn btn-primary" style="background-color: #007bff; color: #ffffff;">Salvar</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- The Modal aula prática -->
        <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4" style="color: #007bff">Aula Prática</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="aluno">Aluno:</label>
                    <select name="aluno" class="form-control">
                      <?php
                        require "../model/funcoesBD.php";
                        $options = ComboBoxAluno();              
                        echo $options;
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="instrutor">Instrutor:</label>
                    <select name="cpf_instrutor" class="form-control">
                      <?php
                        require "../model/funcoesBD.php";
                        $options = ComboBoxInstrutor();              
                        echo $options;
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="data">Data:</label>
                    <input type="date" class="form-control" id="data" name="data">
                  </div>
                  <div class="form-group">
                    <label for="horario">Horário:</label>
                    <input type="time" class="form-control" id="horario" name="horario">
                  </div>
                  <div class="form-group">
                    <label for="duracao">Duração:</label>
                    <input type="text" class="form-control" id="duracao" name="duracao">
                  </div>
                  <div class="form-group">
                    <label for="veiculo">Veículo:</label>
                    <select name="placa" class="form-control">
                      <?php
                        require "../model/funcoesBD.php";
                        $options = ComboBoxVeiculo();              
                        echo $options;
                      ?>
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #007bff; color: #ffffff;">Close</button>
                <button type="button" class="btn btn-primary" style="background-color: #007bff; color: #ffffff;">Salvar</button>
              </div>
            </div>
          </div>
        </div>
    </main>

      <!-- Bootstrap and jQuery JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>