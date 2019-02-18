<?php

      include 'config.php';
      include 'connection.php';
      session_start();

  $login = isset($_POST['usuario']) ? $_POST['usuario'] : null;
  $entrar = isset($_POST['entrar'])? $_POST['entrar'] : null;
  $manter = isset($_POST['mantenha-me']) ? $_POST['mantenha-me'] : null;
  $senha = md5(isset($_POST['senha'])? $_POST['senha'] : null);
 
 if (isset($entrar)) {
  $verifica = DBRead('info_clientes', "WHERE usuario = '{$login}' AND senha = '{$senha}'");       
  if (!$verifica){
         echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
          die();
        }else if(isset($manter)){
          setcookie("login",$login, time() + (86400 * 30));
          setcookie("nome", $verifica[0]['nome'], time() + (86400 * 30));
          setcookie("funcao", $verifica[0]['funcao'], time() + (86400 * 30));
            if(strcmp($verifica[0]['funcao'], "Diretoria") == 0 ){
              setcookie("hospital", $verifica[0]['hospital'], time() + (86400 * 30));
          }
          else if(strcmp($verifica[0]['funcao'], "Medico") == 0 ){
            $hospitais = explode(", ", $verifica[0]['hospital']);
              foreach ($hospitais as $key => $value) {
                setcookie("hospitais[".$key."]" , $value, time() + (86400 * 30));
              }
          }
          header("Location:index.php");
        }
        else{
          $_SESSION['login'] = $login;
          $_SESSION['nome']  = $verifica[0]['nome'];
          $_SESSION['funcao']  = $verifica[0]['funcao'];
          if(strcmp($verifica[0]['funcao'], "Diretoria") == 0 ){
            $_SESSION['hospital'] = $verifica[0]['hospital'];
          }
          else if(strcmp($verifica[0]['funcao'], "Medico") == 0 ){
            $hospitais = explode(", ", $verifica[0]['hospital']);
            $_SESSION['hospitais'] = $hospitais;
            
          }
         header("Location:index.php");
        }
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