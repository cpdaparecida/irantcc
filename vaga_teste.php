<?php
include 'config.php';
include 'connection.php';

$_GET['especialidade'] = isset($_GET['especialidade']) == true ? $_GET['especialidade'] : false;
$_GET['ordem'] = isset($_GET['ordem']) == true ? $_GET['ordem'] : false;

if($_GET['especialidade']){
$campos = "hospital, {$_GET['especialidade']}";
$especialidade = $_GET['especialidade'];	
$especialidade = "WHERE ".$especialidade." > 0 ORDER BY '".$especialidade."' DESC";
}
else{
$campos = "*";
}


$respostaQueimados = DBRead('info_hospitais', $especialidade , $campos);
echo json_encode($respostaQueimados);
//Ler registros
  function DBRead($table, $params = null, $fields = '*'){
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