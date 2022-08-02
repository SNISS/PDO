<?php

require 'Produto.php';


$produto = new Produto();


 switch ($_GET['operacao']){
     
     case 'list':
         
         echo '<h3> Produtos </h3>';
         
         
foreach ($produto->list() as  $value){ //Vai chamar a func list e botar os resultados na array $value[]
    
    echo 'Id: '. $value['id'] . '<br> Descrição: '.$value['descricao']. '<hr>'; //Retornando  os valores na tela
}
         
         break;
     
     case 'insert':
         
        $status =  $produto->insert('Produto Teste'); //Passando a descricao para inserir na db
         
         if (!$status){
             
             echo "Não foi possivel executar a operação";
             return false;
         }
         
          
             echo "Operação concluida com sucesso";
         
         break;
     
     case 'update':
         
              $status =  $produto->update('Produto Alterado Teste', 4); //Vai atualizar um dado na db 
         
           if (!$status){
             
               
             echo "Não foi possivel executar a operação";
             return false;
         }
         
          
             echo "Operação concluida com sucesso";
         
         break;
     
         
         
     
     case 'delete':
                     $status =  $produto->delete(4); //Vai deletar um dado na db 
         
           if (!$status){
             
               
             echo "Não foi possivel executar a operação";
             return false;
         }
         
          
             echo "Operação concluida com sucesso";
         
         
         
         
         break;
 }