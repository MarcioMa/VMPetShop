<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="./App/_css/csslogin.css">
</head>
<body>
<div>
    <img src="./App/_imagem/foto18.jpg" id="ftlogo" alt="Foto Logo">
    <form name="form1" method="POST" action="./App/_form/login.php">
        <p>
            <input type="text" id="login" name="login" placeholder="Usuário" required> 
            <input type="password" id="pass" name="pass" placeholder="Senha" required>
        <input type="submit" id="submit" value="Login">
        <input type="button" id="submit" value="Criar Conta" onclick="window.location.href='./App/_form/frmCadastra.php';">
        </p>
    </form>
    <p style="text-align: right;">Esqueceu a Senha ou Login? <a href="#">Clique aqui</a></p>
    <figure>
        <img id="figura1" src="App/_imagem/farmacia.png">
        <img id="figura2" src="App/_imagem/banner.jpg">
    </figure>
</div>
</body>
</html>