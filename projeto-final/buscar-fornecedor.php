<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>buscar-fornecedor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
  </head>

  <body>
    <div class="container"> <!-- container-fluid -->
      <img src="img/3.png" alt="">
      <h1 class="page-header">Consultar fornecedores</h1>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Fornecedores</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="cadastrar-fornecedor.php">Cadastr-fornecedor</a></li>
              <li><a href="filtrar-fornecedor.php">filtrar-fornecedor</a></li>
          </ul>
        </div>
      </nav>

      <?php
      include 'dao/fornecedordao.class.php';
      include 'modelo/fornecedor.class.php';

      $fornDAO = new FornecedorDAO();
      $array = $fornDAO->buscarFornecedor();
      ?>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th>Alterar</th>
              <th>Excluir</th>
              <th>Código</th>
              <th>Nome</th>
              <th>idade</th>
              <th>Sexo</th>
              <th>CPF</th>
              <th>RG</th>
              <th>Data_Nasc</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>Alterar</th>
              <th>Excluir</th>
              <th>Código</th>
              <th>Nome</th>
              <th>idade</th>
              <th>Sexo</th>
              <th>CPF</th>
              <th>RG</th>
              <th>Data_Nasc</th>
          </tfoot>

          <tbody>
            <?php
            foreach($array as $a){
                echo "<tr>";
                echo "<td><a href='alterar-fornecedor?id=$a->idFornecedor'>Alterar</a></td>";
                echo "<td><a href='buscar-fornecedor.php?id=$a->idFornecedor'>$a->idFornecedor</a></td>";
                echo "<td>$a->idFornecedor</td>";
                echo "<td>$a->nome</td>";
                echo "<td>$a->foneF</td>";
                echo "<td>$a->foneC</td>";
                echo "<td>$a->rg</td>";
                echo "<td>$a->cpf</td>";
                echo "<td>$a->cnpj</td>";
              echo "</tr>";
            }//fecha foreach
            ?>
          </tbody>
        </table>
        <?php
        if(isset($_GET['id'])){
          $fornDAO = new FornecedorDAO();
          $fornDAO->deletarFornecedor($_GET['id']);
          header('location:buscar-fornecedor.php');
          unset($_GET['id']);
        }//fecha if
         ?>
      </div>
    </div>
  </body>
</html>
