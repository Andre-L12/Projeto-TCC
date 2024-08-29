<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Instrutor</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div>
        <h1>Cadastrar Instrutor</h1>
        <form action="../../control/cadastrarInstrutor.php" method="POST" name="formCadastroInstrutor">
            <div style="
                display: flex;
                gap: 10px;
                flex-direction: column;
            ">
                <!-- Campo nome -->
                <div>
                    <label for="nome">Nome completo:</label>
                    <input type="text" name="txtNome" id="nome" placeholder="Digite o nome aqui">
                </div>

                <!-- Campo CPF -->
                <div>
                    <label for="cpf">CPF:</label>
                    <input type="text" name="txtCPF" id="cpf" placeholder="ex.: 000.000.000-00">
                </div>

                <!-- Radio Sexo -->
                <div>
                    <label>Sexo:</label>
                    <div style="display: flex; align-items: center;">
                        <input type="radio" name="sexo" value="M" id="masc">
                        <label for="masc">Masculino</label>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <input type="radio" name="sexo" value="F" id="fem">
                        <label for="fem">Feminino</label>
                    </div>
                </div>

                <!-- Selecionar Curso -->
                <div>
                    <label for="curso">Atua nos cursos:</label>
                    <select name="curso">
                        <?php
                            require "../../model/cursoDAO.php";
                            $options = comboBoxCursos();
                            echo $options;
                        ?>
                    </select>
                    <button type="button">Selecionar</button>
                </div>
            </div>
        </form>
    </div>



    <!-- <script>
        $(document).ready(function(){
            $('#curso').on('keyup', function(){ //keyup = função é acionada ao digitar no campo
                var textoCampo = $(this).val().replace(/\s/g, '');
                if (textoCampo !== ""){
                    $.ajax({
                        url:'../../control/cadastrarInstrutor.php',
                        type: 'POST',
                        data: {textoCampo: textoCampo},
                        dataType: 'json',
                        success: function(data){
                            //Encontrou cursos
                            $('#cursosOpcoes').html(data.cursosOpcoes);
                        },
                        error:function(){
                            //Não encontrou cursos
                            $('#cursosOpcoes').html("");
                        }
                    })
                }
            });
        });
    </script> -->



</body>
</html>