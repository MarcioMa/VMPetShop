<html>
    <head>
        <meta charset="UTF8">
        <link rel="stylesheet" href="../_css/Geral.css">
    </head>
    <body>
        <?php
        
            session_start();
            if(!isset($_SESSION["usu_login"]))
                {
                // Usuário não logado! Redireciona para a página de login
                header("Location: http://localhost/VMPetShop/");
                exit;
                }
            include_once "../../Util/conn.php";
            include_once "../../App/_includes/menu.php";
        ?>
    </body>
</html>