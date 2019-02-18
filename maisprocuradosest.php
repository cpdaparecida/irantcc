<?php
    include 'config.php';
    include 'connection.php';

     $info    = DBRead('info_hospitais'); 


      function maisProcurado($info){
      		$queimados = 0;
      		$cardiacos = 0;
      		$obstetrica = 0;
      		$ortopedica = 0;
      

      	for ($i=0; $i < count($info); $i++) { 
      		# code...
      		if($info[$i]['queimados'])
      			$queimados += $info[$i]['queimados'];
      		if($info[$i]['cardiacos'])
      			$cardiacos += $info[$i]['cardiacos'];
      		if($info[$i]['obstetricas'])
      			$obstetrica += $info[$i]['obstetricas'];
      		if($info[$i]['ortopedica'])
      			$ortopedica += $info[$i]['ortopedica'];
      		
      	}
      $queimados /= count($info);
      $cardiacos /= count($info);
      $obstetrica /= count($info);
      $ortopedica /= count($info);

      $resposta = "$queimados, $obstetrica, $cardiacos, $ortopedica";
      return $resposta;
      }


echo maisProcurado($info);

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