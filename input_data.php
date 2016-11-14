<?php
date_default_timezone_set('Asia/Bangkok');
echo date('d/m/Y H:i:s');
	// require_once("config.php");
	// $conn = mysqli_connect($servername, $username, $password, $database);

	// // Check connection
 // 	if (!$conn) {
 //     	die("Connection failed: " . mysqli_connect_error());
	// }

	// $data = file("DTNTF_2015.txt");
	// $nomor_data = count($data);
	// //echo $nomor_data;
	// if ($nomor_data ==0){
	// 	echo "Tidak ada Data..........";
	// }
	// else{
	// 	for($j=0;$j<$nomor_data;$j++){     
	// 	 	$kata2 = $data[$j];                 
	// 	 	if ($kata2 !=""){                     
	// 	 		$NIM=explode("/",$kata2);                     
	// 	 		//print_r($kataRem);                     
	// 	 		$NIM = $NIM[1];
	// 	 		$sql = "insert into users (NIM,name_user,jurusan_user) values('$NIM','','DTNTF')";
				
	// 	 		$hasil = mysqli_query($conn, $sql);
	// 	 	}
	// 	}
	// }
?>
