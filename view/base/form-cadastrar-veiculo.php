<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Veículo</title>

</head>
<body>
    <div>
        <h1>Cadastrar Veículo</h1>
        <form action="../../control/cadastrarVeiculo.php" method="POST" name="formCadastroVeiculo">
            <div style="
                display: flex;
                gap: 10px;
                flex-direction: column;
            ">
                
                <!-- ComboBox Categoria do veículo -->
                <div>
                    <label for="categoria">Categoria:</label>
                    <select name="categoria" id="categoria">
                        <option value=""></option>
                        <option value="ACC">ACC</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>

                <!-- Radio: Veículo adaptado? -->
                <div>
                    <label>Veículo adaptado?</label>
                    <div style="display: flex; align-items: center;">
                        <input type="radio" name="adaptado" value="true" id="sim">
                        <label for="sim">Sim</label>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <input type="radio" name="adaptado" value="false" id="nao">
                        <label for="nao">Não</label>
                    </div>
                </div>

                <!-- Campo Placa -->
                <div>
                    <label for="placa">Placa:</label>
                    <input type="text" name="txtPlaca" id="placa" placeholder="ex.: QTP5F71" maxlength="7">
                </div>

                <!-- Campo Marca -->
                <div>
                    <label for="marca">Marca:</label>
                    <input type="text" name="txtMarca" id="marca" placeholder="ex.: Fiat">
                </div>
                
                <!-- Campo Modelo -->
                <div>
                    <label for="modelo">Modelo</label>
                    <input type="text" name="txtModelo" id="modelo" placeholder="ex.: Uno">
                </div>
                
                <!-- Campo Ano -->
                <div>
                    <label for="ano">Ano de fabricação:</label>
                    <input type="number" name="ano" id="ano" placeholder="ex.: 2013">
                </div>

                <div>
                    <button type="input">Cadastrar</button>
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
    
    <script>
        // Máscara para placa de veículo
        document.getElementById('placa').addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });

        // Define o ano para 2000 ao carregar a página;
        document.getElementById('ano').value = '2000';
    </script>
    
</body>
</html>