<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</head>
<body>
    <div>
        <h1>Cadastrar Aluno</h1>
        <form action="../../control/cadastrarAluno.php" method="POST" name="formCadastroAluno"  enctype = "multipart/form-data">
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
                <!-- Campo EMAIL -->
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="ex.: aluno10@gmail.com">
                </div>

                <!-- Campo CELULAR -->
                <div>
                    <label for="celular">Celular:</label>
                    <input type="tel" name="celular" id="celular"  onkeyup="handlePhone(event)" placeholder="ex.: (27)99955-1899">
                </div>
                <!-- Campo foto -->
                <div>
                    <label for="foto">Foto:</label>
                    <input type="file" name="foto" >
                </div>

                <!-- Selecionar Curso -->
                <!-- <div>
                    <label for="curso">Atua nos cursos:</label>
                    <select name="curso" id="opcoesCurso">
                    </select>
                    <button type="button" id="selecionarCurso">Selecionar</button>
                </div> -->

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