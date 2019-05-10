<?php
include 'config.php';
include 'connection.php';
//pega todo o historico
$ultimasVagasTotal = DBRead("historico");
//seleciona apenas as 5 mudanças mais recentes
$ultimasVagas = array(0 => $ultimasVagasTotal[count($ultimasVagasTotal) -1], 
					  1 => $ultimasVagasTotal[count($ultimasVagasTotal) -2],
					  2 => $ultimasVagasTotal[count($ultimasVagasTotal) -3],
					  3 => $ultimasVagasTotal[count($ultimasVagasTotal) -4]

);


//string usada para fazer os cards com as mudanças
$ConteudoCard = " ";
//loop para preenchimento do conteudo do card, com base nas informaçoes do banco;
foreach ($ultimasVagas as $key => $value) {
	# code...
	$ConteudoCard .= "\n\t\t<div class=\"col s12 m4 l3\" >";

		if(intval($ultimasVagas[$key]['vaga']) < 4)
			$ConteudoCard .= "<div class=\"card red accent-2 \">
              <div class=\"card-stats-content red accent-2 gradient-shadow white-text\">";
        if(intval($ultimasVagas[$key]['vaga']) >= 4 && intval($ultimasVagas[$key]['vaga']) < 7  )
        	$ConteudoCard .= "<div class=\"card orange lighten-1\">
              <div class=\"card-stats-content orange lighten-1 gradient-shadow white-text\">";
        if(intval($ultimasVagas[$key]['vaga']) >= 7)
        	$ConteudoCard .= "<div class=\"card green lighten-1 \">
              <div class=\"card-stats-content green lighten-1 gradient-shadow white-text\">";
         
      //  $ConteudoCard .= "<span class=\"text text-lighten-5 center\">Hospital {$ultimasVagas[$key]['hospital']}</span>";
		
        if(strcmp($ultimasVagas[$key]['especialidade'], "Queimados")  == 0 )
        	$ConteudoCard .= "<p class=\"card-stats-title center\" style=\"font-size: 1.5rem;\">
              <i class=\"material-icons\">flare</i> Queimaduras </p>";
        
        if(strcmp($ultimasVagas[$key]['especialidade'], "Cardiacos")  == 0 )
        	$ConteudoCard .= "<p class=\"card-stats-title center\" style=\"font-size: 1.5rem;\">
              <i class=\"material-icons\">favorite</i> Vascular </p>";
        
        if(strcmp($ultimasVagas[$key]['especialidade'], "Obstetrica") == 0 )
        	$ConteudoCard .= "<p class=\"card-stats-title center\" style=\"font-size: 1.5rem;\">
              <i class=\"material-icons\">pregnant_woman</i> Obstetrícia </p>";
        
        if(strcmp($ultimasVagas[$key]['especialidade'], "Ortopedica") == 0 )
        	$ConteudoCard .= "<p class=\"card-stats-title center\" style=\"font-size: 1.5rem;\">
              <i class=\"material-icons\">directions_walk</i> Traumato </p>";

        $ConteudoCard .= "<h4 class=\"card-stats-numbers center white-text\" >{$ultimasVagas[$key]['vaga']}</h4>
                <p class=\"card-stats-compare center\" ><i class=\"material-icons\">";

        for ($i= count($ultimasVagasTotal) - 1; $i > -1; $i--) { 
         	if(strcmp($ultimasVagasTotal[$i]['hospital'], $ultimasVagas[$key]['hospital'] ) == 0 && strcmp($ultimasVagas[$key]['especialidade'], $ultimasVagasTotal[$i]['especialidade']) == 0 ){
         		if (intval($ultimasVagasTotal[$i]['vaga']) > intval($ultimasVagas[$key]['vaga'])) {
         			# code...
         			$ConteudoCard.= "keyboard_arrow_down</i> ";
         			$ConteudoCard.= intval($ultimasVagasTotal[$i]['vaga']) - intval($ultimasVagas[$key]['vaga']);
         			$ConteudoCard.= " vaga";
         			$ConteudoCard.= (intval($ultimasVagasTotal[$i]['vaga']) - intval($ultimasVagas[$key]['vaga'])) == 1? "</p>": "s</p>";
         			break;
         		}
         		if (intval($ultimasVagasTotal[$i]['vaga']) < intval($ultimasVagas[$key]['vaga'])) {
         			# code...
         			$ConteudoCard.= "keyboard_arrow_up</i>  ";
         			$ConteudoCard.= intval($ultimasVagas[$key]['vaga']) - intval($ultimasVagasTotal[$i]['vaga']);
         			$ConteudoCard.= " vaga";
         			$ConteudoCard.= ( intval($ultimasVagas[$key]['vaga']) - intval($ultimasVagasTotal[$i]['vaga'])) == 1? "</p>" : "s</p>";
         			break;
         		}
         	}
        }


		$ConteudoCard .= "<p class=\"card-stats-compare center\">{$ultimasVagas[$key]['hospital']}</p>";
		$ConteudoCard .= "</div>
	          </div>
	         </div>";

        


}

echo $ConteudoCard;










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