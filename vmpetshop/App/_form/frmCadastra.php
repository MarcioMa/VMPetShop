<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="../_css/form.css">
<link rel="stylesheet" href="../_css/Geral.css">
<title>Portal VMPETSHOP</title>
</head>
<body>
    <br>
    <br>
    <div class="signup-form">
    <form class="form-horizontal" action="../_form/cadastra.php" method="post">
		<h2 align='center'>Conta de Cliente</h2>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="Nome" placeholder="Nome Completo" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="login" placeholder="Login" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" required="required">
        </div>
        <div class="form-group">
            <input type="tel" name="contato" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" placeholder="Telefone/Celular" required>
        </div>        
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Criar Conta</button>
        </div>
                <div class="text-center">Já tem registro? <a href="http://localhost/VMPetShop/">Fazer Login</a></div>
    </form>
	
</div>
</body>
</html>
