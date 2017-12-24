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

	$nextPageFlag = 0;
    if($signin == 1){
		//the case of singin, we have to insert new user's info
        $sql = "insert into userInfo(UserName, UserPW, UserScore)  values('" . $name . "', '" . $passwd . "', 0)";
		echo("<br/>" . $sql . "<br/>");
		if(!$connect->query($sql))
			echo("Error inserting: " . $connect->error . "<br/>");
		else
			$nextPageFlag = 1;
	}
	else{
		//the case of login, we have to check id and password
		$sql = "select UserPW from userInfo where UserName='" . $name . "';";
		$result = $connect->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				if($row["UserPW"] == $passwd)
					$nextPageFlag = 1;
			}
		}
		$result->close();
	}

	$connect->close();
?>

<META http-equiv='refresh' content='0; url=http://cspro.sogang.ac.kr/~cse20131605/project

<?php
	if($nextPageFlag == 0){
		echo("/login.html'>");
		echo("<script>alert('Login Error');</script>");
	}
	else{
		echo("/racingGame.html?id=" . $name . "'>");
	}
?>
</BODY>

</HTML>
