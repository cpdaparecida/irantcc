<?php
include '../config.php';
include '../connection.php';

$especialidade = $_GET['especialidade'];
$limite = 40;

$vaga = DBRead("historico", "WHERE especialidade = '{$especialidade}' ORDER By historico_id DESC LIMIT {$limite} " );


 //var_dump($vaga);

while (!isset($espeResta)  || !isset($espeGetu) || !isset($espeOtav) || !isset($espeMiguel)  ) {
      
      for($i = 0; $i < 40; $i++){
      
      if(strcmp($vaga[$i]['hospital'], "Restauração") == 0){
        if(!isset($espeResta)){
          $espeResta = array(0 => intval($vaga[$i]['vaga']));
        }
      } 
      if(strcmp($vaga[$i]['hospital'], "Getulio Vargas") == 0){
        if(!isset($espeGetu)){
          $espeGetu = array(0 => intval($vaga[$i]['vaga']));
        }
      } 
      if(strcmp($vaga[$i]['hospital'], "Otavio de Freitas") == 0){
        if(!isset($espeOtav)){
          $espeOtav = array(0 => intval($vaga[$i]['vaga']));
        }
      } 
      if(strcmp($vaga[$i]['hospital'], "Miguel Arraes") == 0){
        if(!isset($espeMiguel)){
          $espeMiguel = array(0 => intval($vaga[$i]['vaga']));
         }
      } 
      if(isset($espeResta) && isset($espeMiguel) && isset($espeOtav) && isset($espeGetu)){
        break;
      }

    }
if(!isset($espeResta)) 
  $espeResta = array( 0 => 0) ;
if(!isset($espeGetu)) 
  $espeGetu  = array( 0 => 0)  ;
if(!isset($espeOtav)) 
  $espeOtav  = array( 0 => 0)  ;
if(!isset($espeMiguel)) 
  $espeMiguel=  array( 0 => 0)  ;
 
}

//var_dump($vaga);
for ($i= 1; $i < 40; $i++) {
  # code...

  if(strcmp($vaga[$i]['hospital'], "Restauração") == 0){
    
    array_push($espeResta , intval($vaga[$i]['vaga']));
    array_push($espeGetu  , end($espeGetu)   );
    array_push($espeMiguel, end($espeMiguel) );
    array_push($espeOtav  , end($espeOtav)   );
  }
  if(strcmp($vaga[$i]['hospital'], "Getulio Vargas") == 0){
    
    array_push($espeGetu  , intval($vaga[$i]['vaga']));
    array_push($espeResta , end($espeResta)  );
    array_push($espeMiguel, end($espeMiguel) );
    array_push($espeOtav  , end($espeOtav)   );
  }
  if(strcmp($vaga[$i]['hospital'], "Otavio de Freitas") == 0){
    
    array_push($espeOtav  , intval($vaga[$i]['vaga']));
    array_push($espeResta , end($espeResta)  );
    array_push($espeMiguel, end($espeMiguel) );
    array_push($espeGetu  , end($espeGetu)   );
  }
  if(strcmp($vaga[$i]['hospital'], "Miguel Arraes") == 0){
    
    array_push($espeMiguel, intval($vaga[$i]['vaga']));
    array_push($espeResta , end($espeResta)  );
    array_push($espeOtav  , end($espeOtav)   );
    array_push($espeGetu  , end($espeGetu)   );
   }
}
//var_dump($espeMiguel);

$data = array();
for ($i=5; $i >-1 ; $i--) { 
  # code...
  array_push($data, $espeResta[$i]);
}
for ($i=5; $i >-1 ; $i--) { 
  # code...
  array_push($data, $espeGetu[$i]);
}
for ($i=5; $i >-1 ; $i--) { 
  # code...
  array_push($data, $espeOtav[$i]);
}
for ($i=5; $i >-1 ; $i--) { 
  # code...
  array_push($data, $espeMiguel[$i]);
}


echo json_encode($data);


//Ler registros
  function DBRead($table, $params = null, $fields = '*'){
    $params = ($params)? " {$params}":null;

    $query = "SELECT {$fields} FROM {$table}{$params}";
    $result = DBExecute($query);
    
    if(!mysqli_num_rows($result))
       return false;
    else{
      while($res = mysqli_fetch_assoc($result)){
        $info[] = $res;
        }
      return $info;
    }
  }
//Ler Registros baseado em query
  function DBReadQuery($query){
    $result = DBExecute($query);

    if(!mysqli_num_rows($result)){
      return false;
    }
    else{
      while ($res = mysqli_fetch_assoc($result)) {
        # code...
        $info[] = $res;
      }
      return $info;
  }
    // Executa Querys
  }
  
  function DBExecute($query){
    $link = DBConect();
    
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
    DBClose($link);
    return $result;
  }



?>