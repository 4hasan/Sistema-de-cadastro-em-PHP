<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 </script>>
 <script  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/estilo.css">
    <meta charset="utf-8">
    <title>Cadastrar produto</title>
  </head>
  <body>
    <div class="">
      <img src="img/3.png" alt="">
     <h1 class="page-header">Cadastrar Produto </h1>
     <nav class="navbar navbar-default">
       <div class="container-fluid">
         <div class="navbar-header">
           <a class="navbar-brand" href="#">Produto</a>
         </div>
         <ul class="nav navbar-nav">
           <li><a href="index.php">Home</a></li>
           <li><a href="buscar-produto.php">Consultar-produto</a></li>
           <li><a href="filtrar-produto.php">filtrar-produto</a></li>

         </ul>
       </div>
     </nav>
     <form name="cadlivro"method="post" action="">
      <div class="form-group">
        <input type="text" name="txtnome" placeholder="Nome"class="form-control" pattern="^[A-z À-ú]{2,40}$">
      </div>
      <div class="form-group">
        <input type="number" name="txtqtd" placeholder="Quantidade"class="form-control" pattern="^[1-9]{3}$">
      </div>
      <div class="form-group">
        <input type="text" name="txtvalor" placeholder="Valor"class="form-control" pattern="^[0-9]{1,3}.[0-9]{1,2}$">
      </div>
      <div class="form-group">
        <input type="text" name="txtcor" placeholder="Cor"class="form-control" pattern="^[A-z À-ú]{2,25}$">
      </div>
      <div class="form-group">
        <input type="text" name="txtmarca" placeholder="Marca"class="form-control" pattern="^[A-z À-ú]{2,25}$">
      </div>
      <div class="form-group">
        <select name="seltamanho" class="form-control">
          <option value="P">P</option>
          <option value="M">M</option>
          <option value="G">G</option>
          <option value="GG">GG</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit"name="cadastrar" value="Cadastrar" class="btn btn-primary">
        <input type="reset" name="limpar" value="Limpar"class="btn btn-danger">
      </div>
    </div>
    </form>
    <?php
      if(isset($_POST['cadastrar'])){
        include 'modelo/produto.class.php';
        include 'dao/produtodao.class.php';

        //padronizacao
        $nome=$_POST['txtnome'];
        $qtd=$_POST['txtqtd'];
        $valor=$_POST['txtvalor'];
        $cor=$_POST['txtcor'];
        $marca=$_POST['txtmarca'];
        $tamanho=$_POST['seltamanho'];
        //validacao
        $prod= new Produto();
        $prod->nome =$nome;
        $prod->qtd=$qtd;
        $prod->valor= $valor;
        $prod->cor=$cor;
        $prod->marca=$marca;
        $prod->tamanho=$tamanho;

        //banco
        $prodDAO =new ProdutoDAO();
        $prodDAO->cadastrarProduto($prod);

        echo $prod;

      }//fecha if
     ?>

  </body>
</html>
