<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Alterar fornecedor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
  </head>
<body>
  <img src="img/3.png" alt="">
  <div class="container">
   <h1 class="jumbotron bg-info">Alterar fornecedor</h1>
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
        include 'modelo/fornecedor.class.php';
        include 'dao/fornecedordao.class.php';

        if (isset($_GET['id'])) {

  $fornDAO = new FornecedorDAO();
   $query = "where idFornecedor=".$_GET['id'];
  $array = $fornDAO->filtrar($query);

          // var_dump($array);
  unset($_GET['id']);
    }
     ?>
<form name="alterarProd" method="post" action="">
  <div class="form-group">
    <input type="text" name="txtFornecedor" placeholder="Código" class="form-control"
      readonly="readonly" value="<?php if(isset($array)) echo $array[0]->idFornecedor?>">
  </div>
  <div class="form-group">
    <input type="text" name="txtnome" placeholder="Nome" class="form-control"
     value="<?php if(isset($array)) echo $array[0]->nome?>">
    </div>
    <div class="form-group">
      <input type="txt" name="txtfoneF" placeholder="Telefone fixo" class="form-control"
       value="<?php if(isset($array)) echo $array[0]->foneF?>">
    </div>
    <div class="form-group">
      <input type="text" name="txtfoneC" placeholder="Telefone celular" class="form-control"
       value="<?php if(isset($array)) echo $array[0]->foneC?>">
    </div>
    <div class="form-group">
     <input type="text" name="txtrg" placeholder="RG" class="form-control"
      value="<?php if(isset($array)) echo $array[0]->rg?>">
    </div>
     <div class="form-group">
      <input type="text" name="txtcpf" placeholder="CPF" class="form-control"
       value="<?php if(isset($array)) echo $array[0]->cpf?>">
      </div>
     <div class="form-group">
      <input type="text" name="txtcnpj" placeholder="CNPJ" class="form-control"
       value="<?php if(isset($array)) echo $array[0]->cnpj?>">
      </div>
      <div class="form-group">
       <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
       <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
    </div>
  </form>
  <?php
if(isset($_POST['alterar'])){
  //padronizacao
  $idFornecedor = $_POST['txtFornecedor'];
  $nome = $_POST ['txtnome'];
  $foneF = $_POST ['txtfoneF'];
  $foneC = $_POST ['txtfoneC'];
  $rg = $_POST ['txtrg'];
  $cpf = $_POST ['txtcpf'];
  $cnpj = $_POST ['txtcnpj'];


  //validacao
  $forn = new Fornecedor();
  $forn->idFornecedor = $idFornecedor;
  $forn->nome = $nome;
  $forn->foneF = $foneF;
  $forn->foneC = $foneC;
  $forn->rg = $rg;
  $forn->cpf= $cpf;
  $forn->cnpj = $cnpj;

  //banco
  $fornAO = new FornecedorDAO();
  $fornDAO->alterarFornecedor($forn);
  header("location:buscar-fornecedor.php");
      }//fecha if
      ?>
    </div>
  </body>
</html>
