var xhrUltimasMudancas;

	  if(window.XMLHttpRequest)
        xhrUltimasMudancas = new XMLHttpRequest();
      else
        xhrUltimasMudancas = new ActiveXObject("Microsoft.XMLHTTP");

      
      xhrUltimasMudancas.open('GET' , "ultimas_mudancas.php", true);
      xhrUltimasMudancas.send();
      

      xhrUltimasMudancas.onreadystatechange = function(){

      	if (xhrUltimasMudancas.status === 200 && xhrUltimasMudancas.readyState === 4) {
      		document.getElementById('linha_ultimas').innerHTML = xhrUltimasMudancas.responseText;
      	}
      }