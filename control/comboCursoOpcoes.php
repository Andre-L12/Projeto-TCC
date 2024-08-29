<?php
    require "../model/conexaoBD.php";

    if (isset($_POST['textoCampo'])){
        $textoCampo = $_POST['textoCampo'];

        $conexao = conectarBD();

        $sql = "SELECT descricao FROM curso WHERE descricao LIKE '$textoCampo'";
        $resultado = mysqli_query($conexao,$sql);

        $opcoes = "";

        while ($registro = mysqli_fetch_assoc($resultado)){
            // Pegar os campos do REGISTRO
            $sigla = $registro["sigla"];
            $descricao = $registro["descricao"];
    
            $opcoes = $opcoes . "<OPTION value='$sigla'>$descricao</OPTION>";
        }

        echo json_encode($opcoes);
    
    }
?>