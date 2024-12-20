<?php
    function validarInstrutor($nome, $cpf, $sexo, $dias_semana){
        $msgErro = "";

        $msgErro = $msgErro . validarNome($nome);

        $msgErro = $msgErro . validarCPF($cpf);

        if (empty($sexo)){
            $msgErro = $msgErro . "Selecione o sexo. <br>";
        }

        if ($dias_semana == "0000000"){
            $msgErro .= "Selecione ao menos um dia da semana. <br>";
        }

        return $msgErro;
    }

    function validarInstrutorCurso($instrutor, $curso, $veiculo){
        $msgErro = "";
        
        if (empty($instrutor)){
            $msgErro .= "Selecione um instrutor. <br>";
        }

        if (empty($curso)){
            $msgErro .= "Selecione um curso. <br>";
        }

        if (empty($veiculo)){
            $msgErro .= "Selecione um veículo. <br>";
        }

        return $msgErro;

    }

    function validarPreocesso($curso, $aluno, $data_inicio){
        $msgErro = "";

        if (empty($aluno)){
            $msgErro .= "Selecione um aluno. <br>";
        }

        if (empty($curso)){
            $msgErro .= "Selecione um curso. <br>";
        }

        if (empty($data_inicio)){
            $msgErro .= "Defina uma data de início. <br>";
        }

        return $msgErro;
    }

    function validarVeiculo($sigla, $adaptado, $placa, $marca, $modelo, $ano){
        
        $msgErro = "";

        // Verificar se CATEGORIA está preenchida:
        if (empty($sigla)){
            $msgErro = "Informe a categoria do veículo.<br>";
        }

        // Verificar se o radio ADAPTADO foi marcado:
        if (empty($adaptado)){
            $msgErro = $msgErro . "Informe se o veículo é adaptado.<br>";
        }

        // Verificar se PLACA é válida:
        $msgErro = $msgErro . validarPlaca($placa);

        // Verificar se MARCA está preenchida:
        if (empty($marca)){
            $msgErro = $msgErro . "Informe a marca do veículo.<br>";
        }

        // Verificar se MODELO está preenchido:
        if (empty($modelo)){
            $msgErro = $msgErro . "Informe o modelo do veículo.<br>";
        }

        // Verificar se ANO é válido:
        $msgErro = $msgErro . verificarAno($ano);

        return $msgErro;

    }

    function validarAluno($nome, $cpf, $email){
        $msgErro = "";
        if ( empty($nome) ) {
            $msgErro = $msgErro . "Informe o nome.<br>";        
        }

        $msgErro .= validarEmail($email);
    
        if (validarCPF2($cpf) == false) {
            $msgErro = $msgErro . "CPF inválido.<br>";
        }

        return $msgErro;
    }

    function validarEmail($email) {
        $msg = "";
        
        if (empty($email)){
            $msg = "Informe um e-mail.<br>";
        }

        // Verifica se o e-mail está no formato válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "Informe um e-mail válido.<br>";
        }

        return $msg;
    }

function validarImagem($imagem){
    $msgErro = "";

    if ( $imagem["error"] != 0 ) {
        $msgErro = $msgErro . "ERRO no upload do arquivo.<br>";
    } 
 
    else if ( $imagem["size"] > 1000000   ) {
            $msgErro = $msgErro . "Arquivo muito grande.<br>";
    }
    else if ( ( $imagem["type"] != "image/gif" ) &&
    	( $imagem["type"] != "image/jpeg" ) &&
        ( $imagem["type"] != "image/pjpeg" ) &&
        ( $imagem["type"] != "image/png" ) &&
        ( $imagem["type"] != "image/x-png" ) &&
        ( $imagem["type"] != "image/bmp" )  ) {

       $msgErro = $msgErro . "Tipo de arquivo não permitido.<br>";
    }

    return $msgErro;
}

