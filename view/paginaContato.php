
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dúvidas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"> -->
    
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <!-- <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'> -->
    <link rel="stylesheet" href="./navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        
        <!--Buscando os dados com php-->
        <?php
            /* require_once "../model/AlunoDAO.php";
            require_once "../model/aulaPraticaDAO.php";
            require_once "../model/processoDAO.php";
            if(isset($id_aluno)){
            $id = $id_aluno;
            $resultado = pesquisarAlunoPorID($id);
            $row = mysqli_fetch_assoc($resultado);
            $nome = $row['nome'];
            $cpf = $row["cpf"];
            $id = $row["id_aluno"];
            $email = $row["email"];
            $celular = $row["celular"];
            $foto = $row["foto"];
            $imageBase64 = base64_encode($foto);

            //buscando processos
            $resultado3 = pesquisarProcessoPorIDAluno($id);
            $qtd_processos = mysqli_num_rows($resultado3);
            $processos = comboBoxProcessoAluno($cpf); */
            
            //buscando a quantidade de aulas| depois podemos filtrar quantas são obrigatorias e quatas não são

            // $resultado2 = pesquisarAulaPorCPFAluno($cpf);
            // $aulas = mysqli_num_rows($resultado2);

            //busca veículo
            //busca cursos
            //}
         
        ?>
        
        <?php
        require_once "navbar-aluno.php";
        ?>

        <di class="layout">
        <header>
            <div>
                <span class="header-icon">
                    <i class="bi bi-telephone-fill"></i>
                </span>
                <span class="header-title">Contato</span>
            </div>
        </header>
            <main class="content">
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                </div>
                <!-- Form Cadastrar Aluno -->
                <div style="font-family: Arial, sans-serif; color: #333; padding: 20px; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 500px; margin-bottom:20px">
                    <h3 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; color: #007bff;">Contato da Autoescola</h3>

                    <!-- Redes Sociais -->
                    <div style="margin-bottom: 20px;">
                        <h4 style="color: #007bff;">Redes Sociais</h4>
                        <div style="display: flex; justify-content: space-around; align-items: center;">
                            <a href="https://www.facebook.com/cfc.bragatto/?locale=pt_BR" target="_blank">
                                <img src="https://img.icons8.com/color/48/000000/facebook.png" alt="Facebook" style="width: 30px; height: 30px;">
                            </a>
                            <a href="https://www.instagram.com/cfcbragattocolatina/" target="_blank">
                                <img src="https://img.icons8.com/color/48/000000/instagram-new.png" alt="Instagram" style="width: 30px; height: 30px;">
                            </a>
                            <a href="https://l.instagram.com/?u=http%3A%2F%2Fwa.me%2F5527988925727%3Ffbclid%3DPAZXh0bgNhZW0CMTEAAaZiAGJVzLxLNm6sEVnlL73i9Bg9jLoPiyDzW2UohqYsDkfoJE9Tckh0Aa0_aem_dYt_KpvmDnfHSf2EevXTxA&e=AT3fgu4-joWBgq4n5qiYC8Vbiw5V-bFhwb6M0kX8s5qL373MRNTPuJ0RZk0tsTY--0B3ruLRofVMIRsyPqet7vY_v324Ofr_Ovr6rmX-MAEJSNsc49oJKw" target="_blank">
                                <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp" style="width: 30px; height: 30px;">
                            </a>
                        </div>
                    </div>

                    <!-- Horário de Funcionamento -->
                    <div style="margin-bottom: 20px;">
                        <h4 style="color: #007bff;">Horário de Funcionamento</h4>
                        <p style="line-height: 1.6;"><strong>Segunda a Sexta:</strong> 07:00 - 18:00<br>
                        <strong>Sábado:</strong> 08:00 - 12:00<br>
                        <strong>Domingo:</strong> Fechado</p>
                    </div>

                    <!-- Dados Administrativos -->
                    <div style="margin-bottom: 20px;">
                        <h4 style="color: #007bff;">Dados Administrativos</h4>
                        <p style="line-height: 1.6;">
                            <strong>CNPJ:</strong> 03.566.893/0001-25<br>
                            <strong>Endereço:</strong> 85 Avenida Presidente Kennedy, Colatina 29702-210<br>
                            <strong>Telefone:</strong> (27) 98892-5727<br>
                            <strong>Email:</strong> viniciusbragattogon@hotmail.com
                        </p>
                    </div>

                    <!-- Mapa (Responsivo) -->
                    <div>
                        <h4 style="color: #007bff;">Localização</h4>
                        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3760.002265921938!2d-40.638237190250926!3d-19.541516281685173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xb7078a696b88c5%3A0xb260fd1a3366360!2sAv.%20Pres.%20Kenedy%2C%2085%20-%20Vila%20Nova!5e0!3m2!1spt-BR!2sbr!4v1728624618952!5m2!1spt-BR!2sbr" width="100%" height="100%" style="border:0; position: absolute; top: 0; left: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

            </main>
            <div class="overlay"></div>
        </div>
    </div>


    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="navbar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>