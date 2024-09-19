<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>
    <link rel="stylesheet" href="./navbar-estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <div id="navbar-receber"></div>
    </div>
</body>

<script src='https://unpkg.com/@popperjs/core@2'></script>
<script src='./navbar-script.js'></script>

<script>

    $(document).ready(function(){

        var navbar = "";
        navbar = "<aside id='sidebar' class='sidebar break-point-sm has-bg-image'>";
        navbar += "<a id='btn-collapse' class='sidebar-collapser'>";
        navbar += "<i class='ri-arrow-left-s-line'></i></a>";
        navbar += "<div class='image-wrapper'>";
        navbar += "<img src='assets/images/sidebar-bg.jpg' alt='sidebar background' />";
        navbar += "</div>";
        navbar += "<div class='sidebar-layout'>";
        navbar += "<div class='sidebar-header'>";
        navbar += "<div class='pro-sidebar-logo'>";
        navbar += "<div><img src='../img/AutoCFC.svg' alt=''></div>";
        navbar += "<h5>AutoCFC</h5>";
        navbar += "</div>";
        navbar += "</div>";
        navbar += "<div class='sidebar-content'>";
        navbar += "<nav class='menu open-current-submenu'>";
        navbar += "<ul>";
        navbar += "<li class='menu-item'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-icon'>";
        navbar += "<i class='bi bi-grid-fill'></i>";
        navbar += "</span>";
        navbar += "<span class='menu-title'>MENU</span>";
        navbar += "</a>";
        navbar += "</li>";
        navbar += "<li class='menu-item'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-icon'>";
        navbar += "<i class='ri-calendar-fill'></i>";
        navbar += "</span>";
        navbar += "<span class='menu-title'>CALENDÁRIO</span>";
        navbar += "</a>";
        navbar += "</li>";
        navbar += "<li class='menu-item sub-menu'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-icon'>";
        navbar += "<i class='bi bi-person-fill'></i>";
        navbar += "</span>";
        navbar += "<span class='menu-title'>ALUNOS</span>";
        navbar += "</a>";
        navbar += "<div class='sub-menu-list'>";
        navbar += "<ul>";
        navbar += "<li class='menu-item'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-title'>Cadastrar Aluno</span>";
        navbar += "</a>";
        navbar += "</li>";
        navbar += "<li class='menu-item'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-title'>Consultar Aluno</span>";
        navbar += "</a>";
        navbar += "</li>";
        navbar += "</ul>";
        navbar += "</div>";
        navbar += "</li>";
        navbar += "<li class='menu-item sub-menu'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-icon'>";
        navbar += "<i class='bi bi-person-lines-fill'></i>";
        navbar += "</span>";
        navbar += "<span class='menu-title'>INSTRUTORES</span>";
        navbar += "</a>";
        navbar += "<div class='sub-menu-list'>";
        navbar += "<ul>";
        navbar += "<li class='menu-item'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-title'>Cadastrar Instrutor</span>";
        navbar += "</a>";
        navbar += "</li>";
        navbar += "<li class='menu-item'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-title'>Consultar Instrutor</span>";
        navbar += "</a>";
        navbar += "</li>";
        navbar += "</ul>";
        navbar += "</div>";
        navbar += "</li>";
        navbar += "<li class='menu-item sub-menu'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-icon'>";
        navbar += "<i class='bi bi-cone-striped'></i>";
        navbar += "</span>";
        navbar += "<span class='menu-title'>AULAS PRÁTICAS</span>";
        navbar += "</a>";
        navbar += "<div class='sub-menu-list'>";
        navbar += "<ul>";
        navbar += "<li class='menu-item'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-title'>Agendar Aula</span>";
        navbar += "</a>";
        navbar += "</li>";
        navbar += "<li class='menu-item'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-title'>Consultar Aula</span>";
        navbar += "</a>";
        navbar += "</li>";
        navbar += "</ul>";
        navbar += "</div>";
        navbar += "</li>";
        navbar += "<li class='menu-item sub-menu'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-icon'>";
        navbar += "<i class='bi bi-car-front-fill'></i>";
        navbar += "</span>";
        navbar += "<span class='menu-title'>VEÍCULOS</span>";
        navbar += "</a>";
        navbar += "<div class='sub-menu-list'>";
        navbar += "<ul>";
        navbar += "<li class='menu-item'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-title'>Cadastrar Veículo</span>";
        navbar += "</a>";
        navbar += "</li>";
        navbar += "<li class='menu-item'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-title'>Consultar Veículo</span>";
        navbar += "</a>";
        navbar += "</li>";
        navbar += "</ul>";
        navbar += "</div>";
        navbar += "</li>";
        navbar += "<li class='menu-item sub-menu'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-icon'>";
        navbar += "<i class='bi bi-clipboard2-fill'></i>";
        navbar += "</span>";
        navbar += "<span class='menu-title'>PROCESSOS</span>";
        navbar += "</a>";
        navbar += "<div class='sub-menu-list'>";
        navbar += "<ul>";
        navbar += "<li class='menu-item'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-title'>Cadastrar Processo</span>";
        navbar += "</a>";
        navbar += "</li>";
        navbar += "<li class='menu-item'>";
        navbar += "<a href='#'>";
        navbar += "<span class='menu-title'>Consultar</span>";
        navbar += "</a>";
        navbar += "</li>";
        navbar += "</ul>";
        navbar += "</div>";
        navbar += "</li>";
        navbar += "</ul>";
        navbar += "</nav>";
        navbar += "</div>";
        navbar += "</div>";
        navbar += "</aside>";

        $('#navbar-receber').html(navbar).show();
    });
</script>

</html>