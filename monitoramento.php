<?php 
      include 'config.php';
      include 'connection.php';
      include 'config_hospitais.php';
      session_start();
      if (isset($_SESSION['login'])) {
        # code...
      $usuario = DBRead('info_clientes', "WHERE usuario = '{$_SESSION['login']}'");
        # code...
      }
       else if(!isset($_COOKIE['login'])){
        echo ("<script>alert('Não está logado'); </script>");
        echo ("<script>location.href='login.html';</script>");
      }
      else{
        $usuario = DBRead('info_clientes', "WHERE usuario = '{$_COOKIE['login']}'");
      }
      
      $vaga_queimado   = DBRead('historico' ,"WHERE especialidade = 'Queimados'", "dataehora, hospital , vaga");
      $vaga_cardiaco   = DBRead('historico' ,"WHERE especialidade = 'Cardiacos'", "dataehora, hospital , vaga");
      $vaga_obstetrica = DBRead('historico' ,"WHERE especialidade = 'Obstetrica'", "dataehora, hospital , vaga");
      $vaga_ortopedica = DBRead('historico' ,"WHERE especialidade = 'Ortopedica'", "dataehora, hospital , vaga");
      $historico       = DBRead('historico');
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


for($i = count($vaga_queimado) -6; $i < count($vaga_queimado); $i++){


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

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Supervisório de leitos hospitalares, criado para agilizar a transferencia de pacientes que seguem aguardando atendemento especializado">
    <meta name="keywords" content="supervisório, leitos, supervisório hospitalar, tecnologia hospitalar, superviório na saúde, materialize,beds">
    <title>IranTCC</title>
    <!-- Favicons-->
    <link rel="icon" href="images/avatar/avatar-7.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="css//materialize.css" type="text/css" rel="stylesheet">
    <link href="css//style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
  </head>


  
  <body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-light-blue-cyan">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="index.php" class="brand-logo darken-1">
                    <img src="images/logo/materialize-logo.png" alt="Beds logo" >
                    <span class="logo-text hide-on-med-and-down">Iran TCC</span>
                  </a>
                </h1>
              </li>
            </ul>
            <div class="header-search-wrapper hide-on-med-and-down">
              <i class="material-icons">search</i>
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Procurar Hospital" />
            </div>
            <ul class="right hide-on-med-and-down">
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="translation-dropdown">
                  <span class="flag-icon flag-icon-br"></span>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                  <i class="material-icons">settings_overscan</i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                  <i class="material-icons">notifications_none
                    <small class="notification-badge pink accent-2">1</small>
                  </i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="images/avatar/avatar-7.png" alt="avatar">
                    <i></i>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">
                  <i class="material-icons">format_indent_increase</i>
                </a>
              </li>
            </ul>
            <!-- translation-button -->
            <ul id="translation-dropdown" class="dropdown-content">
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-br"></i> Português</a>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-es"></i> Español</a>
              </li>
               <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-fr"></i> French</a>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-cn"></i> Chinese</a>
              </li>
              
            </ul>
            <!-- notifications-dropdown -->
            <ul id="notifications-dropdown" class="dropdown-content">
              <li>
                <h6>NOTIFICATIONS
                  <span class="new badge">1</span>
                </h6>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle cyan small">favorite</span> Uma nova vaga para Cardiaco, no Getulio Vargas</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>

            </ul>
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">face</i> Perfil</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">settings</i> Ajustes</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">live_help</i> Ajuda</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="saidinha.php" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Sair</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- end header nav-->
    </header>
    <!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav" class="gradient-45deg-blue-grey-blue">
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
              <div class="row">
                <div class="col col s4 m4 l4">
                  <a href="#" ><img src="images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">
                  </a>
                </div>
                <div class="col col s8 m8 l8">
                  <ul id="profile-dropdown-nav" class="dropdown-content">
                    <li>
                      <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">face</i> Perfil</a>
                    </li>
                    <li>
                      <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">settings</i> Ajustes</a>
                    </li>
                    <li>
                      <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">live_help</i> Ajuda</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="saidinha.php" class="grey-text text-darken-1">
                        <i class="material-icons">keyboard_tab</i> Sair</a>
                    </li>
                  </ul>
                  <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav"><?php echo isset($_SESSION['nome']) ? $_SESSION['nome']  : $_COOKIE['nome']?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                  <p class="user-roal"><?php echo isset($_SESSION['funcao']) ? $_SESSION['funcao']  : $_COOKIE['funcao']?></p>
                  </a>
               </div>
              </div>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">
                <li class="bold">
                  <a href="index.php" class="waves-effect waves-cyan">
                      <i class="material-icons">pie_chart_outlined</i>
                      <span class="nav-text">Supervisório</span>
                    </a>
                </li>
                <li class="bold">
                  <a href="visaogeral.php" class="waves-effect waves-cyan">
                      <i class="material-icons">cast</i>
                      <span class="nav-text">Visão Geral</span>
                    </a>
                </li>
                <li class="bold">
                  <a href="monitoramento.php" class="waves-effect waves-cyan">
                      <i class="material-icons">show_chart</i>
                      <span class="nav-text">Monitoramento</span>
                    </a>
                </li>
                <li class="bold">
                  <a href="estatistica.php" class="waves-effect waves-cyan">
                      <i class="material-icons">insert_chart</i>
                      <span class="nav-text">Estatisticas</span>
                    </a>
                </li>
                <div class="divider"> </div>
                <li class="bold">
                  <?php
                  if(strcmp(isset($_COOKIE['funcao']) ? $_COOKIE['funcao']: $_SESSION['funcao'], "Diretoria") == 0){
                    echo "<a href=\"hospital-".(isset($_COOKIE['hospital']) ? "{$hospitais[$_COOKIE['hospital']]}.php\"" : "{$hospitais[$_SESSION['hospital']]}.php\"")." class=\"waves-effect waves-cyan\">
                      <i class=\"material-icons\">local_hospital</i> 
                      <span class=\"nav-text\">".(isset($_COOKIE['Hospital']) ? "{$_COOKIE['hospital']}</span>\n</a>" : "{$_SESSION['hospital']}</span>\n</a>");   
                  }
                  else if(isset($_COOKIE['hospitais'])){
                    echo "<ul class=\"collapsible\">
                    <li>
                      <div class=\"collapsible-header estilo-lista\" >
                        <i class=\"material-icons\">local_hospital</i>
                        Hospital
                      </div>
                    <div class=\"collapsible-body\">
                      <ul class=\"collection\">";
                      foreach ($_COOKIE['hospitais'] as $key => $value) {
                        echo "\n<a href=\"hospital-".$hospitais[htmlspecialchars($value)].".php\" class=\"collection-item center\">".htmlspecialchars($value)."</a>";
                      }
                     echo "</ul>
                    </div>  
                    </li> 
                 </ul>";
                  }
                  else if(isset($_SESSION['hospitais'])){
                    echo "<ul class=\"collapsible\">
                    <li>
                      <div class=\"collapsible-header estilo-lista\" >
                        <i class=\"material-icons\">local_hospital</i>
                        Hospital
                      </div>
                    <div class=\"collapsible-body\">
                      <ul class=\"collection\">";
                      foreach ($_SESSION['hospitais'] as $key => $value) {
                        echo "\n<a href=\"hospital-".$hospitais[htmlspecialchars($value)].".php\" class=\"collection-item center\">".htmlspecialchars($value)."</a>";
                      }
                     echo "</ul>
                    </div>  
                    </li> 
                 </ul>";
                  }
                  else if(strcmp(isset($_COOKIE['funcao']) ? $_COOKIE['funcao']: $_SESSION['funcao'], "Desenvolvedor") == 0){
                    echo "<ul class=\"collapsible\">
                    <li>
                      <div class=\"collapsible-header estilo-lista\" >
                        <i class=\"material-icons\">local_hospital</i>
                        Hospital
                      </div>
                    <div class=\"collapsible-body\">
                      <ul class=\"collection\">
                      <a href=\"hospital-restauracao.php\" class=\"collection-item center\">Restauração</a>
                      <a href=\"hospital-getulio-vargas.php\" class=\"collection-item center\">Getulio Vargas</a>
                      <a href=\"hospital-oswaldo-cruz.php\" class=\"collection-item center\">Oswaldo Cruz</a>
                      <a href=\"hospital-miguel-arraes.php\" class=\"collection-item center\">Miguel Arraes</a>
                     </ul>
                    </div>  
                    </li> 
                 </ul>";
                  }
                 ?>
                </li>
                <li class="bold">
                  <a href="css-color.html" class="waves-effect waves-cyan">
                      <i class="material-icons">healing</i>
                      <span class="nav-text">Especialidades</span>
                    </a>
                </li>
                <li class="bold">
                  <a href="historico.php" class="waves-effect waves-cyan">
                      <i class="material-icons">archive</i>
                      <span class="nav-text">Históricos</span>
                    </a>
                </li>
                <li class="bold">
                  <a href="ui-icons.html" class="waves-effect waves-cyan">
                    <i class="material-icons">contacts</i>
                    <span class="nav-text">Contato</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
            <i class="material-icons">menu</i>
          </a>
        </aside>

   <section id="content">
     <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
         <h5 class="">Ultimas Mudanças</h5> 
        </div>
      </div>
      <div class="divider"></div>
      <div class="row">
        <div class="col s12 m6 l3" >
          
            <?php 
              if ($historico[count($historico) - 1]['vaga'] < 4) {
                echo "<div class=\"card red accent-2 \">\n\t\t\t<div class=\"card-stats-content red accent-2 gradient-shadow white-text\">";}
              
              else if ($historico[count($historico) - 1]['vaga'] < 7) {
                echo "<div class=\"card amber\">\n\t\t\t<div class=\"card-stats-content amber gradient-shadow white-text\">";
              }
              else if ($historico[count($historico) - 1]['vaga'] < 10){
                echo "<div class=\"card cyan\">\n\t\t\t<div class=\"card-stats-content cyan gradient-shadow white-text\">";
              }
              else{
                echo "<div class=\"card teal accent-4 \">\n\t\t\t<div class=\"card-stats-content teal accent-4 gradient-shadow white-text\">";
              }
              
                
            ?>
            
            <p class="card-stats-title center" style="font-size: 1.5rem;">
              <i class="material-icons"><?php 
              if ($historico[count($historico) - 1]['especialidade'] =="Queimados") {
                # code..
                  echo "flare</i>Queimados</p>\n";
              } 
              if ($historico[count($historico) - 1]['especialidade'] =="Cardiacos") {
                # code...
                echo "favorite</i>\n                Cardiacos\n            </p>\n";
              }
              if ($historico[count($historico) - 1]['especialidade'] =="Obstetrica") {
                # code...
                echo "pregnant_woman</i>\n                Obstetrica\n            </p>\n";
              }
              if ($historico[count($historico) - 1]['especialidade'] =="Ortopedica") {
                # code...
                echo "directions_walks</i>\n                Ortopedica\n            </p>\n";
              }
              echo "\t\t\t<h4 class=\"card-stats-numbers center white-text\" >{$historico[count($historico) - 1]['vaga']}</h4>\n";
              echo "\t\t\t<p class=\"card-stats-compare center\" >\n\t\t\t\t<i class=\"material-icons\">";
              for ($i=count($historico)-2; $i > -1 ; $i-- ){ 
                    # code...
                    if($historico[count($historico) - 1]['hospital'] == $historico[$i]['hospital'] && $historico[count($historico) - 1]['especialidade'] == $historico[$i]['especialidade'] ){
                      if ($historico[count($historico) - 1]['vaga'] > $historico[$i]['vaga']) {
                        # code...
                       echo "keyboard_arrow_up";
                      break;
                      }
                      else{
                       echo "keyboard_arrow_down";
                      break;
                      }
                    }
              }
              echo "</i>\n";
              echo "\t\t\t\t<span class=\"text text-lighten-5\">{$historico[count($historico) - 1]['hospital']}</span>\n";
              echo "\t\t\t</p>\n";  
                            ?>
            </div>
          
          <?php 
              if ($historico[count($historico) - 1]['vaga'] < 4) 
                echo "<div class=\"card-action red darken-1 \">\n";
              else if ($historico[count($historico) - 1]['vaga'] < 7) 
                echo "<div class=\"card-action amber darken-3\">\n";
              else if ($historico[count($historico) - 1]['vaga'] < 10)
                echo "<div class=\"card-action cyan darken-1\">\n";
              else
                echo "<div class=\"card-action teal darken-1\">\n";
              
              
            ?>
              <div class="center-align" id="miniCard-1" >
                <canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas>
              </div>
            </div>
          </div>  
        </div>
       <div class="col s12 m6 l3">
         <?php 
              if ($historico[count($historico) - 2]['vaga'] < 4) {
                echo "<div class=\"card red accent-2 \">\n\t\t\t<div class=\"card-stats-content red accent-2 gradient-shadow white-text\">";}
              
              else if ($historico[count($historico) - 2]['vaga'] < 7) {
                echo "<div class=\"card amber\">\n\t\t\t<div class=\"card-stats-content amber gradient-shadow white-text\">";
              }
              else if ($historico[count($historico) - 2]['vaga'] < 10){
                echo "<div class=\"card cyan\">\n\t\t\t<div class=\"card-stats-content cyan gradient-shadow white-text\">";
              }
              else{
                echo "<div class=\"card teal accent-4 \">\n\t\t\t<div class=\"card-stats-content teal accent-4 gradient-shadow white-text\">";
              }
              
                
            ?>
            
            <p class="card-stats-title center" style="font-size: 1.5rem;">
              <i class="material-icons"><?php 
              if ($historico[count($historico) - 2]['especialidade'] =="Queimados") {
                # code..
                  echo "flare</i>Queimados</p>\n";
              } 
              if ($historico[count($historico) - 2]['especialidade'] =="Cardiacos") {
                # code...
                echo "favorite</i>\n                Cardiacos\n            </p>\n";
              }
              if ($historico[count($historico) - 2]['especialidade'] =="Obstetrica") {
                # code...
                echo "pregnant_woman</i>\n                Obstetrica\n            </p>\n";
              }
              if ($historico[count($historico) -2]['especialidade'] =="Ortopedica") {
                # code...
                echo "directions_walks</i>\n                Ortopedica\n            </p>\n";
              }
              echo "\t\t\t<h4 class=\"card-stats-numbers center white-text\" >{$historico[count($historico) - 2]['vaga']}</h4>\n";
              echo "\t\t\t<p class=\"card-stats-compare center\" >\n\t\t\t\t<i class=\"material-icons\">";
              for ($i=count($historico)-3; $i > -1 ; $i-- ){ 
                    # code...
                    if($historico[count($historico) - 2]['hospital'] == $historico[$i]['hospital'] && $historico[count($historico) - 2]['especialidade'] == $historico[$i]['especialidade'] ){
                      if ($historico[count($historico) - 2]['vaga'] > $historico[$i]['vaga']) {
                        # code...
                       echo "keyboard_arrow_up";
                      break;
                      }
                      else{
                       echo "keyboard_arrow_down";
                      break;
                      }
                    }
              }
              echo "</i>\n";
              echo "\t\t\t\t<span class=\"text text-lighten-5\">{$historico[count($historico) - 2]['hospital']}</span>\n";
              echo "\t\t\t</p>\n";  
                            ?>
            </div>
          
          <?php 
              if ($historico[count($historico) - 2]['vaga'] < 4) 
                echo "<div class=\"card-action red darken-1 \">\n";
              else if ($historico[count($historico) - 2]['vaga'] < 7) 
                echo "<div class=\"card-action amber darken-3\">\n";
              else if ($historico[count($historico) - 2]['vaga'] < 10)
                echo "<div class=\"card-action cyan darken-1\">\n";
              else
                echo "<div class=\"card-action teal darken-1\">\n";
              
              
            ?>
              <div class="center-align" id="miniCard-2" >
                <canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas>
              </div>
            </div>
          </div>  
        </div>
        <div class="col s12 m6 l3">
          <?php 
              if ($historico[count($historico) - 3]['vaga'] < 4) {
                echo "<div class=\"card red accent-2 \">\n\t\t\t<div class=\"card-stats-content red accent-2 gradient-shadow white-text\">";}
              
              else if ($historico[count($historico) - 3]['vaga'] < 7) {
                echo "<div class=\"card amber\">\n\t\t\t<div class=\"card-stats-content amber gradient-shadow white-text\">";
              }
              else if ($historico[count($historico) - 3]['vaga'] < 10){
                echo "<div class=\"card cyan\">\n\t\t\t<div class=\"card-stats-content cyan gradient-shadow white-text\">";
              }
              else{
                echo "<div class=\"card teal accent-4 \">\n\t\t\t<div class=\"card-stats-content teal accent-4 gradient-shadow white-text\">";
              }
              
                
            ?>
            
            <p class="card-stats-title center" style="font-size: 1.5rem;">
              <i class="material-icons"><?php 
              if ($historico[count($historico) - 3]['especialidade'] =="Queimados") {
                # code..
                  echo "flare</i>Queimados</p>\n";
              } 
              if ($historico[count($historico) - 3]['especialidade'] =="Cardiacos") {
                # code...
                echo "favorite</i>\n                Cardiacos\n            </p>\n";
              }
              if ($historico[count($historico) - 3]['especialidade'] =="Obstetrica") {
                # code...
                echo "pregnant_woman</i>\n                Obstetrica\n            </p>\n";
              }
              if ($historico[count($historico) - 3]['especialidade'] =="Ortopedica") {
                # code...
                echo "directions_walks</i>\n                Ortopedica\n            </p>\n";
              }
              echo "\t\t\t<h4 class=\"card-stats-numbers center white-text\" >{$historico[count($historico) - 3]['vaga']}</h4>\n";
              echo "\t\t\t<p class=\"card-stats-compare center\" >\n\t\t\t\t<i class=\"material-icons\">";
              for ($i=count($historico)-4; $i > -1 ; $i-- ){ 
                    # code...
                    if($historico[count($historico) - 3]['hospital'] == $historico[$i]['hospital'] && $historico[count($historico) - 3]['especialidade'] == $historico[$i]['especialidade'] ){
                      if ($historico[count($historico) - 3]['vaga'] > $historico[$i]['vaga']) {
                        # code...
                       echo "keyboard_arrow_up";
                      break;
                      }
                      else{
                       echo "keyboard_arrow_down";
                      break;
                      }
                    }
              }
              echo "</i>\n";
              echo "\t\t\t\t<span class=\"text text-lighten-5\">{$historico[count($historico) - 3]['hospital']}</span>\n";
              echo "\t\t\t</p>\n";  
                            ?>
            </div>
          
          <?php 
              if ($historico[count($historico) - 3]['vaga'] < 4) 
                echo "<div class=\"card-action red darken-1 \">\n";
              else if ($historico[count($historico) - 3]['vaga'] < 7) 
                echo "<div class=\"card-action amber darken-3\">\n";
              else if ($historico[count($historico) - 3]['vaga'] < 10)
                echo "<div class=\"card-action cyan darken-1\">\n";
              else
                echo "<div class=\"card-action teal darken-1\">\n";
              
              
            ?>
              <div class="center-align" id="miniCard-3" >
                <canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas>
              </div>
            </div>
          </div>  
        </div>
        <div class="col s12 m6 l3">
          <?php 
              if ($historico[count($historico) - 4]['vaga'] < 4) {
                echo "<div class=\"card red accent-2 \">\n\t\t\t<div class=\"card-stats-content red accent-2 gradient-shadow white-text\">";}
              
              else if ($historico[count($historico) - 4]['vaga'] < 7) {
                echo "<div class=\"card amber\">\n\t\t\t<div class=\"card-stats-content amber gradient-shadow white-text\">";
              }
              else if ($historico[count($historico) - 4]['vaga'] < 10){
                echo "<div class=\"card cyan\">\n\t\t\t<div class=\"card-stats-content cyan gradient-shadow white-text\">";
              }
              else{
                echo "<div class=\"card teal accent-4 \">\n\t\t\t<div class=\"card-stats-content teal accent-4 gradient-shadow white-text\">";
              }
              
                
            ?>
            
            <p class="card-stats-title center" style="font-size: 1.5rem;">
              <i class="material-icons"><?php 
              if ($historico[count($historico) - 4]['especialidade'] =="Queimados") {
                # code..
                  echo "flare</i>Queimados</p>\n";
              } 
              if ($historico[count($historico) - 4]['especialidade'] =="Cardiacos") {
                # code...
                echo "favorite</i>\n                Cardiacos\n            </p>\n";
              }
              if ($historico[count($historico) - 4]['especialidade'] =="Obstetrica") {
                # code...
                echo "pregnant_woman</i>\n                Obstetrica\n            </p>\n";
              }
              if ($historico[count($historico) - 4]['especialidade'] =="Ortopedica") {
                # code...
                echo "directions_walks</i>\n                Ortopedica\n            </p>\n";
              }
              echo "\t\t\t<h4 class=\"card-stats-numbers center white-text\" >{$historico[count($historico) - 4]['vaga']}</h4>\n";
              echo "\t\t\t<p class=\"card-stats-compare center\" >\n\t\t\t\t<i class=\"material-icons\">";
              for ($i=count($historico)-5; $i > -1 ; $i-- ){ 
                    # code...
                    if($historico[count($historico) - 4]['hospital'] == $historico[$i]['hospital'] && $historico[count($historico) - 4]['especialidade'] == $historico[$i]['especialidade'] ){
                      if ($historico[count($historico) - 4]['vaga'] > $historico[$i]['vaga']) {
                        # code...
                       echo "keyboard_arrow_up";
                      break;
                      }
                      else{
                       echo "keyboard_arrow_down";
                      break;
                      }
                    }
              }
              echo "</i>\n";
              echo "\t\t\t\t<span class=\"text text-lighten-5\">{$historico[count($historico) - 4]['hospital']}</span>\n";
              echo "\t\t\t</p>\n";  
                            ?>
            </div>
          
          <?php 
              if ($historico[count($historico) - 4]['vaga'] < 4) 
                echo "<div class=\"card-action red darken-1 \">\n";
              else if ($historico[count($historico) - 4]['vaga'] < 7) 
                echo "<div class=\"card-action amber darken-3\">\n";
              else if ($historico[count($historico) - 4]['vaga'] < 10)
                echo "<div class=\"card-action cyan darken-1\">\n";
              else
                echo "<div class=\"card-action teal darken-1\">\n";
              
              
            ?>
              <div class="center-align" id="miniCard-4" >
                <canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas>
              </div>
            </div>
          </div>  
        </div>
     </div>
      <div class="row" >
        <div class="col l12" >
          <div class="card hide-on-med-and-down" >
            <div class="card-move-up waves-effect waves-block waves-light white-text">
              <div class="move-up gradient-45deg-light-blue-cyan white-text ">
                <div>
                  <div class="chart-title white-text center">
                    <span class="flow-text bold" >Monitoramento Vaga</span>
                  </div>
                   <hr>
                   <div class="transparent">
                      <ul class="tabs transparent" id="tabela" >
                        <li class="tab col s3 " id="tabela-queimado" ><a href="#myChartQueimados" class="white-text waves-effect waves-light active">Queimados</a></li>
                        <li class="tab col s3 " id="tabela-cardiaco"><a href="#myChartCardiacos" class="white-text waves-effect waves-light" >Cardiacos</a></li>
                        <li class="tab col s3 " id="tabela-obstetra" ><a href="#myChartObstetra" class="white-text waves-effect waves-light"  >Obstetrica</a></li>
                        <li class="tab col s3 " id="tabela-ortopedica"><a href="#myChartOrtopedica" class="white-text waves-effect waves-light"  >Ortopedica</a></li>
                      </ul>
                    </div>
                     
                  
                </div>
                  <div id="myChartQueimados" >
                    <canvas id="ChartQueimados" height="130" > </canvas>
                  </div>
                  <div id="myChartCardiacos"  >
                    <canvas id="ChartCardiacos" height="130" > </canvas>
                  </div>
                  <div id="myChartObstetra"  >
                    <canvas id="ChartObstetra" height="130" > </canvas>
                  </div>
                  <div id="myChartOrtopedica"  >
                    <canvas id="ChartOrtopedica" height="130" > </canvas>
                  </div>
                  
              </div>
            </div>
          </div>
        </div>
      </div> 
      <div class="row">
        <div class="col s12 l10 offset-l1">
          <table class="responsive-table highlight">
            <thead>
              <th>Data e Hora</th>
              <th>Hospital</th>
              <th>Especialidade</th>
              <th>Vaga</th>
            </thead>
            <tbody>
             <tr>
              <td>01/01/2019 13:00</td>   
              <td>Restauração</td>   
              <td>Cardiaco</td>   
              <td>7</td>   
             </tr>
             <tr>
              <td>01/01/2019 13:00</td>   
              <td>Restauração</td>   
              <td>Cardiaco</td>   
              <td>7</td>   
             </tr>
             <tr>
              <td>01/01/2019 13:00</td>   
              <td>Restauração</td>   
              <td>Cardiaco</td>   
              <td>7</td>   
             </tr>
            </tbody>
          </table>
        </div>
       </div>
      </div>
     </div>
   </section>
      

      </div>
      <!-- END WRAPPER -->
    </div>
   
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    <footer class="page-footer gradient-45deg-light-blue-cyan">
        <div class="footer-copyright">
          <div class="container">
            <span>Copyright ©
              <script type="text/javascript">
                document.write(new Date().getFullYear());
              </script> <a class="grey-text text-lighten-2" href="#" target="_blank">SUPER.BEDS</a> Todos os direitos garantidos</span>
            <span class="right hide-on-small-only" > Adaptado por <a href="#" class="white-text">Iran Junior</a></span>
          </div>
        </div>
    </footer>
    <!-- END FOOTER -->
    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="vendors/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>  
    <script type="text/javascript" src="Chart.js-2.7.3/Chart.js-2.7.3/dist/Chart.js"></script>  
    <script type="text/javascript" src="js/jquery-sparkline.js" ></script>
 

  <script >
  
     var ctxQueimados = document.getElementById("ChartQueimados").getContext('2d');
     var ctxObstetra = document.getElementById("ChartObstetra").getContext('2d');
     var ctxCardiacos = document.getElementById("ChartCardiacos").getContext('2d');
     var ctxOrtopedica = document.getElementById("ChartOrtopedica").getContext('2d');

     var divQueima = document.getElementById('myChartQueimados');  
     var divObst = document.getElementById('myChartObstetra');  
     var divCard = document.getElementById('myChartCardiacos');  
     var divOrto = document.getElementById('myChartOrtopedica');  
     
    

  
  var myChartQueimados = new Chart(ctxQueimados, {
      type: 'line',
       data: {

        labels: [<?php for($i=count($vaga_queimado) - 6;$i < count($vaga_queimado);$i++){
       $hora = explode(" ", $vaga_queimado[$i]['dataehora']); $hora = explode(":", $hora[1]);
       $hora = $hora[0].":".$hora[1]; 
       

       echo $i== count($vaga_queimado) -1 ?  "\"{$hora}\""  : "\"{$hora}\",";}?>],
datasets: [{
            label: 'Restauração',
            data: [<?php 
                for($i= 1;$i < count($arrayRestQuei);$i++){
                  echo $i== count($arrayRestQuei)- 1 ?  "{$arrayRestQuei[$i]}"  : "{$arrayRestQuei[$i]},";
                  
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
                for($i= 1;$i < count($arrayGetQuei);$i++){
                  echo $i== count($arrayGetQuei) -1 ?  "{$arrayGetQuei[$i]}"  : "{$arrayGetQuei[$i]},";
                  
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
                for($i= 1;$i < count($arrayOswQuei);$i++){
                  echo $i== count($arrayOswQuei) -1 ?  "{$arrayOswQuei[$i]}"  : "{$arrayOswQuei[$i]},";
                  
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
                for($i= 1;$i < count($arrayMigQuei);$i++){
                  echo $i== count($arrayMigQuei) -1 ?  "{$arrayMigQuei[$i]}"  : "{$arrayMigQuei[$i]},";
                  
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

for($i=count($vaga_queimado) - 6;$i< count($vaga_queimado);$i++){
       
       $data = explode(" ", $vaga_queimado[$i]['dataehora']);
       $dataAtual = quebraData($data[0]);
       if($i == count($vaga_queimado) - 6){
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

        labels: [<?php for($i= count($vaga_obstetrica) - 6;$i < count($vaga_obstetrica);$i++){
       $hora = explode(" ", $vaga_obstetrica[$i]['dataehora']); $hora = explode(":", $hora[1]);
       $hora = $hora[0].":".$hora[1]; 
       

       echo $i== count($vaga_obstetrica) -1 ?  "\"{$hora}\""  : "\"{$hora}\",";}?>],
datasets: [{
            label: 'Restauração',
            data: [<?php 
                for($i= count($vaga_obstetrica) - 6 ;$i < count($arrayRestObs);$i++){
                  echo $i== count($arrayRestObs) -1 ?  "{$arrayRestObs[$i]}"  : "{$arrayRestObs[$i]},";
                  
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
                for($i= count($vaga_obstetrica) - 6;$i < count($arrayGetObs);$i++){
                  echo $i== count($arrayGetObs) -1 ?  "{$arrayGetObs[$i]}"  : "{$arrayGetObs[$i]},";
                  
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
                for($i= count($vaga_obstetrica) - 6;$i < count($arrayOswObs);$i++){
                  echo $i== count($arrayOswObs) - 1?  "{$arrayOswObs[$i]}"  : "{$arrayOswObs[$i]},";
                  
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
                for($i= count($vaga_obstetrica) - 6;$i < count($arrayMigObs);$i++){
                  echo $i== count($arrayMigObs) - 1?  "{$arrayMigObs[$i]}"  : "{$arrayMigObs[$i]},";
                  
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

for($i= count($vaga_obstetrica) - 6;$i< count($vaga_obstetrica);$i++){
       
       $data = explode(" ", $vaga_obstetrica[$i]['dataehora']);
       $dataAtual = quebraData($data[0]);
       if($i == count($vaga_obstetrica) - 1){
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


    
var myChartCardiacos = new Chart(ctxCardiacos, {
      type: 'line',
       data: {

        labels: [<?php for($i= count($vaga_cardiaco) - 6;$i < count($vaga_cardiaco);$i++){
       $hora = explode(" ", $vaga_cardiaco[$i]['dataehora']); $hora = explode(":", $hora[1]);
       $hora = $hora[0].":".$hora[1]; 
       

       echo $i== count($vaga_cardiaco) -1 ?  "\"{$hora}\""  : "\"{$hora}\",";}?>],
datasets: [{
            label: 'Restauração',
            data: [<?php 
                for($i= count($vaga_cardiaco) - 6 ;$i < count($arrayRestCard);$i++){
                  echo $i== count($arrayRestCard) -1 ?  "{$arrayRestCard[$i]}"  : "{$arrayRestCard[$i]},";
                  
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
                for($i= count($vaga_cardiaco) - 6;$i < count($arrayGetCard);$i++){
                  echo $i== count($arrayGetCard) - 1 ?  "{$arrayGetCard[$i]}"  : "{$arrayGetCard[$i]},";
                  
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
                for($i= count($vaga_cardiaco) - 6;$i < count($arrayOswCard);$i++){
                  echo $i== count($arrayOswCard) - 1 ?  "{$arrayOswCard[$i]}"  : "{$arrayOswCard[$i]},";
                  
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
                for($i= count($vaga_cardiaco) - 6;$i < count($arrayMigCard);$i++){
                  echo $i== count($arrayMigCard) - 1 ?  "{$arrayMigCard[$i]}"  : "{$arrayMigCard[$i]},";
                  
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

for($i= count($vaga_cardiaco) - 6;$i< count($vaga_cardiaco);$i++){
       
       $data = explode(" ", $vaga_cardiaco[$i]['dataehora']);
       $dataAtual = quebraData($data[0]);
       if($i == count($vaga_cardiaco) - 1){
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

        labels: [<?php for($i= count($vaga_ortopedica) - 6;$i < count($vaga_ortopedica);$i++){
       $hora = explode(" ", $vaga_ortopedica[$i]['dataehora']); $hora = explode(":", $hora[1]);
       $hora = $hora[0].":".$hora[1]; 
       

       echo $i== count($vaga_ortopedica) -1 ?  "\"{$hora}\""  : "\"{$hora}\",";}?>],
datasets: [{
            label: 'Restauração',
            data: [<?php 
                for($i= count($vaga_ortopedica) - 6 ;$i < count($arrayRestOrt);$i++){
                  echo $i== count($arrayRestOrt) - 1?  "{$arrayRestOrt[$i]}"  : "{$arrayRestOrt[$i]},";
                  
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
                for($i=  count($vaga_ortopedica) - 6;$i < count($arrayGetOrt);$i++){
                  echo $i== count($arrayGetOrt) - 1?  "{$arrayGetOrt[$i]}"  : "{$arrayGetOrt[$i]},";
                  
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
                for($i= count($vaga_ortopedica) - 6;$i < count($arrayOswOrt);$i++){
                  echo $i== count($arrayOswOrt) - 1?  "{$arrayOswOrt[$i]}"  : "{$arrayOswOrt[$i]},";
                  
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
                for($i= count($vaga_ortopedica) - 6;$i < count($arrayMigOrt);$i++){
                  echo $i== count($arrayMigOrt) - 1 ?  "{$arrayMigOrt[$i]}"  : "{$arrayMigOrt[$i]},";
                  
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

for($i= count($vaga_ortopedica) - 6;$i< count($vaga_ortopedica);$i++){
       
       $data = explode(" ", $vaga_ortopedica[$i]['dataehora']);
       $dataAtual = quebraData($data[0]);
       if($i == count($vaga_ortopedica) - 1){
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



$(function() {

    $("#miniCard-1").sparkline([<?php
        $contador = 0;
        $dataCard1 = "";
         for ( $i = 0; $i < count($historico); $i++) {
           if ($historico[count($historico)-1]['especialidade'] == $historico[$i]['especialidade']  && $historico[count($historico) - 1]['hospital'] == $historico[$i]['hospital'] && $contador < 20  ) {

              $dataCard1 .=" {$historico[$i]['vaga']} ,";

           }

         }
         $dataCard1 = substr_replace($dataCard1, ' ', strlen($dataCard1) - 1);
         echo "{$dataCard1}";
         ;

      ?>],{
        type:'bar',
        height: '25',
        barWidth: 7,
        barSpacing: 4,
        barColor: '#B2EBF2',
        zeroColor: '#81D4FA'
    });

    $("#miniCard-2").sparkline([<?php
        $contador = 0;
        $dataCard1 = "";
         for ( $i = 0; $i < count($historico) -1; $i++) {
           if ($historico[count($historico)-2]['especialidade'] == $historico[$i]['especialidade']  && $historico[count($historico) - 2]['hospital'] == $historico[$i]['hospital'] && $contador < 20  ) {

              $dataCard1 .=" {$historico[$i]['vaga']} ,";

           }

         }
         $dataCard1 = substr_replace($dataCard1, ' ', strlen($dataCard1) - 1);
         echo "{$dataCard1}";
         ;

      ?>],{
        type:'bar',
        height: '25',
        barWidth: 7,
        barSpacing: 4,
        barColor: '#B2EBF2',
        zeroColor: '#81D4FA'

    });

    $("#miniCard-3").sparkline([<?php
        $contador = 0;
        $dataCard1 = "";
         for ( $i = 0; $i < count($historico) -2; $i++) {
           if ($historico[count($historico)-3]['especialidade'] == $historico[$i]['especialidade']  && $historico[count($historico) - 3]['hospital'] == $historico[$i]['hospital'] && $contador < 20  ) {

              $dataCard1 .=" {$historico[$i]['vaga']} ,";

           }

         }
         $dataCard1 = substr_replace($dataCard1, ' ', strlen($dataCard1) - 1);
         echo "{$dataCard1}";
         ;

      ?>],{
        type:'bar',
        height: '25',
        barWidth: 7,
        barSpacing: 4,
        barColor: '#B2EBF2',
        zeroColor: '#81D4FA'

    });

    $("#miniCard-4").sparkline([<?php
        $contador = 0;
        $dataCard1 = "";
         for ( $i = 0; $i < count($historico) -3; $i++) {
           if ($historico[count($historico)-4]['especialidade'] == $historico[$i]['especialidade']  && $historico[count($historico) - 4]['hospital'] == $historico[$i]['hospital'] && $contador < 20  ) {

              $dataCard1 .=" {$historico[$i]['vaga']} ,";

           }

         }
         $dataCard1 = substr_replace($dataCard1, ' ', strlen($dataCard1) - 1);
         echo "{$dataCard1}";
         ;

      ?>],{
        type:'bar',
        tooltipFormat: '{{value}}',
        height: '25',
        barWidth: 7,
        barSpacing: 4,
        barColor: '#B2EBF2',
        zeroColor: '#81D4FA'
    });

});

 </script>

  </body>
</html>
