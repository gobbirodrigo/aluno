<?php
require_once 'EntidadeInterface.php';
require_once 'Aluno.php';
require_once 'ServiceDb.php';

try{
$conexão= new \PDO("mysql:host=localhost;dbname=alunos;","root","*****");

}
 catch (\PDOException $e){
   die ('Não foi possível estabelecer a conexão com o banco de dados. Erro Código'.$e->getCode().':'.$e->getMessage());
     
     
 }
 
 $aluno=new Aluno();

 $serviceDb=new ServiceDb($conexão, $aluno);
 
 
$acao = filter_input(INPUT_GET, 'acao');
$id = filter_input(INPUT_GET, 'id');
 
 
if(isset($_POST['inserir'])){

    $nome  = $_POST['nome'];
    $nota = $_POST['nota'];
    
    $aluno->setNome($nome);
    $aluno->setNota($nota);

    # Inserir
    if($serviceDb->inserir()){
	echo "Inserido com sucesso!";
        echo '<br><br><a href="index.php">Voltar</a>';
    }

}

 
if(isset($_POST['alterar'])){

    $id  = $_POST['id'];
    $nome  = $_POST['nome'];
    $nota = $_POST['nota'];
    
        
    $aluno->setNome($nome);
    $aluno->setNota($nota);

    # Alterar
    if($serviceDb->alterar($id)){
	echo "Alterado com sucesso!";
        echo '<br><br><a href="index.php">Voltar</a>';
    }

}

    if($acao=='deletar'){
        $id = (int)$_GET['id'];
	if($serviceDb->deletar($id)){
            echo "Deletado com sucesso!";
            echo '<br><br><a href="index.php">Voltar</a>';            
	}
    }




 if(!isset($acao)){
      echo '<a href="index.php?acao=inserir">Inserir</a><br><br>';
    foreach ($serviceDb->listar("nome") as $a){
 
        echo $a['nome'].' | <a href="index.php?acao=alterar&id='.$a['id'].'">Alterar</a> | <a href="index.php?acao=deletar&id='.$a['id'].'" onclick="return confirm(\'Deseja reamente deletar?\');">Deletar</a> | <a href="index.php?acao=mostrar&id='.$a['id'].'">Mostrar</a><br>';
    }
 }else{
    if($acao=='alterar'){
        $resultado = $serviceDb->find($id);
?>        
        <form method="post" action="">
            <div>
                <span>Nome:</span>
                <input type="text" name="nome" value="<?php echo $resultado['nome']; ?>"  />
            </div>
            <div>
                <span>Nota:</span>
		<input type="text" name="nota" value="<?php echo $resultado['nota']; ?>" />
            </div>
            <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
            <br />
            <input type="submit" name="alterar" value="Alterar">					
	</form>
<?php
    }

    if($acao=='mostrar'){
      $resultado=$serviceDb->find($id);
      echo $resultado['nome'] . ' sua nota: '.$resultado['nota'];
      echo '<br><br><a href="javascript:history.go(-1);">Voltar</a>';
    }
    if($acao=='inserir'){
        ?>        
        <form method="post" action="">
            <div>
                <span>Nome:</span>
                <input type="text" name="nome" value="<?php echo $resultado['nome']; ?>"  />
            </div>
            <div>
                <span>Nota:</span>
		<input type="text" name="nota" value="<?php echo $resultado['nota']; ?>" />
            </div>
            
            <br />
            <input type="submit" name="inserir" value="Inserir">					
	</form>
<?php
    }
 }
?>