<?php
		include 'config.php';
		include 'connection.php';
		
		$historico = DBRead('historico');

		$contador = 0;
        $dataCard1 = "";
        
         for ( $i = 0; $i < count($historico) -1; $i++) {
           if ($historico[count($historico)-2]['especialidade'] == $historico[$i]['especialidade']  && $historico[count($historico) - 2]['hospital'] == $historico[$i]['hospital'] && $contador < 20  ) {

              $dataCard1 .=" {$historico[$i]['vaga']} ,";

           }
           $contador++;
         }
         
         $dataCard1 = substr_replace($dataCard1, ' ', strlen($dataCard1) - 1);
         echo "{$dataCard1}";
         ;


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