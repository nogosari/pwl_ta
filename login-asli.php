<?php
session_start();
if (isset($_SESSION['id'], $_SESSION['nama'])) {
  header('Location: index.php');
}
echo $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto"><a href="index.html">JOLALI.ID</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <!-- <li><a href="home.php">Home</a></li> -->
          <li><a href="about-1.php">About</a></li>
        </ul>
      </nav><!-- .nav-menu -->

      <a href="login.php" class="get-started-btn scrollto">LOGIN</a>

    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>Welcome To Jolali</h1>
          <h2>Please Login To Your Account</h2>
        </div>
      </div>

      <br><br>
      
      <!-- START FORM LOGIN -->

      <form action="login.php" method="post">
        <input type="hidden" name="mode" value="login">
        <?php
        if (isset($_SESSION['error'])) {
        echo '
        <div class="alert alert-danger" role="alert">
                      '.$_SESSION['error'].'
        </div>';
        }
        ?>

        <div class="form-input form-group row">
          <label for="name" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="name" placeholder="Username">
          </div>
        </div>

        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
        </div>
        

        <div class="form-group row">
          <label for="login" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-8">
            <button type="submit" class="btn btn-primary" name="login">Login</button>
          </div>
        </div>

        <br>

        <div class="form-group row">
          <label for="sign-up" class="col-sm-2 col-form-label">Not a Member?</label>
          <div class="col-sm-8">
            <button type="submit" class="btn btn-primary" name="sign-up"><a href="admin_new.php" class="btn-primary">Sign Up</a></button>
          </div>
        </div>
      </form>

	    
      <div class="panel-footer">
      <div class="text-right">
         <!-- <br> &copy; Harits J.F - A11.2019.11745 -->
      </div>
    </div>
    </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">


  </main><!-- End #main -->


  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<?php
// Form handler, executed if user click LOGIN button
if (isset($_POST['login'])) {
  require_once 'classes/admin.php';

  $admin = new Admin();

  $data = array(
    'name' => $_POST['name'],
    'password' => $_POST['password']
  );

  $resp = $admin->login($data);
  $resp = json_decode($resp);

  if ($resp->status) {
    header('Location: index.php');
  } else {
    header('Location: login.php');
  }
}
?>
