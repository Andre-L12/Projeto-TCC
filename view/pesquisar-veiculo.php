<?php
    require_once "../control/validarUsuario.php";
 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar veiculo</title>

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

    <!-- <style>
        .tabelazul{
            background-color:#216EC0 ;
            color: white;
        }
    </style> -->

</head>
<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <?php
        require_once "navbar.php";
        ?>

        <div class="layout">
        <header>
            <div>
                <span class="header-icon">
                    <i class="bi bi-person-fill"></i>
                </span>
                <span class="header-title">VEÍCULOS</span>
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
                            <input type="text" id="txtPesquisa" name="txtPesquisa" class="form-input" >
                            <input type="button" id="btnPesq" name="btnPesq" value="Pesquisar" class="form-btn" style="background-color: #216EC0; border-color:#216EC0 ;">
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
    <?php
            if(isset($_GET["msg"])){
                $mensagem = $_GET["msg"];
                echo "<script>alert('$mensagem');</script>"; // Alerta em JavaScript
            }
        ?>
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
            url: '../control/pesquisarVeiculo_JSON.php',
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

                    if ( data.veiculos.length == 1) {
                        mostrar += "<h4>Foi encontrado 1 veículo .</h4>";
                    } else {
                        mostrar += "<h4>Foram encontrados " + data.veiculos.length + " veículos.</h4>";
                    }

                    // Percorre todos os produtos do array "produtos", 
                    //    onde i é o índice e obj são os dados do produto
                    
                    mostrar +="<table class='table table-bordered responsive-table tabelazul'>   "
                    mostrar +="<thead>     <tr>    <th>Marca</th><th>Modelo</th><th>Ano</th><th>Placa</th><th>Sigla-Categoria</th><th>Adaptado</th></tr><thead>";
                    mostrar+="<tbody>   ";                  
                    data.veiculos.forEach(function(obj,i) {  
                        if(obj.adaptado==0){
                            var x="não";
                        }
                        else{
                           var x="sim";
                        }      
                        
                        mostrar += "<tr>    <td data-label='Marca'>"+obj.marca +"</td>";
                        mostrar += "    <td data-label='Modelo'>" + obj.modelo + "</td>";
                        mostrar += "<td data-label='Ano'>" + obj.ano + "</td>";
                        mostrar += "<td data-label='Placa'><a href='consultar-veiculo.php?id=" +obj.placa+ "'>" + obj.placa + "</a></td>";
                        mostrar += "<td data-label='Sigla-Categoria'>" + obj.sigla_categoria + "</td>";
                        mostrar += "<td data-label='Adaptado'>" + x + "</td></tr>";
                    });
                    mostrar += "</tbody></table>";  

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