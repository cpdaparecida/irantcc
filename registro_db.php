  <?php

      include 'config.php';
      include 'connection.php';
      session_start();
      

    $_SESSION['nome'] = $_GET['nome'];
    $_SESSION['nome'] = str_replace("-", " ", $_SESSION['nome']); 

    $_SESSION['usuario'] = $_GET['usuario'];

    $_SESSION['funcao'] = $_GET['funcao'];

    $_SESSION['telefone'] = $_GET['telefone'];

    $_SESSION['cpf'] = $_GET['cpf'];

    $_SESSION['crm'] = $_GET['crm'];

    $_SESSION['hospital'] = $_GET['hospital'];

    $email = $_GET['email'];


    $senha = md5($_GET['senha']);

    //Reconstrução da lista de hospitais
    if($_SESSION['funcao'] == "Diretoria"){
    $_SESSION['hospital'] = str_replace("-", " ", $_SESSION['hospital']); 
    }
    $hospitalNome = "";
    if($_SESSION['funcao'] == "Medico"){
    $_SESSION['hospital'] = str_replace("-", ", ", $_SESSION['hospital']); 
    $_SESSION['hospital'] = str_replace("_", " ", $_SESSION['hospital']); 
    }
    
    if( strcasecmp($_SESSION['nome'], "porra") == 0 || strcasecmp($_SESSION['nome'], "caralho") == 0 || strcasecmp($_SESSION['nome'], "buceta") == 0 || strcasecmp($_SESSION['nome'], "rola") == 0 || strcasecmp($_SESSION['nome'], "foda") == 0 || strcasecmp($_SESSION['nome'], "foda-se") == 0 || strcasecmp($_SESSION['nome'], "cu") == 0 ){
        
        $_SESSION['nome'] = null;
    }
    if ($_SESSION['nome'] == null || $_SESSION['usuario'] == null || $_SESSION['funcao'] == null || $_SESSION['telefone'] == null || $email == null || $senha == null || $_SESSION['hospital'] == null || $_SESSION['crm'] == null ) {
      # code...
      $_SESSION['TudoOK'] = "não";
    }
    else if ($_SESSION['funcao'] == "Diretoria" && $_SESSION['cpf'] == null) {
      # code...
      $_SESSION['TudoOK'] = "não";
    }
    else if ($_SESSION['funcao'] == "Medico" && $_SESSION['crm'] == null) {
      # code...
      $_SESSION['TudoOK'] = "não";
    }
    else if (existeUsuario($_SESSION['usuario'])) {
      # code...
      $_SESSION['TudoOK'] = "não";
      $_SESSION['usuario'] = "&x1st&";
      header('Location: registro.php');

    }
     else if (existeCpf($_SESSION['cpf'])) {
      # code...
      $_SESSION['TudoOK'] = "não";
      $_SESSION['cpf'] = "&x1st&";
      header('Location: registro.php');
    }
    else if (existe("crm", $_SESSION['cpf'])) {
      # code...
      $_SESSION['TudoOK'] = "não";
      $_SESSION['crm'] = "&x1st&";
      header('Location: registro.php');
    }
    else{
      $_SESSION['TudoOK'] = "sim";
      
    }

if ($_SESSION['TudoOK'] == "sim") {
  # code...
    if ($_SESSION['funcao'] == "Diretoria") {
      # code...
      $dados = array(
        'nome' => $_SESSION['nome'],
        'usuario' => $_SESSION['usuario'],
        'funcao' => $_SESSION['funcao'],
        'cpf' => $_SESSION['cpf'],
        'crm' => "não existe",
        'hospital' => $_SESSION['hospital'],
        'telefone' => $_SESSION['telefone'],
        'email' => $email,
        'senha' => $senha,
        'status' => 1
      );
    DBCreate('info_clientes' , $dados);
    }
    else if($_SESSION['funcao'] == "Medico"){
      $dados = array(
        'nome' => $_SESSION['nome'],
        'usuario' => $_SESSION['usuario'],
        'funcao' => $_SESSION['funcao'],
        'cpf' => "não informado",
        'crm' => $_SESSION['crm'],
        'hospital' => $_SESSION['hospital'],
        'telefone' => $_SESSION['telefone'],
        'email' => $email,
        'senha' => $senha,
        'status' => 1
      );
    DBCreate('info_clientes' , $dados);
    }
    else{
       $dados = array(
        'nome' => $_SESSION['nome'],
        'usuario' => $_SESSION['usuario'],
        'funcao' => $_SESSION['funcao'],
        'cpf' => "não informado",
        'crm' => "não existe",
        'hospital' => "não informado",
        'telefone' => $_SESSION['telefone'],
        'email' => $email,
        'senha' => $senha,
        'status' => 1
      );
    DBCreate('info_clientes' , $dados);
    }
 if (DBRead('info_clientes', "WHERE usuario = '{$dados['usuario']}'") != false) {
      echo "Tudo Certo";
    }
    else
      echo "Não Salvo";
}


//verifica se existe já algum cpf já cadastrado
function  existeCpf($usuario){
  $resultadoCPF = DBRead("info_clientes", "WHERE cpf = '{$_SESSION['cpf']}'");
 if($resultadoCPF == false){
    return false;
  }
  else{
    return true;
  }
}

function existe($tipo, $info){
  $resultadoExiste = DBRead("info_clientes", "WHERE {$tipo} = '{$info}'");
    if($resultadoExiste == false){
    return false;
  }
  else{
    return true;
  }
}
//verifica se existe já algum usuario já cadastrado
function  existeUsuario($usuario){
  $resultadoUS = DBRead("info_clientes", "WHERE usuario = '{$_SESSION['usuario']}'");
 if($resultadoUS == false){
    return false;
  }
  else{
    return true;
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
      
      
      // Gtrava registros
   function DBCreate($table, array $data){
     $data = DBEscape($data);
     
     foreach($data as $key => $value){
     $fields = implode(', ' , array_keys($data));
     $values = "'".implode("' , '" , $data)."'";
     }
     $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
    return DBExecute($query);
  }
  
    // Executa Querys
  
  function DBExecute($query){
    $link = DBConect();
    
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
    DBClose($link);
    return $result;
  }

?>