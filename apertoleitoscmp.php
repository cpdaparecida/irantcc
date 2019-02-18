<?php
  include 'config.php';
    include 'connection.php';

     $info    = DBRead('info_hospitais'); 

     $especialidade = $_GET['especialidade'];

function nivelAperto($info, $especialidade){
	$mediaEspe = 0;
	$mediaLim  = 0;
for ($i=0; $i < count($info); $i++) { 
      		# code...
      		if($info[$i][$especialidade])
      			$mediaEspe += $info[$i][$especialidade];
      		if($info[$i]['lim_'.$especialidade])
      			$mediaLim += $info[$i]['lim_'.$especialidade];
      			
      	}
      $mediaEspe /= count($info);
      $mediaLim  /= count($info);
      $reposta =$mediaEspe." ".$mediaLim;
      return $reposta;
}


echo nivelAperto($info, $especialidade);


 function quebraData($data){

  $dataAntes = explode(" ", $data);
    $dataQuebrada = explode("-", $dataAntes[0]);
    $dataQuebrada = array(
      'ano' => intval($dataQuebrada[0]) , 
      'mes' => intval($dataQuebrada[1]) ,
      'dia' => intval($dataQuebrada[2])
    );

    return $dataQuebrada;
}



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