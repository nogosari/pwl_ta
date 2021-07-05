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
<html>
  <head>
    <title>Add Schedule</title>
    <link rel="stylesheet" href="assets/css/style.css">
		<script src="assets/js/script.js"> </script>

  </head>
  <body>
    <div class="container-login">
       <form method="post" action="jadwal_edit.php">
       <input type="hidden" value="<?php echo $data['nomer'];?>" name="nomer">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Add Schedule</h3>
             </div>
	    </div>
               <div class="form-input">
                <input type="date" class="form-control" name="tanggal" value="<?php echo $data['tanggal'];?>">
                </div>
                <div class="form-input">
                  <input type="time" class="form-control" name="waktu" value="<?php echo $data['jam'];?>">
                </div>
		        <div class="form-input">
                   <input type="text" class="form-control" name="keterangan" maxlength="254" value="<?php echo $data['keterangan'];?>">
                </div>
               <button type="submit" class="btn btn-primary" name="submit">Submit</button>

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
