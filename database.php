<?php/
include 'config.php';
include 'connection.php';

	//Update Registros
	function DBUpdate($table, array $data, $where = null){
		
		foreach($data as $key => $value){
		 $fields[] = "{$key} = '{$value}'";
		 
		}
		$fields = implode(',' , $fields);
		
		
		$table = DB_PREFIX.'_'.$table;
		$where = ($where)? " WHERE {$where}" : null;
		
		$query = "UPDATE {$table} SET {$fields}{$where}";
		return DBExecute($query);
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
	
	
	
	
	// Gtrava registros
	 function DBCreate($table, array $data){
		 $table = DB_PREFIX.'_'.$table;
		  
		 
		 $data = DBEscape($data);
		 
		 foreach($data as $key => $value){
		 $fields = implode(', ' , array_keys($data));
		 $values = "'".implode("' , '" , $data)."'";
		 }
		 $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
			var_dump($query);
		return DBExecute($query);
	}
	
	
	
	
	
	
	// Executa Querys
	
	function DBExecute($query){
		$link = DBConect();
		
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		
		DBClose($link);
		return $result;
	}


?>