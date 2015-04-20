<?php

class ServiceDb {
    
    private $db;
    private $entity;
    
    function __construct(\PDO $db, EntidadeInterface $entity) {
        $this->db=$db;
        $this->entity=$entity;
    }

    public function find($id){
         $query="select * from {$this->entity->getTable()} where id=:id";
        
        $stmt=  $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
                
        if($stmt->execute()){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }
       
    }    
    public function listar($ordem=null){
        
        if($ordem){
            $query = "select * from {$this->entity->getTable()} order by {$ordem}";
        }else{
            $query = "select * from {$this->entity->getTable()}";
        }
        
        $stmt=  $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
        public function listar_notas($ordem=null){
        
        if($ordem){
            $query = "select * from {$this->entity->getTable()} order by {$ordem} limit 3";
        }else{
            $query = "select * from {$this->entity->getTable()} limit 3";
        }
        
        $stmt=  $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function inserir(){
        $query="insert into {$this->entity->getTable()} (nome, nota) values (:nome, :nota)";
        
        $stmt=  $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->entity->getNome());
        $stmt->bindValue(":nota", $this->entity->getNota());
        
        if($stmt->execute()){
            return true;
        }        
    }
    public function alterar($id) {

        $query="update {$this->entity->getTable()} set nome=:nome, nota=:nota where id=:id";
        
        $stmt=  $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nome", $this->entity->getNome());
        $stmt->bindValue(":nota", $this->entity->getNota());
                
        if($stmt->execute()){
            return true;
        }
    }
    public function deletar($id){
         $query="delete from {$this->entity->getTable()} where id=:id";
        
        $stmt=  $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
                
        if($stmt->execute()){
            return true;
        } 
    }  
}
?>