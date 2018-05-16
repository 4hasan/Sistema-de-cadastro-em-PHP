<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 </script>>
 <script  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Cadastrar cliente</title>
  </head>
  <body>
    <div class="">
      <img src="img/3.png" alt="">
     <h1 class="page-header">Cadastrar Cliente</h1>
     <nav class="navbar navbar-default">
       <div class="container-fluid">
         <div class="navbar-default">
           <a class="navbar-brand" href="#">Cliente</a>
         </div>
         <ul class="nav navbar-nav">
           <li><a href="index.php">Home</a></li>
           <li><a href="filtrar-cliente.php">filtrar-cliente</a></li>
           <li><a href="buscar-cliente.php">Consultar-cliente</a></li>
         </ul>
       </div>
     </nav>
     <form name="cadcli"method="post" action="">
      <div class="form-group">
        <input type="text" name="txtnome" placeholder="Nome"class="form-control" pattern="^[A-z À-ú]{3,60}$">
      </div>
      <div class="form-group">
        <select name="selsexo" class="form-control">
          <option value="M">Masculino</option>
          <option value="F">Feminino</option>
        </select>
      </div>
      <div class="form-group">
        <input type="number" name="txtidade" placeholder="Idade"class="form-control" pattern="^[0-9]{1,3}$">
      </div>
      <div class="form-group">
        <input type="text" name="txtcpf" placeholder="CPF"class="form-control"pattern="^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$">
      </div>
      <div class="form-group">
        <input type="text" name="txtrg" placeholder="RG"class="form-control" pattern="^[0-9]{10,14}$">
      </div>
      <div class="form-group">
        <input type="date" name="txtdataNasc" placeholder="Data de Nascimento"class="form-control">
      </div>
      <div class=""form-group"">
        <input type="submit"name="cadastrar" value="Cadastrar" class="btn btn-primary">
        <input type="reset" name="limpar" value="Limpar"class="btn btn-danger">
      </div>
    </div>
    </form>
    <?php
      if(isset($_POST['cadastrar'])){
        include 'modelo/cliente.class.php';
        include 'dao/clientedao.class.php';
        include 'util/validacao.class.php';

        //padronizacao
        $nome=$_POST['txtnome'];
        $sexo=$_POST['selsexo'];
        $idade=$_POST['txtidade'];
        $cpf=$_POST['txtcpf'];
        $rg=$_POST['txtrg'];
        $dataNasc=$_POST['txtdataNasc'];
        //validacao
        $erros=array();
        if(!Validacao::validarNome($nome)){
          $erros[]= "Nome inválido";
        }

        if(!Validacao::validarIdade($idade)){
          $erros[]="Idade inválida";
        }

        if(!Validacao::validarRg($rg)){
          $erros[]="RG inavalido";
        }

        if(!Validacao::validarCpf($cpf)){
          $erros[]="CPF inválido";
        }
         if(count($erros)==0){
        $cli= new Cliente();
        $cli->nome =$nome;
        $cli->sexo=$sexo;
        $cli->idade= $idade;
        $cli->cpf=$cpf;
        $cli->rg=$rg;
        $cli->dataNasc=$dataNasc;
      }
        //banco
        $cliDAO =new ClienteDAO();
        $cliDAO->cadastrarCliente($cli);

        echo $cli;

      }//fecha if
     ?>

  </body>
</html>
