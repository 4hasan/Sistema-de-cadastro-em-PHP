<?php
class Cliente{
  private $idCliente;
  private $nome;
  private $sexo;
  private $idade;
  private $cpf;
  private $rg;
  private $dataNasc;

  public function __construct(){}
  public function __destruct(){}

  public function __get($a){return $this->$a;}
  public function __set($a,$v){$this-> $a=$v;}

  public function __toString(){
    return nl2br("Nome:$this->nome
                  Idade:$this->idade
                  CPF:$this->cpf
                  RG:$this->rg
                  Sexo:$this->sexo
                  Data de nascimento: $this->dataNasc");
  }// fecha tooString
}
 ?>
