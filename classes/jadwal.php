<?php
require_once 'classes/connection.php';

class Jadwal
{
  private $dbh;
  private $pdo;

  public function __construct()
  {
    $this->dbh = new Connection();
    $this->pdo = $this->dbh->connect();
  }

  public function selectAll() {
    $id=$_SESSION['id'];
    try {
      $sql = "SELECT nomer, tanggal, jam, keterangan
              FROM kegiatan
              WHERE id_admin = $id
              ORDER BY nomer ASC";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        $kegiatan = $stmt->fetchAll();
        $data = '';
        $nomer=1;
        foreach ($kegiatan as $kegiatan) {
          $data .= '
            <tr>
              <td>'.$nomer++.'</td>
              <td>'.$kegiatan['tanggal'].'</td>
              <td>'.$kegiatan['jam'].'</td>
              <td>'.$kegiatan['keterangan'].'</td>
              <td>
                <a href="jadwal_edit.php?nomer='.$kegiatan['nomer'].'" class="btn btn-danger btn-xs" role="button">Edit</a>
                <a href="jadwal_delete.php?nomer='.$kegiatan['nomer'].'" class="btn btn-danger btn-xs" role="button">Delete</a>
              </td>
            </tr>
          ';
        }

        $resp = array(
          'status' => true,
          'data' => $data
        );
      } else {
        $resp = array(
          'status' => false,
          'pesan' => '<tr><td colspan="4">No Schedule</td></tr>'
        );
      }
    } catch (PDOException $e) {
      $resp = array(
        'status' => false,
        'pesan' => $e->getMessage()
      );
    }

    return json_encode($resp);
  }

  public function delete($data)
  {
    try {
      $sql = "DELETE FROM kegiatan WHERE nomer = :nomer";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($data);

      $resp = array(
        'status' => true,
        'pesan' => 'Delete Successfuly'
      );
    } catch (PDOException $e) {
      $resp = array(
        'status' => false,
        'pesan' => 'Delete Failure<br>'.$e->getMessage()
      );
    }

    setcookie('kegiatan', json_encode($resp), time() + 30);
  }

  public function insert($data)
  {
    try {
      $sql = 'INSERT INTO kegiatan VALUES(NULL, :id, :tanggal, :waktu, :keterangan)';
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($data);

    $resp = array(
        'status' => true,
        'pesan' => 'Add Successfuly'
      );
    } catch (PDOException $e) {
      $resp = array(
        'status' => false,
        'pesan' => 'Add Failure<br>'.$e->getMessage()
      );
    }

    setcookie('kegiatan', json_encode($resp), time() + 30);
  }

  public function edit($id) {
    // $id=$_SESSION['id'];
    try {
      $sql = "SELECT nomer, tanggal, jam, keterangan
              FROM kegiatan
              WHERE nomer = $id";

      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $kegiatan = $stmt->fetchAll();

      $resp = array(
        'status' => true,
        'data' => $kegiatan
      );
      
    } catch (PDOException $e) {
      $resp = array(
        'status' => false,
        'pesan' => $e->getMessage()
      );
    }

    return ($resp);
  }

  public function update($nomer,$tanggal,$waktu,$keterangan)
  {
    try {
      $sql = "UPDATE kegiatan SET tanggal='$tanggal',jam='$waktu',keterangan='$keterangan' WHERE nomer=$nomer";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $resp = array(
        'status' => true,
        'pesan' => 'Update Successfuly'
      );
    } catch (PDOException $e) {
      $resp = array(
        'status' => false,
        'pesan' => 'Update Failure<br>'.$e->getMessage()
      );
    }
    return $resp;
    // setcookie('kegiatan', json_encod e($resp), time() + 30);
  }
}
?>

<?php
require_once 'templates/footer.php';
?>
