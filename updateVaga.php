<?php
include 'config.php';
include 'connection.php';

    $especialidade =isset( $_GET['especialidade']) ? $_GET['especialidade']: null;
    $parametro =    isset( $_GET['valor']        ) ? $_GET['valor'] : null; 
    
    if(isset( $_GET['especialidade']) && isset( $_GET['valor']))
        DBUpdate($especialidade, $parametro);

    function DBUpdate($especialidade, $parametro){

        $query = "UPDATE info_hospital SET {$especialidade}  =  {$parametro} ";
        $result = DBExecute($query);
        
        
    }
    
 $hospitais = DBRead("info_hospitais");
  echo json_encode($hospitais) ;
  
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