 var  xhr_labels;
 var  xhr_data;
 var  label;
 var  dataNumero = [0, 0, 0, 0, 0,0];
 var  especialidade = document.getElementById('lista');
 var iniciado;
 var labelJSON;
  
  var restauracao = 0;
  var getulio = 1;
  var otavio = 2;
  var miguel = 3;


      if(window.XMLHttpRequest){
        xhr_labels = new XMLHttpRequest();
        xhr_data = new XMLHttpRequest();
      }
      else{
        xhr_labels = new ActiveXObject("Microsoft.XMLHTTP");
        xhr_data = new ActiveXObject("Microsoft.XMLHTTP");
      }
      
      document.getElementById('especialidade').addEventListener("click", function(cl){
        cl.preventDefault();
      });
      especialidade.addEventListener("click", function(el){
        el.preventDefault();
        var espec = el.srcElement.childNodes[1].data;
        espec = String(espec);
        //console.log(el.srcElement.childNodes[1].data);
        document.getElementById('especialidade').innerHTML = espec;
          if (el.srcElement.childNodes[1].data.localeCompare("Queimaduras") === 0) {
            xhr_labels.open('GET' , "canvas_labels.php?especialidade=queimados", true);
            xhr_data.open(  'GET' , "canvas_data.php?especialidade=queimados" , true);
          }
          if (el.srcElement.childNodes[1].data.localeCompare("Vascular") === 0) {
            xhr_labels.open('GET' , "canvas_labels.php?especialidade=cardiacos", true);
            xhr_data.open(  'GET' , "canvas_data.php?especialidade=cardiacos" , true);
          }
          if (el.srcElement.childNodes[1].data.localeCompare("Traumato") === 0) {
            xhr_labels.open('GET' , "canvas_labels.php?especialidade=ortopedica", true);
            xhr_data.open(  'GET' , "canvas_data.php?especialidade=ortopedica" , true);
          }
          if (el.srcElement.childNodes[1].data.localeCompare("Obstetrícia") === 0) {
            xhr_labels.open('GET' , "canvas_labels.php?especialidade=Obstetrica", true);
            xhr_data.open(  'GET' , "canvas_data.php?especialidade=Obstetrica" , true);
          }
      xhr_labels.send();
      xhr_data.send();
      
      });

      
      xhr_labels.onreadystatechange = function(){
        if (xhr_labels.status === 200 && xhr_labels.readyState === 4) {
          labelJSON = JSON.parse(xhr_labels.responseText);

        }
      }
      
      xhr_data.onreadystatechange = function(){
        if (xhr_data.status === 200 && xhr_data.readyState === 4) {
          var dataJSON = JSON.parse(xhr_data.responseText);
          for(var i in dataJSON){
            dataNumero[i] = parseInt(dataJSON[i]);
          }
          

         if(iniciado){
         window.chart = new Chart(ctx, config);
         iniciado = false;
         }
         
           if(dataNumero[0] != -1  || dataNumero[5] != -1){
            var k = 0;
            for (var i = 0; i < 6; i++) {
              chart.config.data.datasets[restauracao].data[k] = dataNumero[i];
              k++;
            }
           }
           else{
            var k = 0;
            for (var i = 0; i < 6; i++) {
              chart.config.data.datasets[restauracao].data[k] = 0;
              k++;
            }
           }
           if(dataNumero[6] != -1  || dataNumero[11] != -1){
            var k = 0;
            for (var i = 6; i < 12; i++) {
              chart.config.data.datasets[getulio].data[k] = dataNumero[i];
              k++;
            }
           }
           else{
            var k = 0;
            for (var i = 6; i < 12; i++) {
              chart.config.data.datasets[getulio].data[k] = 0;
              k++;
            }
           }
           
           if(dataNumero[12] != -1 || dataNumero[17] != -1){
            var k = 0;
            for (var i = 12; i < 18; i++) {
              chart.config.data.datasets[otavio].data[k] = dataNumero[i];
              k++;
            }
           }
           else{
            var k = 0;
            for (var i = 12; i < 18; i++) {
              chart.config.data.datasets[otavio].data[k] = 0;
              k++;
            }
           }
           if(dataNumero[18] != -1 || dataNumero[23] != -1){
            var k = 0;
            for (var i = 18; i < 24; i++) {
              chart.config.data.datasets[miguel].data[k] = dataNumero[i];
              k++;
            }
           }
           else{
            var k = 0;
            for (var i = 17; i < 24; i++) {
              chart.config.data.datasets[miguel].data[k] = 0;
              k++;
            }
           }
          
        for(var i in labelJSON){
                if(i != 6)
                window.chart.config.data.labels[i] = labelJSON[i];

        }
        
         window.chart.config.options.scales.xAxes[0].scaleLabel.labelString = labelJSON[6];
        setTimeout(function(){window.chart.update();10000}); 
        console.log(window.chart);
         

         
        }
      }

