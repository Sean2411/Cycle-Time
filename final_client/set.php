<?php 
session_start();

if (!isset ($_SESSION['login'])){
header("Location:login_usr.php"); 
} 

$SRC_ID = mysql_real_escape_string($_SESSION['src_id']);
$SRC_ID = (int)$SRC_ID;
if(isset($_POST['option_num'])){
  $num_option = $_POST['option_num'];
}
$CTName = array();
$EVTStart = $_SESSION['EVTStart'];
$EVTEnd = $_SESSION['EVTEnd'];

GetCycleTime($SRC_ID);

function GetCycleTime($SRC_ID){
   global $CTName;
  $mysqli = new mysqli("localhost", "root", "root", "CycleTime");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    if($stmt = $mysqli->prepare("SELECT DISTINCT SRC_CT_NAME FROM CT_Mapping_Tbl Where SRC_ID = ?")){
      $stmt->bind_param("i", $SRC_ID);
      $stmt->execute();
      $stmt->bind_result($SCN);
      while($stmt->fetch()){
        array_push($CTName, $SCN);
      }
  } 
}


?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css1/normalize.css" type="text/css">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/pepper-grinder/jquery-ui.css" media="screen" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css1/main.css" type="text/css">
    <link rel="stylesheet" href="css1/form.css" type="text/css">
    
    <script type="text/javascript" src="js/jquery-ui-1.9.0.custom.min.js">
</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript">
</script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js">
</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript">
</script>
    <script type="text/javascript" src="lib/jquery.ui.core.js">
</script>
    <script type="text/javascript" src="lib/jquery.ui.widget.js">
</script>
    <script type="text/javascript" src="jquery-ui-form.js">
</script>
    <script type="text/javascript" src="js/app.js">
</script>

    <title></title>
</head>

<body>
    <header>
        <a href="#" id="logo"></a>

        <h1 style="color: #fff"><a href="#" id="logo">Cycle Time Prediction System</a></h1>

        <h2><a href="#" id="logo">Client</a></h2>

        <nav>
            <ul>
                <li><a href="description_client.php">Project description</a></li>

                <li><a href="CT.php">Create Cycle Time</a></li>

                <li><a href="cycletime.php">Confirmation</a></li>

                <li><a href="processmap.php">Process</a></li>

                <li><a href="logout.php">logout</a></li>
            </ul>
        </nav>
    </header>

    <div id="products-wrapper">
<form action="processmap.php" method="post">

        <h1>Set Factory</h1>

        <fieldset>

          <legend>Create a Set</legend>

          <label for="name">Set Name:</label>
          <input type="text" id="name" name="set_name">
          <span></span>

          <label for="aggregate">Aggregate option:</label>
          <select name="Aggregator" id="aggregator">
            <option value="Maximum">Maximum</option>
            <option value="Minimum">Minimum</option>
            <option value="Median">Median</option>
          </select>
          <span></span>

<?php for($i = 0; $i< $num_option; $i++){ ?>
          <label for="options">Option (<?php echo $i + 1; ?>):</label>
        <div class="mutliSelect">
          <?php for($j = 0; $j < sizeof($CTName); $j++){ ?>
                <li>
                    <input type="checkbox" name ="CTName[<?php echo $i ?>][]" value="<?php echo $CTName[$j] ?>" /><?php echo $CTName[$j] ?></li>
                    <?php } ?>
        <span></span>
        <label for="dependency">Depend Which CycleTime:</label>
          <select id="dependency" name="set_dependency[]">
            <?php for($t = 0; $t < sizeof($CTName); $t++){?>
              <option value="<?php echo $CTName[$t]; ?>"><?php echo $CTName[$t];?></option>
        <?php }?>
          </select>

      <?php } ?>
        </fieldset>

        <button><input type="submit" id="submit" value="Next"/></button>
</form>
</div>

       </body>

</html>
