<?php

class Fornecedor{
  private $idFornecedor;
  private $nome;
  private $foneF;
  private $foneC;
  private $rg;
  private $cpf;
  private $cnpj;

public function __construct(){}
public function __destruct(){}

public function __get($a){return $this->$a;}
public function __set($a,$v){$this->$a=$v;}

public function __toString(){
  return nl2br("Nome: $this->nome
                Telefone Fixo: $this->foneF
                Telefone Celular:$this->foneC
                RG:$this->rg
                CPF:$this->cpf
                CNPJ:$this->cnpj");
}//fecha toString
}//fecha classe fornecedor
