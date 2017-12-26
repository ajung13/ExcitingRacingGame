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


$sql="USE db20131605;";
if($connect->query($sql)===TRUE){
		echo "Database selected sucessfully!<br>";
}
else{
		echo "Error: " . $sql . "<br>" . $connect->error;
}

$sql="SELECT * from userInfo order by UserScore ASC ";

//$result=$connect->query($sql);
//echo "<table border='1'><tr><th>idnumber</th><th>name</th><th>email</th><th>phone</th><th>topping</th><th>paymethod</th><th>callfirst</th><th>orderdate</th>";
$result=$connect->query($sql);
$idx=1;
if($result->num_rows>0){
echo "<table border='1'><tr><th width='10%'>rank</th><th>name</th><th>time</th>";
		while($row=$result->fetch_assoc()){
				echo "<tr>";
				echo "<td>" . $idx.  "</td>";
				echo "<td align='center'>" . $row["UserName"]. "</td>";
				echo "<td align='center'>" . $row["UserScore"]. "</td>";
							echo "</tr>";
				$idx++;
		}
}
else{
		echo "0 result!";
}
echo "</table>";
$connect->close() ; 
?>

</body>
</html>
