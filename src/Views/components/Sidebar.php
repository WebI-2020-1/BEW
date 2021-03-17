<link rel="stylesheet" href="/public/css/sidebar.css">

<nav class="sidebar-menu disabled">
    <div class="logo-container">
        <i class="menu-toggle" data-feather="arrow-left"></i>
        <img class="logo" src="/public/img/logo-preto.svg" alt="logo do BEW">
    </div>
    <ul class="menu-list">
        <li class="menu-option" id="vendas">
            <a href="/sale"><i data-feather="shopping-bag"></i> VENDAS</a>
        </li>
        <?php if($_SESSION['dados_usuario']['nivelAcesso'] == 2){ ?>
            <li class="menu-option" id="compras">
                <a href="/purchase"><i data-feather="shopping-cart"></i> COMPRAS</a>
            </li>
        <?php } ?>    
        <li class="menu-option" id="produtos">
            <a href="/product"><i data-feather="package"></i> PRODUTOS</a>
        </li>
        <li class="menu-option" id="fornecedores">
            <a href="/provider"><i data-feather="truck"></i> FORNECEDORES</a>
        </li>
        <?php if($_SESSION['dados_usuario']['nivelAcesso'] == 2){ ?>
            <li class="menu-option" id="funcionarios">
                <a href="/employee"><i data-feather="user"></i> FUNCIONÁRIOS</a>
            </li>
        <?php } ?>
        <li class="menu-option" id="clientes">
            <a href="/client"><i data-feather="users"></i> CLIENTES</a>
        </li>
        <li class="menu-option" id="promocoes">
            <a href="/promotion"><i data-feather="dollar-sign"></i> PROMOÇÕES</a>
        </li>
        <li class="menu-option" id="categorias">
            <a href="/category"><i data-feather="folder"></i> CATEGORIAS</a>
        </li>
        <?php if($_SESSION['dados_usuario']['nivelAcesso'] == 2){ ?>
            <li class="menu-option" id="relatorios">
                <a href="/reports"><i data-feather="layers"></i> RELATÓRIOS</a>
            </li>
        <?php } ?>  
    </ul>

    <div class="logout">
        <a href="/logout">SAIR <i data-feather="log-out"></i></a>
    </div>
</nav>
