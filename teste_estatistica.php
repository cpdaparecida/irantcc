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
         $count = 0;                      // variavel para o loop for
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
        unset($arrayMediaNoDia[0]);
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
                $media = intval($historico[$i]['vaga']);  //apos atribui, a variavel de média é igualada a linha do historico
             }
             if($dataAnterior['dia'] == $data['dia']){ // se o elemento da linha está não mudou de dia, então ele faz o somatorio para o calculo da média
                $media += $historico[$i]['vaga'];
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
      return array_combine($arrayDia, $arrayMediaNoDia);
    }
    
  }




  function mediaMes($historico, $mes, $meses){
     $arrayMes = array(0);
   
        while($value = current($meses)){
         
            if($value == $mes)
                  $mes = key($meses);

        next($meses);  
        }

        for ($i=0; $i < count($historico); $i++) { 
          # code...
          $data = quebraData($historico[$i]['dataehora']);
           if ($data['mes'] == $mes) {
            # code...
            array_push($arrayMes, intval($historico[$i]['vaga']));
          }
        }
        for ($i=0  ; $i < count($arrayMes) ; $i++ ) { 
          # code...
          if($i == 0)
              $media = $arrayMes[$i];
          
          else
              $media += $arrayMes[$i];
        }

        $media /= count($arrayMes);
        unset($arrayMes);
        unset($mes);
        unset($data);
        return $media;
  }
$resposta = mediaMes($historicoQuei, $mes ,$meses ).", ";
 $resposta.= mediaMes($historicoCard, $mes ,$meses ).", ";
 $resposta.= mediaMes($historicoOrto, $mes ,$meses ).", ";
 $resposta.= mediaMes($historicoObst, $mes ,$meses );
 echo $resposta;

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