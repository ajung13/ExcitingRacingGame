<html>
<body>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

echo ("MySQL - PHP Connect Test <br/>");
$hostname = "localhost";
$username = "cs20131605";
$password = "dbpass";
$dbname = "db20131605";

$connect = new mysqli($hostname, $username, $password) 
     or die("DB Connection Failed");
//$result = mysql_select_db($dbname,$connect);
 
if($connect) {
 echo("MySQL Server Connect Success!<br>");
}
else {
 echo("MySQL Server Connect Failed!<br>");
}


// define variables and set to empty values
$name=$psw=$number=$score=$rank= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $psw = test_input($_POST["psw"]);
  $score = test_input($_POST["score"]);
  echo("posted<br/>");
}
//$score="<script>document.write(score);</script>"

echo($score + "!!!!!!!!!!!!!!!!");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$sql="USE db20131605;";
if($connect->query($sql)===TRUE){
		echo "Database selected sucessfully!<br>";
}
else{
		echo "Error: " . $sql . "<br>" . $connect->error;
}

$sql="CREATE TABLE IF NOT EXISTS userInfo(UserName VARCHAR(20) NOT NULL, UserPW VARCHAR(20), UserNumber INT NULL , UserScore VARCHAR(50), UserRank INT);";

if($connect->query($sql)===TRUE){
		echo "New table created successfully!<br>";
}
else{
		echo "Error: " . $sql . "<br>" . $connect->error;
}

$sql="INSERT INTO userInfo(UserName, UserPW, UserScore) VALUES('".$name."', '".$psw."', '".$score."')";

if($connect->query($sql)===TRUE){
		echo "New record created successfully!<br>";
}
else{
		echo "Error: " . $sql . "<br>" . $connect->error;
}
$connect->close() ; 
?>

<META HTTP-EQUIV ="Refresh" CONTENT="0; URL=http://cspro.sogang.ac.kr/~cse20131605/project/display.php">
</body>
</html>
