<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Alterar Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <img src="img/3.png" alt="">
      <div class="container">
        <h1 class="jumbotron bg-info">Alterar Produto</h1>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Sistema</a>
            </div>
            <ul class="nav navbar-nav">


            </ul>
          </div>
        </nav>
        <?php
        include 'modelo/produto.class.php';
        include 'dao/produtodao.class.php';

        if (isset($_GET['id'])) {

          $prodDAO = new ProdutoDAO();
          $query = "where idProduto=".$_GET['id'];
          $array = $prodDAO->filtrar($query);

          // var_dump($array);
          unset($_GET['id']);
        }
         ?>
        <form name="alterarProd" method="post" action="">
          <div class="form-group">
            <input type="text" name="txtidProduto" placeholder="Código" class="form-control"
            readonly="readonly" value="<?php if(isset($array)) echo $array[0]->idProduto?>">
          </div>
          <div class="form-group">
            <input type="text" name="txtnome" placeholder="Nome" class="form-control"
            value="<?php if(isset($array)) echo $array[0]->nome?>">
          </div>

          <div class="form-group">
            <input type="number" name="txtqtd" placeholder="Quantidade" class="form-control"
            value="<?php if(isset($array)) echo $array[0]->qtd?>">
          </div>

          <div class="form-group">
            <input type="text" name="txtvalor" placeholder="Valor" class="form-control"
            value="<?php if(isset($array)) echo $array[0]->valor?>">
          </div>
          <div class="form-group">
            <input type="text" name="txtcor" placeholder="Cor" class="form-control"
            value="<?php if(isset($array)) echo $array[0]->cor?>">
          </div>
          <div class="form-group">
            <input type="text" name="txtmarca" placeholder="Marca" class="form-control"
            value="<?php if(isset($array)) echo $array[0]->marca?>">
          </div>
          <div class="form-group">
            <select name="seltamanho" class="form-control">
              <option value="P"<?php if(isset($array))if($array[0]->tamanho == "P") echo "selected='selected'"?>>P</option>
              <option value="M"<?php if(isset($array))if($array[0]->tamanho == "M") echo "selected='selected'"?>>M</option>
              <option value="G"<?php if(isset($array))if($array[0]->tamanho == "G") echo "selected='selected'"?>>G</option>
              <option value="GG"<?php if(isset($array))if($array[0]->tamanho == "GG") echo "selected='selected'"?>>GG</option>
            </select>
            </div>
          <div class="form-group">
            <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
            <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
          </div>
        </form>
        <?php
        if(isset($_POST['alterar'])){
          //padronizacao
          $idProduto = $_POST['txtidProduto'];
          $nome =$_POST ['txtnome'];
          $qtd =$_POST ['txtqtd'];
          $valor =$_POST ['txtvalor'];
          $cor =$_POST ['txtcor'];
          $marca =$_POST ['txtmarca'];
         $tamanho =$_POST ['seltamanho'];


          //validacao
          $prod = new Produto();
          $prod->idProduto = $idProduto;
          $prod->nome = $nome;
          $prod->qtd = $qtd;
          $prod->valor = $valor;
          $prod->cor = $cor;
          $prod->marca= $marca;
          $prod->tamanho = $tamanho;

          //banco
          $prodDAO = new ProdutoDAO();
          $prodDAO->alterarProduto($prod);
          header("location:buscar-produto.php");
        }//fecha if
        ?>
      </div>
  </body>
</html>
