<?php
    function chamarNavbar(){
        $navbar = "";

        $navbar .= "<aside id='sidebar' class='sidebar break-point-sm has-bg-image'>";
        $navbar .= "<a id='btn-collapse' class='sidebar-collapser'>";
        $navbar .= "<i class='ri-arrow-left-s-line'></i></a>";
        // $navbar .= "<div class='image-wrapper'>";
        // $navbar .= "<img src='assets/images/sidebar-bg.jpg' alt='sidebar background' />";
        // $navbar .= "</div>";
        $navbar .= "<div class='sidebar-layout'>";
        $navbar .= "<div class='sidebar-header'>";
        $navbar .= "<div class='pro-sidebar-logo'>";
        $navbar .= "<div><img src='../img/AutoCFC.svg' alt=''></div>";
        $navbar .= "<h5>AutoCFC</h5>";
        $navbar .= "</div>";
        $navbar .= "</div>";
        $navbar .= "<div class='sidebar-content'>";
        $navbar .= "<nav class='menu open-current-submenu'>";
        $navbar .= "<ul>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='menu-funcionario.php'>";
        $navbar .= "<span class='menu-icon'>";
        $navbar .= "<i class='bi bi-grid-fill'></i>";
        $navbar .= "</span>";
        $navbar .= "<span class='menu-title'>MENU</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='#'>"; // Colocar link
        $navbar .= "<span class='menu-icon'>";
        $navbar .= "<i class='ri-calendar-fill'></i>";
        $navbar .= "</span>";
        $navbar .= "<span class='menu-title'>CALENDÁRIO</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "<li class='menu-item sub-menu'>";
        $navbar .= "<a href='#'>"; // Colocar link
        $navbar .= "<span class='menu-icon'>";
        $navbar .= "<i class='bi bi-person-fill'></i>";
        $navbar .= "</span>";
        $navbar .= "<span class='menu-title'>ALUNOS</span>";
        $navbar .= "</a>";
        $navbar .= "<div class='sub-menu-list'>";
        $navbar .= "<ul>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='cadastrar-aluno.php'>"; // Colocar link
        $navbar .= "<span class='menu-title'>Cadastrar Aluno</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='pesquisar-aluno.php'>"; // Colocar link
        $navbar .= "<span class='menu-title'>Pesquisar Aluno</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "</ul>";
        $navbar .= "</div>";
        $navbar .= "</li>";
        $navbar .= "<li class='menu-item sub-menu'>";
        $navbar .= "<a href='#'>"; // Colocar link
        $navbar .= "<span class='menu-icon'>";
        $navbar .= "<i class='bi bi-person-lines-fill'></i>";
        $navbar .= "</span>";
        $navbar .= "<span class='menu-title'>INSTRUTORES</span>";
        $navbar .= "</a>";
        $navbar .= "<div class='sub-menu-list'>";
        $navbar .= "<ul>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='cadastrar-instrutor.php'>"; // Colocar link
        $navbar .= "<span class='menu-title'>Cadastrar Instrutor</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='#'>"; // Colocar link
        $navbar .= "<span class='menu-title'>Consultar Instrutor</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='cadastrar-instrutor-curso.php'>"; // Colocar link
        $navbar .= "<span class='menu-title'>Vincular a um curso</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "</ul>";
        $navbar .= "</div>";
        $navbar .= "</li>";
        $navbar .= "<li class='menu-item sub-menu'>";
        $navbar .= "<a href='#'>"; // Colocar link
        $navbar .= "<span class='menu-icon'>";
        $navbar .= "<i class='bi bi-cone-striped'></i>";
        $navbar .= "</span>";
        $navbar .= "<span class='menu-title'>AULAS PRÁTICAS</span>";
        $navbar .= "</a>";
        $navbar .= "<div class='sub-menu-list'>";
        $navbar .= "<ul>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='cadastrar-aula.php'>"; // Colocar link
        $navbar .= "<span class='menu-title'>Agendar Aula</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='#'>"; // Colocar link
        $navbar .= "<span class='menu-title'>Consultar Aula</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "</ul>";
        $navbar .= "</div>";
        $navbar .= "</li>";
        $navbar .= "<li class='menu-item sub-menu'>";
        $navbar .= "<a href='#'>"; // Colocar link
        $navbar .= "<span class='menu-icon'>";
        $navbar .= "<i class='bi bi-car-front-fill'></i>";
        $navbar .= "</span>";
        $navbar .= "<span class='menu-title'>VEÍCULOS</span>";
        $navbar .= "</a>";
        $navbar .= "<div class='sub-menu-list'>";
        $navbar .= "<ul>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='cadastrar-veiculo.php'>"; // Colocar link
        $navbar .= "<span class='menu-title'>Cadastrar Veículo</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='#'>"; // Colocar link
        $navbar .= "<span class='menu-title'>Consultar Veículo</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "</ul>";
        $navbar .= "</div>";
        $navbar .= "</li>";
        $navbar .= "<li class='menu-item sub-menu'>";
        $navbar .= "<a href='#'>"; // Colocar link
        $navbar .= "<span class='menu-icon'>";
        $navbar .= "<i class='bi bi-clipboard2-fill'></i>";
        $navbar .= "</span>";
        $navbar .= "<span class='menu-title'>PROCESSOS</span>";
        $navbar .= "</a>";
        $navbar .= "<div class='sub-menu-list'>";
        $navbar .= "<ul>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='cadastrar-processo.php'>"; // Colocar link
        $navbar .= "<span class='menu-title'>Iniciar Processo</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "<li class='menu-item'>";
        $navbar .= "<a href='#'>"; // Colocar link
        $navbar .= "<span class='menu-title'>Consultar Processo</span>";
        $navbar .= "</a>";
        $navbar .= "</li>";
        $navbar .= "</ul>";
        $navbar .= "</div>";
        $navbar .= "</li>";
        $navbar .= "</ul>";
        $navbar .= "</nav>";
        $navbar .= "</div>";
        $navbar .= "</div>";
        $navbar .= "</aside>";
        $navbar .= "<div id='overlay' class='overlay'></div>";

        return $navbar;
    }
?>