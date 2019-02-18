<?php
  include 'config.php';
  include 'connection.php';
  include 'config_hospitais.php';

session_start();
      if (isset($_SESSION['login'])) {
        # code...
      }
       else if(!isset($_COOKIE['login'])){
        echo ("<script>alert('Não está logado'); </script>");
        echo ("<script>location.href='login.html';</script>");
      }
      


?>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Supervisório de leitos hospitalares, criado para agilizar a transferencia de pacientes que seguem aguardando atendemento especializado">
    <meta name="keywords" content="supervisório, leitos, supervisório hospitalar, tecnologia hospitalar, superviório na saúde, materialize,beds">
    <title>Estatisticas | IranTCC</title>
    <!-- Favicons-->
    <link rel="icon" href="images/avatar/avatar-7.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="css/materialize.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
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
                    <img src="images/logo/materialize-logo.png" alt="" sizes="50x70" >
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
                  <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav"><?php echo isset($_SESSION['nome']) ? $_SESSION['nome']  : $_COOKIE['funcao']?><i class="mdi-navigation-arrow-drop-down right"></i></a>
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
                  <a href="#" class="waves-effect waves-cyan">
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
      <section>
       <div class="container">
         <div class="content">
          <div class="row">
            <div class="col s12 l6">
              <div class="card-panel cyan gradient-shadow"> 
               <div class="row">
                <div class="col m6 l6">
                <div class="left"> 
                 <h5 class="hide-on-small-only"> Mês de <strong id="strong">Janeiro</strong></h5>
                 <h5 id="strong-small" class="hide-on-med-and-up">Janeiro</h5>
               </div>
              </div>
               <div class="col m6 l6">
                  <a class="btn dropdown-settings waves-effect waves-light" data-activates="meses-dropdown">
                   <span >Meses</span>
                  <i class="material-icons right">arrow_drop_down</i>
                 </a>
                <ul id="meses-dropdown" class="dropdown-content dropdown-style">
                 <li>
                   <a  class="grey-text text-darken-2">Janeiro</a>
                 </li>
                 <li>
                   <a  class="grey-text text-darken-2">Fevereiro</a>
                 </li>
                 <li>
                   <a  class="grey-text text-darken-2">Marco</a>
                 </li>
                 <li>
                   <a  class="grey-text text-darken-2">Abril</a>
                 </li>
                 <li>
                   <a  class="grey-text text-darken-2">Maio</a>
                 </li>
                 <li>
                   <a  class="grey-text text-darken-2">Junho</a>
                 </li>
                 <li>
                   <a  class="grey-text text-darken-2">Julho</a>
                 </li>
                 <li>
                   <a  class="grey-text text-darken-2">Agosto</a>
                 </li>
                 <li>
                   <a  class="grey-text text-darken-2">Setembro</a>
                 </li>
                 <li>
                   <a  class="grey-text text-darken-2">Outubro</a>
                 </li>
                 <li>
                   <a  class="grey-text text-darken-2">Novembro</a>
                 </li>
                 <li>
                   <a  class="grey-text text-darken-2">Dezembro</a>
                 </li>
               </ul>
              </div>
              
            </div>
              <div class="row">
                <div class="col s12">
                 <canvas id="mediaMensal" class="col s12 hide-on-med-and-down" height="150" ></canvas>
                </div>
              </div>
              </div>
            </div>
            <div class="col s12 l6">
              <div  class="card-panel purple lighten-4 gradient-shadow ">
                <div class="row">
                  <div class="col s12">
                    <div class="left">
                      <h6 >Variação de vagas num mês</h6>
                    </div>
                    <div class="right"> 
                     <a class="button waves-effect waves-light notification-button" data-activates="meses-dropdown-2">
                       <h6 id="mes-media-dia" class="left ">Janeiro</h6>
                      <i class="material-icons right">arrow_drop_down</i>
                     </a>
                    <ul id="meses-dropdown-2" class="dropdown-content dropdown-style">
                       <li>
                         <a  class="grey-text text-darken-2">Janeiro</a>
                       </li>
                       <li>
                         <a  class="grey-text text-darken-2">Fevereiro</a>
                       </li>
                       <li>
                         <a  class="grey-text text-darken-2">Marco</a>
                       </li>
                       <li>
                         <a  class="grey-text text-darken-2">Abril</a>
                       </li>
                       <li>
                         <a  class="grey-text text-darken-2">Maio</a>
                       </li>
                       <li>
                         <a  class="grey-text text-darken-2">Junho</a>
                       </li>
                       <li>
                         <a  class="grey-text text-darken-2">Julho</a>
                       </li>
                       <li>
                         <a  class="grey-text text-darken-2">Agosto</a>
                       </li>
                       <li>
                         <a  class="grey-text text-darken-2">Setembro</a>
                       </li>
                       <li>
                         <a  class="grey-text text-darken-2">Outubro</a>
                       </li>
                       <li>
                         <a  class="grey-text text-darken-2">Novembro</a>
                       </li>
                       <li>
                         <a  class="grey-text text-darken-2">Dezembro</a>
                       </li>
                     </ul>
                    </div>
                  </div>
                </div>
               <div class="row">
                 <div class="col s12">
                  <canvas id="mediaDia" class="col s12 hide-on-med-and-down" height="170" ></canvas>
                 </div>
               </div>
              </div>
            </div>
          </div>  
          <div class="row">
           <div class="col s12 m6 l8">
            <div  class="flight-card card z-depth-2">
            <div class="card-header deep-orange accent-2">
              <div class="card-title">
                <h4 class="flight-card-title" >Media de Uso</h4>
                <p class="flight-card-date" id="task-card-date-mes"></p>
              </div>
           </div>
              <div class="card-content white">
               <div class="row" >
                  <canvas id="canvasLeitosMaisProcurados" height="119" ></canvas>
                </div>
              </div>
            </div>
           </div>
           <div class="col s12 m6 l4 ">
            <ul id="task-card" class="collection with-header z-depth-2">
             <li class="collection-header teal accent-4">
               <h4 class="task-card-title">Nivel de Aperto</h4>
               <p class="task-card-date" id="task-card-date-atual"></p>
             </li>
             <li class="collection-item ">
              <span>Queimados</span>
               <div class="progress-container">
                <div id="barQueimados"   class="progress-style center"></div>
              </li>
              <li class="collection-item ">
                <span>Cardiacos</span>
               <div class="progress-container">
                <div id="barCardiacos"   class="progress-style center"></div>
              </li>
              <li class="collection-item ">
                <span>Obstetrica</span>
                <div class="progress-container">
                <div id="barObstetrica"   class="progress-style center"></div>
               </div>
              </li>
              <li class="collection-item ">
               <span>Ortopedica</span>
                <div class="progress-container">
                <div id="barOrtopedica"   class="progress-style center"></div>
               </div>
             <br>
              </li>

           </ul>
          </div>
          <div class="col s12 m6 l4">
            <div class="card-panel gradient-45deg-red-pink gradient-shadow" style="display: none;">
              <div class="row center">
                <h5>Previsão De Vagas</h5>
              </div>
              <div class="row">
                <div class="carousel carousel-slider center" style="max-height: 274px; box-shadow: none; border: none;">
                  <div class="carousel-item ">
                   <div class="card cyan">
                    <div class="card-stats-content">
                      <span>Melhoras Nos Proximos Dias</span>
                      <h5 class="center">Cardiacos</h5>
                      <h6 class="center">Hospital da Restauração</h6>
                    </div>
                    <div class="card-action cyan darken-1" style="height: 60px">
                      <div id="esquemaPrevisao1" class="center-align">
                        <canvas id="miniCanvas1" class="" style="display: inline-block; width: 100%; vertical-align: top;"></canvas>   
                      </div>
                    </div>
                   </div>
                  </div>
                  <div class="carousel-item ">
                  <div class="card cyan">
                    <div class="card-stats-content">
                      <span>Melhoras Nos Proximos Dias</span>
                      <h5 class="center">Cardiacos</h5>
                      <h6 class="center">Hospital da Restauração</h6>
                    </div>
                    <div class="card-action cyan darken-1" style="height: 60px">
                      <div id="esquemaPrevisao2" class="center-align">
                        <canvas id="miniCanvas2" class="" style="display: inline-block; width: 100%; vertical-align: top;"></canvas>   
                      </div>
                    </div>
                   </div>
                  </div>
                  <div class="carousel-item ">
                  <div class="card cyan">
                    <div class="card-stats-content">
                      <span>Melhoras Nos Proximos Dias</span>
                      <h5 class="center">Cardiacos</h5>
                      <h6 class="center">Hospital da Restauração</h6>
                    </div>
                    <div class="card-action cyan darken-1" style="height: 60px">
                      <div id="esquemaPrevisao3" class="center-align">
                        <canvas id="miniCanvas3" class="" style="display: inline-block; width: 100%; vertical-align: top;"></canvas>   
                      </div>
                    </div>
                   </div>
                  </div>
                  <div class="carousel-item ">
                  <div class="card cyan">
                    <div class="card-stats-content">
                      <span>Melhoras Nos Proximos Dias</span>
                      <h5 class="center">Cardiacos</h5>
                      <h6 class="center">Hospital da Restauração</h6>
                    </div>
                    <div class="card-action cyan darken-1" style="height: 60px">
                      <div id="esquemaPrevisao4" class="center-align">
                        <canvas id="miniCanvas4" class="" style="display: inline-block; width: 100%; vertical-align: top;"></canvas>   
                      </div>
                    </div>
                   </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
         </section>

    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    <footer class="page-footer gradient-45deg-light-blue-cyan">
        <div class="footer-copyright">
          <div class="container">
            <span>Copyright ©
              <script type="text/javascript">
                document.write(new Date().getFullYear());
              </script> <a class="grey-text text-lighten-2" href="#" target="_blank">SUPERBEDS</a> All rights reserved.</span>
            <span class="right hide-on-small-only" > Adaptado por <a href="#">Iran Junior</a></span>
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
    <!-- plugin para Chart.js-->
    <script type="text/javascript" src="../Chart.js-2.7.3/Chart.js-2.7.3/dist/Chart.js"></script>
    <script type="text/javascript" src="../Chart.js-2.7.3/Chart.js-2.7.3/samples/utils.js"></script>
    <script type="text/javascript" src="js/jquery-sparkline.js" ></script>
    <!-- SCRIPT PARA ATUALIZAR DIA NO CARTAO DO APERTO-->
    <script type="text/javascript">
   var dayName = new Array ("domingo", "segunda", "terça", "quarta", "quinta", "sexta", "sábado");
   var monName = new Array ("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Agosto", "Outubro", "Novembro", "Dezembro");
      now = new Date();
      
      
        document.getElementById('task-card-date-atual').innerHTML = " " +now.getDate() + " de "+ monName[now.getMonth()] + " de " + now.getFullYear();
      
        document.getElementById('task-card-date-mes').innerHTML = " " + monName[now.getMonth()] + " de " + now.getFullYear(); ;


    </script>
    <!-- SCRIPT PARA ATUALIZAR GRAFICO DE PREVISAO, GRAFICO DE BARRAS E LINHAS-->
    <script>
      $(function() {
          $("#esquemaPrevisao1").sparkline( [4,5,3,4,5,6,7,4,0,7]  , {
          type: 'bar',
          height: '25',
          barColor: '#66CCFF',
          zeroColor: '#660000',
          barWidth: 8,
          barSpacing: 2

         });
          $("#esquemaPrevisao1").sparkline([4,5,3,4,5,6,7,4,0,7,3,6], {
          composite: true,
          type: 'line',
          width: '100%',
          lineWidth: 2,
          lineColor: '#ffff66',
          fillColor: 'rgba(255, 82, 82, 0)',

         });
          $("#esquemaPrevisao2").sparkline( [4,5,3,4,5,6,7,4,0,7]  , {
          type: 'bar',
          height: '25',
          barColor: '#66CCFF',
          zeroColor: '#660000',
          barWidth: 8,
          barSpacing: 2

         });
          $("#esquemaPrevisao2").sparkline([4,5,3,4,5,6,7,4,0,7,3,6], {
          composite: true,
          type: 'line',
          width: '100%',
          lineWidth: 2,
          lineColor: '#ffff66',
          fillColor: 'rgba(255, 82, 82, 0)',

         });
          $("#esquemaPrevisao3").sparkline( [4,5,3,4,5,6,7,4,0,7]  , {
          type: 'bar',
          height: '25',
          barColor: '#66CCFF',
          zeroColor: '#660000',
          barWidth: 8,
          barSpacing: 2

         });
          $("#esquemaPrevisao3").sparkline([4,5,3,4,5,6,7,4,0,7,3,6], {
          composite: true,
          type: 'line',
          width: '100%',
          lineWidth: 2,
          lineColor: '#ffff66',
          fillColor: 'rgba(255, 82, 82, 0)',

         });
          $("#esquemaPrevisao4").sparkline( [4,5,3,4,5,6,7,4,0,7]  , {
          type: 'bar',
          height: '25',
          barColor: '#66CCFF',
          zeroColor: '#660000',
          barWidth: 8,
          barSpacing: 2

         });
          $("#esquemaPrevisao4").sparkline([4,5,3,4,5,6,7,4,0,7,3,6], {
          composite: true,
          type: 'line',
          width: '100%',
          lineWidth: 2,
          lineColor: '#ffff66',
          fillColor: 'rgba(255, 82, 82, 0)',

         });
          




      });
      
        
    </script>

    <script >
      $('.carousel.carousel-slider').carousel({
          fullWidth: true,
          indicators: true
        });
    </script>
    <!-- script para o nivel de aperto-->
    <script type="text/javascript" id="esconde">

      var barQueimados = document.getElementById('barQueimados');
      var barCardiacos = document.getElementById('barCardiacos');
      var barObstetrica = document.getElementById('barObstetrica');
      var barOrtopedica = document.getElementById('barOrtopedica');
      var xhrNivelQuei;
      var xhrNivelCard;
      var xhrNivelObst;
      var xhrNivelOrto;
      var widthQuei = 0;
      var widthCard = 0;
      var widthObst = 0;
      var widthOrto = 0;
      var resQuei;
      var resCard;
      var resObst;
      var resOrto;
      var idQu ;
      var idCd ;
      var idOb ;
      var idOr ;
      if(window.XMLHttpRequest)
        xhrNivelQuei = new XMLHttpRequest();
      else
        xhrNivelQuei = new ActiveXObject("Microsoft.XMLHTTP");

      if(window.XMLHttpRequest)
        xhrNivelCard = new XMLHttpRequest();
      else
        xhrNivelCard = new ActiveXObject("Microsoft.XMLHTTP");
      if(window.XMLHttpRequest)
        xhrNivelObst = new XMLHttpRequest();
      else
        xhrNivelObst = new ActiveXObject("Microsoft.XMLHTTP");
      if(window.XMLHttpRequest)
        xhrNivelOrto = new XMLHttpRequest();
      else
        xhrNivelOrto = new ActiveXObject("Microsoft.XMLHTTP");
      

      

    </script>
    <!-- Script para mostrar Qual especialidade mais solicitada-->
    <script type="text/javascript">
      

      var xhrMais;
      if(window.XMLHttpRequest)
        xhrMais = new XMLHttpRequest();
      else 
        xhrMais = new ActiveXObject("Microsoft.XMLHTTP");



    </script>
    <script type="text/javascript">
      var maisSolicitado = document.getElementById('canvasLeitosMaisProcurados').getContext('2d');
      var maisSolicitadoChart = new Chart(maisSolicitado, {
          type:'doughnut',
          data: {
                labels:[
                  'Queimados ',
                  'Obstetrica',
                  'Cardiacos  ',
                  'Ortopedica'
                ],
                datasets:[{
                    data:[
                    ],
                    backgroundColor:[
                      
                      '#155FA0',
                      '#5AA4E5',
                      '#1E88E5',
                      '#FDD835'
                    ],
                    label: '',
                    borderColor: 'rgba(255,255,255, 0.9)',
                    borderWidth: 1,
                    hoverBackgroundColor: [
                      'rgba(21,95,160,0.6)',
                      'rgba(90,164,229, 0.6)',
                      'rgba(30,136,229,0.6)',
                      'rgba(253,216,53,0.6)'
                    ],
              }],
          },
          options:{
            legend: {
              display: true,
              position: 'right',
              labels: {
                  fontColor: 'black',
                  fontSize: 16,
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica' ",
                  padding: 35,
                }
            }
          
          }
          
      });

    </script>
    <!--Script para a variaçao de vagas por dia -->
    <script type="text/javascript">
     var mesDropdown2 = document.getElementById("meses-dropdown-2");
     var mediaDia = document.getElementById('mediaDia').getContext('2d');


      var xhrDia;
        if(window.XMLHttpRequest){
          xhrDia = new XMLHttpRequest();
        }
        else{
          xhrDia = new ActiveXObject("Microsoft.XMLHTTP");
        }


        mesDropdown2.addEventListener("click", function(el){
          
          document.getElementById("mes-media-dia").innerHTML = el.target.text;
          
           
          xhrDia.open('GET', "variadiaestatistica.php?mes=" + el.target.text, true);
          
          xhrDia.send();
          


          xhrDia.onreadystatechange = function(){
          if (xhrDia.status == 200 && xhrDia.readyState == 4) {
            var respostaVaria = JSON.parse(xhrDia.responseText);
            for(var y  = 0; y< 31; y++){
            mediaDiaChart.data.datasets[0].data[y] = 0;
          } 
              for(var i in respostaVaria){
                mediaDiaChart.data.labels[i] = respostaVaria[i].dia;
                mediaDiaChart.data.datasets[0].data[i] = respostaVaria[i].media;
              }
           
            window.mediaDiaChart.update();
          }
          
        }
        });

    
    </script>
    <script type="text/javascript">
      var mediaDia = document.getElementById('mediaDia').getContext('2d');
      var mediaDiaChart = new Chart(mediaDia, {
          type: 'line',
          data: {
            labels: [],
            datasets:[{
              label: 'Variação num mês',
              data: [
                
              ],
              fill: false,
                borderColor:'rgba(66, 134, 244,0.8)',
                borderWidth: 2,

            }],
          },

          options:{
              elements:{
                point: {
                  pointStyle:'rect',
                },
                rectangle: {
                  borderWidth: 2
                }
              },
              resposive: true,
              legend:{
                display: false,
                position: 'bottom',
                labels: {
                  fontColor: 'black',
                  fontSize: 12,
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica' "
                }
              },
              scales: {
            yAxes: [{
                scaleLabel:{
                  display : true,
                  labelString: 'Vagas',
                  lineHeight: 2,
                  fontColor: "black",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 13
                },
                ticks: {
                    beginAtZero:true,
                    fontColor: "black",
                    fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                    fontSize: 12
                }

            }],
            xAxes: [{
                scaleLabel:{
                  display: true,
                  lineHeight: 2,
                  labelString: 'Dias no mês',
                  fontColor: "black",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 16

                },
                ticks:{
                  beginAtZero: false,
                  fontColor: "black",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 12
                }

            }],
            }
          }


      });

    </script>
    <!--Script para <a> mostrar o nome do mês-->
    <script >
      var mes = document.getElementById("meses-dropdown");
      
      var mediaMensal = document.getElementById('mediaMensal').getContext('2d');
        var xhr;
        if(window.XMLHttpRequest){
          xhr = new XMLHttpRequest();
        }
        else{
          xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }

      
        


        mes.addEventListener("click", function(e){
          document.getElementById("strong").innerHTML = e.target.text;
          document.getElementById("strong-small").innerHTML = e.target.text;
          xhr.open("GET", "teste_estatistica.php?mes=" + e.target.text, true)
          xhr.send();
    
          });
        xhr.onreadystatechange = function(){
          if (xhr.status == 200 && xhr.readyState == 4) {
          var res = xhr.response;
        
           var resposta = res.split(", ");
        
          mediaMensalChart.data.datasets[0].data[0] = parseFloat(resposta[0]) ;
          mediaMensalChart.data.datasets[0].data[1] = parseFloat(resposta[1]) ;
          mediaMensalChart.data.datasets[0].data[2] = parseFloat(resposta[2]) ;
          mediaMensalChart.data.datasets[0].data[3] = parseFloat(resposta[3]) ;
  
          window.mediaMensalChart.update();
          }
        }
        window.onload=function(){
          xhr.open("GET", "teste_estatistica.php?mes=Janeiro", true)
          xhr.send();
          if (xhr.status == 200 && xhr.readyState == 4) {
          var res = xhr.response;
           var resposta = res.split(", ");
          mediaMensalChart.data.datasets[0].data[0] = parseFloat(resposta[0]) ;
          mediaMensalChart.data.datasets[0].data[1] = parseFloat(resposta[1]) ;
          mediaMensalChart.data.datasets[0].data[2] = parseFloat(resposta[2]) ;
          mediaMensalChart.data.datasets[0].data[3] = parseFloat(resposta[3]) ;

          window.mediaMensalChart.update();
          }
          xhrDia.open('GET', "variadiaestatistica.php?mes=Janeiro", true);
          xhrDia.send();
          xhrDia.onreadystatechange = function(){
          if (xhrDia.status == 200 && xhrDia.readyState == 4) {
            var respostaVaria = JSON.parse(xhrDia.responseText);
            
              for(var i in respostaVaria){
                mediaDiaChart.data.labels[i] = respostaVaria[i].dia;
                mediaDiaChart.data.datasets[0].data[i] = respostaVaria[i].media;
              }
           
            window.mediaDiaChart.update();
          }
        }
          xhrMais.open('GET', "maisprocuradosest.php", true);
          xhrMais.send();

          xhrMais.onreadystatechange = function(){
            if (xhrMais.status == 200 && xhrMais.readyState == 4) {
                var resSol = xhrMais.response;
                var respostaSol = resSol.split(", ");
                maisSolicitadoChart.data.datasets[0].data[0] = parseFloat(respostaSol[0]) ;
                maisSolicitadoChart.data.datasets[0].data[1] = parseFloat(respostaSol[1]) ;
                maisSolicitadoChart.data.datasets[0].data[2] = parseFloat(respostaSol[2]) ;
                maisSolicitadoChart.data.datasets[0].data[3] = parseFloat(respostaSol[3]) ;

          window.maisSolicitadoChart.update();

            }
          }
        xhrNivelQuei.open('GET', "apertoleitosqueimados.php", true);
        xhrNivelQuei.send();

        xhrNivelQuei.onreadystatechange = function(){
          if (xhrNivelQuei.status == 200 && xhrNivelQuei.readyState == 4) {
              var respostaNivelQuei =parseFloat(xhrNivelQuei.response);
              resQuei = respostaNivelQuei * 100;
              widthQuei =0;
              barQueimados.style.width = widthQuei + '%';
              barQueimados.innerHTML = widthQuei * 1  + '%'
              idQu = setInterval(frameQu, 10);
          }

        }
        function frameQu() {
            if (widthQuei >= resQuei) {
              clearInterval(idQu);
            } else {
              widthQuei++; 
              barQueimados.style.width = widthQuei + '%'; 
              barQueimados.innerHTML = widthQuei * 1  + '%';
            }
          }
        xhrNivelCard.open('GET', "apertoleitoscardiacos.php", true);
        xhrNivelCard.send();

        xhrNivelCard.onreadystatechange = function(){
          if (xhrNivelCard.status == 200 && xhrNivelCard.readyState == 4) {
              var respostaNivelCard =parseFloat(xhrNivelCard.response);
              resCard = respostaNivelCard * 100;
              widthCard =0;
              barCardiacos.style.width = widthCard + '%';
              barCardiacos.innerHTML = widthCard * 1  + '%'
              idCd = setInterval(frameCd, 10);
          }

        }
        function frameCd() {
            if (widthCard >= resCard) {
              clearInterval(idCd);
            } else {
              widthCard++; 
              barCardiacos.style.width = widthCard + '%'; 
              barCardiacos.innerHTML = widthCard * 1  + '%';
            }
          }

        xhrNivelObst.open('GET', "apertoleitosobstetrica.php", true);
        xhrNivelObst.send();

        xhrNivelObst.onreadystatechange = function(){
          if (xhrNivelObst.status == 200 && xhrNivelObst.readyState == 4) {
              var respostaNivelObst = parseFloat(xhrNivelObst.response);
              resObst = respostaNivelObst * 100;
              widthObst =0;
              barObstetrica.style.width = widthObst + '%';
              barObstetrica.innerHTML = widthObst * 1  + '%';
              idOb = setInterval(frameOb, 10);
          }

        }
        function frameOb() {
            if (widthObst >= resObst) {
              clearInterval(idOb);
            } else {
              widthObst++; 
              barObstetrica.style.width = widthObst + '%'; 
              barObstetrica.innerHTML = widthObst * 1  + '%';
            }
          }

        xhrNivelOrto.open('GET', "apertoleitosortopedica.php", true);
        xhrNivelOrto.send();

        xhrNivelOrto.onreadystatechange = function(){
          if (xhrNivelOrto.status == 200 && xhrNivelOrto.readyState == 4) {
              var respostaNivelOrto =parseFloat(xhrNivelOrto.response);
              resOrto = respostaNivelOrto * 100;
              widthOrto =0;
              barOrtopedica.style.width = widthOrto + '%';
              barOrtopedica.innerHTML = widthOrto * 1  + '%'
              idOr = setInterval(frameOr, 10);
          }

        }
        function frameOr() {
            if (widthOrto >= resOrto) {
              clearInterval(idOr);
            } else {
              widthOrto++; 
              barOrtopedica.style.width = widthOrto + '%'; 
              barOrtopedica.innerHTML = widthOrto * 1  + '%';
            }
          }

}
        
    </script>
    <!-- Script para mostrar graficos-->
    <script>
      var mediaMensal = document.getElementById('mediaMensal').getContext('2d');
      var mediaMensalChart = new Chart(mediaMensal, {
          type: 'horizontalBar',
          data: {
            labels: ['Queimados', 'Cardiacos', 'Ortopedica', 'Obstetrica'],
            datasets:[{
              label: 'Média de Vagas',
              data: [
                
              ],
                backgroundColor:'rgba(255, 99, 132, 0.8)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 3
            }],
          },

          options:{
              elements:{
                rectangle: {
                  borderWidth: 2
                }
              },
              resposive: true,
              legend:{
                position: 'right',
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
                  labelString: 'especialidades',
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
            xAxes: [{
                scaleLabel:{
                  display: true,
                  labelString: 'Média de Vagas',
                  fontColor: "white",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 16

                },
                ticks:{
                  beginAtZero: false,
                  fontColor: "white",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 12
                }

            }],
            }
          }


      });

      

    </script>
  </body>
</html>