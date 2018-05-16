<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Consultar produtos </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
  </head>

  <body>
    <div class="container"> <!-- container-fluid -->
      <img src="img/3.png" alt="">
      <h1 class="page-header">Consultar produto</h1>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Produto</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="cadastrar-produto.php">Cadastrar-produto</a></li>
            <li><a href="filtrar-produto.php">filtrar-produto</a></li>
          </ul>
        </div>
      </nav>

      <?php
      include 'dao/produtodao.class.php';
      include 'modelo/produto.class.php';

      $prodDAO = new ProdutoDAO();
      $array = $prodDAO->buscarProduto();
      ?>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th>Alterar</th>
              <th>Excluir</th>
              <th>Código</th>
              <th>nome</th>
              <th>Quantidade</th>
              <th>Valor</th>
              <th>cor</th>
              <th>Marca</th>
              <th>Tamanho</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>Alterar</th>
              <th>Excluir</th>
              <th>Código</th>
              <th>nome</th>
              <th>Quantidade</th>
              <th>Valor</th>
              <th>cor</th>
              <th>Marca</th>
              <th>Tamanho</th>
            </tr>
          </tfoot>

          <tbody>
            <?php
            foreach($array as $a){
              echo "<tr>";
                echo "<td><a href='alterar-produto.php?id=$a->idProduto'>Alterar</a></td>";
                echo "<td><a href='buscar-produto.php?id=$a->idProduto'>$a->idProduto</a></td>";
                echo "<td>$a->idProduto</td>";
                echo "<td>$a->nome</td>";
                echo "<td>$a->qtd</td>";
                echo "<td>$a->valor</td>";
                echo "<td>$a->cor</td>";
                echo "<td>$a->marca</td>";
                echo "<td>$a->tamanho</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
        <?php
        if(isset($_GET['id'])){
          $prodDAO = new ProdutoDAO();
          $prodDAO->deletarProduto($_GET['id']);
          header('location:buscar-produto.php');
          unset($_GET['id']);
        }
        ?>
      </div>
    </div>
  </body>
</html>
