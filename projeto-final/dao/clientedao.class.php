<?php
include 'conexaobanco.class.php';

class ClienteDAO{

  private $conexao=null;

  public function __construct(){
    $this->conexao=ConexaoBanco::getinstance();
  }

  public function __destruct(){}

    public function cadastrarCliente($cli){
      $stat = $this->conexao->prepare("insert into cliente(idcliente,nome,sexo,idade,rg,cpf,dataNasc)values(null,?,?,?,?,?,?) ");
        try {

        $stat->bindValue(1,$cli->nome);
        $stat->bindValue(2,$cli->sexo);
        $stat->bindValue(3,$cli->idade);
        $stat->bindValue(4,$cli->rg);
        $stat->bindValue(5,$cli->cpf);
        $stat->bindValue(6,$cli->dataNasc);
        $stat->execute();

      } catch (PDOException $e) {
          echo "Erro ao cadastrar! ".$e;
        }//fecha catch
    }//cadastro produto

    public function buscarCliente(){
      try{
        $stat = $this->conexao->query("select * from cliente");
        $array = $stat->fetchAll(PDO::FETCH_CLASS,'Cliente');
        return $array;
      }catch(PDOException $e){
        echo "Erro ao buscar livros! ".$e;
      }//fecha catch
}//fecha metedo buscarcliente

public function filtrar($query){
  try {
    $stat = $this->conexao->query("select * from cliente ".$query);
    $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Cliente');
    return $array;
  } catch (PDOException $pe) {
    echo "Erro ao filtrar!!".$pe;
  }//fecha catch
}//fecha filtrar

public function deletarCliente($id){
  try {
    $stat = $this->conexao->prepare("delete from cliente where idcliente = ?");
    $stat->bindValue(1, $id);
    $stat->execute();
  } catch (PDOException $pe) {
    echo "Erro ao excluir!".$pe;
  }//fecha catch
}// fecha deletarPrdouto

public function gerarJSON(){
  try{
   $stat=$this->conexao->query("select * from cliente");
   return json_encode($stat->fetchAll(PDO::FETCH_ASSOC));
  }catch(PDOException $e){
    echo "Erro ao gerar JSON!".$e;
  }//fecha catch
}//fecha gerarJSON

public function alterarCliente($cli){
  try {
    $stat = $this->conexao->prepare("update cliente set nome=?, idade=?, sexo=?, cpf=?, rg=?, dataNasc=? where idCliente =?");
    $stat->bindValue(1, $cli->nome);
    $stat->bindValue(2, $cli->idade);
    $stat->bindValue(3, $cli->sexo);
    $stat->bindValue(4, $cli->cpf);
    $stat->bindValue(5, $cli->rg);
    $stat->bindValue(6, $cli->dataNasc);
    $stat->bindValue(7, $cli->idCliente);
    $stat->execute();
  }catch(PDOException $pe){
    echo "Erro ao alterar cliente! ".$pe;
  }
}
}// fecha classe cliente
