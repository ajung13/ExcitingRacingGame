<HTML>
<BODY>
Wait a second...

<?php
	$signin = 0;
	$name = $_POST["username"];
	if($name == ""){
		$signin = 1;
		$name = $_POST["new_username"];
	}
	$passwd = $_POST["psw"];

	$connect = new mysqli("localhost", "cs20131605", "dbpass") or die("DB connection failed");
	if(!$connect)
		echo("MySQL server connect failed!<br/>");
	
	$sql = "USE db20131605;";
	if(!$connect->query($sql))
		echo("Error selecting DB: " . $connect->error . "<br/>");
	
	if($signin == 1){
		$sql = "insert into userInfo(UserName, UserPW, UserScore)  values(" . $name . ", " . $passwd . ", ";
</BODY>
</HTML>
