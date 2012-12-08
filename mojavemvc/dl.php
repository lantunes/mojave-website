<?php

$con = mysql_connect("localhost", "mysql", "")
or die ("Sorry, can't connect to database.");
mysql_select_db("mojavemvc", $con);

$filename = mysql_real_escape_string($_GET['file']);
$path = $_SERVER['DOCUMENT_ROOT']."/"; //path of this file
$fullPath = $path.$filename; //path to download file

$filetypes = array("jar","zip");

if (!in_array(substr($filename, -3), $filetypes)) {
	echo "Invalid download type.";
	exit;
}

if ($fd = fopen ($fullPath, "r")) {

	$remoteaddr = $_SERVER['REMOTE_ADDR'];
	$useragent = $_SERVER['HTTP_USER_AGENT'];

	$sql = "INSERT INTO `downloads` (`filename`, `remoteaddr`, `date`,`useragent`) VALUES ('".$filename."','".$remoteaddr."',NOW(),'".$useragent."')";
	mysql_query($sql,$con);

	//the next part outputs the file
	$fsize = filesize($fullPath);
	$path_parts = pathinfo($fullPath);

	header("Content-type: application/octet-stream");
	header("Content-Disposition: filename=\"" . $path_parts["basename"] . "\"");
	header("Content-length: $fsize");
	header("Cache-control: private"); //use this to open files directly
	while(!feof($fd)) {
		$buffer = fread($fd, 2048);
		echo $buffer;
	}
}

mysql_close($con);
fclose ($fd);
exit;

?>
