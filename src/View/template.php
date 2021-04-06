<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">


 <link rel="stylesheet" href="/projet_annuel/src/Style/fonts/icomoon/style.css">

 <link rel="stylesheet" href="/projet_annuel/src/Style/css/owl.carousel.min.css">

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="/projet_annuel/src/Style/css/bootstrap.min.css">

 <!-- Style -->
 <link rel="stylesheet" href="/projet_annuel/src/Style/css/style.css">

  <title><?php echo $title; ?></title>

  </head>
  <body>
    <?php
    if($c==1){
    echo "<div class='content'>
      <div class='container'>
        <div class='row'>
          <div class='col-md-6'>
              <img src='/projet_annuel/src/Style/images/undraw_remotely_2j6y.svg' alt='Image' class='img-fluid'>
          </div>
          <div class='col-md-6 contents'>
          <div class='row justify-content-center'>
            <div class='col-md-8'>
              <div class='mb-4'>
                <h3>Sign In</h3>
                  <p class='mb-4'>welcome to our social network :)</p>
              </div>
                  ".$content."
    </div>
      </div>
        </div>
      </div>
        </div>
          </div>";
      }

      if($c==0){
        echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
                  <a class='navbar-brand'>Journal</a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='navbar-collapse collapse w-100 order-3 dual-collapse2'>
    <ul class='navbar-nav ml-auto'>
          ".$menu."
            </ul>
        </div>

</nav>";
        echo $pub,$content;
      }
          ?>
  </body>
<script src="/projet_annuel/src/Style/js/jquery-3.3.1.min.js"></script>
<script src="/projet_annuel/src/Style/js/popper.min.js"></script>
<script src="/projet_annuel/src/Style/js/bootstrap.min.js"></script>
<script src="/projet_annuel/src/Style/js/main.js"></script>

    <script>
        // Step 1: Get user coordinates
function getCoordintes() {
    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };

    function success(pos) {
        var crd = pos.coords;
        //var lat = crd.latitude.toString();
        //var lng = crd.longitude.toString();
        var lat = 51.5074;//TESTE SUR UNE AUTRE LOCALICATION COMME LONDON
        var lng = 0.1278;
        var coordinates = [lat,lng];
        console.log('Latitude: ${lat}, Longitude: ${lng}');
        getCity(coordinates);
        return;

    }

    function error(err) {
        console.warn('ERROR(${err.code}): ${err.message}');
    }

    navigator.geolocation.getCurrentPosition(success, error, options);
}

// Step 2: Get city name
function getCity(coordinates) {
    var xhr = new XMLHttpRequest();
    var lat = coordinates[0];
    var lng = coordinates[1];
    console.log(coordinates);

    // Paste your LocationIQ token below.
    xhr.open('GET', "https://us1.locationiq.com/v1/reverse.php?key=pk.1decbb65e6d664b5fb44a48a23ea08ed&lat=" + lat + "&lon=" + lng + "&format=json", true);
    xhr.send();
    xhr.onreadystatechange = processRequest;
    xhr.addEventListener("readystatechange", processRequest, false);

    function processRequest(e) {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            var city = response.address.city;
            console.log(city);
            //document.write(city);
            document.getElementById("myCity").innerHTML = city;

            return;
        }
    }
}
    </script>
</html>
