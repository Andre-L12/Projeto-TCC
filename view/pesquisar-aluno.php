<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Aluno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <!-- <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'> -->
    <link rel="stylesheet" href="./navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    

</head>
<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <?php
            require_once "navbar-chamar.php";
            $navbar = chamarNavbar();              
            echo $navbar;
        ?>

        <div class="layout">
        <header>
            <div>
                <span class="header-icon">
                    <i class="bi bi-person-fill"></i>
                </span>
                <span class="header-title">ALUNOS</span>
            </div>
        </header>
            <main class="content">
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                </div>
                <!-- Form Cadastrar Aluno -->
                <div>
                    <div>
                        <!-- PESQUISAR -->
                        <form method="POST" >
                            <input type="text" id="txtPesquisa" name="txtPesquisa" >
                            <input type="button" id="btnPesq" name="btnPesq" value="Pesquisar" class="btn btn-success" style="background-color: #216EC0; border-color:#216EC0 ;">
                        </form>
                    </div>
                    <div id="resultado" >                        
                        
                        <!-- O resultado do JSON vai ficar aqui -->
                        <!-- A chamada do JSON está no final do arquivo -->
                    
                    </div>
                </div>
            </main>
            <div class="overlay"></div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            <!-- Quando clicar no botão Pesquisar -->
            $('#btnPesq').click(function(e){
                
                var pesq = $('#txtPesquisa').val();     // Pegar campo texto da pesquisa
                
            pesquisar(pesq);

            });

        });

        function pesquisar(pesq) {
            // Chamar o PHP do servidor com AJAX

            $.ajax({
            url: '../control/pesquisarAluno_JSON.php',
            type: 'POST',
            data: { pesq: pesq },       // Envio do texto de pesquisa
            dataType: 'json',
            success: function(data) {
                // data == dados de retorno no formato JSON
                // O JSON foi criado com dois campos "erro" e "alunos", onde "produtos" é um array de dados

                // Montar o HTML/DIV com os dados de retorno
                var mostrar = '';

                if ( data.erro == "" )  {    
                    // Se NÃO tiver erros

                    if ( data.alunos.length == 1) {
                        mostrar += "<h4>Foi encontrado 1 aluno.</h4>";
                    } else {
                        mostrar += "<h4>Foram encontrados " + data.alunos.length + " aluno.</h4>";
                    }

                    // Percorre todos os produtos do array "produtos", 
                    //    onde i é o índice e obj são os dados do produto
                    data.alunos.forEach(function(obj,i) {                  
                        mostrar += "<div class='col-sm-4'>";
                        mostrar += "<img src='data:image/jpeg;base64," + obj.foto + "' height='100' width='100'>";
                        mostrar += "<h4 class='margin'>" + obj.nome + "</h4>";
                        mostrar += "<h4 class='margin'>" + obj.cpf + "</h4>";
                        mostrar += "<h4 class='margin'>" + obj.email + "</h4>";
                        mostrar += "<h5 class='margin'>" + obj.celular + "</h5>";
                        // mostrar += "<A href='../controlador/carrinho.php?id=" + obj.id +"'><IMG src='../imagens/add_cart.png' height='30' width='30'></A>";
                        mostrar += "</div>";
                    });


                } else {
                    // Sem registros no banco
                    mostrar += "<h4 class='margin'>" + data.erro + "</h4>";
                }

                // Colocar no DIV "resultado" acima
                $('#resultado').html(mostrar).show();
            },
            error: function() {
                // ERRO ao pesquisar
                var mostrar = "";
                mostrar += "<h4 class='margin'>Erro ao chamar o pesquisar do servidor.</h4>";
                $('#resultado').html(mostrar).show();    
            }
        });

        }

    </script>

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>