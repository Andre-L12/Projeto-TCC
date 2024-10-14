
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
                        <a href='menu-funcionario.php'>
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
                    <li class='menu-item sub-menu'>
                        <a href='#'>
                            <span class='menu-icon'>
                                <i class='bi bi-person-fill'></i>
                            </span>
                            <span class='menu-title'>ALUNOS</span>
                        </a>
                        <div class='sub-menu-list'>
                            <ul>
                                <li class='menu-item'>
                                    <a href='cadastrar-aluno.php'>
                                        <span class='menu-title'>Cadastrar Aluno</span>
                                    </a>
                                </li>
                                <li class='menu-item'>
                                    <a href='pesquisar-aluno.php'>
                                        <span class='menu-title'>Pesquisar Aluno</span>
                                    </a>
                                </li>
                                <li class='menu-item'>
                                    <a href='menu-aluno.php'>
                                        <span class='menu-title'>Modo aluno</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class='menu-item sub-menu'>
                        <a href='#'>
                            <span class='menu-icon'>
                                <i class='bi bi-person-lines-fill'></i>
                            </span>
                            <span class='menu-title'>INSTRUTORES</span>
                        </a>
                        <div class='sub-menu-list'>
                            <ul>
                                <li class='menu-item'>
                                    <a href='cadastrar-instrutor.php'>
                                        <span class='menu-title'>Cadastrar Instrutor</span>
                                    </a>
                                </li>
                                <li class='menu-item'>
                                    <a href='pesquisar-instrutor.php'>
                                        <span class='menu-title'>Pesquisar Instrutor</span>
                                    </a>
                                </li>
                                <li class='menu-item'>
                                    <a href='cadastrar-instrutor-curso.php'>
                                        <span class='menu-title'>Vincular a um curso</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class='menu-item sub-menu'>
                        <a href='#'>
                            <span class='menu-icon'>
                                <i class='bi bi-cone-striped'></i>
                            </span>
                            <span class='menu-title'>AULAS PRÁTICAS</span>
                        </a>
                        <div class='sub-menu-list'>
                            <ul>
                                <li class='menu-item'>
                                    <a href='cadastrar-aula.php'>
                                        <span class='menu-title'>Agendar Aula</span>
                                    </a>
                                </li>
                                <li class='menu-item'>
                                    <a href='pesquisar-aulaPratica.php'>
                                        <span class='menu-title'>Pesquisar Aula</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class='menu-item sub-menu'>
                        <a href='#'>
                            <span class='menu-icon'>
                                <i class='bi bi-car-front-fill'></i>
                            </span>
                            <span class='menu-title'>VEÍCULOS</span>
                        </a>
                        <div class='sub-menu-list'>
                            <ul>
                                <li class='menu-item'>
                                    <a href='cadastrar-veiculo.php'>
                                        <span class='menu-title'>Cadastrar Veículo</span>
                                    </a>
                                </li>
                                <li class='menu-item'>
                                    <a href='pesquisar-veiculo.php'>
                                        <span class='menu-title'>Pesquisar Veículo</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class='menu-item sub-menu'>
                        <a href='#'>
                            <span class='menu-icon'>
                                <i class='bi bi-clipboard2-fill'></i>
                            </span>
                            <span class='menu-title'>PROCESSOS</span>
                        </a>
                        <div class='sub-menu-list'>
                            <ul>
                                <li class='menu-item'>
                                    <a href='cadastrar-processo.php'>
                                        <span class='menu-title'>Iniciar Processo</span>
                                    </a>
                                </li>
                                <li class='menu-item'>
                                    <a href='pesquisar-processo.php'>
                                        <span class='menu-title'>Pesquisar Processo</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
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
