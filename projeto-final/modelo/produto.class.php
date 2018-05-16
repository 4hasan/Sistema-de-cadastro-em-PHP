<?php
class Produto{
  private $idProduto;
  private $nome;
  private $qtd;
  private $valor;
  private $cor;
  private $marca;
  private $tamanho;

  public function __construct(){}
  public function __destruct(){}

  public function __get($a){return $this->$a;}
  public function __set($v,$a){$this->$a=$v;}

  public function __toString(){
    return nl2br("Nome: $this->nome
                  Quantidade: $this->qtd
                  Valor: $this->valor
                  Cor: $this->cor
                  Marca:$this->marca
                  Tamanho: $this->tamanho");
  }//fecha tostring
}//fecha classe produto

 ?>
