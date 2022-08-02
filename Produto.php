<?php

declare(strict_types=1);


// Em vez de usar $_GET[] vamos usar variaveis com o valor do parametro solicitado ex: public function wee($descricao)

//Na listagem não vamos retornar o valor aqui vamos fazer isso no index

class Produto {
    
    /**
     * 
     * @var PDO
     */
    
    private $conexao;
    
    
    //Funções
    
    public function __construct(){ 
        
        //Toda vez que a classe foi chamada ele vai fazer a conexão
        
        try{
        $this->conexao = new PDO(/*host e nome da db*/'mysql:host=mysql;dbname=exemplo',/*user*/'user',/*senha*/'123');
    }catch(Exception $e){
        echo $e->getMessage(); //em aplicações reais temos que filtrar para não retornar a mensagem de erro pura para os usuarios 
        die();
    }
 } 
 
    public function list() {  //Vai listar tudo da tabela produtos
        
        $sql = 'select * from produtos';

         $produto = [];

   
      foreach ($this->conexao->query($sql) as $key => $value){ 
    
          array_push($produto, $value); //Vai inserir o valor do value dentro da array produtos
          
}
   return $produtos;
        
    }
    
    public function insert(string $descricao){ //Vai inserir uma valor na tabela produtos
        
        $sql = 'insert into produtos(descricao) values(?)';

$prepare  = $this->conexao->prepare($sql);

$prepare->bindParam(1, $_GET['id']); 

$prepare->bindParam(2,$descricao);

$prepare->execute();

echo $prepare->rowCount();
        
    } 
    
    public function update(string $descricao, int $id){ //Vai fazer o update da tabela
        
        $sql = 'update producsts set descricao = ? where id = ?'; 

$prepare = $this->conexao->prepare($sql);

$prepare->bindParam(1, $descricao);

$prepare->bindParam(2, $id);

$prepare->execute(); 

echo $prepare->rowCount();

        
    } 
    
    public function delete(int $id){ //Vai deletar o valor do id passado por parametro GET

  $sql = 'delete from produtos where id = ?';

  $prepare = $this->conexao->prepare($sql);

  $prepare->bindParam(1, $id);

  $prepare->execute();

  echo $prepare->rowCount(); 
        
    }
}

