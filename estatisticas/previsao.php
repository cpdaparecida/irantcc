<?php
include 'config.php';
include 'connection.php';

$historicoVaga = DBRead('historico', "WHERE hospital = 'Restauracao' AND especialidade = 'Queimados'", "vaga");


function previsao($vagas , $proximos){
$xs = array(1);
$ys = array(  intval($vagas[0]['vaga']) );

	for ($count=1; $count < count($vagas); $count++) { 
			array_push($xs, $count + 1);
			array_push($ys, intval($vagas[$count]['vaga']));
	}

$resposta = array($ys[0]);
$numeroPontos = count($vagas) - 1;



	for($i = 1;$i <count($ys); $i++){
	array_push($resposta, $ys[$i]);
	}

	for ($k=1; $k < ($numeroPontos -1); $k++) { 
		for ($j=$numeroPontos; $j > ($k + 1); $j--) { 
			# code...
			$resposta[$j] = ($resposta[$j] - $resposta[$j - 1]) /($xs[$j] - $xs[$j - $k]);
		}
	}

$r = $resposta[$numeroPontos];

	for($i = $numeroPontos ; $i > 0; $i--){

		$r =  ($r*($proximos - $xs[$i])) + $resposta[$i]  ;

	}
	return $r;
}
 $TESTE = array($historicoVaga[count($historicoVaga) - 4] , $historicoVaga[count($historicoVaga) - 4] , $historicoVaga[count($historicoVaga) -3] , $historicoVaga[count($historicoVaga) -2], $historicoVaga[count($historicoVaga) -1] );

 $result = previsao($TESTE, 4);
 var_dump($result);
  
function previsaoLinear($historicoVaga, $proximo){

	$m = count($historicoVaga) - 1;
	$x = array( 1 );
	$y = array(intval($historicoVaga[0]['vaga']));

	for ($count=1; $count < count($historicoVaga); $count++) { 
			array_push($x, $count + 1);
			array_push($y, intval($historicoVaga[$count]['vaga']));
	}
	var_dump($y);
	var_dump($x);
	$r = 0;

	for ($i=0; $i < $m ; $i++) { 
		# code...
		$c =1 ; $d = 1;
		for ($j=0; $j < $m; $j++) { 
			# code...
			if($i != $j){
				$c *= ($proximo - $x[$j]);
				$d *= ($x[$i] - $x[$j]); 
			}
		}
	$r += ($y[$i]*($c/$d));
	}

	return $r;
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
