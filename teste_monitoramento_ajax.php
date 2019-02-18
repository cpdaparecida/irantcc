<?php
	 include 'config.php';
      include 'connection.php';
      /*session_start();
      
      if(!isset($_SESSION['login']) and !isset($_SESSION['senha'])){
        echo ("<script>alert('Não está logado'); </script>");
        echo ("<script>location.href='login.php';</script>");
      }*/
$arrayRestQuei  = array(0 =>'4');
$arrayGetQuei  = array(0 =>'4');   
$arrayMigQuei  = array(0 =>'3') ;
$arrayOswQuei  = array(0=>'9');

$arrayRestCard = array(0 => '0');
$arrayGetCard = array(0 => '6');
$arrayMigCard = array(0 => '8');
$arrayOswCard = array(0 => '9');

$arrayRestObs = array(0 => '0');
$arrayGetObs = array(0 => '7');
$arrayMigObs = array(0 => '0');
$arrayOswObs = array(0 => '9');

$arrayRestOrt = array(0 => '0');
$arrayGetOrt = array(0 => '8');
$arrayMigOrt = array(0 => '5');
$arrayOswOrt = array(0 => '1');


      $vaga_queimado   = DBRead('historico' ,"WHERE especialidade = 'Queimados'", "dataehora, hospital , vaga");
      $vaga_cardiaco   = DBRead('historico' ,"WHERE especialidade = 'Cardiacos'", "hospital , vaga");
      $vaga_obstetrica = DBRead('historico' ,"WHERE especialidade = 'Obstetrica'", "hospital , vaga");
      $vaga_ortopedica = DBRead('historico' ,"WHERE especialidade = 'Ortopedica'", "hospital , vaga");
      $historico       = DBRead('historico');

        $contador = 0;
        $dataCard1 = "";
         for ( $i = 0; $i < count($historico); $i++) {
           if ($historico[count($historico)-1]['especialidade'] == $historico[$i]['especialidade']  && $historico[count($historico) - 1]['hospital'] == $historico[$i]['hospital'] && $contador < 20  ) {

              $dataCard1 .=" {$historico[$i]['vaga']} ,";

           }

         }
         $dataCard1 = substr_replace($dataCard1, ' ', strlen($dataCard1) - 1);
         echo "{$dataCard1}";
         

  $meses  = array( 
  1 => 'Janeiro', 
  2 => 'Fevereiro',
  3 => 'Março',
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
$legenda = "";

for($i=count($vaga_queimado) - 6;$i< count($vaga_queimado);$i++){
       
       $data = explode(" ", $vaga_queimado[$i]['dataehora']);
       $dataAtual = quebraData($data[0]);
  
       if($i == count($vaga_queimado) - 6){
         $dataAntes = quebraData($data[0]);
       
       	 $legenda = "{$dataAtual['dia']} de {$meses[$dataAntes['mes']]} de {$dataAtual['ano']}";
       }
       else if ($dataAtual['dia'] > $dataAntes['dia']){
       	$dataAtual = quebraData($data[0]);
				$legenda = substr_replace($legenda, "                 ", strlen($legenda));
				$legenda .= "{$dataAtual['dia']} de {$meses[$dataAntes['mes']]} de {$dataAtual['ano']}";
				$dataAntes = $dataAtual;       		 
       		 } 
       	 
        

       echo $i== count($vaga_queimado) -1 ?  "\"{$data[1]}\""  : "\"{$data[1]}\",";
     
        }

echo "<br><br>";

echo "<br><br>";
for($i=0;$i<count($vaga_queimado);$i++){
       
               if($vaga_queimado[$i]['hospital'] == "Getulio Vargas" ){
                echo $i== count($vaga_queimado) -1 ?  "{$vaga_queimado[$i]['vaga']}"  : "{$vaga_queimado[$i]['vaga']},";

                  }
              }

echo "<br><br>";


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

function quebraHora($data){

	$dataAntes = explode(" ", $data);
    $horaQuebrada = explode(":", $dataAntes[1]);
    $horaQuebrada = array(
			'ano' => intval($horaQuebrada[0]) , 
			'mes' => intval($horaQuebrada[1]) ,
			'dia' => intval($horaQuebrada[2])
		);

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





for($i = 0; $i < count($vaga_queimado); $i++){


  if($vaga_queimado[$i]['hospital'] == 'Restauração'){
    array_push($arrayRestQuei, $vaga_queimado[$i]['vaga']);
    array_push($arrayGetQuei, end($arrayGetQuei));
    array_push($arrayMigQuei, end($arrayMigQuei));
    array_push($arrayOswQuei, end($arrayOswQuei));
  }
  
  else if($vaga_queimado[$i]['hospital'] == 'Getulio Vargas'){
    array_push($arrayGetQuei, $vaga_queimado[$i]['vaga']);
    array_push($arrayRestQuei, end($arrayRestQuei));
    array_push($arrayMigQuei, end($arrayMigQuei));
    array_push($arrayOswQuei, end($arrayOswQuei));
  }
  
  else if($vaga_queimado[$i]['hospital'] == 'Miguel Arraes'){
    array_push($arrayMigQuei, $vaga_queimado[$i]['vaga']);
    array_push($arrayGetQuei, end($arrayGetQuei));
    array_push($arrayRestQuei, end($arrayRestQuei));
    array_push($arrayOswQuei, end($arrayOswQuei));
  }
  
  else if($vaga_queimado[$i]['hospital'] == 'Oswaldo Cruz'){
    array_push($arrayOswQuei, $vaga_queimado[$i]['vaga']);
    array_push($arrayGetQuei, end($arrayGetQuei));
    array_push($arrayMigQuei, end($arrayMigQuei));
    array_push($arrayRestQuei, end($arrayRestQuei));
  }

 }  


var_dump($arrayMigQuei);

for($i = 0; $i < count($vaga_cardiaco); $i++){


  if($vaga_cardiaco[$i]['hospital'] == 'Restauração'){
    array_push($arrayRestCard, $vaga_cardiaco[$i]['vaga']);
    array_push($arrayGetCard, end($arrayGetCard));
    array_push($arrayMigCard, end($arrayMigCard));
    array_push($arrayOswCard, end($arrayOswCard));
  }
  
  else if($vaga_cardiaco[$i]['hospital'] == 'Getulio Vargas'){
    array_push($arrayGetCard, $vaga_cardiaco[$i]['vaga']);
    array_push($arrayRestCard, end($arrayRestCard));
    array_push($arrayMigCard, end($arrayMigCard));
    array_push($arrayOswCard, end($arrayOswCard));
  }
  
  else if($vaga_cardiaco[$i]['hospital'] == 'Miguel Arraes'){
    array_push($arrayMigCard, $vaga_cardiaco[$i]['vaga']);
    array_push($arrayGetCard, end($arrayGetCard));
    array_push($arrayRestCard, end($arrayRestCard));
    array_push($arrayOswCard, end($arrayOswCard));
  }
  
  else if($vaga_cardiaco[$i]['hospital'] == 'Oswaldo Cruz'){
    array_push($arrayOswCard, $vaga_cardiaco[$i]['vaga']);
    array_push($arrayGetCard, end($arrayGetCard));
    array_push($arrayMigCard, end($arrayMigCard));
    array_push($arrayRestCard, end($arrayRestCard));
  }

 }  

var_dump($arrayOswCard);

for($i = 0; $i < count($vaga_obstetrica); $i++){


  if($vaga_obstetrica[$i]['hospital'] == 'Restauração'){
    array_push($arrayRestObs, $vaga_obstetrica[$i]['vaga']);
    array_push($arrayGetObs, end($arrayGetObs));
    array_push($arrayMigObs, end($arrayMigObs));
    array_push($arrayOswObs, end($arrayOswObs));
  }
  
  else if($vaga_obstetrica[$i]['hospital'] == 'Getulio Vargas'){
    array_push($arrayGetObs, $vaga_obstetrica[$i]['vaga']);
    array_push($arrayRestObs, end($arrayRestObs));
    array_push($arrayMigObs, end($arrayMigObs));
    array_push($arrayOswObs, end($arrayOswObs));
  }
  
  else if($vaga_obstetrica[$i]['hospital'] == 'Miguel Arraes'){
    array_push($arrayMigObs, $vaga_obstetrica[$i]['vaga']);
    array_push($arrayGetObs, end($arrayGetObs));
    array_push($arrayRestObs, end($arrayRestObs));
    array_push($arrayOswObs, end($arrayOswObs));
  }
  
  else if($vaga_obstetrica[$i]['hospital'] == 'Oswaldo Cruz'){
    array_push($arrayOswObs, $vaga_obstetrica[$i]['vaga']);
    array_push($arrayGetObs, end($arrayGetObs));
    array_push($arrayMigObs, end($arrayMigObs));
    array_push($arrayRestObs, end($arrayRestObs));
  }

 }

var_dump($arrayOswObs);

for($i = 0; $i < count($vaga_ortopedica); $i++){


  if($vaga_ortopedica[$i]['hospital'] == 'Restauração'){
    array_push($arrayRestOrt, $vaga_ortopedica[$i]['vaga']);
    array_push($arrayGetOrt, end($arrayGetOrt));
    array_push($arrayMigOrt, end($arrayMigOrt));
    array_push($arrayOswOrt, end($arrayOswOrt));
  }
  
  else if($vaga_ortopedica[$i]['hospital'] == 'Getulio Vargas'){
    array_push($arrayGetOrt, $vaga_ortopedica[$i]['vaga']);
    array_push($arrayRestOrt, end($arrayRestOrt));
    array_push($arrayMigOrt, end($arrayMigOrt));
    array_push($arrayOswOrt, end($arrayOswOrt));
  }
  
  else if($vaga_ortopedica[$i]['hospital'] == 'Miguel Arraes'){
    array_push($arrayMigOrt, $vaga_ortopedica[$i]['vaga']);
    array_push($arrayGetOrt, end($arrayGetOrt));
    array_push($arrayRestOrt, end($arrayRestOrt));
    array_push($arrayOswOrt, end($arrayOswOrt));
  }
  
  else if($vaga_ortopedica[$i]['hospital'] == 'Oswaldo Cruz'){
    array_push($arrayOswOrt, $vaga_ortopedica[$i]['vaga']);
    array_push($arrayGetOrt, end($arrayGetOrt));
    array_push($arrayMigOrt, end($arrayMigOrt));
    array_push($arrayRestOrt, end($arrayRestOrt));
  }

 }

/*
      var myChartCardiacos = new Chart(ctxCardiacos, {
      type: 'line',
       data: {

        labels: [<?php for($i=count($vaga_cardiaco) - 6;$i < count($vaga_cardiaco);$i++){
       $hora = explode(" ", $vaga_cardiaco[$i]['dataehora']); $hora = explode(":", $hora[1]);
       $hora = $hora[0].":".$hora[1]; 
       
       

       echo $i== count($vaga_cardiaco) -1 ?  "\"{$hora}\""  : "\"{$hora}\",";}?>],
datasets: [{
            label: 'Restauração',
            data: [<?php 
                for($i=1 ;$i <= count($arrayRestauraca);$i++){
                  echo $i== count($arrayRestauraca) ?  "{$arrayRestauraca[$i]}"  : "{$arrayRestauraca[$i]},";
                  
                }?>],
            fill: false,

            backgroundColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderColor: [
                'rgba(255,99,132,1)'
            ],
            borderWidth: 3,

          
        }, {
            label: 'Getulio Vargas',
            data: [<?php 
                for($i= 1;$i <= count($arrayGetulio);$i++){
                  echo $i== count($arrayGetulio) ?  "{$arrayGetulio[$i]}"  : "{$arrayGetulio[$i]},";
                  
                }?>],
            fill: false,

            backgroundColor: [
                'rgba(25, 99, 255, 1)'
            ],
            borderColor: [
                'rgba(25,99,255,1)'
            ],
            borderWidth: 3
        }, {
            label: 'Oswaldo Cruz',
            data: [<?php 
                for($i= 1;$i <= count($arrayOswaldo);$i++){
                  echo $i== count($arrayOswaldo) ?  "{$arrayOswaldo[$i]}"  : "{$arrayOswaldo[$i]},";
                  
                }?>],
            fill: false,

            backgroundColor: [
                'rgba(250, 99, 255, 1)'
            ],
            borderColor: [
                'rgba(250,99,255,1)'
            ],
            borderWidth: 3
        }, {
            label: 'Miguel Arraes',
            data: [<?php 
                for($i= 1;$i <= count($arrayMiguel);$i++){
                  echo $i== count($arrayMiguel) ?  "{$arrayMiguel[$i]}"  : "{$arrayMiguel[$i]},";
                  
                }?>],
            fill: false,

            backgroundColor: [
                'rgba(25, 255, 150, 1)'
            ],
            borderColor: [
                'rgba(25,255,150,1)'
            ],
            borderWidth: 3
        }],
    
    }, 

    
    options: {
        responsive : true,
        legend: {
          labels: {
            fontColor: 'white',
            fontSize: 12,
            fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica' "
          }
        },  
        scales: {
            yAxes: [{
                scaleLabel:{
                  display : true,
                  labelString: 'leitos',
                  fontColor: "white",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 16
                },
                ticks: {
                    beginAtZero:true,
                    fontColor: "white",
                    fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                    fontSize: 12
                }
            }],
            xAxes:[{
                scaleLabel:{
                  display : true,
                  labelString: <?php $legenda = "";

for($i=count($vaga_cardiaco) - 6;$i< count($vaga_cardiaco);$i++){
       
       $data = explode(" ", $vaga_cardiaco[$i]['dataehora']);
       $dataAtual = quebraData($data[0]);
       if($i == count($vaga_cardiaco) - 6){
         $dataAntes = quebraData($data[0]);
       
         $legenda = "{$dataAtual['dia']} de {$meses[$dataAtual['mes']]} de {$dataAtual['ano']}";
       }
       else if ($dataAtual['dia'] > $dataAntes['dia']){
        $dataAtual = quebraData($data[0]);
        $legenda = substr_replace($legenda, "                                                               ", strlen($legenda));
        $legenda .= "{$dataAtual['dia']} de {$meses[$dataAtual['mes']]} de {$dataAtual['ano']}";
        $dataAntes = $dataAtual;           
           }
         } echo "'$legenda'";?>,
                  fontColor: "white",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 14

                },
                ticks: {
                  fontColor: "write",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 12
                }
            }]
        }
    }
});
     
       var myChartObstetra = new Chart(ctxObstetra, {
      type: 'line',
       data: {

        labels: [<?php for($i=count($vaga_obstetrica) - 6;$i < count($vaga_obstetrica);$i++){
       $hora = explode(" ", $vaga_obstetrica[$i]['dataehora']); $hora = explode(":", $hora[1]);
       $hora = $hora[0].":".$hora[1]; 
       

       echo $i== count($vaga_obstetrica) -1 ?  "\"{$hora}\""  : "\"{$hora}\",";}?>],
datasets: [{
            label: 'Restauração',
            data: [<?php 
                for($i=1 ;$i <= count($arrayRestauraca);$i++){
                  echo $i== count($arrayRestauraca) ?  "{$arrayRestauraca[$i]}"  : "{$arrayRestauraca[$i]},";
                  
                }?>],
            fill: false,

            backgroundColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderColor: [
                'rgba(255,99,132,1)'
            ],
            borderWidth: 3,

          
        }, {
            label: 'Getulio Vargas',
            data: [<?php 
                for($i= 1;$i <= count($arrayGetulio);$i++){
                  echo $i== count($arrayGetulio) ?  "{$arrayGetulio[$i]}"  : "{$arrayGetulio[$i]},";
                  
                }?>],
            fill: false,

            backgroundColor: [
                'rgba(25, 99, 255, 1)'
            ],
            borderColor: [
                'rgba(25,99,255,1)'
            ],
            borderWidth: 3
        }, {
            label: 'Oswaldo Cruz',
            data: [<?php 
                for($i= 1;$i <= count($arrayOswaldo);$i++){
                  echo $i== count($arrayOswaldo) ?  "{$arrayOswaldo[$i]}"  : "{$arrayOswaldo[$i]},";
                  
                }?>],
            fill: false,

            backgroundColor: [
                'rgba(250, 99, 255, 1)'
            ],
            borderColor: [
                'rgba(250,99,255,1)'
            ],
            borderWidth: 3
        }, {
            label: 'Miguel Arraes',
            data: [<?php 
                for($i= 1;$i <= count($arrayMiguel);$i++){
                  echo $i== count($arrayMiguel) ?  "{$arrayMiguel[$i]}"  : "{$arrayMiguel[$i]},";
                  
                }?>],
            fill: false,

            backgroundColor: [
                'rgba(25, 255, 150, 1)'
            ],
            borderColor: [
                'rgba(25,255,150,1)'
            ],
            borderWidth: 3
        }],
    
    }, 

    
    options: {
        responsive : true,
        legend: {
          labels: {
            fontColor: 'white',
            fontSize: 12,
            fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica' "
          }
        },  
        scales: {
            yAxes: [{
                scaleLabel:{
                  display : true,
                  labelString: 'leitos',
                  fontColor: "white",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 16
                },
                ticks: {
                    beginAtZero:true,
                    fontColor: "white",
                    fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                    fontSize: 12
                }
            }],
            xAxes:[{
                scaleLabel:{
                  display : true,
                  labelString: <?php $legenda = "";

for($i=count($vaga_obstetrica) - 6;$i< count($vaga_obstetrica);$i++){
       
       $data = explode(" ", $vaga_obstetrica[$i]['dataehora']);
       $dataAtual = quebraData($data[0]);
       if($i == count($vaga_obstetrica) - 6){
         $dataAntes = quebraData($data[0]);
       
         $legenda = "{$dataAtual['dia']} de {$meses[$dataAtual['mes']]} de {$dataAtual['ano']}";
       }
       else if ($dataAtual['dia'] > $dataAntes['dia']){
        $dataAtual = quebraData($data[0]);
        $legenda = substr_replace($legenda, "                                                               ", strlen($legenda));
        $legenda .= "{$dataAtual['dia']} de {$meses[$dataAtual['mes']]} de {$dataAtual['ano']}";
        $dataAntes = $dataAtual;           
           }
         } echo "'$legenda'";?>,
                  fontColor: "white",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 14

                },
                ticks: {
                  fontColor: "write",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 12
                }
            }]
        }
    }
});
     
      var myChartOrtopedica = new Chart(ctxOrtopedica, {
      type: 'line',
       data: {

        labels: [<?php for($i=count($vaga_ortopedica) - 6;$i < count($vaga_ortopedica);$i++){
       $hora = explode(" ", $vaga_ortopedica[$i]['dataehora']); $hora = explode(":", $hora[1]);
       $hora = $hora[0].":".$hora[1]; 
       

       echo $i== count($vaga_ortopedica) -1 ?  "\"{$hora}\""  : "\"{$hora}\",";}?>],
datasets: [{
            label: 'Restauração',
            data: [<?php 
                for($i=1 ;$i <= count($arrayRestauraca);$i++){
                  echo $i== count($arrayRestauraca) ?  "{$arrayRestauraca[$i]}"  : "{$arrayRestauraca[$i]},";
                  
                }?>],
            fill: false,

            backgroundColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderColor: [
                'rgba(255,99,132,1)'
            ],
            borderWidth: 3,

          
        }, {
            label: 'Getulio Vargas',
            data: [<?php 
                for($i= 1;$i <= count($arrayGetulio);$i++){
                  echo $i== count($arrayGetulio) ?  "{$arrayGetulio[$i]}"  : "{$arrayGetulio[$i]},";
                  
                }?>],
            fill: false,

            backgroundColor: [
                'rgba(25, 99, 255, 1)'
            ],
            borderColor: [
                'rgba(25,99,255,1)'
            ],
            borderWidth: 3
        }, {
            label: 'Oswaldo Cruz',
            data: [<?php 
                for($i= 1;$i <= count($arrayOswaldo);$i++){
                  echo $i== count($arrayOswaldo) ?  "{$arrayOswaldo[$i]}"  : "{$arrayOswaldo[$i]},";
                  
                }?>],
            fill: false,

            backgroundColor: [
                'rgba(250, 99, 255, 1)'
            ],
            borderColor: [
                'rgba(250,99,255,1)'
            ],
            borderWidth: 3
        }, {
            label: 'Miguel Arraes',
            data: [<?php 
                for($i= 1;$i <= count($arrayMiguel);$i++){
                  echo $i== count($arrayMiguel) ?  "{$arrayMiguel[$i]}"  : "{$arrayMiguel[$i]},";
                  
                }?>],
            fill: false,

            backgroundColor: [
                'rgba(25, 255, 150, 1)'
            ],
            borderColor: [
                'rgba(25,255,150,1)'
            ],
            borderWidth: 3
        }],
    
    }, 

    
    options: {
        responsive : true,
        legend: {
          labels: {
            fontColor: 'white',
            fontSize: 12,
            fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica' "
          }
        },  
        scales: {
            yAxes: [{
                scaleLabel:{
                  display : true,
                  labelString: 'leitos',
                  fontColor: "white",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 16
                },
                ticks: {
                    beginAtZero:true,
                    fontColor: "white",
                    fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                    fontSize: 12
                }
            }],
            xAxes:[{
                scaleLabel:{
                  display : true,
                  labelString: <?php $legenda = "";

for($i=count($vaga_ortopedica) - 6;$i< count($vaga_ortopedica);$i++){
       
       $data = explode(" ", $vaga_ortopedica[$i]['dataehora']);
       $dataAtual = quebraData($data[0]);
       if($i == count($vaga_ortopedica) - 6){
         $dataAntes = quebraData($data[0]);
       
         $legenda = "{$dataAtual['dia']} de {$meses[$dataAtual['mes']]} de {$dataAtual['ano']}";
       }
       else if ($dataAtual['dia'] > $dataAntes['dia']){
        $dataAtual = quebraData($data[0]);
        $legenda = substr_replace($legenda, "                                                               ", strlen($legenda));
        $legenda .= "{$dataAtual['dia']} de {$meses[$dataAtual['mes']]} de {$dataAtual['ano']}";
        $dataAntes = $dataAtual;           
           }
         } echo "'$legenda'";?>,
                  fontColor: "white",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 14

                },
                ticks: {
                  fontColor: "write",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 12
                }
            }]
        }
    }
});    
    */

?>
