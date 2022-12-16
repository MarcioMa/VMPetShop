
<html>
    <head>
        <meta charset="UTF8">
        <link rel="stylesheet" href="../_css/form.css">
        <link rel="stylesheet" href="../_css/Geral.css">
    </head>
    <body>
        <?php session_start(); include_once '../_includes/menu.php';?><br><br>
        
        <form class="form-horizontal" method="post" action="cadastra.php" name="formGpPet" id="formGpPet">
    <fieldset>

    <!-- Form Name -->
    <legend>Cadastra Grupo de Usuário</legend>
    <!-- Text input-->
    <div class="form-group" hidden="hidden">
      <label class="col-md-4 control-label" for="txtGpUsuario">IDUsuario</label>  
      <div class="col-md-5">
          <input id="txtGpUsuario" hidden="hidden" name="txtGpUsuario" type="text" class="form-control input-md">  
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtNomeEmpresa">Nome do Grupo</label>  
      <div class="col-md-5">
          <input id="txtNomeGp" required="required" name="txtNomeGp" type="text" placeholder="Nome do grupo" class="form-control input-md" required="">  
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtDescricao">Descrição</label>  
      <div class="col-md-4">
          <input id="txtDescricao" name="txtDescricao" type="text" placeholder="Descrição do Grupo" class="form-control input-md" required="">  
      </div>
    </div>

    <!-- Multiple Checkboxes -->
<div class="form-group">
    <fieldset id="fieldsetCheckbox">
        <label class="col-md-4 control-label" id="pgrupo" for="checkboxes">Permissões Grupo</label>
    <div class="col-md-4">
      <div class="checkbox">
          <label for="checkboxes-0">
              <input type="checkbox" name="checkboxes" id="checkboxes-0" value="0" onclick="checkAll();">
            Selecionar tudo
      </label>
      </div>    
      <div class="checkbox">
          <label for="checkboxes-1">
            <input type="checkbox" name="checkboxes" id="checkboxes-1" value="1">
            Adicionar
          </label>
      </div>
      <div class="checkbox">
          <label for="checkboxes-2">
            <input type="checkbox" name="checkboxes" id="checkboxes-2" value="2">
            Editar
          </label>
          </div>
      <div class="checkbox">
          <label for="checkboxes-3">
            <input type="checkbox" name="checkboxes" id="checkboxes-3" value="3">
            Deletar
          </label>
      </div>
          <div class="checkbox">
          <label for="checkboxes-4">
            <input type="checkbox" name="checkboxes" id="checkboxes-4" value="4">
            Imprimir
          </label>
      </div>
          <div class="checkbox">
          <label for="checkboxes-5">
            <input type="checkbox" name="checkboxes" id="checkboxes-5" value="5">
            Importar
          </label>
      </div>
          <div class="checkbox">
          <label for="checkboxes-6">
            <input type="checkbox" name="checkboxes" id="checkboxes-6" value="6">
            Exportar
          </label>
      </div>
    </div>
  </fieldset>
    
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
        <br>
        <h3>Lista de Grupos Cadastrados</h3>
            <table class="table-horizontal">
                <tr id='thead'>
                    <td>ID</td>
                    <td>Grupo</td>
                    <td>Descrição</td>
                    <td>Adicionar</td>
                    <td>Editar</td>
                    <td>Deletar</td>
                    <td>Imprimir</td>
                    <td>Importar</td>
                    <td>Exportar</td>
                    <td>Editar</td>
                    <td>Deletar</td>
                </tr>
                <?php
                 include_once '../../Util/conn.php';

                    $sql = "SELECT * FROM db_petshop.tbl_usuario_grupo;";
                    $sqlQuery = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_array($sqlQuery)){


                        ?>
                        <tr>
                            <td><?php echo $rows['grupo_id'];?></td>
                            <td><?php echo $rows['grupo_nome'];?></td>
                            <td><?php echo $rows['grupo_descricao'];?></td>
                            <td align="center"><?php echo $rows['Permitir_adicionar'];?></td>
                            <td align="center"><?php echo $rows['Permitir_edicao'];?></td>
                            <td align="center"><?php echo $rows['Permitir_deletar'];?></td>
                            <td align="center"><?php echo $rows['Permitir_imprimir'];?></td>
                            <td align="center"><?php echo $rows['Permitir_importar'];?></td>
                            <td align="center"><?php echo $rows['Permitir_exportar'];?></td>   
                            <td align="center"><a href="#"><img name="editar" class="ico" src="../_imagem/Edit.png" alt="editar"></a></td>
                            <td align="center"><a onclick="return confirm('Deseja realmente deleta?');" href="#"><img name="deletar" class="ico" src="../_imagem/remover.png" alt="deletar"></a></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
</body>
</html>