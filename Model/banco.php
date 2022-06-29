<?php
class Banco{

	private $connect;
	
	function __construct()
	{
		$this->connect = new mysqli('localhost','root','admin', 'checpoint1') ;
 		
	}
	
	function queryInsertDados($string_sql)
	{
		mysqli_query($this->connect,$string_sql);
		if(mysqli_affected_rows($this->connect) == 1)
	    {
	    	$mensagem="dados enviados com sucesso!";
	    	echo json_encode($mensagem);
	    	mysqli_close($this->connect);die();
	        
	    }else {
	        $mensagem="Erro, nao foi possível inserir no banco de dados";
	        echo json_encode($mensagem);
	        mysqli_close($this->connect);die();
	     
	    }
	}

    
	
	function queryListaDados($string_sql)
	{
		$dados = mysqli_query($this->connect,$string_sql) ;
		$linha = mysqli_fetch_assoc($dados);
		$total = mysqli_num_rows($dados);
		$result= array();
	  	
	  	if($total > 0) {
			do {
			    $result[]=$linha;
			}while($linha = mysqli_fetch_assoc($dados)); 
	    }
	  	echo json_encode($result);
		mysqli_close($this->connect);
	}

    

}

?>