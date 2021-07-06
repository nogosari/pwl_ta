<?php
	include('classes/connection.php');
	require_once 'templates/header.php';
	require_once 'classes/jadwal.php';

    
    $jadwal = new Jadwal();


    $resp = $jadwal->edit($_GET['nomer']);
    $data = $resp['data'][0];
    
    if(isset($_POST['submit'])) {
        $nomer=$_POST['nomer'];
        $tanggal=$_POST['tanggal'];
        $waktu=$_POST['waktu'];
        $keterangan=$_POST['keterangan'];

        $update = $jadwal->update($nomer,$tanggal,$waktu,$keterangan);
        if($update['status'] == 1){
            header("Location: jadwal_list.php");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Jadwal</title>
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
      <h1 class="logo mr-auto"><a href="index.php">JOLALI.ID</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
        </ul>
      </nav>
      <!-- .nav-menu -->

      <a href="logout.php" class="get-started-btn scrollto">LOGOUT</a>

    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h2>Edit Your Schedule</h2>
        </div>
      </div>

      <br><br>

      
      <!-- START FORM -->
      <form form method="post" action="jadwal_edit.php">
        <input type="hidden" value="<?php echo $data['nomer'];?>" name="nomer">

            <div class="form-input form-group row">
              <label for="name" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal" value="<?php echo $data['tanggal'];?>">
              </div>
            </div>  

            <div class="form-input form-group row">
              <label for="name" class="col-sm-2 col-form-label">Time</label>
              <div class="col-sm-9">
                <input type="time" class="form-control" name="waktu" value="<?php echo $data['jam'];?>">
              </div>
            </div>            

            <div class="form-input form-group row">
              <label for="name" class="col-sm-2 col-form-label">Keterangan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="keterangan" maxlength="254" value="<?php echo $data['keterangan'];?>">
              </div>
            </div>
			
            <br>

            <div class="form-group row">
              <label for="login" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </div>
            </div>

            <div class="form-group row">
              <label for="login" class="col-sm-2 col-form-label"></label>
              <a href="jadwal_list.php">
              <div class="col-sm-10">
                <a href="jadwal_list.php">
                  <button type="submit" class="btn btn-primary">Cancel</button>
                </a>
              </div>              
            </div>

      </form>
	    
      <div class="panel-footer">
      <div class="text-right">
         <!--  -->
      </div>
    </div>
    </div>

    </div>
  </section>
  <!-- End Hero -->

  <main id="main">


  </main>
  <!-- End #main -->


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
require_once 'templates/footer.php';
?>
