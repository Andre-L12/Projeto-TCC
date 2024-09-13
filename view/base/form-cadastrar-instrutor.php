<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Instrutor</title>

    <!-- Bibliotecas usadas para máscara no campo CPF -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

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
                    <select name="curso" id="opcoesCurso">
                        <?php
                            require "../../model/cursoDAO.php";
                            $options = comboBoxCursos();              
                            echo $options;
                        ?>
                    </select>
                </div>

                <!-- Selecionar Veículo -->
                <div>
                <label for="veiculo">Veículo utilizado:</label>
                    <select name="veiculo" id="opcoesVeiculo">
                        <?php
                            require "../../model/veiculoDAO.php";
                            $options = comboBoxVeiculo();              
                            echo $options;
                        ?>
                    </select>
                </div>

                <div>
                    <button type="submit" name="btnCadastrar" value="Cadastrar">Cadastrar</button>
                </div>
                
            </div>
        </form>
    </div>

    <script>
        // Máscara para CPF
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00');
        });
    </script>

    <?php
        // Exibir a mensagem de ERRO caso ocorra
        if (isset($_GET["msg"])) {  // Verifica se tem mensagem de ERRO
            $mensagem = $_GET["msg"]; 
            echo "<FONT color=red>$mensagem</FONT>";
        }
    ?>

</body>
</html>