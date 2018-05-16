<?php
include 'dao/produtodao.class.php';
include 'modelo/produto.class.php';

$prodDAO = new ProdutoDAO();
echo $prodDAO->gerarJSON();
 ?>
