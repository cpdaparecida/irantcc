<?php

			include 'config.php';
			include 'connection.php';
			
	
if (isset($_POST['cpf'])){
    $cpf = $_POST['cpf'];
	
	}
else
    $cpf = null;

if (isset($_POST['senha'])){
    $senha = $_POST['senha'];
}
else
    $senha = null;


if(isset($cpf, $senha)){
 
    
   $dados = DBRead('info_clientes' ,"WHERE cpf = '{$cpf}'", 'senha');
   $senhas = $dados[0]['senha'];
   
   if(strcmp($senhas, $senha) == 0){
	   header('Location: http://tcc.com/');
   }
	else{
		header('Location: http://tcc.com/login.html');
	}
  
	}

	//Ler registros
	function DBRead($table, $params = null, $fields = '*'){
		$table = DB_PREFIX.'_'.$table;
		$params = ($params)? " {$params}":null;

		$query = "SELECT {$fields} FROM {$table}{$params}";
		$result = DBExecute($query);
		
		if(!mysqli_num_rows($result))
			 return false;
		else{
			while($res = mysqli_fetch_assoc($result)){
				$data[] = $res;
				}
			return $data;
		}
	}
	
		// Executa Querys
	
	function DBExecute($query){
		$link = DBConect();
		
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		
		DBClose($link);
		return $result;
	}

?>

	