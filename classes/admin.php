<?php
require_once 'connection.php';

class Admin
{
  private $dbh;
  private $pdo;

  public function __construct()
  {
    $this->dbh = new Connection();
    $this->pdo = $this->dbh->connect();
  }

  public function profile($data)
  {
		$q = "SELECT nama, email, password FROM admin WHERE name='$name' AND password='$password'";
		// eksekusi query
		$e = mysqli_query($connection, $q);
		// hitung hasil dan cek ada atau tidaknya data
		$is_exist = mysqli_num_rows($e);
		if($is_exist>0)
		{
			// keluarkan hasil
			$r = mysqli_fetch_assoc($e);
			$_SESSION['nama'] = $r['nama']; // set session untuk nama
			$_SESSION['email'] = $r['email']; // set session untuk nim
			$_SESSION['password'] = $r['password']; // set session untuk fakultas
		}
		else
		{
			die('username atau password tidak ditemukan');
		}
  }
  
  public function login($data)
  {
    try {
      $sql = "SELECT id_admin, nama
              FROM admin
              WHERE nama = :name AND
                    password = :password";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($data);

      if ($stmt->rowCount() == 1) {
        $admin = $stmt->fetch();

        $_SESSION['id'] = $admin['id_admin'];
        $_SESSION['nama'] = $admin['nama'];
        unset($_SESSION['error']);

        $resp = array(
          'status' => true
        );
      } else {
        $_SESSION['error'] ='Incorrect Username or Password<br>Please Try Again';

        $resp = array(
          'status' => false
        );
      }
    } catch (PDOException $e) {
      $_SESSION['error'] = $e->getMessage();

      $resp = array(
        'status' => false,
      );
    }

    return json_encode($resp);
  }

  
  
  public function logout()
  {
    session_unset();
    session_destroy();
  }

 public function insert($data)
  {
    try {
      $sql = 'INSERT INTO admin VALUES(NULL,:nama,:email,:password)';
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($data);

    $resp = array(
        'status' => true,
        'pesan' => 'Success'
      );
    } catch (PDOException $e) {
      $resp = array(
        'status' => false,
        'pesan' => 'Failed<br>'.$e->getMessage()
      );
    }

    setcookie('admin', json_encode($resp), time() + 30);
  }

}
?>