window.onload = function(){
  iniciado = true;
      xhr_labels.open('GET' , "canvas_labels.php?especialidade=queimados" , true);
      xhr_data.open(  'GET' , "canvas_data.php?especialidade=queimados" , true);
      xhr_labels.send();
      xhr_data.send();
}

  var ctx = document.getElementById('ChartQueimados').getContext('2d');
  var gradientRestauracao = ctx.createLinearGradient(500, 0, 100, 0);
  gradientRestauracao.addColorStop(0 , '#af99bf');
  gradientRestauracao.addColorStop(1 , '#3c2d47');

  var gradientGetulio = ctx.createLinearGradient(500, 0, 100, 0);
  gradientGetulio.addColorStop(0, '#8faec3' );
  gradientGetulio.addColorStop(1, '#406278' );

  var gradientOtavio = ctx.createLinearGradient(500, 0, 100, 0);
  gradientOtavio.addColorStop(0, '#d14a4a');
  gradientOtavio.addColorStop(1, '#681a1a');

  var gradientMiguel = ctx.createLinearGradient(500, 0, 100, 0);
  gradientMiguel.addColorStop(0 , '#87a96b');
  gradientMiguel.addColorStop(1 , '#3c4e2d');

  

  var div = document.getElementById('myChartQueimados');
  var chart = new Chart(ctx, config);
  var config = {
      type: 'line',
      data:{
        labels:[ ],
        datasets:[{
          label: 'Restauração',
          data:[ ],
          fill: gradientRestauracao,
          borderColor: gradientRestauracao, 
          pointBorderColor: gradientRestauracao, 
          pointBackgroundColor: gradientRestauracao, 
          pointHoverBackgroundCor: gradientRestauracao, 
          pointHoverBorderColor: gradientRestauracao,
          borderWidth: 3
        }, {
          label: 'Getulio Vargas',
          data:[  ],
          fill: gradientGetulio,
          borderColor: gradientGetulio, 
          pointBorderColor: gradientGetulio, 
          pointBackgroundColor: gradientGetulio, 
          pointHoverBackgroundCor: gradientGetulio, 
          pointHoverBorderColor: gradientGetulio,
          borderWidth: 3
        }, {
          label: 'Otavio de Freitas',
          data:[  ],
          fill: gradientOtavio,
          borderColor: gradientOtavio, 
          pointBorderColor: gradientOtavio, 
          pointBackgroundColor: gradientOtavio, 
          pointHoverBackgroundCor: gradientOtavio, 
          pointHoverBorderColor: gradientOtavio,
          borderWidth: 3
        }, {
          label: 'Miguel Arraes',
          data:[  ],
          fill: gradientMiguel,
          borderColor: gradientMiguel, 
          pointBorderColor: gradientMiguel, 
          pointBackgroundColor: gradientMiguel, 
          pointHoverBackgroundCor: gradientMiguel, 
          pointHoverBorderColor: gradientMiguel,
          borderWidth: 3
        }]
      },
      options: {
        responsive : true,  
        scales: {
            yAxes: [{
                scaleLabel:{
                  display : true,
                  labelString: 'Vagas',
                  fontColor: "grey",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 16
                },
                ticks: {
                    beginAtZero:true,
                    fontColor: "black",
                    fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                    fontSize: 12}
                  }],
            
            xAxes:[{
              scaleLabel:{
                  display : true,
                  labelString: '22 de Feveiro de 2019',
                  fontColor: "grey",
                  fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                  fontSize: 16
                },
                ticks: {
                    beginAtZero:true,
                    fontColor: "black",
                    fontFamily: "'Roboto', 'Helvetica Neue', 'Helvetica'",
                    fontSize: 12
                }
            }]
          }
        }
  };
  

let draw = Chart.controllers.line.prototype.draw;
Chart.controllers.line = Chart.controllers.line.extend({
    draw: function() {
        draw.apply(this, arguments);
        let ctx = this.chart.chart.ctx;
        let _stroke = ctx.stroke;
        ctx.stroke = function() {
            ctx.save();
            ctx.shadowColor = '#bca9c8';
            ctx.shadowBlur = 10;
            ctx.shadowOffsetX = 0;
            ctx.shadowOffsetY = 7;
            _stroke.apply(this, arguments)
            ctx.restore();
        }
    }
});
  