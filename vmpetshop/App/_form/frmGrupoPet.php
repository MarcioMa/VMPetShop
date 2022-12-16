
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
    <legend>Cadastra Grupo de Pet</legend>
    <!-- Text input-->
    <div class="form-group" hidden="hidden">
      <label class="col-md-4 control-label" for="txtGpUsuario">IDPet</label>  
      <div class="col-md-5">
          <input id="txtGpPet" hidden="hidden" name="txtGpUsuario" type="text" class="form-control input-md">  
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtNomeEmpresa">Nome do Grupo</label>  
      <div class="col-md-5">
          <input id="txtNomeGp" required="required" name="txtNomeGp" type="text" placeholder="Nome do grupo" class="form-control input-md" required="">  
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
        
        <h3>Lista de Categoria Pet Cadastrada</h3>
            <table class="table-horizontal">
                <tr id='thead'>
                    <td>ID</td>
                    <td>Categoria</td>
                    <td>Status</td>
                    <td>Editar</td>
                    <td>Deletar</td>
                </tr>
                <?php
                 include_once '../../Util/conn.php';

                    $sql = "SELECT * FROM db_petshop.tbl_pet_categoria";
                    $sqlQuery = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_array($sqlQuery)){


                        ?>
                        <tr>
                            <td align='center'><?php echo $rows['pet_categoria_id'];?></td>
                            <td><?php echo $rows['pet_categoria_nome'];?></td>
                            <td><?php echo $rows['pet_categoria_status'];?></td>   
                            <td align="center"><a href="#"><img name="editar" class="ico" src="../_imagem/Edit.png" alt="editar"></a></td>
                            <td align="center"><a onclick="return confirm('Deseja realmente deleta?');" href="#"><img name="deletar" class="ico" src="../_imagem/remover.png" alt="deletar"></a></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
</body>
</html>