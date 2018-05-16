<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Filtro de Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <div class="container"> <!-- container-fluid -->
      <img src="img/3.png" alt="">
      <h1 class="page-header">Filtrar produto</h1>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Produto</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="buscar-produto.php">Consultar-produto</a></li>
            <li><a href="cadastrar-produto.php">Cadastrar-produto</a></li>
          </ul>
        </div>
      </nav>

      <form name="filtroproduto" method="post" action="">
        <div class="form-group">
          <input type="text" name="txtpesquisa" class="form-control"
                 placeholder="Digite o que deseja pesquisar">
        </div>
        <div class="radio-inline">
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="idproduto">
          Código</label>
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="nome">
          Nome</label>
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="qtd">
          Quantidade</label>
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="valor">
          Valor</label>
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="cor">
          Cor</label>
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="marca">
          Marca</label>
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="tamanho">
          Tamanho</label>
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="todos"
                 checked="checked">
          Todos</label>
        </div>
        <div class="form-group">
          <input type="submit" name="filtrar" value="Filtrar"
                 class="btn btn-primary">
        </div>
      </form>

      <?php
      include 'dao/produtodao.class.php';
      include 'modelo/produto.class.php';

      if(isset($_POST['filtrar'])){

        $pesq = "";
        $pesq = $_POST['txtpesquisa'];
        $query = "";

        if($pesq != ""){

          $filtro = $_POST['rdfiltro'];

          if($filtro == 'idproduto'){
            $query = "where idproduto = ".$pesq;
          }else if($filtro == 'nome'){
            $query = "where nome like '%".$pesq."%'";
          }else if($filtro == 'qtd'){
            $query = "where qtd like '%".$pesq."%'";
          }else if($filtro == 'valor'){
            $query = "where valor like '%".$pesq."%'";
          }else if($filtro == 'cor'){
            $query = "where cor like '%".$pesq."%'";
          }else if($filtro == 'marca'){
            $query = "where marca like '%".$pesq."%'";
          }else if($filtro == 'tamanho'){
            $query = "where tamanho like '%".$pesq."%'";
          }
          else{
            $query = "";
          }
        }

        $prodDAO = new ProdutoDAO();
        $array = $prodDAO->filtrar($query);

        unset($_POST['filtrar']);

      } else {

        $prodDAO = new ProdutoDAO();
        $array = $prodDAO->buscarProduto();

      }//fecha else

      /* Testando se retornou dados */
      if(count($array) != 0) {
      ?>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th>Código</th>
              <th>nome</th>
              <th>quantidade</th>
              <th>valor</th>
              <th>cor</th>
              <th>marca</th>
              <th>tamanho</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>Código</th>
              <th>nome</th>
              <th>quantidade</th>
              <th>valor</th>
              <th>cor</th>
              <th>marca</th>
              <th>tamanho</th>
            </tr>
          </tfoot>

          <tbody>
            <?php
            foreach($array as $a){
              echo "<tr>";
                echo "<td>$a->idProduto</td>";
                echo "<td>$a->nome</td>";
                echo "<td>$a->qtd</td>";
                echo "<td>$a->valor</td>";
                echo "<td>$a->cor</td>";
                echo "<td>$a->marca</td>";
                echo "<td>$a->tamanho</td>";
              echo "</tr>";
            }//fecha foreach
            unset($array);
            ?>
          </tbody>
        </table>
      </div>
      <?php
      } else {
        echo "<h2>Não há produtos(s) para ser(em) exibidos!</h2>";
      }//fecha else
      ?>
    </div>
  </body>
</html>
