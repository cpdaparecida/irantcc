var xhr;

var texto = document.getElementById('especialidade')
var sol = document.getElementById('enviar')

	  if(window.XMLHttpRequest)
        xhr = new XMLHttpRequest();
      else
        xhr = new ActiveXObject("Microsoft.XMLHTTP");

sol.addEventListener("click", function( e ){
	console.log(`${texto.value}`)
	e.preventDefault();
	

	xhr.open("GET", `vaga_teste.php?especialidade=${texto.value}` , true)
	xhr.send();
	  xhr.onreadystatechange = function() {

if (xhr.status == 200 && xhr.readyState == 4){
		 var json = JSON.parse(xhr.response);
		 console.log(json);
	}
	  }
	
});
