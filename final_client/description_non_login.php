<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">

    <title contenteditable="false">Login_usr</title>
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/responsive.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/form.css" rel="stylesheet" type="text/css"><!--     <link href="css/dialog.css" rel="stylesheet" type="text/css"> -->
    <!-- Including CSS File Here-->
    <!-- Including CSS & jQuery Dialog UI Here-->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript">
</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript">
</script>
    <script src="js/dialog.js" type="text/javascript">
</script>
</head>

<body>
    <header>
        <h1 contenteditable="true"><a href="description_client.php" id="logo">Cycle Time Prediction System</a></h1>

        <h2><a href="description_client.php" id="logo">Client Tool</a></h2>
        
		<!--
<nav>
			<ul class="log">
				<li id="login" type="button"><a href="login_usr.php">Login</a></li>
			</ul>
		</nav>
-->


        <nav style="margin: 8px 0;">
            <ul>
                <li><a href="description_client.php">Project description</a></li>

                <li><a href="CT.php" >Create Cycle Time</a></li>

                <li><a href="cycletime.php">Confirmation</a></li>

                <li><a href="#">Process</a></li>

<!--                 <li><a href="logout.php">logout</a></li> -->
                <li><a href="login_usr.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <div id="description">
        <ul>
            <li>The TOOL provides the capability of:

                <ul>
                    <li>Loading and standardizing new data sets (profile, data type, map with company’s DB)</li>

                    <li>Creating and naming Cycle Times based on selected set of data</li>

                    <li>Creating grouping options and group exceptions for each cycle time</li>

                    <li>Creating the process flow</li>

                    <li>Identifying the statistical values that will be calculated per cycle time</li>

                    <li>Running the calculations</li>

                    <li>Predicting deadlines based on pre-defined process flow and historic data</li>

                    <li>Allow filtering of results based on input data (Basic & Advanced filters), such as proposed start and end dates and other data types</li>
                </ul>
            </li>
        </ul>
    </div><?php include 'footer.php';?>
</body>
</html>
