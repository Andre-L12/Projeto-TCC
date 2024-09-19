<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula Prática</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</head>
<body>
    <div>
        <h1>Cadastrar Aula Prática</h1>
        <form action="../../control/cadastrarAulaPratica.php" method="POST" name="formCadastroAulaPratica"  >
            <div style="
                display: flex;
                gap: 10px;
                flex-direction: column;
            ">
                <!-- Campo Instrutor -->
              <div>
                <label for="instrutor">Instrutor:</label>
                    <select name="instrutor" class="form-control">
                      <?php
                        require_once "../../model/funcoesBD.php";
                        $options = comboBoxInstrutor();              
                        echo $options;
                      ?>
                    </select>
                </div>
                <!-- Campo Aluno -->
                <div>
                    <label for="Aluno">Aluno:</label>
                    <select name="aluno" class="form-control">
                      <?php
                        $options = comboBoxAluno();              
                        echo $options;
                      ?>
                    </select>
                </div>
                <!-- Selecionar Veículo -->
                <div>
                <label for="veiculo">Veículo utilizado:</label>
                    <select name="veiculo" id="opcoesVeiculo">
                        <?php
                            require_once "../../model/funcoesBD.php";
                            $options = comboBoxVeiculo();              
                            echo $options;
                        ?>
                    </select>
                </div>
                <!-- Campo data -->
                <div>
                    <label for="data">Data:</label>
                    <input type="date" name="data" id="data" >
                </div>

                <!-- Campo Hora -->
                <div>
                    <label for="hora">Hora:</label>
                    <input type="time" name="hora" id="hora" >
                </div>
                <!-- Campo Obrigatoriedade -->
                <div>
                    <label for="obrigatoria">obrigatoria:</label>
                    <div style="display: flex; align-items: center;">
                        <input type="radio" name="obrigatoria" value="1" id="sim">
                        <label for="sim">SIM</label>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <input type="radio" name="obrigatoria" value="0" id="não">
                        <label for="não">NÃO</label>
                    </div>
                </div>
                <!-- Campo status detran -->
                <div>
                    <label for="obrigatoria">Status:</label>
                    <div style="display: flex; align-items: center;">
                        <input type="radio" name="status_detran" value="1" id="sim">
                        <label for="sim">cadastrada</label>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <input type="radio" name="status_detran" value="0" id="não">
                        <label for="não">não cadastrada</label>
                    </div>
                </div>

                <div>
                    <button type="submit" name="btnCadastrar" value="Cadastrar">Cadastrar</button>
                </div>
                <div><a href="../navbar.html">Voltar</Link></div>
            </div>
        </form>
    </div>

    <script>
        // Máscara para CPF
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00');
        });
        // Máscara para Celular
         const handlePhone = (event) => {
        let input = event.target
        input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g,'')
        value = value.replace(/(\d{2})(\d)/,"($1) $2")
        value = value.replace(/(\d)(\d{4})$/,"$1-$2")
        return value
        }   
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