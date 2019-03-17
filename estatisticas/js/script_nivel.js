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
      
var xhrMais;
      if(window.XMLHttpRequest)
        xhrMais = new XMLHttpRequest();
      else 
        xhrMais = new ActiveXObject("Microsoft.XMLHTTP");

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

      
     

   