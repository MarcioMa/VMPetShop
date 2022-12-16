
<html>
    <head>
        <meta charset="UTF8">
        <link rel="stylesheet" href="../_css/form.css">
        <link rel="stylesheet" href="../_css/Geral.css">
    </head>
    <body>
        <?php session_start(); include_once '../_includes/menu.php';?><br><br>
        
        <form class="form-horizontal" method="post" action="cadastra.php" name="formProduto" id="formProduto">
    <fieldset>

    <!-- Form Name -->
    <legend>Cadastro de Produto</legend>
    <!-- Text input-->
    <div class="form-group" hidden="hidden">
      <label class="col-md-4 control-label" for="txtProduto">IDProduto</label>  
      <div class="col-md-5">
          <input id="txtIDProduto" hidden="hidden" name="txtIDProduto" type="text" class="form-control input-md">  
      </div>
    </div>
    
        <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectProdutoCateg">Categoria do Produto</label>
      <div class="col-md-4">
        <select id="selectUserG" name="selectUserG" class="form-control">
          <option value="1">Selecione...</option>
          <option value="2">Produto teste 1</option>
          <option value="3">Produto teste 2</option>
        </select>
      </div>
    </div>
    
                <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectForncedor">Forncedor do Produto</label>
      <div class="col-md-4">
        <select id="selectUserG" name="selectUserG" class="form-control">
          <option value="1">Selecione...</option>
          <option value="2">Fornecedor 1</option>
          <option value="3">Fornecedor 2</option>
        </select>
      </div>
    </div>
                
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtNomeEmpresa">Produto</label>  
      <div class="col-md-5">
          <input id="txtProduto" required="required" name="txtProduto" type="text" placeholder="Nome do Produto" class="form-control input-md" required="">  
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtDescricao">Descrição</label>  
      <div class="col-md-4">
          <input id="txtDescricao" name="txtDescricao" type="text" placeholder="Descrição do produto" class="form-control input-md" required="">  
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtLogin">Preço de Venda</label>  
      <div class="col-md-4">
      <input id="txtLogin" name="txtPrVenda" required="required" type="text" placeholder="0,00" class="form-control input-md" required="" oninput="this.value = this.value.replace(/[^0-9.,]/g, '').replace(/(\..*?)\..*/g, '$1');">  
      </div>
    </div>

        <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtLogin">Preço de Custo</label>  
      <div class="col-md-4">
      <input id="txtLogin" name="txtPrCusto" required="required" type="text" placeholder="0,00" class="form-control input-md" required="" oninput="this.value = this.value.replace(/[^0-9.,]/g, '').replace(/(\..*?)\..*/g, '$1');">  
      </div>
    </div>     

                <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="txtLogin">Quantidade de Produto(un)</label>  
      <div class="col-md-4">
      <input id="txtLogin" name="txtQtd" required="required" type="text" placeholder="0.00" class="form-control input-md" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">  
      </div>
    </div>
                
    <!-- Text input-->
    <div class="form-group" hidden="hidden">
      <label class="col-md-4 control-label" for="txtEmail">Cadastrador</label>  
      <div class="col-md-5">
      <input id="txtUsuarioCad" name="txtUsuarioCad" type="text" class="form-control input-md">  
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
        
        <h3>Lista de Produtos Cadastrados</h3>
            <table class="table-horizontal">
                <tr id='thead'>
                    <td>ID</td>
                    <td>Categoria</td>
                    <td>Fornecedor</td>
                    <td>Produto</td>
                    <td>Descrição</td>
                    <td>Preço Venda</td>
                    <td>Preço Custo</td>
                    <td>Quantidade</td>
                    <td>Status</td>
                    <td>Editar</td>
                    <td>Deletar</td>
                </tr>
                <?php
                 include_once '../../Util/conn.php';

                    $sql = "SELECT * FROM db_petshop.tbl_produto";
                    $sqlQuery = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_array($sqlQuery)){


                        ?>
                        <tr>
                            <td align='center'><?php echo $rows['prod_id'];?></td>
                            <td><?php echo $rows['prod_categoria_id'];?></td>
                            <td><?php echo $rows['prod_fornecedor_id'];?></td>
                            <td><?php echo $rows['prod_nome'];?></td>
                            <td><?php echo $rows['prod_descrica'];?></td>
                            <td><?php echo $rows['Preco_Venda'];?></td>
                            <td><?php echo $rows['prod_custo'];?></td>
                            <td><?php echo $rows['prod_quantia'];?></td>
                            <td><?php echo $rows['prod_status'];?></td>   
                            <td align="center"><a href="#"><img name="editar" class="ico" src="../_imagem/Edit.png" alt="editar"></a></td>
                            <td align="center"><a onclick="return confirm('Deseja realmente deleta?');" href="#"><img name="deletar" class="ico" src="../_imagem/remover.png" alt="deletar"></a></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
</body>
</html>