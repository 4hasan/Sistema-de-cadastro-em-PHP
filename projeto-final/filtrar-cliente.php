<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Filtrar Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <div class="container"> <!-- container-fluid -->
      <img src="img/3.png" alt="">
      <h1 class="page-header">filtrar cliente</h1>
      <nav class=" navbar-default">
        <div class="container-fluid">
          <div class="navbar-default">
            <a class="navbar-brand" href="#">Cliente</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="buscar-cliente.php">Consultar-cliente</a></li>
            <li><a href="cadastrar-cliente.php">Cadastrar cliente</a></li>
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
          <input type="radio" name="rdfiltro" value="idcliente">
          Código</label>
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="nome">
          Nome</label>
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="sexo">
          Sexo</label>
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="idade">
          Idade</label>
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="rg">
          RG</label>
          <label class="radio-inline">
          <input type="radio" name="rdfiltro" value="cpf">
          CPF</label>
          <label class="radio-inline">
            <input type="radio" name="rdfiltro" value="dataNasc">
          Data Nascimento</label>
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
      include 'dao/clientedao.class.php';
      include 'modelo/cliente.class.php';

      if(isset($_POST['filtrar'])){

        $pesq = "";
        $pesq = $_POST['txtpesquisa']; //O que o user digitou
        $query = "";

        if($pesq != ""){

          $filtro = $_POST['rdfiltro']; //RadioButton

          if($filtro == 'idcliente'){
            $query = "where idcliente = ".$pesq;
          }else if($filtro == 'nome'){
            $query = "where nome like '%".$pesq."%'";
          }else if($filtro == 'sexo'){
            $query = "where sexo like '%".$pesq."%'";
          }else if($filtro == 'idade'){
            $query = "where idade like '%".$pesq."%'";
          }else if($filtro == 'rg'){
            $query = "where rg like '%".$pesq."%'";
          }else if($filtro == 'cpf'){
            $query = "where cpf like '%".$pesq."%'";
          }else if($filtro == 'dataNasc'){
            $query = "where dataNasc like '%".$pesq."%'";
          }
          else{
            $query = "";
          }
        }//fecha if isset rdfiltro

        $cliDAO = new ClienteDAO();
        $array = $cliDAO->filtrar($query);

        unset($_POST['filtrar']);

      } else {

        $cliDAO = new ClienteDAO();
        $array = $cliDAO->buscarCliente();

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
              <th>sexo</th>
              <th>idade</th>
              <th>rg</th>
              <th>cpf</th>
              <th>data_nasc</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>Código</th>
              <th>nome</th>
              <th>sexo</th>
              <th>idade</th>
              <th>rg</th>
              <th>cpf</th>
              <th>data_nasc</th>
            </tr>
          </tfoot>

          <tbody>
            <?php
            foreach($array as $a){
              echo "<tr>";
                echo "<td>$a->idCliente</td>";
                echo "<td>$a->nome</td>";
                echo "<td>$a->sexo</td>";
                echo "<td>$a->idade</td>";
                echo "<td>$a->rg</td>";
                echo "<td>$a->cpf</td>";
                echo "<td>$a->dataNasc</td>";
              echo "</tr>";
            }//fecha foreach
            unset($array);
            ?>
          </tbody>
        </table>
      </div>
      <?php
      } else {
        echo "<h2>Não há fornecedores(s) para ser(em) exibidos!</h2>";
      }//fecha else
      ?>
    </div>
  </body>
</html>
