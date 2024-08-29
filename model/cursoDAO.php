<?php
    function comboBoxCursos(){
        
        $conexao = conectarBD();

        $sql = "SELECT * FROM curso";
        $resultado = mysqli_query($conexao, $sql );

        $options = "";
        while (  $registro = mysqli_fetch_assoc($resultado)  ) {
            // Pegar os campos do REGISTRO
            $sigla = $registro["sigla"];
            $descricao = $registro["descricao"];

            $options = $options . "<OPTION value='$sigla'>$descricao</OPTION>";
        }

        return $options;

    }
?>