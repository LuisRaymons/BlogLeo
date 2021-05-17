<?php


//define("$urlbase","http://leosaxmusical.atwebpages.com/");

$urlbase = "127.0.0.1/blogApi/";

switch ($_GET['method']) {
	case 'sliderprincipal':
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $urlbase.'api/slider.php?method=pricipal');
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 $output = curl_exec($ch);
		 echo($output);
	break;

	case 'slidermisa':
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $urlbase.'api/slider.php?method=misa');
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 $output = curl_exec($ch);
		 echo($output);
	break;


	case 'song':
		$ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $urlbase .'api/song.php');
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 $output = curl_exec($ch);
		 print_r($output);
	break;
	case 'songById':
	$idsong = $_GET['id'];
		$ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $urlbase .'api/song.php?id=' . $idsong );
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 $output = curl_exec($ch);
		 print_r($output);
	break;
	case 'videos':
		$ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $urlbase .'api/video.php?typetable=principal');
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 $output = curl_exec($ch);
		 print_r($output);
	break;
	case 'videosmisa':
		$ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $urlbase .'api/video.php?typetable="misas"');
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 $output = curl_exec($ch);
		 print_r($output);
	break;
	case 'descuentos':
		$ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $urlbase .'api/descuento.php');
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 $output = curl_exec($ch);
		 print_r($output);
	break;
	case 'users':
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $urlbase.'api/user.php?method=sendemail');
		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, "namefull=".$_GET['nombre']."&emailcontract=" . $_GET['email'] . "&phonecontact=" . $_GET['phone'] ."&dateevento=" . $_GET['dayevent'] . "&address=" . $_GET['adress'] . "&comentariocontact=" . trim($_GET['comment']));
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$output = curl_exec ($ch);
		$error = curl_error($ch);
		echo($output);
	break;

	case 'menus':
	$ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL, $urlbase .'api/menu.php?menuss=menu');
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 $output = curl_exec($ch);
	 print_r($output);
	break;
	case 'submenu':
	$ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL, $urlbase .'api/menu.php?menuss=submenu&id=' . $_GET['id']);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 $output = curl_exec($ch);
	 print_r($output);
	break;
}

curl_close($ch);

 ?>
