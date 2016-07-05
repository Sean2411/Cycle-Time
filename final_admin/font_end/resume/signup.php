 <?php
include('database_class.php');
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		CreateUser($username, $password);
	}
function CreateUser($username, $password){
	$newdb = new database();
	$newdb->setup('root','root','localhost','fontend');
	if(mysqli_num_rows($newdb->send_sql("SELECT * From Profile where username = '$username'")) == 0){
		$result = $newdb->send_sql("INSERT INTO Profile (Username, Password, UserId) values ('$username','$password', Default) ");
		if(!$result){
		print_r("Query failed: " . mysqli_errno());
		}
		else{
		print_r("Create Success!");
		}
	}
}
// function CheckUser(){
// }

 ?>