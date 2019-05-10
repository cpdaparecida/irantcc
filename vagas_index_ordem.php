<?php
include 'config.php';
include 'connection.php';
$vagaMaior = [  ];
$cardConteudo = [ ];

$_GET['especialidade'] = isset($_GET['especialidade']) ? strtolower($_GET['especialidade']) : '*';
$_GET['ordem'] = isset($_GET['ordem']) ? $_GET['ordem'] : 'decrescente';
 
if($_GET['especialidade'] != '*'){
$list = DBRead("info_hospitais", null , "hospital, {$_GET['especialidade']}");
}
else{
  $list = DBRead("info_hospitais", null, "hospital, queimaduras, cardiacos, obstetricia, traumato, clinica, vascular, otorrinolaringologia, pediatria, infectologia, intoxicacao, neurologia, odontologia, urologia, psiquiatria, ginecologia");
}

	foreach($list as $key => $value ){
	
		if(isset($list[$key]['queimaduras'])){
     		if(intval($list[$key]['queimaduras'])     != -1){
     				array_push($vagaMaior, $list[$key]['queimaduras']);
     		}
     	}
     	if(isset($list[$key]['cardiacos'])){
     		if(intval($list[$key]['cardiacos'])     != -1){
     				array_push($vagaMaior, $list[$key]['cardiacos']);
     		}
     	}
     	if(isset($list[$key]['obstetricia'])){
     		if(intval($list[$key]['obstetricia'])     != -1){
     				array_push($vagaMaior, $list[$key]['obstetricia']);
     		}
     	}
     	if(isset($list[$key]['traumato'])){
     		if(intval($list[$key]['traumato'])     != -1){
     				array_push($vagaMaior, $list[$key]['traumato']);
     		}
     	}
     	if(isset($list[$key]['clinica'])){
     		if(intval($list[$key]['clinica'])     != -1){
     				array_push($vagaMaior, $list[$key]['clinica']);
     		}
     	}
     	if(isset($list[$key]['vascular'])){
     		if(intval($list[$key]['vascular'])     != -1){
     				array_push($vagaMaior, $list[$key]['vascular']);
     		}
     	}
     	if(isset($list[$key]['otorrinolaringologia'])){
     		if(intval($list[$key]['otorrinolaringologia'])     != -1){
     				array_push($vagaMaior, $list[$key]['otorrinolaringologia']);
     		}
     	}
     	if(isset($list[$key]['pediatria'])){
     		if(intval($list[$key]['pediatria'])     != -1){
     				array_push($vagaMaior, $list[$key]['pediatria']);
     		}
     	}
     	if(isset($list[$key]['infectologia'])){
     		if(intval($list[$key]['infectologia'])     != -1){
     				array_push($vagaMaior, $list[$key]['infectologia']);
     		}
     	}
     	if(isset($list[$key]['intoxicacao'])){
     		if(intval($list[$key]['intoxicacao'])     != -1){
     				array_push($vagaMaior, $list[$key]['intoxicacao']);
     		}
     	}
     	if(isset($list[$key]['neurologia'])){
     		if(intval($list[$key]['neurologia'])     != -1){
     				array_push($vagaMaior, $list[$key]['neurologia']);
     		}
     	}
     	if(isset($list[$key]['odontologia'])){
     		if(intval($list[$key]['odontologia'])     != -1){
     				array_push($vagaMaior, $list[$key]['odontologia']);
     		}
     	}
     	if(isset($list[$key]['urologia'])){
     		if(intval($list[$key]['urologia'])     != -1){
     				array_push($vagaMaior, $list[$key]['urologia']);
     		}
     	}
     	if(isset($list[$key]['psiquiatria'])){
     		if(intval($list[$key]['psiquiatria'])     != -1){
     				array_push($vagaMaior, $list[$key]['psiquiatria']);
     		}
     	}
    }


