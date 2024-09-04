<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Processo</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</head>
<body>
    <div>
        <h1>Cadastrar Processo</h1>
        <form action="../../control/iniciarProcesso.php" method="POST" name="formCadastroProcesso"  >
            <div style="
                display: flex;
                gap: 10px;
                flex-direction: column;
            ">
                <!-- Campo CPF -->
                <div>
                <label for="aluno">Aluno:</label>
                    <select name="aluno" class="form-control">
                      <?php
                        require_once "../../model/funcoesBD.php";
                        $options = comboBoxAluno();              
                        echo $options;
                      ?>
                    </select>
                </div>
             
                <!-- Campo CURSO -->
                <div>
                <label for="curso">Curso:</label>
                    <select name="curso" class="form-control">
                      <?php
                        $options = comboBoxCurso();              
                        echo $options;
                      ?>
                    </select>
                </div>

               
                <!-- Campo DATA -->
                <div>
                    <label for="data_inicio">Data de inicio:</label>
                    <input type="date" name="data_inicio" id="data_inicio" >
                </div>
                

    

                <div>
                    <button type="submit" name="btnCadastrar" value="Cadastrar">Cadastrar</button>
                </div>
                
            </div>
        </form>
    </div>



    <?php
        // Exibir a mensagem de ERRO caso ocorra
        if (isset($_GET["msg"])) {  // Verifica se tem mensagem de ERRO
            $mensagem = $_GET["msg"]; 
            echo "<FONT color=red>$mensagem</FONT>";
        }
    ?>

</body>
</html>