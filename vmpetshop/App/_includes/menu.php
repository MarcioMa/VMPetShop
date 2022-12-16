<html>
    <head>
        <title>PET SHOP</title>
        <meta charset="utf8">
        <link rel="stylesheet" href="../_css/menu.css">
        <link rel="stylesheet" href="../_css/Geral.css">
        <script type="text/javascript" src="../_js/script.js"></script>
    </head>
    <body>
        <?php echo "<strong id='userSession'>Bem vindo [".$_SESSION['usu_login']." ]</strong>";?>
        
        <nav id='menu'>
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
  <ul>
    <li><a href='http://localhost/VMPetShop/App/_form/administrativo.php'>Inicio</a></li>
    <li><a href='http://'>Caixa</a></li>
    <li><a class='dropdown-arrow' href='http://'>Ordem Serviço</a>
      <ul class='sub-menus'>
        <li><a href='http://'>Novo Serviço</a></li>
        <li><a href='http://'>Novo Pet</a></li>
        <li><a href='http://'>Novo Cliente</a></li> 
      </ul>
    </li>
    <li><a class='dropdown-arrow' href='http://'>Relatório</a>
      <ul class='sub-menus'>
        <li><a href='http://'>Fornecedor</a></li>
        <li><a href='http://'>Usuário</a></li>
        <li><a href='http://'>Produto</a></li>
        <li><a href='http://'>Cliente</a></li>
        <li><a href='http://'>Pet</a></li>
        <li><a href='http://'>Grupos</a></li>
      </ul>
    </li>
    <li><a class='dropdown-arrow' href='http://'>Cadastros</a>
      <ul class='sub-menus'>
        <li><a href='http://localhost/VMPetShop/App/_form/frmFornecedor.php'>Fornecedor</a></li>
        <li><a href='http://localhost/VMPetShop/App/_form/frmUsuario.php'>Usuário</a></li>
        <li><a href='http://localhost/VMPetShop/App/_form/frmProduto.php'>Produto</a></li>
        <li><a href='http://localhost/VMPetShop/App/_form/frmGrupoUsuario.php'>Gp de Usuário</a></li>
        <li><a href='http://localhost/VMPetShop/App/_form/frmGrupoPet.php'>Gp de Pet</a></li>
      </ul>
    </li>
    <li><a href='http://'>Sobre...</a></li>
    <li><a href='http://localhost/VMPetShop/' <?php session_destroy(); ?>>Sair do Sistema</a></li>
  </ul>
</nav>   
    </body>
</html>

