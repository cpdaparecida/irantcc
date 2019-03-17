<?php
include 'config.php';
include 'connection.php';

$cardNome = array();
$cardConteudo  = array();
$conteudoCard = " ";
$_GET['especialidade'] = isset($_GET['especialidade']) ? strtolower($_GET['especialidade']) : '*';
if($_GET['especialidade'] != '*'){
$estadoDB = DBRead("info_hospitais", null , "hospital, {$_GET['especialidade']}");
}
else{
  $estadoDB = DBRead("info_hospitais", null, "hospital, queimaduras, cardiacos, obstetricia, traumato, clinica, vascular, otorrinolaringologia, pediatria, infectologia, intoxicacao, neurologia, odontologia, urologia, psiquiatria, ginecologia");
}
//var_dump($estadoDB);


 foreach ($estadoDB as $key => $value) {

     
    if(isset($estadoDB[$key]['queimaduras'])){
     if(intval($estadoDB[$key]['queimaduras'])     != -1){
     	 $conteudoCard = " ";
       $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
    			array_push($cardNome, $aux."_Queimaduras");
    	
            		if($estadoDB[$key]['queimaduras'] > -1 && $estadoDB[$key]['queimaduras'] < 4){
            			$conteudoCard.= "
            			<div class=\"col s12 m6 l3\">
            			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                                <div class=\"padding-4\">
                                <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                                  <div class=\"col s7 m7\">";
            		}
            		else if($estadoDB[$key]['queimaduras'] < 8 && $estadoDB[$key]['queimaduras'] >= 4){
            			$conteudoCard .= "
            			<div class=\"col s12 m6 l3\">
            			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                                <div class=\"padding-4\">
                                <span class=\"right\">Hospital {$estadoDB[$key]['hospital']}</span>
                                  <div class=\"col s7 m7\">";
            		}
            		else {
            			$conteudoCard .= "
            			<div class=\"col s12 m6 l3\">
            			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                                <div class=\"padding-4\">
                                <span class=\"right\">Hospital {$estadoDB[$key]['hospital']}</span>
                                  <div class=\"col s7 m7\">";
            		} 
                    $conteudoCard .= "<i class=\"material-icons background-round mt-5\">whatshot</i>
                    				<p>Queimaduras</p>
                                </div>
                                <div class=\"col s5 m5 right-align\">
                                  <h5 class=\"mb-0\">{$estadoDB[$key]['queimaduras']}</h5>
                                  <p class=\"no-margin\">Leitos</p>
                                </div>
                              </div>
                            </div>
                          </div>
                    	";
              array_push($cardConteudo, $conteudoCard);

      }
    } 	
    if(isset($estadoDB[$key]['cardiacos'])){
     if(intval($estadoDB[$key]['cardiacos'])     != -1){
     			$conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
    			array_push($cardNome, $aux."_Cardiacos");
    	
        		if($estadoDB[$key]['cardiacos'] > -1 && $estadoDB[$key]['cardiacos'] < 4){
        			$conteudoCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\">Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($estadoDB[$key]['cardiacos'] < 8 && $estadoDB[$key]['cardiacos'] >= 4){
        			$conteudoCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$conteudoCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                  $conteudoCard .= "<i class=\"material-icons background-round mt-5\">favorite</i>
                  				<p>Cardiacos</p>
                              </div>
                              <div class=\"col s5 m5 right-align\">
                                <h5 class=\"mb-0\">{$estadoDB[$key]['cardiacos']}</h5>
                                <p class=\"no-margin\">Leitos</p>
                              </div>
                            </div>
                          </div>
                        </div>
                  	";
              array_push($cardConteudo, $conteudoCard);

      }
    }       
    if(isset($estadoDB[$key]['obstetricia'])){  
      if(intval($estadoDB[$key]['obstetricia'])  != -1){
         $conteudoCard = " ";
         $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
    		 array_push($cardNome, $aux."_Obstetríscia");
    	
        		if($estadoDB[$key]['obstetricia'] > -1 && $estadoDB[$key]['obstetricia'] < 4){
        			$conteudoCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($estadoDB[$key]['obstetricia'] < 8 && $estadoDB[$key]['obstetricia'] >= 4){
        			$conteudoCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$conteudoCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
              $conteudoCard .= "<i class=\"material-icons background-round mt-5\">pregnant_woman</i>
              				<p>Obstetrícia</p>
                          </div>
                          <div class=\"col s5 m5 right-align\">
                            <h5 class=\"mb-0\">{$estadoDB[$key]['obstetricia']}</h5>
                            <p class=\"no-margin\">Leitos</p>
                          </div>
                        </div>
                      </div>
                    </div>
              	";
              array_push($cardConteudo, $conteudoCard);

      }               
    } 
    if(isset($estadoDB[$key]['traumato'])){  
      if(intval($estadoDB[$key]['traumato'])   != -1){
          $conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
    			array_push($cardNome, $aux."_traumato");
    	
        		if($estadoDB[$key]['traumato'] > -1 && $estadoDB[$key]['traumato'] < 4){
        			$conteudoCard.= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else if($estadoDB[$key]['traumato'] < 7 && $estadoDB[$key]['traumato'] >= 4){
        			$conteudoCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		}
        		else {
        			$conteudoCard .= "
        			<div class=\"col s12 m6 l3\">
        			<div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
        		} 
                $conteudoCard .= "<i class=\"material-icons background-round mt-5\">directions_walk</i>
                				<p>Traumato</p>
                            </div>
                            <div class=\"col s5 m5 right-align\">
                              <h5 class=\"mb-0\">{$estadoDB[$key]['traumato']}</h5>
                              <p class=\"no-margin\">Leitos</p>
                            </div>
                          </div>
                        </div>
                      </div>
                	";
              array_push($cardConteudo, $conteudoCard);

      }
    }  
    if(isset($estadoDB[$key]['clinica'])){
      if(intval($estadoDB[$key]['clinica']) != -1){
   
          $conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
          array_push($cardNome, $aux."_Clinica");
      
            if($estadoDB[$key]['clinica'] > -1 && $estadoDB[$key]['clinica'] < 4){
              $conteudoCard.= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else if($estadoDB[$key]['clinica'] < 7 && $estadoDB[$key]['clinica'] >= 4){
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else {
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            } 
                $conteudoCard .= "<i class=\"material-icons background-round mt-5\">accessibility</i>
                        <p>Clinica</p>
                            </div>
                            <div class=\"col s5 m5 right-align\">
                              <h5 class=\"mb-0\">{$estadoDB[$key]['clinica']}</h5>
                              <p class=\"no-margin\">Leitos</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  ";
              array_push($cardConteudo, $conteudoCard);

      }
    }  
    if(isset($estadoDB[$key]['vascular'])){
      if(intval($estadoDB[$key]['vascular']) != -1){
   
          $conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
          array_push($cardNome, $aux."_Vascular");
      
            if($estadoDB[$key]['vascular'] > -1 && $estadoDB[$key]['vascular'] < 4){
              $conteudoCard.= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else if($estadoDB[$key]['vascular'] < 7 && $estadoDB[$key]['vascular'] >= 4){
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else {
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            } 
                $conteudoCard .= "<i class=\"material-icons background-round mt-5\">call_split</i>
                        <p>Vascular</p>
                            </div>
                            <div class=\"col s5 m5 right-align\">
                              <h5 class=\"mb-0\">{$estadoDB[$key]['vascular']}</h5>
                              <p class=\"no-margin\">Leitos</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  ";
              array_push($cardConteudo, $conteudoCard);

      }
    }
    if(isset($estadoDB[$key]['otorrinolaringologia'])){
      if(intval($estadoDB[$key]['otorrinolaringologia']) != -1){
   
          $conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
          array_push($cardNome, $aux."_Otorrinolaringologia");
      
            if($estadoDB[$key]['otorrinolaringologia'] > -1 && $estadoDB[$key]['otorrinolaringologia'] < 4){
              $conteudoCard.= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else if($estadoDB[$key]['otorrinolaringologia'] < 7 && $estadoDB[$key]['otorrinolaringologia'] >= 4){
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else {
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            } 
                $conteudoCard .= "<i class=\"material-icons background-round mt-5\">hearing</i>
                        <p>Otorrinolaringologia</p>
                            </div>
                            <div class=\"col s5 m5 right-align\">
                              <h5 class=\"mb-0\">{$estadoDB[$key]['otorrinolaringologia']}</h5>
                              <p class=\"no-margin\">Leitos</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  ";
              array_push($cardConteudo, $conteudoCard);

      }
    }
    if(isset($estadoDB[$key]['pediatria'])){
      if(intval($estadoDB[$key]['pediatria']) != -1){
   
          $conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
          array_push($cardNome, $aux."_Pediatria");
      
            if($estadoDB[$key]['pediatria'] > -1 && $estadoDB[$key]['pediatria'] < 4){
              $conteudoCard.= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else if($estadoDB[$key]['pediatria'] < 7 && $estadoDB[$key]['pediatria'] >= 4){
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else {
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            } 
                $conteudoCard .= "<i class=\"material-icons background-round mt-5\">child_friendly</i>
                        <p>Pediatria</p>
                            </div>
                            <div class=\"col s5 m5 right-align\">
                              <h5 class=\"mb-0\">{$estadoDB[$key]['pediatria']}</h5>
                              <p class=\"no-margin\">Leitos</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  ";
              array_push($cardConteudo, $conteudoCard);

      }
    }
    if(isset($estadoDB[$key]['infectologia'])){
      if(intval($estadoDB[$key]['infectologia']) != -1){
   
          $conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
          array_push($cardNome, $aux."_Infectologia");
      
            if($estadoDB[$key]['infectologia'] > -1 && $estadoDB[$key]['infectologia'] < 4){
              $conteudoCard.= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else if($estadoDB[$key]['infectologia'] < 7 && $estadoDB[$key]['infectologia'] >= 4){
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else {
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            } 
                $conteudoCard .= "<i class=\"material-icons background-round mt-5\">blur_circular</i>
                        <p>Infectologia</p>
                            </div>
                            <div class=\"col s5 m5 right-align\">
                              <h5 class=\"mb-0\">{$estadoDB[$key]['infectologia']}</h5>
                              <p class=\"no-margin\">Leitos</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  ";
              array_push($cardConteudo, $conteudoCard);
      }
    }
    if(isset($estadoDB[$key]['intoxicacao'])){
      if(intval($estadoDB[$key]['intoxicacao']) != -1){
   
          $conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
          array_push($cardNome, $aux."_intoxicacao");
      
            if($estadoDB[$key]['intoxicacao'] > -1 && $estadoDB[$key]['intoxicacao'] < 4){
              $conteudoCard.= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else if($estadoDB[$key]['intoxicacao'] < 7 && $estadoDB[$key]['intoxicacao'] >= 4){
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else {
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            } 
                $conteudoCard .= "<i class=\"material-icons background-round mt-5\">bubble_chart</i>
                        <p>Intoxicacao</p>
                            </div>
                            <div class=\"col s5 m5 right-align\">
                              <h5 class=\"mb-0\">{$estadoDB[$key]['intoxicacao']}</h5>
                              <p class=\"no-margin\">Leitos</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  ";
              array_push($cardConteudo, $conteudoCard);

      }
    }
    if(isset($estadoDB[$key]['neurologia'])){
      if(intval($estadoDB[$key]['neurologia']) != -1){
   
          $conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
          array_push($cardNome, $aux."_Neurologia");
      
            if($estadoDB[$key]['neurologia'] > -1 && $estadoDB[$key]['neurologia'] < 4){
              $conteudoCard.= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else if($estadoDB[$key]['neurologia'] < 7 && $estadoDB[$key]['neurologia'] >= 4){
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else {
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            } 
                $conteudoCard .= "<i class=\"material-icons background-round mt-5\">record_voice_over</i>
                        <p>Neurologia</p>
                            </div>
                            <div class=\"col s5 m5 right-align\">
                              <h5 class=\"mb-0\">{$estadoDB[$key]['neurologia']}</h5>
                              <p class=\"no-margin\">Leitos</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  ";
              array_push($cardConteudo, $conteudoCard);

      }
    }
    if(isset($estadoDB[$key]['odontologia'])){      
      if(intval($estadoDB[$key]['odontologia']) != -1){
   
          $conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
          array_push($cardNome, $aux."_Odontologia");
      
            if($estadoDB[$key]['odontologia'] > -1 && $estadoDB[$key]['odontologia'] < 4){
              $conteudoCard.= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else if($estadoDB[$key]['odontologia'] < 7 && $estadoDB[$key]['odontologia'] >= 4){
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else {
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            } 
                $conteudoCard .= "<i class=\"material-icons background-round mt-5\">airline_seat_flat_angled</i>
                        <p>Odontologia</p>
                            </div>
                            <div class=\"col s5 m5 right-align\">
                              <h5 class=\"mb-0\">{$estadoDB[$key]['odontologia']}</h5>
                              <p class=\"no-margin\">Leitos</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  ";
              array_push($cardConteudo, $conteudoCard);

      }
    }
    if(isset($estadoDB[$key]['urologia'])){
      if(intval($estadoDB[$key]['urologia']) != -1){
   
          $conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
          array_push($cardNome, $aux."_Urologia");
      
            if($estadoDB[$key]['urologia'] > -1 && $estadoDB[$key]['urologia'] < 4){
              $conteudoCard.= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else if($estadoDB[$key]['urologia'] < 7 && $estadoDB[$key]['urologia'] >= 4){
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else {
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            } 
                $conteudoCard .= "<i class=\"material-icons background-round mt-5\">person</i>
                        <p>Urologia</p>
                            </div>
                            <div class=\"col s5 m5 right-align\">
                              <h5 class=\"mb-0\">{$estadoDB[$key]['urologia']}</h5>
                              <p class=\"no-margin\">Leitos</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  ";
              array_push($cardConteudo, $conteudoCard);

      }
    }
    if(isset($estadoDB[$key]['psiquiatria'])){
      if(intval($estadoDB[$key]['psiquiatria']) != -1 ){
   
          $conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
          array_push($cardNome, $aux."_Psiquiatria");
      
            if($estadoDB[$key]['psiquiatria'] > -1 && $estadoDB[$key]['psiquiatria'] < 4){
              $conteudoCard.= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else if($estadoDB[$key]['psiquiatria'] < 7 && $estadoDB[$key]['psiquiatria'] >= 4){
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else {
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            } 
                $conteudoCard .= "<i class=\"material-icons background-round mt-5\">account_box</i>
                        <p>Psiquiatria</p>
                            </div>
                            <div class=\"col s5 m5 right-align\">
                              <h5 class=\"mb-0\">{$estadoDB[$key]['psiquiatria']}</h5>
                              <p class=\"no-margin\">Leitos</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  ";
              array_push($cardConteudo, $conteudoCard);

      }
    }
    if (isset($estadoDB[$key]['ginecologia'])) {
      if(intval($estadoDB[$key]['ginecologia']) != -1){
          $conteudoCard = " ";
          $aux = str_replace(" ", "_", $estadoDB[$key]['hospital']) != null ? str_replace(" ", "_", $estadoDB[$key]['hospital']) : $estadoDB[$key]['hospital'];
          array_push($cardNome, $aux."_Ginecologia");
      
            if($estadoDB[$key]['ginecologia'] > -1 && $estadoDB[$key]['ginecologia'] < 4){
              $conteudoCard.= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-red-pink gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else if($estadoDB[$key]['ginecologia'] < 7 && $estadoDB[$key]['ginecologia'] >= 4){
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-amber-amber gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            }
            else {
              $conteudoCard .= "
              <div class=\"col s12 m6 l3\">
              <div class=\"card gradient-45deg-green-teal gradient-shadow min-height-150 white-text\">
                            <div class=\"padding-4\">
                            <span class=\"right\" >Hospital {$estadoDB[$key]['hospital']}</span>
                              <div class=\"col s7 m7\">";
            } 
                $conteudoCard .= "<i class=\"material-icons background-round mt-5\">wc</i>
                        <p>Ginecologia</p>
                            </div>
                            <div class=\"col s5 m5 right-align\">
                              <h5 class=\"mb-0\">{$estadoDB[$key]['ginecologia']}</h5>
                              <p class=\"no-margin\">Leitos</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  ";
              array_push($cardConteudo, $conteudoCard);
      }
    }
 }            
 //var_dump($cardConteudo);
 echo json_encode($cardConteudo) ;





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