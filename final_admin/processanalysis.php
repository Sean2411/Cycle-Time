<?php 
include_once 'Session_Config.php';
$SRC_ID = mysql_real_escape_string($_SESSION['srcId']);
$SRC_ID = (int)$SRC_ID;
$Process= array();
$combo = array();
function GetProcess(){
  global $Process;
  $mysqli = new mysqli("localhost", "root", "root", "CycleTime");
  if($stmt = $mysqli->prepare("SELECT Process_Name from Process_Tbl")){
  $stmt->execute();
  $stmt->bind_result($Proess_Name);
  while($stmt->fetch()){
    array_push($Process, $Proess_Name);
  }
}
}
function GetComboType($SRC_ID){
  global $combo;
  $mysqli = new mysqli("localhost", "root", "root", "CycleTime");
  if($stmt = $mysqli->prepare("SELECT DISTINCT CampaignType, Subtype from EVENT_Tbl where SRC_ID = ?")){
     $stmt->bind_param("i",$SRC_ID);
     $stmt->execute();
     $stmt->bind_result($CType, $SType);
     while($stmt->fetch()){
      array_push($combo, $CType.":".$SType);
     }
  }
}
GetProcess();
GetComboType($SRC_ID);

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
    <script type="text/javascript" src="js/app.js"></script>

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
<form action="process_campaign.php" method="post">

        <h1>Start Analysis</h1>

        <fieldset>

          <legend>Select a Process</legend>
          <label for="ProcessName">Created Process:</label>
          <select id="ProcessName" name="ProcessName">
            <?php for($i = 0; $i < sizeof($Process); $i++){?>
              <option value="<?php echo $Process[$i]; ?>"><?php echo $Process[$i];?></option>
        <?php }?>
          </select>
          <span></span>

           <legend>Select a Industry</legend>
          <label for="combo">Created Industry:</label>
          <select id="combo" name="combo">
            <?php for($i = 0; $i < sizeof($combo); $i++){?>
              <option value="<?php echo $combo[$i]; ?>"><?php echo $combo[$i];?></option>
        <?php }?>
          </select>
          <span></span>

        </fieldset>

        <button><input type="submit" id="submit" value="Calculation"/></button>
</form>
</div>

         </body>

</html>