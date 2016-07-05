<?php 
include_once 'Session_Config.php';
$SRC_ID = mysql_real_escape_string($_SESSION['srcId']);
$SRC_ID = (int)$SRC_ID;
$num_option = 2;
$CTName = array();


GetCycleTime($SRC_ID);

function GetCycleTime($SRC_ID){
   global $CTName;
  include 'DB_Config.php';
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
     <link rel="stylesheet" href="css/normalize.css">
     <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/pepper-grinder/jquery-ui.css" media="screen" rel="stylesheet" type="text/css">
     <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
     <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
     <link rel="stylesheet" href="css/header.css">
      <link rel="stylesheet" href="css/main.css">
      <link rel="stylesheet" href="css/form.css">
    <script type="text/javascript" src="js/jquery-ui-1.9.0.custom.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="lib/jquery.ui.core.js"></script>
    <script type="text/javascript" src="lib/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="jquery-ui-form.js"></script>
    
  

    <header>
      <a href="admin.php" id ="logo">
        <h1>Cycle Time</h1>
        <h2>AdminSystem</h2>
      </a>  
      <nav>
        <ul>
          <li><a href="adminsystem.php">admin</a></li>
          <li><a href="client.php" class="selected">Create_dataset</a></li>
          <li><a href="update.php">Update_dataset</a></li>
          <li><a href="logout.php">logout</a></li>
        </ul>
      </nav>
    </header>
    <body>

      <div id="products-wrapper">
<form action="processmap.php" method="post">

        <h1>Set Factory</h1>

        <fieldset>

          <legend>Create a Set</legend>

          <label for="name">Set Name:</label>
          <input type="text" id="name" name="set_name">
          <span>Notice: Set Name can not empty</span>

          <label for="aggregate">Aggregate option:</label>
          <select name="Aggregator" id="aggregator">
            <option value="Maximum">Maximum</option>
            <option value="Minimum">Minimum</option>
            <option value="Median">Median</option>
          </select>

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
<script type="text/javascript" src="js/set.js"></script>
</body>

</html>
