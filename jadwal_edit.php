<?php
	include('classes/connection.php');
	require_once 'templates/header.php';
	require_once 'classes/jadwal.php';

	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		if(isset($_POST['submit']))
	{
	}
	}
	$tanggal=$_POST['tanggal'];
	$waktu=$_POST['waktu'];
	$keterangan=$_POST['keterangan'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add Schedule</title>
    <link rel="stylesheet" href="assets/css/style.css">
		<script src="assets/js/script.js"> </script>

  </head>
  <body>
    <div class="container-login">
       <form name=edit_jadwal onsubmit="return validateJadwal()" method="post" action="jadwal_edit.php">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Add Schedule</h3>
             </div>
	    </div>
               <div class="form-input">
                <input type="date" class="form-control" name="tanggal" value="<?php echo $tanggal;?>">
                </div>
                <div class="form-input">
                  <input type="time" class="form-control" name="waktu" value="<?php echo $waktu;?>">
                </div>
		<div class="form-input">
                   <input type="text" class="form-control" name="keterangan" maxlength="254" value="<?php echo $keterangan;?>">
                </div>
               <button type="submit" class="btn btn-primary" value="update">Submit</button>

          </form>
        </div>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
  </body>
</html>

<?php
require_once 'templates/footer.php';
?>
