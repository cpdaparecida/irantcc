<?php
      include '../config.php';
      include '../connection.php';


$especialidade = $_GET['especialidade'];

$vaga = DBRead("historico", "WHERE especialidade = '{$especialidade}' ORDER By historico_id DESC LIMIT 6" );
//var_dump($vaga);


$label = array(
  0 => dataFormatada($vaga[count($vaga) - 1]['dataehora'])."\n".quebraHora($vaga[count($vaga) - 1]['dataehora']),
  1 => dataFormatada($vaga[count($vaga) - 2]['dataehora'])."\n".quebraHora($vaga[count($vaga) - 2]['dataehora']),
  2 => dataFormatada($vaga[count($vaga) - 3]['dataehora'])."\n".quebraHora($vaga[count($vaga) - 3]['dataehora']),
  3 => dataFormatada($vaga[count($vaga) - 4]['dataehora'])."\n".quebraHora($vaga[count($vaga) - 4]['dataehora']),
  4 => dataFormatada($vaga[count($vaga) - 5]['dataehora'])."\n".quebraHora($vaga[count($vaga) - 5]['dataehora']),
  5 => dataFormatada($vaga[count($vaga) - 6]['dataehora'])."\n".quebraHora($vaga[count($vaga) - 6]['dataehora'])
);
$dia = " ";
$meses  = array( 
  1 => 'Janeiro', 
  2 => 'Fevereiro',
  3 => 'Marco',
  4 => 'Abril',
  5 => 'Maio',
  6 => 'Junho',
  7 => 'Julho',
  8 => 'Agosto',
  9 => 'Setembro',
  10 => 'Outubro',
  11 => 'Novembro',
  12 => 'Dezembro',

  );
/*
for( $i = count($vaga) - 1; $i > -1 ; $i--){
    if($i == count($vaga)-1 ){
      $dataAtual = quebraData($vaga[$i]['dataehora']);
      $dataAnterior = $dataAtual;
      $dia .= " {$dataAtual['dia']} de {$meses[$dataAtual['mes']]} de {$dataAtual['ano']}" ;
    //var_dump($dataAtual);
    }
    else{
      $dataAnterior = $dataAtual;
      $dataAtual = quebraData($vaga[$i]['dataehora']);
    }
    //var_dump($dataAtual);
    //var_dump($dataAnterior);
    if($dataAtual['ano'] > $dataAnterior['ano'] || $dataAtual['mes'] > $dataAnterior['mes'] || $dataAtual['dia'] > $dataAnterior['dia']){
        $dia .= "                                                        {$dataAtual['dia']} de {$meses[$dataAtual['mes']]} de {$dataAtual['ano']}";

    }


}
*/
array_push($label, "Dias de Leituras");

echo json_encode($label);


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
  function dataFormatada($data){
    $dataAntes = explode(" ", $data);
    $dataQuebrada = explode("-", $dataAntes[0]);
    $dataQuebrada = array(
      'ano' => intval($dataQuebrada[0]) , 
      'mes' => intval($dataQuebrada[1]) ,
      'dia' => intval($dataQuebrada[2])
    );
    
    $resultado = $dataQuebrada['dia']."/".$dataQuebrada['mes'];
    return $resultado;
  }
  function quebraHora($data){
    $horaQuebrada = explode(" ", $data);
    $horaQuebrada = explode(":", $horaQuebrada[1]);
    $horaQuebrada = $horaQuebrada[0].':'.$horaQuebrada[1];
    return $horaQuebrada;
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
        $info[] = $res;
        }
      return $info;
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