if(strcmp($_GET['ordem'], "decrescente") == 0)
	rsort($vagaMaior);
else if(strcmp($_GET['ordem'], "crescente") == 0)
	sort($vagaMaior);

 for ($i=0; $i < count($vagaMaior); $i++) { 
	foreach($list as $key => $value){
	  if(isset($list[$key]['queimaduras'])){
	  	 if(intval($vagaMaior[$i]) == intval($list[$key]['queimaduras'])){
		$stringCard = " ";
			if($list[$key]['queimaduras'] > -1 && $list[$key]['queimaduras'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['queimaduras'] < 8 && $list[$key]['queimaduras'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">whatshot</i>
                  				<p>Queimaduras</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['queimaduras']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              $list[$key]['queimaduras'] = -1;
              array_push($cardConteudo, $stringCard);

	  	break;
	  }
	  }
	  if(isset($list[$key]['cardiacos'])){
	  	if(intval($vagaMaior[$i]) == intval($list[$key]['cardiacos'])){
		$stringCard = " ";
			if($list[$key]['cardiacos'] > -1 && $list[$key]['cardiacos'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['cardiacos'] < 8 && $list[$key]['cardiacos'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">favorite</i>
                  				<p>Cardiacos</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['cardiacos']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	 $list[$key]['cardiacos'] = -1;
	  	break;
	  }
	  }
	  if(isset($list[$key]['obstetricia'])){
	  	if(intval($vagaMaior[$i]) == intval($list[$key]['obstetricia'])){
		$stringCard = " ";
			if($list[$key]['obstetricia'] > -1 && $list[$key]['obstetricia'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['obstetricia'] < 8 && $list[$key]['obstetricia'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">pregnant_woman</i>
                  				<p>Obstetricia</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['obstetricia']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['obstetricia'] = -1;
	  	break;
	  }
	  }
	  if(isset($list[$key]['traumato'])){
	  	if(intval($vagaMaior[$i]) == intval($list[$key]['traumato'])){
		$stringCard = " ";
			if($list[$key]['traumato'] > -1 && $list[$key]['traumato'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['traumato'] < 8 && $list[$key]['traumato'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">directions_walk</i>
                  				<p>Traumato</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['traumato']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['traumato'] = -1;
	  	break;
	  }
	  }
	  if(isset($list[$key]['clinica'])){
	  	 if(intval($vagaMaior[$i]) == intval($list[$key]['clinica'])){
		$stringCard = " ";
			if($list[$key]['clinica'] > -1 && $list[$key]['clinica'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['clinica'] < 8 && $list[$key]['clinica'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">accessibility</i>
                  				<p>Clinica</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['clinica']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['clinica'] = -1;
	  	break;
	  }
	  }
	 if(isset($list[$key]['vascular'])){
	 	 if(intval($vagaMaior[$i]) == intval($list[$key]['vascular'])){
		$stringCard = " ";
			if($list[$key]['vascular'] > -1 && $list[$key]['vascular'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['vascular'] < 8 && $list[$key]['vascular'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">call_split</i>
                  				<p>Vascular</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['vascular']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['vascular'] = -1;
	  	break;
	  }
	 }
	 if(isset($list[$key]['otorrinolaringologia'])){
	 	if(intval($vagaMaior[$i]) == intval($list[$key]['otorrinolaringologia'])){
		$stringCard = " ";
			if($list[$key]['otorrinolaringologia'] > -1 && $list[$key]['otorrinolaringologia'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['otorrinolaringologia'] < 8 && $list[$key]['otorrinolaringologia'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">hearing</i>
                  				<p>Otorrinolaringologia</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['otorrinolaringologia']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['otorrinolaringologia'] = -1;
	  	break;
	  }
	 }
	 if(isset($list[$key]['pediatria'])){
	 if(intval($vagaMaior[$i]) == intval($list[$key]['pediatria'])){
		$stringCard = " ";
			if($list[$key]['pediatria'] > -1 && $list[$key]['pediatria'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['pediatria'] < 8 && $list[$key]['pediatria'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">child_friendly</i>
                  				<p>Pediatria</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['pediatria']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['pediatria'] = -1;
	  	break;
	  }	
	 }
	 if(isset($list[$key]['infectologia'])){
	 if(intval($vagaMaior[$i]) == intval($list[$key]['infectologia'])){
		$stringCard = " ";
			if($list[$key]['infectologia'] > -1 && $list[$key]['infectologia'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['infectologia'] < 8 && $list[$key]['infectologia'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">blur_circular</i>
                  				<p>Infectologia</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['infectologia']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['infectologia'] = -1;
	  	break;
	  }	
	 }
	  if (isset($list[$key]['intoxicacao'])) {
	  	# code...
	  	 if(intval($vagaMaior[$i]) == intval($list[$key]['intoxicacao'])){
		$stringCard = " ";
			if($list[$key]['intoxicacao'] > -1 && $list[$key]['intoxicacao'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['intoxicacao'] < 8 && $list[$key]['intoxicacao'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">bubble_chart</i>
                  				<p>Intoxicacao</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['intoxicacao']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['intoxicacao'] = -1;
	  	break;
	  }
	  }
	  if(isset($list[$key]['neurologia'])){
	  	  if(intval($vagaMaior[$i]) == intval($list[$key]['neurologia'])){
		$stringCard = " ";
			if($list[$key]['neurologia'] > -1 && $list[$key]['neurologia'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['neurologia'] < 8 && $list[$key]['neurologia'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">record_voice_over</i>
                  				<p>Neurologia</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['neurologia']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['neurologia'] = -1;
	  	break;
	  }
	  }
	if(isset($list[$key]['odontologia'])){
		 if(intval($vagaMaior[$i]) == intval($list[$key]['odontologia'])){
		$stringCard = " ";
			if($list[$key]['odontologia'] > -1 && $list[$key]['odontologia'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['odontologia'] < 8 && $list[$key]['odontologia'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">airline_seat_flat_angled</i>
                  				<p>Odontologia</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['odontologia']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['odontologia'] = -1;
	  	break;
	  }
	}
	 if (isset($list[$key]['urologia'])) {
	 	# code...
	 	if(intval($vagaMaior[$i]) == intval($list[$key]['urologia'])){
		$stringCard = " ";
			if($list[$key]['urologia'] > -1 && $list[$key]['urologia'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['urologia'] < 8 && $list[$key]['urologia'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">person</i>
                  				<p>Urologia</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['urologia']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['urologia'] = -1;
	  	break;
	  }
	 }
	 if (isset($list[$key]['psiquiatria'])) {
	 	# code...
	 	 if(intval($vagaMaior[$i]) == intval($list[$key]['psiquiatria'])){
		$stringCard = " ";
			if($list[$key]['psiquiatria'] > -1 && $list[$key]['psiquiatria'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['psiquiatria'] < 8 && $list[$key]['psiquiatria'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">account_box</i>
                  				<p>Psiquiatria</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['psiquiatria']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['psiquiatria'] = -1;
	  	break;
	  }
	 }
	 if(isset($list[$key]['ginecologia'])){
	 	if(intval($vagaMaior[$i]) == intval($list[$key]['ginecologia'])){
		$stringCard = " ";
			if($list[$key]['ginecologia'] > -1 && $list[$key]['ginecologia'] < 4){
        			$stringCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($list[$key]['ginecologia'] < 8 && $list[$key]['ginecologia'] >= 4){
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$stringCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$list[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $stringCard .= "<i class=\"material-icons background-round mt-5\">spa</i>
                  				<p>Ginecologia</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$list[$key]['ginecologia']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $stringCard);

	  	$list[$key]['ginecologia'] = -1;
	  	break;
	  }
	 }
	  
	  

	}

}

echo json_encode($cardConteudo);

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