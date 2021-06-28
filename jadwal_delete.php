<?php
require_once 'classes/jadwal.php';

$jadwal = new Jadwal();

$data = array('nomer' => $_GET['nomer']);
$jadwal->delete($data);

header('Location: jadwal_list.php');
?>
