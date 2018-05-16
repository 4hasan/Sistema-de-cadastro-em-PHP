<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" href="css/estilo.css">
  </head>

  <body>
    <div class="container"> <!-- container-fluid -->
        <img src="img/3.png" alt="">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-default">
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="cadastrar-produto.php">Produto</a></li>
            <li><a href="cadastrar-cliente.php">Cliente</a></li>
            <li><a href="cadastrar-fornecedor.php">Fornecedor</a></li>
            <li><a href="#"></a></li>
          </ul>
        </div>
      </nav>

      <h2>Seja Bem vindo!</h2>
      <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/4.jpg" alt="" style="width:100%;">
        </div>

        <div class="item">
          <img src="img/5.jpg" alt="" style="width:100%;">
        </div>

        <div class="item">
          <img src="img/6.jpg" alt="" style="width:100%;">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>


  </body>
</html>
