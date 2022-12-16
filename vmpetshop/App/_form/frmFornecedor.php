
<html>
    <head>
        <meta charset="UTF8">
        <link rel="stylesheet" href="../_css/form.css">
        <link rel="stylesheet" href="../_css/Geral.css">
    </head>
    <body>
        <?php session_start(); include_once '../_includes/menu.php';?><br><br>
        
        <form class="form-horizontal" method="post" action="cadastra.php" name="formFornecedor" id="formFornecedor">
    <fieldset>

    <!-- Form Name -->
    <legend>Cadastro de Fornecedor</legend>
    <!-- Text input-->
    <div class="form-group" hidden="hidden">
      <label class="col-md-4 control-label" for="txtNomeEmpresa">IDfornecedor</label>  
      <div class="col-md-5">
          <input id="txtNomeEmpresa" hidden="hidden" name="txtIDFornecedor" type="text" class="form-control input-md">  
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtNomeEmpresa">Nome/Empresa</label>  
      <div class="col-md-5">
          <input id="txtNomeEmpresa" required="required" name="txtNomeEmpresa" type="text" placeholder="Nome/Empresa" class="form-control input-md" required="">  
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtContato">Contato</label>  
      <div class="col-md-4">
          <input id="txtContato" required="required" maxlength="10" name="txtContato" type="text" placeholder="Telefone/Celular" class="form-control input-md" required="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">  
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtLogin">Login</label>  
      <div class="col-md-4">
      <input id="txtLogin" name="txtLogin" required="required" type="text" placeholder="Login" class="form-control input-md" required="">  
      </div>
    </div>

    <!-- Password input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtSenha">Senha</label>
      <div class="col-md-4">  
        <input id="txtSenha" name="txtSenha" required="required" type="password" placeholder="Senha" class="form-control input-md" required="">
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtEmail">E-mail</label>  
      <div class="col-md-5">
      <input id="txtEmail" name="txtEmail" required="required" type="text" placeholder="E-mail" class="form-control input-md">  
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtSite">Site/Web</label>  
      <div class="col-md-6">
      <input id="txtSite" name="txtSite" type="text" placeholder="Site/Web" class="form-control input-md">  
      </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtDescricao">Descrição Empresa/Produto</label>
      <div class="col-md-4">                     
        <textarea class="form-control" id="txtDescricao" name="txtDescricao"></textarea>
      </div>
    </div>

    <!-- Button (Double) -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="submit"></label>
      <div class="col-md-8">
          <button type="submit" id="submit" name="submit" class="btn btn-success">Cadastrar</button>
          <button type="button" id="Cancel" name="Cancel" class="btn btn-danger" onclick="window.location.href='http://localhost/VMPetShop/App/_form/administrativo.php'">Cancelar</button> 
      </div>
    </div>
    </fieldset>
    </form>
        
        <h3>Lista de Fornecedores Cadastrados</h3>
            <table class="table-horizontal">
                <tr id='thead'>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Contato</td>
                    <td>Login</td>
                    <td>Senha</td>
                    <td>Descrição</td>
                    <td>E-mail</td>
                    <td>Site/Web</td>
                    <td>Editar</td>
                    <td>Deletar</td>
                </tr>
                <?php
                 include_once '../../Util/conn.php';

                    $sql = "SELECT * FROM db_petshop.tbl_fornecedor;";
                    $sqlQuery = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_array($sqlQuery)){


                        ?>
                        <tr>
                            <td align='center'><?php echo $rows['fornecedor_id'];?></td>
                            <td><?php echo $rows['fornecedor_name'];?></td>
                            <td><?php echo $rows['fornecedor_contato'];?></td>
                            <td><?php echo $rows['fornecedor_login'];?></td>
                            <td><?php echo $rows['fornecedor_senha'];?></td>
                            <td><?php echo $rows['fornecedor_descricao'];?></td>
                            <td><?php echo $rows['fornecedor_email'];?></td>
                            <td><?php echo $rows['fornecedor_site'];?></td>   
                            <td align="center"><a href="#"><img name="editar" class="ico" src="../_imagem/Edit.png" alt="editar"></a></td>
                            <td align="center"><a onclick="return confirm('Deseja realmente deleta?');" href="#"><img name="deletar" class="ico" src="../_imagem/remover.png" alt="deletar"></a></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
    </body>
</html>