<?php
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
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Supervisório de leitos hospitalares, criado para agilizar a transferencia de pacientes que seguem aguardando atendemento especializado">
    <meta name="keywords" content="supervisório, leitos, supervisório hospitalar, tecnologia hospitalar, superviório na saúde, materialize,beds">
    <title>Histórico | IranTCC</title>
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
        <section>
          <div class="container">
            <div class="content">
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
  </body>
</html>