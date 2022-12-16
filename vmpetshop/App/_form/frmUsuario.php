
<html>
    <head>
        <meta charset="UTF8">
        <link rel="stylesheet" href="../_css/form.css">
        <link rel="stylesheet" href="../_css/Geral.css">
    </head>
    <body>
        <?php session_start(); include_once '../_includes/menu.php';?><br><br>
        
        <form class="form-horizontal" method="post" action="cadastra.php" name="formUsuario" id="formUsuario">
    <fieldset>

    <!-- Form Name -->
    <legend>Cadastro de Usuário</legend>
    <!-- Text input-->
    <div class="form-group" hidden="hidden">
      <label class="col-md-4 control-label" for="txtUsuario">IDUsuario</label>  
      <div class="col-md-5">
          <input id="txtIDUsuario" hidden="hidden" name="txtIDUsuario" type="text" class="form-control input-md">  
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
      <label class="col-md-4 control-label" for="txtNome">Nome</label>  
      <div class="col-md-5">
          <input id="txtNomeEmpresa" required="required" name="txtNome" type="text" placeholder="Nome" class="form-control input-md" required="">  
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
      <label class="col-md-4 control-label" for="txtContato">Contato</label>  
      <div class="col-md-4">
          <input id="txtContato" required="required" maxlength="10" name="txtContato" type="text" placeholder="Telefone/Celular" class="form-control input-md" required="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">  
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectUserG">Usuário do Grupo</label>
      <div class="col-md-4">
        <select id="selectUserG" name="selectUserG" class="form-control">
          <option value="1">Administrador</option>
          <option value="2">Operador</option>
          <option value="3">Cliente</option>
          <option value="4">Fornecedor</option>
        </select>
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
        
        <h3>Lista de Usuários do Sistema</h3>
            <table class="table-horizontal">
                <tr id='thead'>
                    <td>ID</td>
                    <td>Login</td>
                    <td>Senha</td>
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td>Contato</td>
                    <td>Grupo</td>
                    <td>Status</td>
                    <td>Editar</td>
                    <td>Deletar</td>
                </tr>
                <?php
                 include_once '../../Util/conn.php';

                    $sql = "SELECT * FROM db_petshop.tbl_usuario";
                    $sqlQuery = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_array($sqlQuery)){


                        ?>
                        <tr>
                            <td align='center'><?php echo $rows['usu_id'];?></td>
                            <td><?php echo $rows['usu_login'];?></td>
                            <td><?php echo $rows['usu_senha'];?></td>
                            <td><?php echo $rows['usu_name'];?></td>
                            <td><?php echo $rows['usu_email'];?></td>
                            <td><?php echo $rows['usu_contato'];?></td>
                            <td><?php echo $rows['usu_grupo_id'];?></td>
                            <td><?php echo $rows['usu_status'];?></td>   
                            <td align="center"><a href="#"><img name="editar" class="ico" src="../_imagem/Edit.png" alt="editar"></a></td>
                            <td align="center"><a onclick="return confirm('Deseja realmente deleta?');" href="#"><img name="deletar" class="ico" src="../_imagem/remover.png" alt="deletar"></a></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
</body>
</html>