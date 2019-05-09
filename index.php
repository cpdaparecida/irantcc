    <?php
      include 'config.php';
      include 'connection.php';
      include 'config_hospitais.php';

      session_start();
      if (isset($_SESSION['login'])) {
        # code...
      $usuario = DBRead('info_clientes', "WHERE usuario = '{$_SESSION['login']}'");
      }
       else if(!isset($_COOKIE['login'])){
        echo ("<script>location.href='login.html';</script>");
      }
      else{
        //$usuario = DBRead('info_clientes', "WHERE usuario = '{$_COOKIE['login']}'");
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>


  
  <body> 
    <!-- Start Page Loading-->
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
                    <img src="images/logo/materialize-logo.png" alt="Beds logo" sizes="50x70" >
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
            <ul  id="notifications-dropdown" class="dropdown-content">
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
                      <span class="nav-text">Painel de Vagas</span>
                    </a>
                </li>
                <li class="bold">
                  <a href="/visao/" class="waves-effect waves-cyan">
                      <i class="material-icons">cast</i>
                      <span class="nav-text">Mapa</span>
                    </a>
                </li>
                <li class="bold">
                  <a href="/monitoramento/" class="waves-effect waves-cyan">
                      <i class="material-icons">show_chart</i>
                      <span class="nav-text">Monitoramento</span>
                    </a>
                </li>
                <li class="bold">
                  <a href="/estatistica/" class="waves-effect waves-cyan">
                      <i class="material-icons">insert_chart</i>
                      <span class="nav-text">Relatórios</span>
                    </a>
                </li>
                <div class="divider"> </div>
                <li class="bold" id="nav_hospitais">
                <?php

                  if(strcmp(isset($_COOKIE['funcao']) ? $_COOKIE['funcao']: $_SESSION['funcao'], "Diretoria") == 0){
                    echo "<a href=\"/hospital/".(isset($_COOKIE['hospital']) ? "{$hospitais[$_COOKIE['hospital']]}.php\"" : "{$hospitais[$_SESSION['hospital']]}.php\"")." class=\"waves-effect waves-cyan\">
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
                        echo "\n<a href=\"/hospital/".$hospitais[htmlspecialchars($value)].".php\" class=\"collection-item center\">".htmlspecialchars($value)."</a>";
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
                        echo "\n<a href=\"/hospital/".$hospitais[htmlspecialchars($value)].".php\" class=\"collection-item center\">".htmlspecialchars($value)."</a>";
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
                      <a href=\"/hospital/restauracao.php\" class=\"collection-item center\">Restauração</a>
                      <a href=\"/hospital/getulio-vargas.php\" class=\"collection-item center\">Getulio Vargas</a>
                      <a href=\"/hospital/oswaldo-cruz.php\" class=\"collection-item center\">Otavio de Freitas</a>
                      <a href=\"/hospital/miguel-arraes.php\" class=\"collection-item center\">Miguel Arraes</a>
                     </ul>
                    </div>  
                    </li> 
                 </ul>";
                  }
                 ?>
                </li>
                 
                </li>
                <li class="bold">
                  <a href="/especialidades/" class="waves-effect waves-cyan">
                      <i class="material-icons">healing</i>
                      <span class="nav-text">Especialidades</span>
                    </a>
                </li>
                <li class="bold">
                  <a href="/historico/" class="waves-effect waves-cyan">
                      <i class="material-icons">archive</i>
                      <span class="nav-text">Históricos</span>
                    </a>
                </li>
                <li class="bold">
                  <a href="/contato/" class="waves-effect waves-cyan">
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
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
          <!--start container-->
          <div class="container">
            <!--Controle de modo de visualização-->
            <div class="row mt-1">
              <h5 class="breadcumbs-title"> Painel de Vagas</h5>
             <div class="divider mt-1"></div>
             <div class="row mt-1">
             <div class="col s5 pt-1">
               <span class="">Filtros: </span>
               
             </div>
             
               <div class="input-field col s4">
               <select id="selecaoFiltro" onchange="selecionaFiltro(this)">
                 <option value="" disabled="true" selected="true">Filtros</option>
                 <option value="Vascular" >Vascular</option>
                 <option value="Traumato" >Traumato</option>
                 <option value="Queimaduras" >Queimaduras</option>
                 <option value="Obstetricia" >Obstetrícia</option>
                 <option value="Clinica" >Clinica</option>
                 <option value="Cardiacos" >Cardiacos</option>
                 <option value="Infectologia" >Infectologia</option>
                 <option value="Intoxicacao" >Intoxicação</option>
                 <option value="Urologia" >Urologia</option>
                 <option value="Odontologia" >Odontologia</option>
                 <option value="Otorrinolaringologia" >Otorrinolaringologia</option>
                 <option value="Pediatria" >Pediatria</option>
                 <option value="Neurologia" >Neurologia</option>
                 <option value="Ginecologia" >Ginecologia</option>
                 <option value="Psiquiatria" >Psiquiatria</option>
               </select>
               <label for="selecaoFiltro">Adicionar Filtros</label>
              </div>

             <div class="input-field col s3">
                 <select id="selecaoModo" onchange="selecionaClassificacao(this)">
                   <option value="Hospital">Hospital</option>
                   <option value="Especialidade">Especialidade</option>
                   <option value="ordemDecrescente">Ordem de vaga Decrescente</option>
                   <option value="ordemCrescente">Ordem de vaga Crescente</option>
                 </select>
                 <label for="selecaoModo">Classificar por: </label>

             </div>
            </div>
          </div>
           <!--card stats start-->
            <div id="card-stats">
              <div class="row mt-1 linhas"></div> 
              <div class="row mt-1 linhas"></div> 
              <div class="row mt-1 linhas"></div> 
              <div class="row mt-1 linhas"></div> 
              <div class="row mt-1 linhas"></div> 
              <div class="row mt-1 linhas"></div> 
              <div class="row mt-1 linhas"></div> 
              <div class="row mt-1 linhas"></div> 
              <div class="row mt-1 linhas"></div> 
              <div class="row mt-1 linhas"></div> 
              <div class="row mt-1 linhas"></div> 
              <div class="row mt-1 linhas"></div> 
              <div class="row mt-1 linhas"></div> 
              <div class="row linhas"></div> 
       
            </div>
          </div>
            
        </section>
          <!--card widgets start-->

       
        <!-- START RIGHT SIDEBAR NAV-->
        <aside id="right-sidebar-nav">
          <ul id="chat-out" class="side-nav rightside-navigation">
            <li class="li-hover">
              <div class="row">
                <div class="col s12 border-bottom-1 mt-5">
                  <ul class="tabs">
                    <li class="tab col s4">
                      <a href="#activity" class="active">
                        <span class="material-icons">graphic_eq</span>
                      </a>
                    </li>
                    <li class="tab col s4">
                      <a href="#chatapp">
                        <span class="material-icons">face</span>
                      </a>
                    </li>
                    <li class="tab col s4">
                      <a href="#settings">
                        <span class="material-icons">settings</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div id="settings" class="col s12">
                  <h6 class="mt-5 mb-3 ml-3">GENERAL SETTINGS</h6>
                  <ul class="collection border-none">
                    <li class="collection-item border-none">
                      <div class="m-0">
                        <span class="font-weight-600">Notifications</span>
                        <div class="switch right">
                          <label>
                            <input checked type="checkbox">
                            <span class="lever"></span>
                          </label>
                        </div>
                      </div>
                      <p>Use checkboxes when looking for yes or no answers.</p>
                    </li>
                    <li class="collection-item border-none">
                      <div class="m-0">
                        <span class="font-weight-600">Show recent activity</span>
                        <div class="switch right">
                          <label>
                            <input checked type="checkbox">
                            <span class="lever"></span>
                          </label>
                        </div>
                      </div>
                      <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </li>
                    <li class="collection-item border-none">
                      <div class="m-0">
                        <span class="font-weight-600">Notifications</span>
                        <div class="switch right">
                          <label>
                            <input type="checkbox">
                            <span class="lever"></span>
                          </label>
                        </div>
                      </div>
                      <p>Use checkboxes when looking for yes or no answers.</p>
                    </li>
                    <li class="collection-item border-none">
                      <div class="m-0">
                        <span class="font-weight-600">Show recent activity</span>
                        <div class="switch right">
                          <label>
                            <input type="checkbox">
                            <span class="lever"></span>
                          </label>
                        </div>
                      </div>
                      <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </li>
                    <li class="collection-item border-none">
                      <div class="m-0">
                        <span class="font-weight-600">Show your emails</span>
                        <div class="switch right">
                          <label>
                            <input type="checkbox">
                            <span class="lever"></span>
                          </label>
                        </div>
                      </div>
                      <p>Use checkboxes when looking for yes or no answers.</p>
                    </li>
                    <li class="collection-item border-none">
                      <div class="m-0">
                        <span class="font-weight-600">Show Task statistics</span>
                        <div class="switch right">
                          <label>
                            <input type="checkbox">
                            <span class="lever"></span>
                          </label>
                        </div>
                      </div>
                      <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </li>
                  </ul>
                </div>
                <div id="chatapp" class="col s12">
                  <div class="collection border-none">
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-1.png" alt="" class="circle cyan">
                      <span class="line-height-0">Elizabeth Elliott </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">5.00 AM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Thank you </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-2.png" alt="" class="circle deep-orange accent-2">
                      <span class="line-height-0">Mary Adams </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">4.14 AM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Hello Boo </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-3.png" alt="" class="circle teal accent-4">
                      <span class="line-height-0">Caleb Richards </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">9.00 PM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Keny ! </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-4.png" alt="" class="circle cyan">
                      <span class="line-height-0">June Lane </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">4.14 AM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Ohh God </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-5.png" alt="" class="circle red accent-2">
                      <span class="line-height-0">Edward Fletcher </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">5.15 PM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Love you </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-6.png" alt="" class="circle deep-orange accent-2">
                      <span class="line-height-0">Crystal Bates </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">8.00 AM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Can we </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-7.png" alt="" class="circle cyan">
                      <span class="line-height-0">Nathan Watts </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">9.53 PM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Great! </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-8.png" alt="" class="circle red accent-2">
                      <span class="line-height-0">Willard Wood </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">4.20 AM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Do it </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-9.png" alt="" class="circle teal accent-4">
                      <span class="line-height-0">Ronnie Ellis </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">5.30 PM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Got that </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-1.png" alt="" class="circle cyan">
                      <span class="line-height-0">Gwendolyn Wood </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">4.34 AM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Like you </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-2.png" alt="" class="circle red accent-2">
                      <span class="line-height-0">Daniel Russell </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">12.00 AM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Thank you </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-3.png" alt="" class="circle teal accent-4">
                      <span class="line-height-0">Sarah Graves </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">11.14 PM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Okay you </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-4.png" alt="" class="circle red accent-2">
                      <span class="line-height-0">Andrew Hoffman </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">7.30 PM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Can do </p>
                    </a>
                    <a href="#!" class="collection-item avatar border-none">
                      <img src="images/avatar/avatar-5.png" alt="" class="circle cyan">
                      <span class="line-height-0">Camila Lynch </span>
                      <span class="medium-small right blue-grey-text text-lighten-3">2.00 PM</span>
                      <p class="medium-small blue-grey-text text-lighten-3">Leave it </p>
                    </a>
                  </div>
                </div>
                <div id="activity" class="col s12">
                  <h6 class="mt-5 mb-3 ml-3">RECENT ACTIVITY</h6>
                  <div class="activity">
                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color deep-purple lighten-2">add_shopping_cart</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="deep-purple-text medium-small">just now</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jim Doe Purchased new equipments for zonal office.</p>
                    </div>
                    <div class="recent-activity-list chat-out-list row mb-0">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon">
                        <i class="material-icons white-text icon-bg-color cyan lighten-2">airplanemode_active</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="cyan-text medium-small">Yesterday</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Your Next flight for USA will be on 15th August 2015.</p>
                      </div>
                    </div>
                    <div class="recent-activity-list chat-out-list row mb-0">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                        <i class="material-icons white-text icon-bg-color green lighten-2">settings_voice</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="green-text medium-small">5 Days Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                      </div>
                    </div>
                    <div class="recent-activity-list chat-out-list row mb-0">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon">
                        <i class="material-icons white-text icon-bg-color amber lighten-2">store</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="amber-text medium-small">1 Week Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                      </div>
                    </div>
                    <div class="recent-activity-list row">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon">
                        <i class="material-icons white-text icon-bg-color deep-orange lighten-2">settings_voice</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="deep-orange-text medium-small">2 Week Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                      </div>
                    </div>
                    <div class="recent-activity-list chat-out-list row mb-0">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                        <i class="material-icons white-text icon-bg-color brown lighten-2">settings_voice</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="brown-text medium-small">1 Month Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                      </div>
                    </div>
                    <div class="recent-activity-list chat-out-list row mb-0">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon">
                        <i class="material-icons white-text icon-bg-color deep-purple lighten-2">store</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="deep-purple-text medium-small">3 Month Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                      </div>
                    </div>
                    <div class="recent-activity-list row">
                      <div class="col s3 mt-2 center-align recent-activity-list-icon">
                        <i class="material-icons white-text icon-bg-color grey lighten-2">settings_voice</i>
                      </div>
                      <div class="col s9 recent-activity-list-text">
                        <a href="#" class="grey-text medium-small">1 Year Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </aside>
        <!-- END RIGHT SIDEBAR NAV-->
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
              </script> <a class="grey-text text-lighten-2" href="#" target="_blank">PIXINVENT</a> All rights reserved.</span>
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
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
    <!-- Script para carregar os cards-->
    <script type="text/javascript" src="js/script_index2.js" ></script>
    <!--Script para o toast -->
    <script type="text/javascript" >
      window.onload = function(){
        Materialize.toast("Bem Vindo <?php echo isset($_SESSION['nome']) ? $_SESSION['nome']  : $_COOKIE['nome']?>", 2500);
      }

    </script>

    <script>
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });
    </script>
  </body>
</html>