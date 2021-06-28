<?php
require_once 'templates/header.php';
require_once 'classes/admin.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Privacy</title>
    <link rel="stylesheet" href="assets/css/style.css">
		<script src="assets/js/script.js"></script>

  </head>

  <body>
    <div class="container-login">
      <form name="profile" action="profile_process.php">
          <div class="panel-heading">
             <h3 class="panel-title">Your Privacy Data</h3>

          <?php
          $admin = new admin();
          $resp = $admin->privacy();
          foreach ($resp as $row){
            echo '
            <tr><br>
            <a> Nama : <td> '.$row['nama'].'</td>
            ';
          }
          ?>
          </div>
          <br>
          <a class="link-create" href="index.php" button type="submit" class="btn">Back</a></button>
      </form>
    </div>

    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
    </body>

		<script src="assets/js/jquery.js"></script>
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/jqueryui/js/jquery-ui.min.js"></script>
</html>

    <?php
    require_once 'templates/footer.php';
    ?>
