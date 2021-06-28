<?php
	require_once 'templates/header.php';

	require_once 'classes/admin.php';
	$admin=new Admin();

	$data=array(
		'nama'=>$_POST['nama'],
		'email'=>$_POST['email'],
		'password'=>$_POST['password']
	);

	$admin->insert($data);
	header('Location: login.php');

?>

<?php
require_once 'templates/footer.php';
?>
