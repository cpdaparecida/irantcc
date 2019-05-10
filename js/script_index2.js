    var xhr_idx;
    var count = 0;
    var linha = 0;
    var filtros = document.getElementById("selecaoFiltro"); // Seleciona a Seleção
    var ordem;
    var elemento  = document.getElementsByTagName("div")[19]; // Pega o elemento onde o chip vai ser adicionado 
    var filtros = [];
    var string = "";
    var data;
      if(window.XMLHttpRequest)
        xhr_idx = new XMLHttpRequest();
      else
        xhr_idx = new ActiveXObject("Microsoft.XMLHTTP");

    function selecionaClassificacao(el){
        ordem = el.value;
        console.log(el.value.indexOf("ordemDecrescente")  == 0);
        if(el.value.indexOf("ordemDecrescente")  == 0){
            xhr_idx.open('GET' , "vagas_index_ordem.php?ordem=decrescente", true);
            xhr_idx.send();
        }
        else if(el.value.indexOf("Hospital")  == 0){
            xhr_idx.open('GET' , "vagas_index.php", true);
            xhr_idx.send();
        }
        else if(el.value.indexOf("ordemCrescente")  == 0){
            xhr_idx.open('GET' , "vagas_index_ordem.php?ordem=crescente", true);
            xhr_idx.send();
        }
    }
    console.log("Ordem: ",ordem);

    function selecionaFiltro(el){
      //cria o chip
      var chip = document.createElement("div");
      chip.classList.add("chip");
      chip.innerHTML = el.value + " ";
      filtros.push(el.value);
      
      //cria a ação de fechar
      var close = document.createElement("i");
      close.classList.add("close");
      close.classList.add("material-icons");
      close.innerHTML = "close";
      close.onclick = function(el){
        var string = el.path[1].innerHTML; 
        var elemento = string.split(" "); 
        console.log("elemento splitado: ",elemento);
        elemento = String(elemento[0]);
        console.log("Index do elemento", filtros.indexOf(elemento));
        filtros.splice(filtros.indexOf(elemento), 1);
        console.log("Filtros apos deletado" ,filtros);
        
          if(filtros[0]){
            if(ordem.indexOf("ordemDecrescente") == 0 )
              xhr_idx.open('GET', "vagas_index_ordem.php?ordem=descrescente&especialidade=" + filtros, true);
            if(ordem.indexOf("Hospital") == 0 )
              xhr_idx.open('GET', "vagas_index.php?especialidade=" + filtros, true);
            if(ordem.indexOf("ordemCrescente") == 0 )
              xhr_idx.open('GET', "vagas_index_ordem.php?ordem=crescente&especialidade=" + filtros, true);
          }
          else{
            if(ordem.indexOf("ordemDecrescente") == 0 )
              xhr_idx.open('GET', "vagas_index_ordem.php?ordem=descrescente", true);
            if(ordem.indexOf("Hospital") == 0 )
              xhr_idx.open('GET', "vagas_index.php", true);
            if(ordem.indexOf("ordemCrescente") == 0 )
              xhr_idx.open('GET', "vagas_index_ordem.php?ordem=crescente", true);
          }
            

          xhr_idx.send();
      };  
      //adiciona ação de fechar ao chip
      chip.appendChild(close);
      //adiciona o chip completo no espaço correto
      elemento.appendChild(chip);
      console.log("filtros :",filtros);
      console.log("ordem: ", ordem);
            if(ordem.indexOf("ordemDecrescente") == 0 )
              xhr_idx.open('GET', "vagas_index_ordem.php?ordem=descrescente&especialidade=" + filtros, true);
            if(ordem.indexOf("Hospital") == 0 )
              xhr_idx.open('GET', "vagas_index.php?especialidade=" + filtros, true);
            if(ordem.indexOf("ordemCrescente") == 0 )
              xhr_idx.open('GET', "vagas_index_ordem.php?ordem=crescente&especialidade=" + filtros, true);
          
      xhr_idx.send(); 
      string = "";
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