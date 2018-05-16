<?php
require 'conexaobanco.class.php';
class ProdutoDAO{

  private $conexao= null;

  public function __construct(){
    $this->conexao=ConexaoBanco::getInstance();
  }

  public function __destruct(){}

  public function cadastrarProduto($prod){
      try {
      $stat = $this->conexao->prepare("insert into produto(idproduto,nome,qtd,valor,cor,marca,tamanho)values(null,?,?,?,?,?,?) ");

      $stat->bindValue(1,$prod->nome);
      $stat->bindValue(2,$prod->qtd);
      $stat->bindValue(3,$prod->valor);
      $stat->bindValue(4,$prod->cor);
      $stat->bindValue(5,$prod->marca);
      $stat->bindValue(6,$prod->tamanho);
      $stat->execute();

    } catch (PDOException $e) {
        echo "Erro ao cadastrar! ".$e;
      }//fecha catch
  }//cadastro produto

  public function buscarProduto(){
    try{
      $stat = $this->conexao->query("select * from produto");
      $array = $stat->fetchAll(PDO::FETCH_CLASS,'Produto');
      return $array;
    }catch(PDOException $e){
      echo "Erro ao buscar produto ".$e;
    }//fecha catch
  }//fecha buscarProduto

  public function filtrar($query){
    try {
      $stat = $this->conexao->query("select * from produto ".$query);
      $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Produto');
      return $array;
    } catch (PDOException $pe) {
      echo "Erro ao filtrar!!".$pe;
    }//fecha catch
  }//fecha filtrar
  public function deletarProduto($id){
    try {
      $stat = $this->conexao->prepare("delete from produto where idproduto = ?");
      $stat->bindValue(1, $id);
      $stat->execute();
    } catch (PDOException $pe) {
      echo "Erro ao excluir!".$pe;
    }//fecha catch
  }// fecha deletarPrdouto
  public function gerarJSON(){
    try{
     $stat=$this->conexao->query("select * from produto");
     return json_encode($stat->fetchAll(PDO::FETCH_ASSOC));
    }catch(PDOException $e){
      echo "Erro ao gerar JSON!".$e;
    }//fecha catch
  }//fecha gerarJSON
  public function alterarProduto($prod){
    try {
      $stat = $this->conexao->prepare("update produto set nome=?, qtd=?, valor=?, cor=?, marca=?, tamanho=? where idProduto =?");
      $stat->bindValue(1, $prod->nome);
      $stat->bindValue(2, $prod->qtd);
      $stat->bindValue(3, $prod->valor);
      $stat->bindValue(4, $prod->cor);
      $stat->bindValue(5, $prod->marca);
      $stat->bindValue(6, $prod->tamanho);
      $stat->bindValue(7, $prod->idProduto);
      $stat->execute();
    }catch(PDOException $pe){
      echo "Erro ao alterar cliente! ".$pe;
    }
  }
}//fecha classe

 ?>
