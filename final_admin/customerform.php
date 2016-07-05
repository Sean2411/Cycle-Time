<?php
include_once('DB_database_class.php');
include("Session_Config.php");
?>

<?php
$SRC_ID = mysql_real_escape_string($_SESSION['srcId']);
$SRC_ID = (int)$SRC_ID;
$CampaignType = $_SESSION['CampaignType'];
$SubType      = $_SESSION['SubType'];
$type_combo = $_SESSION['typecombo'];
$customerId = $_SESSION['CustomerId'];

if(isset($_POST['event']) && isset($_POST['user_dec']) && isset($_POST['user_start']) && isset($_POST['user_end'])){
  $user_event = mysql_real_escape_string($_POST['event']);
  $user_dec = mysql_real_escape_string($_POST['user_dec']);
  $user_start = mysql_real_escape_string($_POST['user_start']);
  $user_end = mysql_real_escape_string($_POST['user_end']);
  $event_data = explode(':', $user_event);
  $Profile_Id = GetProfileId($event_data[0]);
  $Level = 0;
  $type = explode(":", $type_combo);
  include("DB_Config.php");
  if($stmt = $mysqli->prepare("SELECT idEVT_Tbl from EVENT_Tbl where CustomerId = ? and EVT_NAME = ?")){
  $stmt->bind_param("is", $customerId, $event_data[1]);
  $stmt->execute();
  $stmt->bind_result($idEVT_Tbl);
  $stmt->fetch();
  if($idEVT_Tbl > 0){
  }else{
    if($stmt = $mysqli->prepare("INSERT INTO  EVENT_Tbl values (Default, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")){
      $stmt->bind_param("iiisssissss", $SRC_ID, $customerId, $Profile_Id, $type[0], $type[1], $event_data[0], $Level, $event_data[1], $user_start, $user_end, $user_dec);
      $stmt->execute();
      }
    }
  }
}


//loading customer info
if(isset($_POST['customer_name']) || isset($_POST['customer_email']) || isset($_POST['customer_phone']) || isset($_POST['customer_fax']) || isset($_POST['customer_company'])){
  $customer_name = mysql_real_escape_string($_POST['customer_name']);
  $customer_email = mysql_real_escape_string($_POST['customer_email']);
  $customer_phone = mysql_real_escape_string($_POST['customer_phone']);
  $customer_fax = mysql_real_escape_string($_POST['customer_fax']);
  $customer_company = mysql_real_escape_string($_POST['customer_company']);
 include("DB_Config.php");
 if($stmt = $mysqli->prepare("SELECT Customer_Id From Customer where FullName = ? and SRC_ID = ?")){
    $stmt->bind_param("si", $customer_name, $SRC_ID);
    $stmt->execute();
    $result = $stmt->bind_result($Customer_Id);
    $stmt->fetch();
    if($Customer_Id != 0){
      echo "you cannot get anything";
      $message[] = 'Current Customer info has existed.';
    }
    else{   
        if($stmt = $mysqli->prepare("INSERT INTO Customer values (Default,  ?, ?, ?, ?, ?, ?)")){
              $stmt->bind_param("iissss", $SRC_ID, $customer_company, $customer_name, $customer_phone, $customer_fax, $customer_email);
              $stmt->execute();
          }
      }
    }     
 }

function GetRandomNumber(){
  $EVT_ID = mt_rand(0,1000);
  return $EVT_ID;
}

function GetProfileId($EVT_ID){
  include("DB_Config.php");
 if($stmt = $mysqli->prepare("SELECT SRC_PROFILE_ID from EVENT_Mapping_Tbl where EVT_ID = ?")){
  $stmt->bind_param("s", $EVT_ID);
  $stmt->execute();
  $stmt->bind_result($profile_id);
  $stmt->fetch();
  return $profile_id;
}
}


?>
<head>
  <link rel="stylesheet" href="css/form.css">
   <script type="text/javascript">
// function disappear1()
// {

//     document.getElementById("error1").innerHTML="";

// }
// function disappear2()
// {

//     document.getElementById("error2").innerHTML="";

// }
// function disappear3()
// {

//     document.getElementById("error3").innerHTML="";

// }
// function disappear4()
// {


//     document.getElementById("error4").innerHTML="";

// }
// function disappear5()
// {

//     document.getElementById("error5").innerHTML="";
// }
// function disappear6()
// {

//     document.getElementById("error6").innerHTML="";

// }
// function disappear7()
// {

//     document.getElementById("error7").innerHTML="";

// }
// function disappear8()
// {

//     document.getElementById("error8").innerHTML="";

// }
// function disappear9()
// {


//     document.getElementById("error9").innerHTML="";

// }
// function disappear10()
// {

