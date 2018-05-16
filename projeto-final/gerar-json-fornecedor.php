<?php
include 'dao/fornecedordao.class.php';
include 'modelo/fornecedor.class.php';

$fornDAO = new FornecedorDAO();
echo $fornDAO->gerarJSON();
