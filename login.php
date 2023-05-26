<!DOCTYPE html>
<html lang="en">

<head>
  <title>CoursPresso</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html"><span>Study</span>Lab</a>
    </div>
  </nav>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">

      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <!-- <h1 id="outputMessage">THIS IS THE OUTPUT MESSAGE</h1> -->
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "vatsal";
          try {
            $conn = mysqli_connect($servername, $username, $password, $database);
            error_log("Connection established");
          } catch (Exception $e) {
            error_log("Error connecting to database: " . $e->getMessage);
            // echo "<br>";
          }
          try {
            $email = $_POST["email"];
            $email = strtolower($email);
            $password = $_POST["password"];
            $password = hash('md5', $password);
          } catch (Exception $e) {
          }
          ;
          try {
            $sql = "SELECT * FROM `logindetails` WHERE Email = '$email'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
              if (!isset($email)) {
                echo "<h1>You have succesfully logged out.</h1><br>";
              } elseif (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // echo "Query performed successfully!<br>";
                // echo $row['Password'];
                if ($row['Password'] == $password) {
                  session_start();
                  $_SESSION['name'] = $row['Name'];
                  $_SESSION['email'] = $row['Email'];
                  $_SESSION['StudentId'] = $row['StudentId'];
                  echo "<h1>Hey, " . $row['Name'] . "<br></h1>";
                  echo "<h1>You have succesfully logged in.</h1><br>";
                } else {
                  echo "<h1>Incorrect Email or Password</h1><br>";
                }
              } else {
                echo "<h1>Account Does not exists.</h1><br>";
              }
            }

          } catch (Exception $e) {
            echo "Error Occured!<br>";
            // echo 'Message: ' .$e->getMessage();
            echo "<br>";
          }
          echo "<h4>You will be redirected automatically in 5 seconds</h4>";



          echo "<script>setTimeout(function() {window.location.href = 'index.php';}, 5000);</script>";

          ?>
          <!-- <h4 id="timer"></h4> -->


        </div>
      </div>
    </div>
  </section>





  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>