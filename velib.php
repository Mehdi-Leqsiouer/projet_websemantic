<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" http-equiv="Cache-control" content="no-cache">
	<title>Distance</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/styles2.css">

    <link rel="stylesheet" type="text/css" href="css/styles3.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="banner">
        <div class="container">
            <!-- Brand -->

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="velib.php"><b>Velib</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gares.php">Gares</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


</head>

<body>

<div class="row" id="contatti">
<div class="container mt-5" >
    <br>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>
  
  <script src="js/leaflet.ajax.min.js"> </script>
  
    <div class="row" style="height:575px;">
      <div class="col-md-6 maps" id = "map" > </div>
         <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.492291371422!2d12.4922309!3d41.8902102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28f1c82e908503c4!2sColosseo!5e0!3m2!1sit!2sit!4v1524815927977" frameborder="0" style="border:0" allowfullscreen></iframe>-->
		 <script type = "text/javascript">
		 var map = L.map('map').setView([48.8566969, 2.3514616], 11);
         var file_path = "";
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

         var markerLayer = L.layerGroup().addTo(map);

		
		 </script>

      <div class="col-md-6">
        <h2 class="text-uppercase mt-3 font-weight-bold text-white">DISTANCE</h2>
		
		<h3 class="text-uppercase mt-4 font-weight-bold text-white"></h3>
          <p>Bonjour ! Veuillez choisir un filtre a appliquer</p>
		
        <form role = "form" name ="distance" id = "distance" autocomplete="off" method = "GET" >
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" id="all" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Afficher toutes les stations velibs (limiter à 100)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" id="all_X">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Afficher les stations avec nombres de vélibs disponibles supérieurs à :
                    </label>
                </div>
                <div class="col-lg-6">
                    <div class="form-check">
                        <input type="number" name="nb_velo" id="nb_velo" placeholder = "Nombre de vélos" disabled>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" id="elec">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Afficher les stations SANS vélos electriques
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" id="meca" >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Afficher les stations SANS vélos mécaniques
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" id="disp" >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Afficher les stations SANS vélos disponibles
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" id="fonc" >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Afficher les stations désactivées
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" id="borne" >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Afficher les stations SANS des bornes de paiements
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" id="retour" >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Afficher les stations ou le retour n'est PAS disponible
                    </label>
                </div>
                <div class="col-12">
                    <button class="btn btn-light" type="submit">Envoyer</button>
                </div>
            </div>
            </br>
        </form>


          <script>
              $(document).ready(function() {
                  $("input[type='radio']").click(function (e) {
                      var radios = document.getElementsByName('choice');
                      var checked = "";
                      for (var i = 0, length = radios.length; i < length; i++) {
                          if (radios[i].checked) {
                              // do whatever you want with the checked radio
                              //alert(radios[i].value);
                              checked = radios[i].id;
                              // only one radio can be logically checked, don't check the rest
                              break;
                          }
                      }
                      if (checked == "all_X") {
                          console.log("all_X");
                          $("#nb_velo").prop('disabled',false);

                      }
                      else {
                          $("#nb_velo").prop('disabled',true);
                          $("#nb_velo").prop('value','');

                      }
                  });

              });
          </script>


          <form role = "form" name ="clean" id = "clean" autocomplete="off" method = "GET">
          <div class="col-12">
              <button class="btn btn-light" id = "clear" name  ="clear" type="submit">Nettoyer</button>
          </div>
          </form>

          <script>
              $(document).ready(function() {

                  // process the form
                  $('#distance').submit(function(event) {
                      event.preventDefault();
                      markerLayer.clearLayers();
                      // get the form data
                      // there are many ways to get this data using jQuery (you can use the class or id also)
                      //console.log(values);
                      var radios = document.getElementsByName('choice');
                      var checked = "";
                      for (var i = 0, length = radios.length; i < length; i++) {
                          if (radios[i].checked) {
                              // do whatever you want with the checked radio
                              //alert(radios[i].value);
                              checked = radios[i].id;
                              // only one radio can be logically checked, don't check the rest
                              break;
                          }
                      }
                      console.log(checked);

                      var param = "";
                      if (checked== "all_X")
                          param = document.getElementsByName('nb_velo')[0].value;


                      var formData = {
                          'choice'              : checked,
                          'type'                : 'VELIB',
                          'param'               :param
                      };
                      console.log(formData);
                      // process the form
                      $.ajax({
                          type        : 'GET', // define the type of HTTP verb we want to use (POST for our form)
                          url         : 'get_rdf.php', // the url where we want to POST
                          data        : formData,
                          processData: true // our data object
                      })
                          // using the done promise callback
                          .done(function(data) {
                              //alert("ok");
                              var json_data = JSON.parse(data);
                              //console.log(json_data);

                              for(var i = 0; i < json_data.length;i++) {
                                  var point = json_data[i];
                                  var name = point.name;
                                  var latitude = point.latitude;
                                  var longitude = point.longitude;
                                  L.marker([latitude, longitude]).addTo(markerLayer)
                                      .bindPopup(name)
                                      .openPopup();
                              }

                              // here we will handle errors and validation messages
                          }).fail(function() {
                          alert("erreur");
                      })
                      ;

                      // stop the form from submitting the normal way and refreshing the page
                      event.preventDefault();
                  });

              });
          </script>

          <script>
              $(document).ready(function() {

                  // process the form
                  $('#clean').submit(function(event) {
                      event.preventDefault();

                      markerLayer.clearLayers();
                      // stop the form from submitting the normal way and refreshing the page
                      event.preventDefault();
                  });

              });
          </script>


    </div>
</div>

</div>

<!--
<div class="row text-center bg-success text-white" id="author">
  <div class="col-12 mt-4 h3 ">
      test !!
</div>
<div class="col-12 my-2">

</div>


</div>-->

</body>

    <!--Bottom Footer-->

    <!--Bottom Footer-->

</html>