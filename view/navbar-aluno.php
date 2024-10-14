
<aside id='sidebar' class='sidebar break-point-sm has-bg-image'>
    <a id='btn-collapse' class='sidebar-collapser'>
        <i class='ri-arrow-left-s-line'></i>
    </a>
    <!-- <div class='image-wrapper'> -->
    <!-- <img src='assets/images/sidebar-bg.jpg' alt='sidebar background' /> -->
    <!-- </div> -->
    <div class='sidebar-layout'>
        <div class='sidebar-header'>
            <div class='pro-sidebar-logo'>
                <div><img src='../img/AutoCFC.svg' alt=''></div>
                <h5>AutoCFC</h5>
            </div>
        </div>
        <div class='sidebar-content'>
            <nav class='menu open-current-submenu'>
                <ul>
                    <li class='menu-item'>
                        <a href='menu-aluno.php'>
                            <span class='menu-icon'>
                                <i class='bi bi-grid-fill'></i>
                            </span>
                            <span class='menu-title'>MENU</span>
                        </a>
                    </li>
                    <li class='menu-item'>
                        <a href='#'>
                            <span class='menu-icon'>
                                <i class='ri-calendar-fill'></i>
                            </span>
                            <span class='menu-title'>CALENDÁRIO</span>
                        </a>
                    </li>
                    <li class='menu-item'>
                        <a href='paginaAvisos.php'>
                            <span class='menu-icon'>
                                <i class='bi bi-bell-fill'></i>
                            </span>
                            <span class='menu-title'>AVISOS</span>
                        </a>
                    </li>
                    <li class='menu-item'>
                        <a href='paginaDuvidas.php'>
                            <span class='menu-icon'>
                                <i class='bi bi-question-diamond-fill'></i>
                            </span>
                            <span class='menu-title'>DUVÍDAS</span>
                        </a>
                    </li>
                    <li class='menu-item'>
                        <a href='paginaMeusDados.php '>
                            <span class='menu-icon'>
                                <i class='bi bi-person-fill'></i>
                            </span>
                            <span class='menu-title'>MEUS DADOS</span>
                        </a>
                    </li>
                    <li class='menu-item'>
                        <a href='paginaContato.php '>
                            <span class='menu-icon'>
                                <i class='bi bi-telephone-fill'></i>
                            </span>
                            <span class='menu-title'>CONTATO</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="menu sidebar-footer">
            <li class="menu-item menu-sessao">
                <a href="#">
                    <span class="menu-icon">
                        <i class="bi bi-person-circle"></i>
                    </span>
                    <span class="menu-title footer-box">
                        <?php
                        echo isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Usuário não logado';
                        ?>
                    </span>
                </a>
                <a href="../control/logout.php" >
                    <span class="footer-box botao-sair"><i class="bi bi-box-arrow-left"></i></span>
                </a>
                
            </li>
        </div>
    </div>
</aside>
<div id='overlay' class='overlay'></div>
