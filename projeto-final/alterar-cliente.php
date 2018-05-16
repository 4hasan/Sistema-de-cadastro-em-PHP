<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Alterar clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <img src="img/3.png" alt="">
      <div class="container">
        <h1 class="jumbotron bg-info">Alterar clientes</h1>
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
        include 'modelo/cliente.class.php';
        include 'dao/clientedao.class.php';

        if (isset($_GET['id'])) {

          $cliDAO = new ClienteDAO();
          $query = "where idCliente=".$_GET['id'];
          $array = $cliDAO->filtrar($query);

          // var_dump($array);
          unset($_GET['id']);
        }
         ?>
        <form name="alterarCli" method="post" action="">
          <div class="form-group">
            <input type="text" name="txtidCliente" placeholder="Código" class="form-control"
            readonly="readonly" value="<?php if(isset($array)) echo $array[0]->idCliente?>">
          </div>
          <div class="form-group">
            <input type="text" name="txtnome" placeholder="Nome" class="form-control"
            value="<?php if(isset($array)) echo $array[0]->nome?>">
          </div>

          <div class="form-group">
            <input type="text" name="txtidade" placeholder="Idade" class="form-control"
            value="<?php if(isset($array)) echo $array[0]->idade?>">
          </div>

          <div class="form-group">
            <select name="selsexo" class="form-control">
              <option value="Masculino"<?php if(isset($array))if($array[0]->sexo == "Masculino") echo "selected='selected'"?>>Masculino</option>
              <option value="Feminino"<?php if(isset($array))if($array[0]->sexo == "Feminino") echo "selected='selected'"?>>Feminino</option>
            </select>
            </div>

          <div class="form-group">
            <input type="text" name="txtcpf" placeholder="CPF" class="form-control"
            value="<?php if(isset($array)) echo $array[0]->cpf?>">
          </div>
          <div class="form-group">
            <input type="text" name="txtrg" placeholder="RG" class="form-control"
            value="<?php if(isset($array)) echo $array[0]->rg?>">
          </div>
          <div class="form-group">
            <input type="date" name="txtData" placeholder="Data de Nascimento" class="form-control"
            value="<?php if(isset($array)) echo $array[0]->dataNasc?>">
          </div>
          <div class="form-group">
            <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
            <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
          </div>
        </form>
        <?php
        if(isset($_POST['alterar'])){
          //padronizacao
          $idCliente = $_POST['txtidCliente'];
          $nome =$_POST ['txtnome'];
          $idade =$_POST ['txtidade'];
          $sexo =$_POST ['selsexo'];
          $cpf =$_POST ['txtrg'];
          $rg =$_POST ['txtcpf'];
         $dataNasc =$_POST ['txtData'];


          //validacao
          $cli = new Cliente();
          $cli->idCliente = $idCliente;
          $cli->nome = $nome;
          $cli->idade = $idade;
          $cli->sexo = $sexo;
          $cli->cpf = $cpf;
          $cli->rg = $rg;
          $cli->dataNasc = $dataNasc;

          //banco
          $cliDAO = new ClienteDAO();
          $cliDAO->alterarCliente($cli);
          header("location:buscar-cliente.php");
        }//fecha if
        ?>
      </div>
  </body>
</html>