function validarAula($id_processo, $id_instrutor, $id_veiculo, $data, $hora, $obrigatoria){
    $msg = "";
    
    if (empty($id_processo)){
        $msg .= "Selecione o processo.<br>";
    }
    
    if (empty($id_instrutor)){
        $msg .= "Selecione o instrutor.<br>";
    }

    if (empty($id_veiculo)){
        $msg .= "Selecione o veículo.<br>";
    }

    if (empty($data)){
        $msg .= "Selecione uma data.<br>";
    }

    if (empty($hora)){
        $msg .= "Selecione um horário.<br>";
    }

    return $msg;

}
    
function validarCPF2($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

    function verificarAno($ano){
        // Verifica se ANO está preenchido:
        if (empty($ano)){
            return "Informe o ano de fabricação do veículo.<br>";
        } else {
            // Verifica se ANO está entre 1900 e o ano atual:
            if ($ano < 1900 || $ano > date("Y")){
                return "Informe um ano de fabricação válido";
            } else {
                return "";
            }
        }

    }


    function validarPlaca($placa){

        // Verifica se PLACA está preenchido:
        if(empty($placa)){
            return "Informe a placa do veículo.<br>";
        }

        // Remover possíveis espaços em branco antes e depois da placa:
        $placa = trim($placa);

        // Verificar se a placa corresponde ao formato Mercosul
        if (preg_match('/^[A-Z]{3}\d[A-Z]\d{2}$/', $placa)) {
            return "";
        } else {
            return "A placa informada não corresponde ao formato Mercosul.<br>";
        }
    }

    function validarNome($nome) {
        
        // Verificar se NOME está preenchido:
        if (empty($nome)){
            return "Informe o nome.<br>";
        } else {
            // Verificar o comprimento do nome:
            $minLength = 6; //Para garantir que tenha nome e sobrenome
            $maxLength = 50;
            if (strlen($nome) < $minLength || strlen($nome) > $maxLength) {
                return "O nome deve ter entre $minLength e $maxLength caracteres.<br>";
            } 
            
            // Verificar se tem mais de um nome:
            else if (!strpos($nome, " ")) {
                return "Digite o nome completo.<br>";
            }
        
            // Verificar caracteres válidos:
            else if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛãõÃÕçÇñÑ' -]+$/u", $nome)) {
                return "O nome contém caracteres inválidos.<br>";
            } 
            // Nome validado
            else {
                return ""; 
            }
            
        }

    }
    function tratarNome($nome){
        // - Remover espaços antes e depois do nome:
        $nome = trim($nome);
        // - Remover múltiplos espaços consecutivos de nome:
        $nome = preg_replace('/\s+/', ' ', $nome);

        return $nome;
    }

    function validarCPF($cpf){
        
        // Verificar se CPF está preenchido:
        if (empty($cpf)){
            return "Informe o CPF.<br>";
        } else {
            // Remover caracteres não numéricos:
            $cpf = preg_replace('/[^0-9]/', '', $cpf);

            // Verificar se o CPF possui 11 dígitos
            if (strlen($cpf) != 11) {
                return "Informe um CPF válido. '$cpf' <br>";
            }

            // Verificar se todos os dígitos são iguais (ex: 111.111.111-11)
            if (preg_match('/(\d)\1{10}/', $cpf)) {
                return "Informe um CPF válido.<br>";
            }

            // Calcular os dígitos verificadores
            for ($t = 9; $t < 11; $t++) {
                $d = 0;
                for ($c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return "Informe um CPF válido.<br>";
                }
            }
        }

        // CPF validado
        return "";

    }
    function validarLogin($usuario,$senha){
        $msg = "";
        if(empty($usuario)){
            $msg = $msg . "Informe o usuário   |  ";
        }
        if(strlen($senha)<5){
            $msg =$msg . "Informe uma senha maior que 4 caracteres";
        }
        return $msg;

    }

    function converterDataParaPadraoBR($dataBanco){
        $dataConvertida = DateTime::createFromFormat('Y-m-d', $dataBanco)->format('d/m/Y');

        return $dataConvertida;
    }

    function converterDataParaPadraoBanco($dataBanco){
        $dataConvertida = DateTime::createFromFormat('d/m/Y', $dataBanco)->format('Y-m-d');

        return $dataConvertida;
    }
?>