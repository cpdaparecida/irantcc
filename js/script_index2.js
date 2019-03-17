    var xhr_idx;
    var count = 0;
    var linha = 0;
    var filtros = document.getElementById("selecaoFiltro"); // Seleciona a Seleção
    var elemento  = document.getElementsByTagName("div")[19]; // Pega o elemento onde o chip vai ser adicionado 
  
      if(window.XMLHttpRequest)
        xhr_idx = new XMLHttpRequest();
      else
        xhr_idx = new ActiveXObject("Microsoft.XMLHTTP");

      

    function selecionaFiltro(el){
      //cria o chip
      var chip = document.createElement("div");
      chip.classList.add("chip");
      chip.innerHTML = el.value + " ";
      //cria a ação de fechar
      var close = document.createElement("i");
      close.classList.add("close");
      close.classList.add("material-icons");
      close.innerHTML = "close";
      //adiciona ação de fechar ao chip
      chip.appendChild(close);
      //adiciona o chip completo no espaço correto
      elemento.appendChild(chip);
      
      console.log(xhr_idx);
      xhr_idx.open('GET', "vagas_index?especialidade=" + el.value, true);
      xhr_idx.send();
      
      }
    

  

      xhr_idx.open('GET' , "vagas_index.php", true);
      xhr_idx.send();

    
     var linhas = document.getElementsByClassName('linhas');
     //console.log(document.getElementsByClassName('linhas'));
  xhr_idx.onreadystatechange = function() {
          if (xhr_idx.status == 200 && xhr_idx.readyState == 4){
             for (var i in linhas) {
               linhas[i].innerHTML =" ";
               linha = 0; 
          
             }

             var json = JSON.parse(xhr_idx.response);
             linhas[linha].innerHTML = json[0];
              console.log(json);
              if(Object.values(json).length > 1){
              for (var i = 1; i < Object.values(json).length ; i++) {
                 if(i % 4 == 0 ){
                     linha++;
                  }
              
               linhas[linha].innerHTML += json[i];
              }
             }

       }
  }