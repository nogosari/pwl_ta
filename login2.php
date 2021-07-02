<?php
session_start();
echo 'Welcome to page #1';
if (isset($_SESSION['id'], $_SESSION['nama'])) {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title> Test Web</title>
    <!--<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">--!>
    <!--<link rel="stylesheet" href="assets/jqueryui/css/jquery-ui.min.css">--!>
	<link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
            <div class="header">
              <h3 class="title">
                <div class="text-center">
                  <strong>Login to Your Account</strong>
                </div>
              </h3>
            </div>
            <div class="body">
              <form action="login.php" method="post">
                <input type="hidden" name="mode" value="login">
                <?php
                if (isset($_SESSION['error'])) {
                  echo '
                    <div class="alert alert-danger" role="alert">
                      '.$_SESSION['error'].'
                    </div>
                  ';
                }
                ?>
                <div class="form-group">
                  <label class="sr-only" for="name">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="name" placeholder="username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="sr-only" for="password">Password</label>
                  <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn" name="login">LOGIN</button>
                </div>
              </form>
            </div>
<a class="link-create" href="admin_new.php" >Create ID here, if you don't have any ID</a>


            <div class="panel-footer">
              <div class="text-right">
                &copy; UJIAN IP
              </div>
             </div>
	</div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/jqueryui/js/jquery-ui.min.js"></script>
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
