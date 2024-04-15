<?php 
    $ketnoi=mysqli_connect("localhost", "root", "");
	mysqli_select_db($ketnoi,"qlbansach");
	mysqli_query($ketnoi,"SET NAMES 'utf8'");
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');

?>