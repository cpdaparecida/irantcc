<?php
	   include 'config.php';
       include 'connection.php';

     $historico       = DBRead('historico'); 
     $historicoCard = DBRead('historico', "WHERE especialidade = 'Cardiacos'");
     $historicoQuei = DBRead('historico', "WHERE especialidade = 'Queimados'");
     $historicoOrto = DBRead('historico', "WHERE especialidade = 'Ortopedica'");
     $historicoObst = DBRead('historico', "WHERE especialidade = 'Obstetrica'");

      $mes = $_GET['mes'];

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
  12 => 'Dezembro'

  );



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
  //essa função retorna um array com a média de vagas num mês, dia por dia
  function variaDia($historico, $mes, $meses){
         $arrayDia = array(1);      //Cria o array com os dias do mês, para cada mês. 31 dias para janeiro, 28 para fevereiro...
         $arrayMediaNoDia = array(0);     // Cria o array com as médias dos dias;
         $media = 0;                      // variavel onde será calculado a media
         $count = 1;                      // variavel para o loop for
        while($value = current($meses)){     //nesse ciclo de repetiçao ele atribui o valor do mês numerico para o mês passado no paramentro.  
         
            if($value == $mes)
                  $mes = key($meses);

        next($meses);  
        }
   //verificação se o mês é de 31 , 30 ou 28 dias
        if($mes == 1 || $mes == 3 || $mes == 5|| $mes == 7|| $mes == 8|| $mes == 10|| $mes == 12 ){

          for ($i= 2; $i <= 31 ; $i++) { 
            # code...
            array_push($arrayDia, $i);
          }
        }
        else if ($mes == 4 || $mes == 6 || $mes == 9 || $mes == 11) {
          # code...
          for ($i= 2; $i <= 30 ; $i++) { 
            # code...
            array_push($arrayDia, $i);
          }
        }
        else if ($mes == 2) {
          # code...
          for ($i= 2; $i <= 28 ; $i++) { 
            # code...
            array_push($arrayDia, $i);
          }
        }
        //apaga o primeiro elemento do array com as médias, para começar do mês no dia 1 e não no 0
        
        //loop que varre, todo o Historico, calcula a média de vagas numa determinada faixa de dias, e atribui ao array
        for ($i=0; $i < count($historico) ; $i++) { 
          # code...
          //verifica se é o primeiro elemento do Historico
          if($i != 0){
            $dataAnterior = $data;
            $data = quebraData($historico[$i]['dataehora']);


          }
          else{
            $dataAnterior  = quebraData($historico[$i]['dataehora']);
            $data = quebraData($historico[$i]['dataehora']);
 
          }
          
          // Se o elemento do historico está no mês que a pessoa quer saber, então entra nesse if
         if($data['mes'] == $mes){
            // verifica se o dia no mês mudou
            if ($dataAnterior['dia'] < $data['dia']) {
              //calcula a média, e zera o contador
              $media = $media / $count;
              $count = 1;
                        
              //atribui a média calculada ao array
                for($c = $dataAnterior['dia']; $c < $data['dia']; $c++){
                  array_push($arrayMediaNoDia, $media);
                 }
                $media = floatval($historico[$i]['vaga']);  //apos atribui, a variavel de média é igualada a linha do historico
                
            }
             if($dataAnterior['dia'] == $data['dia']){ // se o elemento da linha está não mudou de dia, então ele faz o somatorio para o calculo da média
                $media = $media + floatval($historico[$i]['vaga']);
                $count++;
             }            
         }
            

             
        }
      //Faz a ligação entre os dias no mês com as médias calculadas
    if (count($arrayDia) == count($arrayMediaNoDia)) 

        return array_combine($arrayDia, $arrayMediaNoDia);
    else{
      for($contador = count($arrayMediaNoDia); $contador < count($arrayDia); $contador++){
          array_push($arrayMediaNoDia, end($arrayMediaNoDia));
      }
      	if($mes == 1 || $mes == 3 || $mes == 5|| $mes == 7|| $mes == 8|| $mes == 10|| $mes == 12 ){
      	$resposta = [
      		[
      			"dia" => $arrayDia[0],
      			"media" => $arrayMediaNoDia[0]
      		],
      		[
        		"dia" => $arrayDia[1],
        		"media" => $arrayMediaNoDia[1]
        	],
      		[
        		"dia" => $arrayDia[2],
        		"media" => $arrayMediaNoDia[2]
        	],
      		[
        		"dia" => $arrayDia[4],
        		"media" => $arrayMediaNoDia[4]
        	],
      		[
        		"dia" => $arrayDia[5],
        		"media" => $arrayMediaNoDia[5]
        	],
      		[
        		"dia" => $arrayDia[6],
        		"media" => $arrayMediaNoDia[6]
        	],
      		[
        		"dia" => $arrayDia[7],
        		"media" => $arrayMediaNoDia[7]
        	],
      		[
        		"dia" => $arrayDia[8],
        		"media" => $arrayMediaNoDia[8]
        	],
      		[
        		"dia" => $arrayDia[9],
        		"media" => $arrayMediaNoDia[9]
        	],
      		[
        		"dia" => $arrayDia[10],
        		"media" => $arrayMediaNoDia[10]
        	],
      		[
        		"dia" => $arrayDia[11],
        		"media" => $arrayMediaNoDia[11]
        	],
      		[
        		"dia" => $arrayDia[12],
        		"media" => $arrayMediaNoDia[12]
        	],
      		[
        		"dia" => $arrayDia[13],
        		"media" => $arrayMediaNoDia[13]
        	],
      		[
        		"dia" => $arrayDia[14],
        		"media" => $arrayMediaNoDia[15]
        	],
      		[
        		"dia" => $arrayDia[16],
        		"media" => $arrayMediaNoDia[16]
        	],
      		[
        		"dia" => $arrayDia[17],
        		"media" => $arrayMediaNoDia[17]
        	],
      		[
        		"dia" => $arrayDia[18],
        		"media" => $arrayMediaNoDia[18]
        	],
      		[
        		"dia" => $arrayDia[19],
        		"media" => $arrayMediaNoDia[19]
        	],
      		[
        		"dia" => $arrayDia[20],
        		"media" => $arrayMediaNoDia[20]
        	],
      		[
        		"dia" => $arrayDia[21],
        		"media" => $arrayMediaNoDia[21]
        	],
      		[
        		"dia" => $arrayDia[22],
        		"media" => $arrayMediaNoDia[22]
        	],
      		[
        		"dia" => $arrayDia[23],
        		"media" => $arrayMediaNoDia[23]
        	],
      		[
        		"dia" => $arrayDia[24],
        		"media" => $arrayMediaNoDia[24]
        	],
      		[
        		"dia" => $arrayDia[25],
        		"media" => $arrayMediaNoDia[25]
        	],
      		[
        		"dia" => $arrayDia[26],
        		"media" => $arrayMediaNoDia[26]
        	],
      		[
        		"dia" => $arrayDia[27],
        		"media" => $arrayMediaNoDia[27]
        	],
      		[
        		"dia" => $arrayDia[28],
        		"media" => $arrayMediaNoDia[28]
        	],
      		[
        		"dia" => $arrayDia[29],
        		"media" => $arrayMediaNoDia[29]
        	],
      		[
        		"dia" => $arrayDia[30],
        		"media" => $arrayMediaNoDia[30]
        	]
      	] ;
      	}else if ($mes == 4 || $mes == 6 || $mes == 9 || $mes == 11) {
      		$resposta = [
      		[
      			"dia" => $arrayDia[0],
      			"media" => $arrayMediaNoDia[0]
      		],
      		[
        		"dia" => $arrayDia[1],
        		"media" => $arrayMediaNoDia[1]
        	],
      		[
        		"dia" => $arrayDia[2],
        		"media" => $arrayMediaNoDia[2]
        	],
      		[
        		"dia" => $arrayDia[4],
        		"media" => $arrayMediaNoDia[4]
        	],
      		[
        		"dia" => $arrayDia[5],
        		"media" => $arrayMediaNoDia[5]
        	],
      		[
        		"dia" => $arrayDia[6],
        		"media" => $arrayMediaNoDia[6]
        	],
      		[
        		"dia" => $arrayDia[7],
        		"media" => $arrayMediaNoDia[7]
        	],
      		[
        		"dia" => $arrayDia[8],
        		"media" => $arrayMediaNoDia[8]
        	],
      		[
        		"dia" => $arrayDia[9],
        		"media" => $arrayMediaNoDia[9]
        	],
      		[
        		"dia" => $arrayDia[10],
        		"media" => $arrayMediaNoDia[10]
        	],
      		[
        		"dia" => $arrayDia[11],
        		"media" => $arrayMediaNoDia[11]
        	],
      		[
        		"dia" => $arrayDia[12],
        		"media" => $arrayMediaNoDia[12]
        	],
      		[
        		"dia" => $arrayDia[13],
        		"media" => $arrayMediaNoDia[13]
        	],
      		[
        		"dia" => $arrayDia[14],
        		"media" => $arrayMediaNoDia[15]
        	],
      		[
        		"dia" => $arrayDia[16],
        		"media" => $arrayMediaNoDia[16]
        	],
      		[
        		"dia" => $arrayDia[17],
        		"media" => $arrayMediaNoDia[17]
        	],
      		[
        		"dia" => $arrayDia[18],
        		"media" => $arrayMediaNoDia[18]
        	],
      		[
        		"dia" => $arrayDia[19],
        		"media" => $arrayMediaNoDia[19]
        	],
      		[
        		"dia" => $arrayDia[20],
        		"media" => $arrayMediaNoDia[20]
        	],
      		[
        		"dia" => $arrayDia[21],
        		"media" => $arrayMediaNoDia[21]
        	],
      		[
        		"dia" => $arrayDia[22],
        		"media" => $arrayMediaNoDia[22]
        	],
      		[
        		"dia" => $arrayDia[23],
        		"media" => $arrayMediaNoDia[23]
        	],
      		[
        		"dia" => $arrayDia[24],
        		"media" => $arrayMediaNoDia[24]
        	],
      		[
        		"dia" => $arrayDia[25],
        		"media" => $arrayMediaNoDia[25]
        	],
      		[
        		"dia" => $arrayDia[26],
        		"media" => $arrayMediaNoDia[26]
        	],
      		[
        		"dia" => $arrayDia[27],
        		"media" => $arrayMediaNoDia[27]
        	],
      		[
        		"dia" => $arrayDia[28],
        		"media" => $arrayMediaNoDia[28]
        	],
      		[
        		"dia" => $arrayDia[29],
        		"media" => $arrayMediaNoDia[29]
        	]
      	] ;
      	}
      	else{
      		$resposta = [
      		[
      			"dia" => $arrayDia[0],
      			"media" => $arrayMediaNoDia[0]
      		],
      		[
        		"dia" => $arrayDia[1],
        		"media" => $arrayMediaNoDia[1]
        	],
      		[
        		"dia" => $arrayDia[2],
        		"media" => $arrayMediaNoDia[2]
        	],
      		[
        		"dia" => $arrayDia[4],
        		"media" => $arrayMediaNoDia[4]
        	],
      		[
        		"dia" => $arrayDia[5],
        		"media" => $arrayMediaNoDia[5]
        	],
      		[
        		"dia" => $arrayDia[6],
        		"media" => $arrayMediaNoDia[6]
        	],
      		[
        		"dia" => $arrayDia[7],
        		"media" => $arrayMediaNoDia[7]
        	],
      		[
        		"dia" => $arrayDia[8],
        		"media" => $arrayMediaNoDia[8]
        	],
      		[
        		"dia" => $arrayDia[9],
        		"media" => $arrayMediaNoDia[9]
        	],
      		[
        		"dia" => $arrayDia[10],
        		"media" => $arrayMediaNoDia[10]
        	],
      		[
        		"dia" => $arrayDia[11],
        		"media" => $arrayMediaNoDia[11]
        	],
      		[
        		"dia" => $arrayDia[12],
        		"media" => $arrayMediaNoDia[12]
        	],
      		[
        		"dia" => $arrayDia[13],
        		"media" => $arrayMediaNoDia[13]
        	],
      		[
        		"dia" => $arrayDia[14],
        		"media" => $arrayMediaNoDia[15]
        	],
      		[
        		"dia" => $arrayDia[16],
        		"media" => $arrayMediaNoDia[16]
        	],
      		[
        		"dia" => $arrayDia[17],
        		"media" => $arrayMediaNoDia[17]
        	],
      		[
        		"dia" => $arrayDia[18],
        		"media" => $arrayMediaNoDia[18]
        	],
      		[
        		"dia" => $arrayDia[19],
        		"media" => $arrayMediaNoDia[19]
        	],
      		[
        		"dia" => $arrayDia[20],
        		"media" => $arrayMediaNoDia[20]
        	],
      		[
        		"dia" => $arrayDia[21],
        		"media" => $arrayMediaNoDia[21]
        	],
      		[
        		"dia" => $arrayDia[22],
        		"media" => $arrayMediaNoDia[22]
        	],
      		[
        		"dia" => $arrayDia[23],
        		"media" => $arrayMediaNoDia[23]
        	],
      		[
        		"dia" => $arrayDia[24],
        		"media" => $arrayMediaNoDia[24]
        	],
      		[
        		"dia" => $arrayDia[25],
        		"media" => $arrayMediaNoDia[25]
        	],
      		[
        		"dia" => $arrayDia[26],
        		"media" => $arrayMediaNoDia[26]
        	],
      		[
        		"dia" => $arrayDia[27],
        		"media" => $arrayMediaNoDia[27]
        	]
      	] ;
      	}
              
      return $resposta;
    }
    
  }


  echo json_encode(variaDia($historico, $mes, $meses)); 



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