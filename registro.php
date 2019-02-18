<?php
session_start();
  $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : "não" ; 
  $cpf = isset($_SESSION['cpf']) ? $_SESSION['cpf'] : "não"; 
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Supervisório de leitos hospitalares, criado para agilizar a transferencia de pacientes que seguem aguardando atendemento especializado">
    <meta name="keywords" content="supervisório, leitos, supervisório hospitalar, tecnologia hospitalar, superviório na saúde, materialize,">
    <title>Cadastro Usuario | IranTCC </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
	<!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="css//materialize_login.css" type="text/css" rel="stylesheet">
    <link href="css//style_login.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="css/custom/custom.css" type="text/css" rel="stylesheet">
    <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet"> 
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="vendors/perfect-scrollbar/perfect-scrollbar_login.css" type="text/css" rel="stylesheet">
    <link href="vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
  </head>
  <body class="cyan">
     <!-- End Page Loading -->
    <div id="login-page" class="row">
      <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" method="post" id="form" action="registro_db.php">
          <div class="row">
            <div class="input-field col s12 center">
              <img src="images/logo/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
              <p class="center login-form-text">Iran TCC</p>
            </div>
          </div>
          <div class="row margin" id="rowNome">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">account_circle</i>
              <input id="nome" type="text" name="nome">
              <label for="nome" class="center-align">Nome</label>
            </div>
          </div>
          <div class="row margin" id="rowUs">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">person</i>
              <input id="usuario" type="text" name="usuario">
              <label for="usuario" class="center-align">Usuario</label>
              <label for="usuario"  id="jacadastrado"  style="display: none" class="center-align">Usuario Já Cadastrado</label>
            </div>
          </div>
          <div class="row margin" id="rowFun">
            <div class="input-field col s12">
    		     <i class="material-icons prefix pt-5">work</i>
     			      <select name="funcao" id="funcao" onchange="mudanca(this)">
      			     	<option value="" disabled selected>Selecione sua função</option>
      				    <option value="Diretoria" >Diretoria</option>
      				    <option value="Medico">Medico</option>
      			     	<option value="Enfermaria">Enfermaria</option>
                  <option value="Outro" >Outro</option>
    			      </select>
               <label>Função</label>
 			      </div>
          </div>
          <div class="row margin" id="rowDiretoria">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">note</i>
              <input id="cpf" type="text" name="cpfCnpj" maxlength="15" onblur='clearTimeout()' />
              <label for="cpf" class="center-align">CPF</label>
            </div>
            <div class="input-field col s12 waves-effect waves-block waves-light dropdown-settings" data-activates="listaHospitais">
              <i class="material-icons prefix pt-5">local_hospital</i>
              <input id="hospital" type="text" name="nomeHospital" disabled  />
              <label for="hospital" id="labelHospital" class="center-align">Hospital</label>
            </div>
            <ul id="listaHospitais" class="collection dropdown-content dropdown-style">
              <li class="collection-item avatar">
                <img src="https://imagesapt.apontador-assets.com/fit-in/320x240/15349656c1894c6ea82ecf2b7c0cb875/hospital-da-restauracao--derb.jpg" sizes="50x50" class="circle" alt="">
                <span class="title">Restauração</span>
                <p>
                  Av. Gov. Agamenon Magalhães, <br>s/n - Derby, Recife - PE
                </p>
              </li>
              <li class="collection-item avatar">
                <img src="http://portal.saude.pe.gov.br/sites/portal.saude.pe.gov.br/files/styles/destaque_node/public/hgv_6_.jpg?itok=03DesnRI" sizes="50xm0" class="circle" alt="">
                <span class="title">Getulio Vargas</span>
                <p>
                  Av. Gen. San Martin,<br> s/n - Cordeiro, Recife - PE
                </p>
              </li>
              <li class="collection-item avatar">
                <img src="https://s04.video.glbimg.com/x720/3125443.jpg"  sizes="50x50" class="circle" alt="">
                <span class="title">Oswaldo Cruz</span>
                <p>
                  R. Arnóbio Marquês,<br> 310 - Santo Amaro, Recife - PE
                </p>
              </li>
              <li class="collection-item avatar">
                <img src="http://portal.saude.pe.gov.br/sites/portal.saude.pe.gov.br/files/styles/destaque_node/public/dsc_0081_.jpg?itok=k-cp-muU" sizes="50x50" class="circle" alt="">
                <span class="title">Miguel Arraes</span>
                <p>
                  Estrada da Fazendinha,<br> s/n - Jaguaribe, Paulista - PE
                </p>
              </li>
            </ul>
          </div>
          <div class="row margin" id="rowMedico" style="display: none;">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">note</i>
              <input id="crm" name="crm" type="number" min="9999" max="99999" name="CRM">
              <label for="crm" class="center-align" >CRM</label>
            </div>
            <div class="input-field col s12" >
              <i class="material-icons prefix pt-5">local_hospital</i>
             <input type="hidden" name="listaHospitaisMedicos">
              <select id="listaHospitaisMedicos" multiple   class="icons">
                <optgroup label="Marque os Hospitais">
                  <option value="Restauração" data-icon="https://imagesapt.apontador-assets.com/fit-in/320x240/15349656c1894c6ea82ecf2b7c0cb875/hospital-da-restauracao--derb.jpg" class="right circle">Restauração</option>
                  <option value="Getulio Vargas" data-icon="http://portal.saude.pe.gov.br/sites/portal.saude.pe.gov.br/files/styles/destaque_node/public/hgv_6_.jpg?itok=03DesnRI" class="right circle">Getulio Vargas</option>
                  <option value="Oswaldo Cruz" data-icon="https://s04.video.glbimg.com/x720/3125443.jpg" class="right circle" >Oswaldo Cruz</option>
                  <option value="Miguel Arraes" data-icon="http://portal.saude.pe.gov.br/sites/portal.saude.pe.gov.br/files/styles/destaque_node/public/dsc_0081_.jpg?itok=k-cp-muU" class="right circle">Miguel Arraes</option>
                </optgroup>  
              </select>
              <label for="hospitaisMedicos" class="center-align" >Hospitais</label>
            </div>
          </div>
          <div class="row margin" id="cpfCad">
            <div class="col s12">
              <p  class="text-red center-align">CPF já cadastrado !</p>
              <br>
            </div>
          </div>
          <div class="row margin" id="rowTel">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">call</i>
              <input id="telefone" type="text" name="telefone" maxlength="15" />
              <label for="telefone" class="center-align">Telefone</label>
            </div>
           </div>
           <div class="row margin" id="rowEmail">
             <div class="input-field col s12">
              <i class="material-icons prefix pt-5">email</i>
              <input id="email" type="email" name="email" onblur="validacaoEmail(this)">
              <label for="email">Email</label>
              <div id="msgemail"></div>
            </div>
           </div>
          <div class="row margin" id="rowSenha">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">https</i>
              <input id="senha" type="password" name="senha">
              <label for="senha">Senha</label>
            </div>
          </div>
		<div class="row">
        	<div class="input-field col s12">
              <button  class="btn waves-effect waves-light col s12" type="submit" name="enviar" id="enviar" formtarget="_self" >Registrar</button>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
    <!--Scripts
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
    <script type="text/javascript">
      var hospital = document.getElementById('listaHospitais');
      var listaHospitaisMedicos = document.getElementById('listaHospitaisMedicos');
      var url;
      
      
       var xhr;
       if(window.XMLHttpRequest)
        xhr = new XMLHttpRequest();
         else
        xhr = new ActiveXObject("Microsoft.XMLHTTP");

      
      hospital.addEventListener("click", function(elemento){
        var nomeHospital = elemento.path[1].querySelector("span").innerHTML;
        document.getElementById('hospital').value = nomeHospital;
        document.getElementById('labelHospital').style.display = "none";
      });

     function error(local){    
      document.getElementById(local).style.border = "2px solid rgba(225, 0, 0, 0.3)";
      document.getElementById(local).style.borderRadius = "10px";  
    }
       

      

    </script>
    <script type="text/javascript">
      var usuaiorCad = document.getElementById("usuaiorCad");
      var formulario = document.querySelector("form");
      

      document.getElementById("cpfCad").style.display = "none";
      document.getElementById("rowDiretoria").style.display = "none";

        
      funcao.addEventListener("change",function(evento) {
        if (funcao.options[funcao.selectedIndex].value == "Diretoria") 
        document.getElementById("rowDiretoria").style.display = "block";
      });
      
      function mudanca(funcao){
        if (funcao.options[funcao.selectedIndex].value == "Diretoria") 
          document.getElementById("rowDiretoria").style.display = "block";
        else
          document.getElementById("rowDiretoria").style.display = "none";
        if (funcao.options[funcao.selectedIndex].value == "Medico")
          document.getElementById("rowMedico").style.display = "block";
        else
          document.getElementById("rowMedico").style.display = "none";

      }


      if (<?php echo $usuario == "&x1st&"? "true" : "false"?>) {
        error("rowUs");
        document.getElementById('jacadastrado').style.display = "block";
        setTimeout(limpaUs , 3000);
      }
      
      if (<?php echo $cpf == "&x1st&"? "true" : "false"?>) {
        document.getElementById("cpfCad").style.display = "block";
        error("rowDiretoria");
        setTimeout(limpaCPF , 3000);
      }
     

      

      formulario.addEventListener("submit", function(evento){
            evento.preventDefault();
            if(document.getElementById("nome").value == ""){
              error("rowNome");
              setTimeout(limpaNome, 3000);
            }
            if(document.getElementById("usuario").value == ""){
              error("rowUs");
              setTimeout(limpaUs, 3000);
            } 
           
            if(funcao.options[funcao.selectedIndex].value == ""){
              error("rowFun");
              funcao.options[funcao.selectedIndex].text = "Selecione-me !";
              setTimeout(limpaFun, 3000);
            }
            if (funcao.options[funcao.selectedIndex].value == "Diretoria" && document.getElementById("cpf").value=="") {
              error("rowDiretoria");
              setTimeout(limpaCPF, 3000);
            }
            if(document.getElementById("email").value == ""){
              error("rowEmail");
              setTimeout(limpaEmail, 3000);
            }
            if(document.getElementById("telefone").value == ""){
              error("rowTel");
              setTimeout(limpaTel, 3000);
            } 
            if(document.getElementById("senha").value == ""){
              error("rowSenha");
              setTimeout(limpaSenha, 3000);
            } 

            if (document.getElementById("nome").value =="" || document.getElementById("usuario").value =="" || funcao.options[funcao.selectedIndex].value == "" || document.getElementById("telefone").value =="" || document.getElementById("senha").value =="" ) {
              alert("Preencha todos os campos !");
            }
           else{
            var nomeEdt     = document.getElementById('nome').value.replace(" " , "-");
            var hospitalEdt = document.getElementById('hospital').value.replace(" ", "-");
            var telefoneEdt = document.getElementById('telefone').value.replace(" ", "-");
            
            //CASO TODOS OS CAMPOS SEJAM PRENCHIDOS E ELE MARCOU COMO DIRETOR
            if(funcao.options[funcao.selectedIndex].value == "Diretoria"){
                url = "registro_db.php?nome="+ nomeEdt + "&usuario=" + document.getElementById('usuario').value + "&funcao=Diretoria&cpf=" + document.getElementById('cpf').value + "&hospital=" + hospitalEdt + "&telefone=" + telefoneEdt + "&email=" +document.getElementById('email').value + "&crm=nao-existe&senha=" + document.getElementById('senha').value;
                console.log(url);
                xhr.open('GET', url , true);
              }
             //CASO TODOS OS CAMPOS SEJAM PREENCHIDOS E ELE MARCOU COMO MEDICO
            else if(funcao.options[funcao.selectedIndex].value == "Medico"){
                url = "registro_db.php?nome="+ nomeEdt + "&usuario=" + document.getElementById('usuario').value + "&funcao=Medico&cpf=nao-informado" + "&hospital=";
                var hospitaisMedicos = document.getElementsByClassName('optgroup-option active')
            //LOOP PARA MONTAR UMA STRING COM OS HOSPITAIS TRABALHADOS
            for(var i = 0; i < hospitaisMedicos.length; i++ ){
              url += hospitaisMedicos[i].innerText.replace(" ", "_"); //SUBSTITUI OS ESPAÇOS POR UNDERLINES PARA COLOCAR NA URL
              url += i == hospitaisMedicos.length - 1? "" : "-";//SEPARA OS HOSPITAIS POR TRACOS
            }
                url += "&telefone=" + telefoneEdt + "&email=" +document.getElementById('email').value + "&crm="+document.getElementById('crm').value + "&senha=" + document.getElementById('senha').value;
              xhr.open('GET', url, true);
            }
            //CASO TODOS OS CAMPOS SEJAM PREENCHIDOS E ELE MARCOU QUALQUER COISA EXCETO MEDICO E DIRETOR
            else{
              url = "registro_db.php?nome="+ nomeEdt + "&usuario=" + document.getElementById('usuario').value + "&funcao="+ funcao.options[funcao.selectedIndex].value + "&cpf=null&hospital=null&telefone=" + telefoneEdt + "&email=" +document.getElementById('email').value + "&crm=nao-existe&senha=" + document.getElementById('senha').value;
              xhr.open('GET', url, true);

            }
            console.log(xhr);
            xhr.send();
            }
            if (document.getElementById("nome").value =="" && document.getElementById("usuario").value =="" && funcao.options[funcao.selectedIndex].value == "" && document.getElementById("telefone").value =="" && document.getElementById("senha").value =="" ) {
              error("form");
              setTimeout(limpaAll, 3000);

            }
            
            


            
      });
      
      xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
          console.log("OK");
          console.log(url);
          if (xhr.responseText.indexOf("Tudo Certo") != -1) {
            alert("Cadastro Realizado Sr(a): " + document.getElementById('nome').value);
            window.location.href = "login.html";
          }
          else if (xhr.responseText.indexOf("Não Salvo") != -1) {
            alert("Erro ao salvar seu registro, entre em contato com a equipe desenvolvedora");
            window.location.href = "login.html";
          }
          
        }
      }
      function limpaNome(){
        document.getElementById("rowNome").style.border = "none";
      }
      function limpaUs(){
        document.getElementById("rowUs").style.border = "none";
       if (<?php echo $usuario == "&x1st&"? "true" : "false"?>) {
        document.getElementById('jacadastrado').style.display = "none";
       } 
      }
      function limpaFun(){
        document.getElementById("rowFun").style.border = "none";
      }
      function limpaCPF(){
        document.getElementById("rowDiretoria").style.border = "none";
      }
      function limpaEmail(){
        document.getElementById("rowEmail").style.border = "none";
      }
      function limpaTel(){
        document.getElementById("rowTel").style.border = "none";
      }
      function limpaSenha(){
        document.getElementById("rowSenha").style.border = "none";
      }
      function limpaAll(){
        formulario.style.border = "none";
      }
    
    </script>
    




    <script type="text/javascript">
      function validacaoEmail(field) {
usuario = field.value.substring(0, field.value.indexOf("@"));
dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
 
if ((usuario.length >=1) &&
    (dominio.length >=3) && 
    (usuario.search("@")==-1) && 
    (dominio.search("@")==-1) &&
    (usuario.search(" ")==-1) && 
    (dominio.search(" ")==-1) &&
    (dominio.search(".")!=-1) &&      
    (dominio.indexOf(".") >=1)&& 
    (dominio.lastIndexOf(".") < dominio.length - 1)) {
console.log("email valido");
document.getElementById("msgemail").style.display = "none";
}
else{
document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";

}
}
</script>


