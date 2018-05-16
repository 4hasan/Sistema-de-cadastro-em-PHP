<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 </script>>
 <script  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="css/estilo.css">
    <meta charset="utf-8">
    <title>Cadastrar fornecedor</title>
  </head>
  <body>
    <div class="">
      <img src="img/3.png" alt="">
     <h1 class="page-header">Cadastrar fornecedor</h1>
     <nav class="navbar navbar-default">
       <div class="container-fluid">
         <div class="navbar-header">
           <a class="navbar-brand" href="#">Fornecedor</a>
         </div>
         <ul class="nav navbar-nav">
           <li><a href="index.php">Home</a></li>
            <li><a href="buscar-fornecedor.php">buscar-Fornecedor</a></li>
            <li><a href="filtrar-fornecedor.php">filtrar-Fornecedor</a></li>
         </ul>
       </div>
     </nav>
     <form name="cadforn"method="post" action="">
      <div class="form-group">
        <input type="text" name="txtnome" placeholder="Nome"class="form-control" pattern="^[A-z À-ú]{2,60}$">
      </div>
      <div class="form-group">
        <input type="txt" name="txtfoneF" placeholder="Telefone fixo"class="form-control" pattern="^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$">
      </div>
      <div class="form-group">
        <input type="text" name="txtfoneC" placeholder="Telefone celular"class="form-control" pattern="^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$">
      </div>
      <div class="form-group">
        <input type="text" name="txtrg" placeholder="RG"class="form-control" pattern="^[0-9]{10,14}$">
      </div>
      <div class="form-group">
        <input type="text" name="txtcpf" placeholder="CPF"class="form-control" pattern="^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$">
      </div>
      <div class="form-group">
        <input type="text" name="txtcnpj" placeholder="CNPJ"class="form-control" pattern="^[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}$">
      </div>
      <div class=""form-group"">
        <input type="submit"name="cadastrar" value="Cadastrar" class="btn btn-primary">
        <input type="reset" name="limpar" value="Limpar"class="btn btn-danger">
      </div>
    </div>
    </form>
    <?php
      if(isset($_POST['cadastrar'])){
        include 'modelo/fornecedor.class.php';
        include 'dao/fornecedordao.class.php';
        include 'util/validacao.class.php';

          //padronizacao
        $nome = $_POST['txtnome'];
        $foneF = $_POST['txtfoneF'];
        $foneC = $_POST['txtfoneC'];
        $rg = $_POST['txtrg'];
        $cpf = $_POST['txtcpf'];
        $cnpj = $_POST['txtcnpj'];


          //validacao
          $forn= new Fornecedor();
          $forn->nome =$nome;
          $forn->foneF=$foneF;
          $forn->foneC= $foneC;
          $forn->rg=$rg;
          $forn->cpf=$cpf;
          $forn->cnpj=$cnpj;

          //banco
          $fornDAO =new FornecedorDAO();
          $fornDAO->cadastrarFornecedor($forn);

          echo $forn;
      }
     ?>
  </body>
</html>
