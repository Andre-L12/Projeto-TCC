<!DOCTYPE html>
<html>
<head>
  <title>Pesquisar Aluno</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
      background-color: #216EC0;

    }
    /* Remove the jumbotron's default bottom margin */
     .jumbotron {
      margin-bottom: 0;
    }
  </style>
</head>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="../navbar.html">Início</a></li>
            <li><a href="form-cadastrar-aluno.php">Cadastrar aluno</a></li>
            <li><a href="form-cadastrar-instrutor.php">Cadastrar Instrutor</a></li>
            <li><a href="form-cadastrar-veiculo.php">Cadastrar Veiculo</a></li>
            <li><a href="form-cadastrar-processo.php">Cadastrar processo</a></li>
        </ul>
                
    </div>
  </div>
</nav>

 <div class="container-fluid bg-3 text-center">
    <div style="margin-bottom: 100px; margin-top: -30px">
        <!-- PESQUISAR -->
        <form method="POST" >
            <input type="text" id="txtPesquisa" name="txtPesquisa" >
            <input type="button" id="btnPesq" name="btnPesq" value="Pesquisar" class="btn btn-success" style="background-color: #216EC0; border-color:#216EC0 ;">
        </form>
    </div>
    <div id="resultado" class="row text-center" >                        
        
        <!-- O resultado do JSON vai ficar aqui -->
        <!-- A chamada do JSON está no final do arquivo -->
       
    </div>
 </div>
       
<!-- RODAPÉ-->

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
    url: '../../control/pesquisarAluno_JSON.php',
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


</body>
</html>
