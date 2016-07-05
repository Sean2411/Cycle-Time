<?php  
	session_start();
	$country=intval($_GET['UserName']);

	$mysqli=mysqli_connect('localhost','slu','1218_Max','JVA_ct');

	if (!$mysqli)
		die("Can't connect to MySQL: ".mysqli_connect_error());
/* 	$username =$_SESSION['username'];   */
	$username = "clientA";  
	
	$stmt = $mysqli->prepare("SELECT DISTINCT CampaignType FROM EVENT_Tbl INNER JOIN Source WHERE UserName= ? "); 	
	$stmt->bind_param("s", $username); 
	$stmt->execute();

	$result = $stmt->get_result();
	while ($myrow = $result->fetch_assoc()) {

        // use your $myrow array as you would with any other fetch
        printf("%s\n",$myrow['CampaignType']);
        echo "<br>";

    }
?>

<?php 

foreach ($result as $row){
echo "<option value=$row[CampaignType]>$row[CampaignType]</option>"; 



}
echo "</select>"


?>

