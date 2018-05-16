<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>buscar-cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/.css">

  </head>

  <body>
    <div class="container"> <!-- container-fluid -->
      <img src="img/3.png" alt="">
      <h1 class="page-header">Consulta de clientes</h1>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Cliente</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="cadastrar-produto.php">Cadastrr-cliente</a></li>
              <li><a href="filtrar-cliente.php">filtrar-cliente</a></li>
          </ul>
        </div>
      </nav>

      <?php
      include 'dao/clientedao.class.php';
      include 'modelo/cliente.class.php';

      $cliDAO = new ClienteDAO();
      $array = $cliDAO->buscarCliente();
      /*foreach($array as $a){
        echo "<hr>"; //little Gambi
        echo "<br>".$a;
      }*/
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
                echo "<td><a href='alterar-cliente.php?id=$a->idCliente'>Alterar</a></td>";
                echo "<td><a href='buscar-cliente.php?id=$a->idCliente'>$a->idCliente</a></td>";
                echo "<td>$a->idCliente</td>";
                echo "<td>$a->nome</td>";
                echo "<td>$a->idade</td>";
                echo "<td>$a->sexo</td>";
                echo "<td>$a->cpf</td>";
                echo "<td>$a->rg</td>";
                echo "<td>$a->dataNasc</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
        <?php
        if(isset($_GET['id'])){
          $cliDAO = new ClienteDAO();
          $cliDAO->deletarCliente($_GET['id']);
          header('location:buscar-cliente.php');
          unset($_GET['id']);
        }
         ?>
      </div>
    </div>
  </body>
</html>