//     document.getElementById("error10").innerHTML="";
// }
// </script>
</head>
<form name="form" action="event.php" enctype="multipart/form-data" method="post">
        <h1>Customer Profile</h1>

        <fieldset>

          <legend><p class="number">1</p>Customer basic info</legend>

          <label for="name">Name(Full Name):</label>
          <input type="text" id="name" name="customer_name" onfocus="disappear1()">
          <!-- <span id ="error1" class="error" name="error"style="color:red">
      <?php echo $_SESSION['cusnameEmpty']; echo $_SESSION['cusnameErr']?>
      </span><br/> -->
          <span>Notice:Letters only for this field</span>

          <label for="mail">Email:</label>
          <input type="email" id="email" name="customer_email" onfocus="disappear2()">
          <!-- <span id ="error2" class="error" name="error"style="color:red">
      <?php echo $_SESSION['cusemailEmpty']; echo $_SESSION['cusemailErr']?>
      </span><br/> -->
          <span>Notice:Please type vaild email address</span>

          <label for="phone">PhoneNo:</label>
          <input type="text" id="phone" name="customer_phone" onfocus="disappear3()">
          <!-- <span id ="error3" class="error" name="error"style="color:red">
      <?php echo $_SESSION['cusphoneEmpty']; echo $_SESSION['cusphoneErr']?>
      </span><br/> -->
          <span>Notice:Phone formate: XXX-XXX-XXXX</span>

          <label for="fax">FaxNo:</label>
          <input type="text" id="fax" name="customer_fax" onfocus="disappear4()">
          <!-- <span id ="error4" class="error" name="error"style="color:red">
      <?php echo $_SESSION['cusfaxEmpty']; echo $_SESSION['cusfaxErr']?>
      </span><br/> -->
          <span>Notice:Fax formate: XXX-XXX-XXXX</span>

          <label for="company">CompanyId:</label>
          <input type="text" id="company" name="customer_company" onfocus="disappear5()">
         <!--  <span id ="error5" class="error" name="error"style="color:red">
      <?php echo $_SESSION['cusCIdEmpty']; echo $_SESSION['cusCIdErr']?>
      </span><br/> -->
          <span>Notice:Numbers Only for this field</span>

          <label for="campaigntype">Customer's Campaign Type:</label>
          <select id="campaintype" name="type_combo">
            <?php for($i = 0; $i < sizeof($CampaignType); $i++){?>
            <optgroup label="<?php echo $CampaignType[$i];?>">
              <option value="<?php echo $CampaignType[$i].":".$SubType[$i]; ?>"><?php echo $SubType[$i];?></option>
            </optgroup>
        <?php }?>
          </select>
        </fieldset>

        <fieldset>
          <legend><p class="number">2</p>Address profile</legend>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="user_address" onfocus="disappear6()">
           <!--  <span id ="error6" class="error" name="error"style="color:red">
      <?php echo $_SESSION['cusaddEmpty']; echo $_SESSION['cusaddErr']?>
      </span><br/> -->
            <span>Notice:alphanumeric only for this field</span>

            <label for="city">City:</label>
          <input type="text" id="city" name="user_city" onfocus="disappear7()">
          <!-- <span id ="error7" class="error" name="error"style="color:red">
      <?php echo $_SESSION['cuscityEmpty']; echo $_SESSION['cuscityErr']?>
      </span><br/> -->
          <span>Notice:Letters Only for this field</span>

          <label for="state">State:</label>
          <input type="text" id="state" name="user_state" onfocus="disappear8()">
          <!-- <span id ="error8" class="error" name="error"style="color:red">
      <?php echo $_SESSION['cusstateEmpty']; echo $_SESSION['cusstateErr']?>
      </span><br/> -->
          <span>Notice:Letters only for this field</span>

          <label for="zip">ZipCode:</label>
          <input type="text" id="zip" name="user_zip" onfocus="disappear9()">
          <!-- <span id ="error9" class="error" name="error"style="color:red">
      <?php echo $_SESSION['cuszipEmpty']; echo $_SESSION['cuszipErr']?>
      </span><br/> -->
          <span>Notice:numbers only for this field</span>

          <label for="country">Country:</label>
          <input type="text" id="country" name="user_country" onfocus="disappear10()">
          <!-- <span id ="error10" class="error" name="error"style="color:red">
      <?php echo $_SESSION['cuscountryEmpty']; echo $_SESSION['cuscountryErr']?>
      </span><br/> -->
          <span>Notice:letters only for this field</span>

        </fieldset>
          <input type="submit" name="submit" id="submit" value="Next"/>
</form>
<script type="text/javascript" src="js/customerform.js"></script>
<?php 
// unset($_SESSION['cusnameEmpty']);unset($_SESSION['cusnameErr']);unset($_SESSION['cusemailEmpty']);unset($_SESSION['cusemailErr']);unset($_SESSION['cusphoneEmpty']);unset($_SESSION['cusphoneErr']);unset($_SESSION['cusfaxEmpty']);unset($_SESSION['cusfaxErr']);unset($_SESSION['cusCIdEmpty']);unset($_SESSION['cusCIdErr']);unset($_SESSION['cusaddEmpty']);unset($_SESSION['cusaddErr']);unset($_SESSION['cuscityEmpty']);unset($_SESSION['cuscityErr']);unset($_SESSION['cusstateEmpty']);unset($_SESSION['cusstateErr']);unset($_SESSION['cuszipEmpty']);unset($_SESSION['cuszipErr']);unset($_SESSION['cuscountryEmpty']);unset($_SESSION['cuscountryErr']);?>