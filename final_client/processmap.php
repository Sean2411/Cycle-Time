<?php 
session_start();

include_once 'Session_Config_nonlogin.php';
$SRC_ID = mysql_real_escape_string($_SESSION['src_id']);
$SRC_ID = (int)$SRC_ID;
$CTName = array();
$EVTStart = $_SESSION['EVTStart'];
$EVTEnd = $_SESSION['EVTEnd'];

GetCycleTime($SRC_ID);

function GetCycleTime($SRC_ID){
    global $CTName;
  include("DB_Config.php");
    if($stmt = $mysqli->prepare("SELECT DISTINCT SRC_CT_NAME FROM CT_Mapping_Tbl Where SRC_ID = ?")){
      $stmt->bind_param("i", $SRC_ID);
      $stmt->execute();
      $stmt->bind_result($SCN);
      while($stmt->fetch()){
        array_push($CTName, $SCN);
      }
  }  
}
if(isset($_POST['set_name']) && isset($_POST['set_dependency']) && isset($_POST['Aggregator']) && isset($_POST['CTName'])){
 $Set_Name   = filter_var($_POST["set_name"], FILTER_SANITIZE_STRING); //product code

   $Aggregator   = filter_var($_POST["Aggregator"], FILTER_SANITIZE_STRING); //product code

   $set_dependency    = $_POST["set_dependency"]; //product code

 
   $CName = $_POST['CTName'];

  $new_Set = array(array('name'=>$Set_Name, 'startevent'=>$Aggregator, 'endevent'=> NULL));

  $Set_option = array(array('name'=>$Set_Name, 'aggregator'=>$Aggregator, 'option1'=>$CName[0],'dependency1'=>$set_dependency[0], 'option2'=>$CName[1], 'dependency2'=>$set_dependency[1]));
  
  if(isset($_SESSION["options"])){
    $found1 = false;

    foreach($_SESSION["options"] as $option_map){

      if($option_map["name"] == $Set_Name){
        $found1 = true;  
      }else{
         $option[] = array('name'=>$option_map["name"], 'aggregator'=>$option_map["aggregator"], 'option1'=>$option_map["option1"],'dependency1'=>$option_map["dependency1"], 'option2'=>$option_map["option2"], 'dependency2'=>$option_map["dependency2"]);
      }
    }
    if($found1 == false) //we didn't find item in array
      {
        echo "3";
        //add new user item in array
        $_SESSION["options"] = array_merge($option, $Set_option);
      }else{

      }
  }else{
    $_SESSION["options"] = $Set_option;
  }

    if(isset($_SESSION["products"])) //if we have the session
    {
      $found = false; //set found item to false
      
      foreach ($_SESSION["products"] as $process_map) //loop through session array
      {
        if($process_map["name"] == $Set_Name){ //the item exist in array
          // echo "nothing";
          $found = true;
        }else{
          //item doesn't exist in the list, just retrive old info and prepare array for session var
          $set[] = array('name'=>$process_map["name"], 'startevent'=>$process_map["startevent"], 'endevent'=>$process_map["endevent"]);
        }
      }
      
      if($found == false) //we didn't find item in array
      {
        //add new user item in array
        $_SESSION["products"] = array_merge($set, $new_Set);
      }else{

      }  
    }else{
      //create a new session var if does not exist
      $_SESSION["products"] = $new_Set;
    }
}
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title contenteditable="false">CycleTime</title>
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/pepper-grinder/jquery-ui.css" media="screen" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
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
    <link href="css1/style1.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <a href="#" id="logo"></a>

        <h1><a href="#" id="logo">Cycle Time Prediction System</a></h1>

        <h2><a href="#" id="logo">Client Tool</a></h2>

        <nav>
            <ul>
                <li><a href="description_client.php">Project description</a></li>

                <li><a href="CT.php">Create Cycle Time</a></li>

                <li><a href="cycletime.php">Confirmation</a></li>

                <li><a href="processmap.php" class="selected">Process</a></li>

                <li><a href="logout.php">logout</a></li>
            </ul>
        </nav>
    </header>

    <div id="products-wrapper">
        <h1 style="text-align:left; color:gray; font-family: 'Changa One', sans-serif;
        margin:15px 0;
            font-size:1.75em;
                font-weight:normal;
                    line-height: 0.8em;">Products</h1>

        <div class="products">
            <?php
                //current URL of the Page. cart_update.php redirects back to this URL
              $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
              //Get CycleTime info
                  for($i = 0; $i<sizeof($CTName); $i++){
                  echo '<div class="product">'; 
                        echo '<form method="post" action="process_create.php">';
                        echo '<div class="product-thumb"><img src="img/drag.png"></div>';
                        echo '<div class="product-content"><h3>'.$CTName[$i].'</h3>';
                        echo '<div class="product-desc">'.$EVTStart[$i]."---".$EVTEnd[$i].'</div>';
                        echo '<div class="product-info">';
                  echo '<button class="add_to_cart">Add To Process Map</button>';
                  echo '</div></div>';
                        echo '<input type="hidden" name="product_content" value="'.$CTName[$i].'" />';
                        echo '<input type="hidden" name="product_detail" value="'.$EVTStart[$i]."---".$EVTEnd[$i].'"/>';
                        echo '<input type="hidden" name="type" value="add" />';
                        echo "<input type='hidden' name='component' value='CT' />";
                  echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
                        echo '</form>';
                        echo '</div>';
                    }

                ?>
        </div>

        <div class="shopping-cart">
            <h2>Process Map</h2><?php
            if(isset($_SESSION["products"]))
            {
                echo '<ol>';
                foreach ($_SESSION["products"] as $cart_itm)
                {
                    echo '<li class="cart-itm">';
                    echo '<span class="remove-itm"><a href="process_create.php?removep='.$cart_itm["name"].'&return_url='.$current_url.'">&times;</a></span>';
                    echo '<h3>'.$cart_itm["name"].'</h3>';
                    if(strpos($cart_itm["name"], "Set") !== false){
                    echo '<div class="p-code">Aggregator : '.$cart_itm["startevent"].'</div>';
                    echo '<div class="p-qty">Dependency : '.$cart_itm["endevent"].'</div>';
            }else{
                    echo '<div class="p-code">StartEvent : '.$cart_itm["startevent"].'</div>';
                    echo '<div class="p-qty">EndEvent : '.$cart_itm["endevent"].'</div>';
            }
                    echo '</li>';
                }
                echo '</ol>';
                echo '<span class="check-out-txt"><form action="ProcessMap_Store.php" method="post" style="width:100%; float:right">ProcessName:<br/><input type="text" name="ProcessName" ><input type="submit" value="Create ProcessMap"></form></span>';
              echo '<span class="empty-cart"><a style="color:green;" href="process_create.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';
            }
            if(!isset($_SESSION["products"])){
                echo 'Your Cart is empty';
            }
            ?>
        </div><?php include('set_create.php');
        // echo $_POST['set_name'];
         ?>

        <h3>Wanna start a Process. Go to <a href="processanalysis.php" style="color: #599a68">Process-Analysis</a> Page</h3>
        
    </div>
    <?php include "footer.php";?>
</body>
</html>
