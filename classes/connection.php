<?php
class Connection
{
  private $host = 'localhost';
  private $db = 'jadwal';
  private $user = 'nogosari';
  private $pass = 'mend';

  private $pdo = null;

  public function connect()
  {
    if ($this->pdo == null) {
      try {
        $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';', $this->user, $this->pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

      } catch (PDOException $e) {
        die($e->getMessage());
      }
    }

    return $this->pdo;
  }

  public function disconnect()
  {
    $this->pdo = null;
  }
}
?>
