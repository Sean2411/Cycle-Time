<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Secret question query</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<form action="findpw_confirm_ques.php" method="post">
		<div align="center">
			<p style="font-size: x-large">Please answer the following secret questions</p>
		</div>
		<p>	
			<label id="question" for="question"><?php echo $_SESSION['question']?></label>
			<input id="Answer" name="Answer" type="text" placeholder="Please answer *">
		</p>
		
		
		
		<p>
			<input type="submit" value="SUBMIT" id="submit">
		</p>
	</form>
	</body>
</html>