<?php

include('config.php');
include('connection.php');

$hospital = $_GET['hospital'];
if(isset($_GET['queimados'])){
	$leito = $_GET['queimados']);
	$dados = array('queimados' => $leito );
} elseif (isset($_GET['cardiacos'])) {
	$leito = $_GET['cardiacos'];
	$dados = array('cardiacos' => $leito );
}
elseif (isset($_GET['ortopedica'])) {
	$leito = $_GET['ortopedica'];	
	$dados = array('ortopedica' => $leito );
}
else if (isset($_GET['obstetrica'])) {
	$leito = $_GET['obstetrica'];
	$dados = array('obstetrica' => $leito );
}


	$id = DBRead('info_hospitais', "WHERE hospital = {$hospital}");
	DBUpdate('info_hospitais', $dados, "id = {$id[0]['id']}");
	

	//atualiza alguma linha no DB
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

	// Executa Querys
	function DBExecute($query){
		$link = DBConect();
		
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		
		DBClose($link);
		return $result;
	}