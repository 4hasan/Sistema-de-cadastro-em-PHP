<?php
require 'conexaobanco.class.php';

class FornecedorDAO{
  private $conexao = null;

  public function __construct(){
    $this->conexao=ConexaoBanco::getInstance();
  }

  public function __destruct(){}

  public function cadastrarFornecedor($forn){
    try {

      $stat = $this->conexao->prepare("insert into fornecedor(idfornecedor,nome,foneF,foneC,rg,cpf,cnpj)values(null,?,?,?,?,?,?)");
      $stat->bindValue(1,$forn->nome);
      $stat->bindValue(2,$forn->foneF);
      $stat->bindValue(3,$forn->foneC);
      $stat->bindValue(4,$forn->rg);
      $stat->bindValue(5,$forn->cpf);
      $stat->bindValue(6,$forn->cnpj);
      $stat->execute();

    } catch (Exception $e) {
      echo "Erro ao cadastrar!".$e;
    }//fecha trycatch
  }//fecha metodo CadastrarFornecdor

  public function buscarFornecedor(){
    try {
      $stat = $this->conexao->query("select * from fornecedor");
      $array = $stat->fetchAll(PDO::FETCH_CLASS,'Fornecedor');
      return $array;

    } catch (Exception $e) {
      echo "Erro ao buscar fornecedor!".$e;
    }
  }//fecha buscarFornecedor

  public function gerarJSON(){
    try {
      $stat=$this->conexao->query("select * from fornecedor");
      return json_encode($stat->fetchAll(PDO::FETCH_ASSOC));
    } catch (Exception $e) {
      echo "Erro ao gerar JSON!".$e;
    }
  }//fecha gerarJson

  public function deletarFornecedor($id){
    try {
      $stat = $this->conexao->prepare("delete from fornecedor where idfornecedor = ?");
      $stat->bindValue(1, $id);
      $stat->execute();
    } catch (PDOException $pe) {
      echo "Erro ao excluir!".$pe;
    }//fecha catch
  }// fecha deletarFornecedor
  public function filtrar($query){
    try {
      $stat = $this->conexao->query("select * from fornecedor ".$query);
      $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Fornecedor');
      return $array;
    } catch (PDOException $pe) {
      echo "Erro ao filtrar!!".$pe;
    }//fecha catch
  }//fecha filtrar

   public function alterarFornecedor($forn){
    try {
      $stat = $this->conexao->prepare("update fornecedor set nome=?, foneF=?, foneC=?, rg=?, cpf=?, cnpj=? where idFornecedor =?");
      $stat->bindValue(1, $forn->nome);
      $stat->bindValue(2, $forn->foneF);
      $stat->bindValue(3, $forn->foneC);
      $stat->bindValue(4, $forn->rg);
      $stat->bindValue(5, $forn->cpf);
      $stat->bindValue(6, $forn->cnpj);
      $stat->bindValue(7, $forn->idFornecedor);
      $stat->execute();
    }catch(PDOException $pe){
      echo "Erro ao alterar o fornecedor ".$pe;
    }//trycatch
  }// fecha alterarFornecedor
}//fecha fornecedorDAO
