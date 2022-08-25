<?php
$servername = "localhost";
$dBUsername = "id19421436_micorilan	";
$dBPassword = "Landicho{1201}";
$dBName = "id19421436_dbstatusled";
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
//Read the database
if (isset($_POST['id'])) {
	$led_id = $_POST['id'];	
	$sql = "SELECT * FROM statusled WHERE id = '$led_id';";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	if($row['Stat'] == 0){
		echo "0";
	}
	else{
		echo "1";
	}	
}	

//Update the database
if (isset($_POST['toggle_LED'])) {
	$led_id = $_POST['toggle_LED'];	
	$sql = "SELECT * FROM statusled WHERE id = '$led_id';";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	if($row['status'] == 0){
		$update = mysqli_query($conn, "UPDATE statusled SET Stat = 1 WHERE id = 1;");
		echo "LED_is_on";
	}
	else{
		$update = mysqli_query($conn, "UPDATE statusled SET Stat = 0 WHERE id = 1;");
		echo "LED_is_off";
	}	
}	
?>

