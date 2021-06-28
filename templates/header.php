<?php
session_start();

if (!isset($_SESSION['id'], $_SESSION['nama'])) {
  header('Location: login.php');
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>My Schedule</title>
      </head>
  <body>
        <ul class="nav">
	     <li><a href="index.php"><?php echo 'Hi, '.$_SESSION['nama']; ?></a></li>

	     <li><a href="jadwal_list.php">List Schedule</a></li>
	     <li><a href="jadwal_new.php">Add Schedule</a></li>
           <li><a href="logout.php">Logout</a></li>
         </ul>
  </body>
</html>
