<?php
    include 'config.php';
    include 'connection.php';

  $vaga = DBRead('info_hospitais', null, 'hospital, lat, log, queimados');


 
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

<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

<body>			
		<div id="map">
    <script>
 var hospitais = {

<?php
  $hospital = "\n";


        for($i = 0;$i < count($vaga); $i++){
        
          $nome = explode(" ", $vaga[$i]['hospital']);

          $hospital .= $nome[0];
          $hospital .= ":{\n\t\t\tcentro:";
          $hospital .= "{ lat : {$vaga[$i]['lat']}, lng :{$vaga[$i]['log']} },\n\t\t\t";
          $hospital .= "vaga: {$vaga[$i]['queimados']},\n\t\t\t";
            if ($vaga[$i]['queimados'] < 4) {
             $hospital .= "cor: '#F4415B' }";
            }
            else if ($vaga[$i]['queimados'] < 7) {
             $hospital .= "cor: '#F4D742' }";
            }
            else if ($vaga[$i]['queimados'] < 10) {
             $hospital .= "cor: '#4195F4' }";
            }
            else {
             $hospital .= "cor: '#42F4B9' }"; 
            }
            if($i != count($vaga) -1)
             $hospital .=",\n";
        }
        echo $hospital;
?>
 }


      function initMap() {
        // Styles a map in night mode.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -8.584382, lng: -37.969646},
          zoom: 7.67,
		  mapTypeControl: false,
		  streetViewControl: false,
		  fullscreenControl: false,
          styles: [{
        'featureType': 'all',
        'elementType': 'all',
        'stylers': [{'visibility': 'off'}]
      }, {
        'featureType': 'landscape',
        'elementType': 'geometry',
        'stylers': [{'visibility': 'on'}, {'color': '#fcfcfc'}]
      }, {
        'featureType': 'water',
        'elementType': 'labels',
        'stylers': [{'visibility': 'off'}]
      }, {
        'featureType': 'water',
        'elementType': 'geometry',
        'stylers': [{'visibility': 'on'}, {'hue': '#5f94ff'}, {'lightness': 60}]
      }]
        });
      
	  
	 map.data.loadGeoJson('map2.geojson');
	 map.data.setStyle(function(feature) {
          var color = 'gray';
          if (feature.getProperty('isColorful')) {
            color = feature.getProperty('color');
          }
          return /** @type {!google.maps.Data.StyleOptions} */({
            fillColor: color,
            strokeColor: color,
            strokeWeight: 2
          });
        }); 
	   

     for (var hosp in hospitais){



        var cityCircle = new google.maps.Circle({
            strokeColor: hospitais[hosp].cor,
            strokeOpacity: 1,
            strokeWeight: 2,
            fillColor: hospitais[hosp].cor,
            fillOpacity: 1,
            map: map,
            center: hospitais[hosp].centro,
            radius:  9000 
          });


     } 
	 
	 



   }
	 
 

      
	  
	 
    </script>
		</div>
		    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKKh5M6n8iEdp9tiG6II94BpXdO-JtklQ&callback=initMap">
    </script>
			</body>
</html>