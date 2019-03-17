  var dayName = new Array ("domingo", "segunda", "terça", "quarta", "quinta", "sexta", "sábado");
   var monName = new Array ("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Agosto", "Outubro", "Novembro", "Dezembro");
      now = new Date();
      
      
        document.getElementById('task-card-date-atual').innerHTML = " " +now.getDate() + " de "+ monName[now.getMonth()] + " de " + now.getFullYear();
      
        document.getElementById('task-card-date-mes').innerHTML = " " + monName[now.getMonth()] + " de " + now.getFullYear(); ;
