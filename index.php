<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Basic IOT</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/title_icon.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="../basic_iot/css/style.css">
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
  <div class="container text-center padds" data-mdb-ripple-color="light">
  <img
  src="../basic_iot/img/lights_off.png"
  class="img-fluid hover-shadow"
  alt="lights_off"/>
  <div class="container padds">
    The LED is currently OFF
  </div>
  <div class="container">
    <p><b> Note:</b> The LED can also be turn on whenever the user press the pushbutton on the circuit</p> 
  </div>

  <div class="container">
    <form method = "POST" enctyp = "multipart/form-data">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="off" id="inlineRadio1" value="0" />
      <label class="form-check-label" for="inlineRadio1">Lights-OFF</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="on" id="inlineRadio2" value="1" />
      <label class="form-check-label" for="inlineRadio2">Lights-ON</label>
    </div>


    </form>
 
  </div>
  


</div>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src = "js/"></script>


  </body>
</html>