<script type="text/javascript">
/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
  return document.getElementById( el );
}
window.onload = function(){
  id('telefone').onkeypress = function(){
    mascara( this, mtel );
  }
}





function mascaraMutuario(o,f){
    v_obj=o;
    v_fun=f;
    setTimeout(execmascaracpf,1);
}
 
function execmascaracpf(){
    v_obj.value=v_fun(v_obj.value);
}
 
function cpfCnpj(v){
 
    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"");
 
    if (v.length <= 14) { //CPF
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1.$2");
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
        v=v.replace(/(\d{3})(\d)/,"$1.$2");
 
        //Coloca um hífen entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
 
    } else { //CNPJ
 
        //Coloca ponto entre o segundo e o terceiro dígitos
        v=v.replace(/^(\d{2})(\d)/,"$1.$2");
 
        //Coloca ponto entre o quinto e o sexto dígitos
        v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3");
 
        //Coloca uma barra entre o oitavo e o nono dígitos
        v=v.replace(/\.(\d{3})(\d)/,".$1/$2");
 
        //Coloca um hífen depois do bloco de quatro dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2");
 
    }
 
    return v;
 
}
window.onload = function(){
  id('cpf').onkeypress = function(){
    mascaraMutuario( this, cpfCnpj );
  }
}
</script>
  </body>
</html>