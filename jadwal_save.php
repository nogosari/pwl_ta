<?php
	require_once 'templates/header.php';

	include 'classes/jadwal.php';
	$jadwal=new Jadwal();
	$id = $_SESSION['id'];
	$data=array(
		'id'=>$id,
		'tanggal'=>$_POST['tanggal'],
		'waktu'=>$_POST['waktu'],
		'keterangan'=>$_POST['keterangan']
	);

	$dateNow = date('Y-m-d');
	if($data['tanggal'] < $dateNow)
	{
		//  echo '<script>alert("Wrong Date!");</script>';
		//  echo '<meta http-equiv="refresh" content="1 url=jadwal_new.php">';
		echo "<script> alert('Wrong Date!'); location.href='jadwal_new.php';</script>";
	}
	else
	{
		$jadwal->insert($data);
		header('Location: jadwal_list.php');
	}
?>

<?php
require_once 'templates/footer.php';
?>
