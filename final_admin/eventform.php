<?php
session_start();
$SRC_ID = mysql_real_escape_string($_SESSION['srcId']);

if(isset($_SESSION['typecombo'])){
 $combo = $_SESSION['typecombo'];
}

if(isset($_POST['type_combo'])){
  $combo = $_POST['type_combo'];
  $_SESSION['typecombo'] = $combo;
}
$CustomerName = array();
//loading customer info
$CampaignType = $_SESSION['CampaignType'];
$SubType = $_SESSION['SubType'];
$EventName = $_SESSION['EventName'];
$EVT_ID = $_SESSION['EVT_ID'];
$Customer_ID = $_SESSION['CustomerId'];


//loading customer info
if(isset($_POST['customer_name']) || isset($_POST['customer_email']) || isset($_POST['customer_phone']) || isset($_POST['customer_fax']) || isset($_POST['customer_company'])){
  $customer_name = mysql_real_escape_string($_POST['customer_name']);
  $customer_email = mysql_real_escape_string($_POST['customer_email']);
  $customer_phone = mysql_real_escape_string($_POST['customer_phone']);
  $customer_fax = mysql_real_escape_string($_POST['customer_fax']);
  $customer_company = mysql_real_escape_string($_POST['customer_company']);
  include 'DB_Config.php';
 if($stmt = $mysqli->prepare("SELECT Customer_Id From Customer where FullName = ? and SRC_ID = ?")){
    $stmt->bind_param("si", $customer_name, $SRC_ID);
    $stmt->execute();
    $result = $stmt->bind_result($Customer_Id);
    $stmt->fetch();
    if($Customer_Id != 0){
      $message[] = 'Current Customer info has existed.';
    }
    else{   
        if($stmt = $mysqli->prepare("INSERT INTO Customer (Customer_Id, SRC_ID, CompanyId, FullName, PhoneNo, FaxNo, Email) values (Default,  ?, ?, ?, ?, ?, ?)")){
              $stmt->bind_param("iissss", $SRC_ID, $customer_company, $customer_name, $customer_phone, $customer_fax, $customer_email);
              $stmt->execute();
          }
      }
    }     
 }
if(isset($_POST['user_address']) || isset($_POST['user_city'])|| isset($_POST['user_state']) || isset($_POST['user_zip']) || isset($_POST['user_country'])){
  $user_address = mysql_real_escape_string($_POST['user_address']);
  $user_city = mysql_real_escape_string($_POST['user_city']);
  $user_state = mysql_real_escape_string($_POST['user_state']);
  $user_zip = mysql_real_escape_string($_POST['user_zip']);
  $user_country = mysql_real_escape_string($_POST['user_country']);

  $customer_id = GetCustomerId($customer_name);
  $_SESSION['CustomerId'] = $customer_id;

 include 'DB_Config.php';
 if($stmt = $mysqli->prepare("SELECT AddressId From Customer_Address where CustomerId = ?")){
    $stmt->bind_param("s", $customer_id);
    $stmt->execute();
    $stmt->bind_result($addressid);
    $stmt->fetch();
    if($addressid != 0){
      $message[] = 'Current Customer info has existed.';
    }
    else{
      if($stmt = $mysqli->prepare("INSERT INTO Customer_Address (AddressId, CustomerId, Address, City, State, ZipCode, Country) values (Default, ?, ?, ?, ?, ?, ? )")){
        $stmt->bind_param("ssssss", $customer_id, $user_address, $user_city, $user_state, $user_zip, $user_country);
        $stmt->execute();
        // $stmt->close();
      }
    }     
 }
}


if(isset($_POST['event']) && isset($_POST['user_dec']) && isset($_POST['user_start']) && isset($_POST['user_end'])){
  $user_event = mysql_real_escape_string($_POST['event']);
  $user_dec = mysql_real_escape_string($_POST['user_dec']);
  $user_start = mysql_real_escape_string($_POST['user_start']);
  $user_end = mysql_real_escape_string($_POST['user_end']);
  $event_data = explode(':', $user_event);
  $Profile_Id = GetProfileId($event_data[0]);
  $Level = 0;
  $type = explode(":", $combo);
  include("DB_Config.php");
  if(CheckDuplicate($Customer_ID, $event_data[1])){
    if($stmt = $mysqli->prepare("INSERT INTO  EVENT_Tbl values (Default, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")){
      $stmt->bind_param("iiisssissss", $SRC_ID, $Customer_ID, $Profile_Id, $type[0], $type[1], $event_data[0], $Level, $event_data[1], $user_start, $user_end, $user_dec);
      $stmt->execute();
      }
  }
}

function CheckDuplicate($id, $name){
 include("DB_Config.php");
 if($stmt = $mysqli->prepare("SELECT idEVT_Tbl from EVENT_Tbl where CustomerId = ? and EVT_NAME = ?")){
  $stmt->bind_param("is", $id, $name);
  $stmt->execute();
  $stmt->bind_result($idEVT_Tbl);
  $stmt->fetch();
  if($idEVT_Tbl > 0){
    return false;
  }else{
    return true;
  }
}
}

function GetCustomerId($customer_name){
  include("DB_Config.php");
 if($stmt = $mysqli->prepare("SELECT Customer_Id from Customer where FullName = ?")){
  $stmt->bind_param("s", $customer_name);
  $stmt->execute();
  $stmt->bind_result($customer_id);
  $stmt->fetch();
 }
 return $customer_id;
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
// </script>
</head>
<form name="form" action="customerform.php" enctype="multipart/form-data" method="post">
  
        <h1>Event Infomation</h1>


        <fieldset>
 <legend><p class="number">1</p>Event profile</legend>
 <div id='action'>

          <label for="Event">Event's Info:</label>
          <select id="event" name="event">
            <?php for($i = 0; $i < sizeof($EventName); $i++){?>
            <optgroup label="<?php echo $EVT_ID[$i];?>">
              <option value="<?php echo $EVT_ID[$i].":".$EventName[$i]; ?>"><?php echo $EventName[$i];?></option>
            </optgroup>
        <?php }?>
          </select>

          <label for="Dec">Event Description</label>
          <textarea id="Dec" name="user_dec" onfocus="disappear1()"></textarea>
          <!-- <span id ="error1" class="error1" name="error1"style="color:red">
      <?php echo $_SESSION['decErr']?>
      </span> -->

          <label for="start">Start Date:</label>
          <input type="text" id="start" name="user_start" onfocus="disappear2()">
          <!-- <span id ="error2" class="error2" name="error2"style="color:red">
      <?php echo $_SESSION['sdEmpty']."<br>"; echo $_SESSION['sdErr']?>
      </span>
           -->
          <label for="end">End Date:</label>
          <input type="text" id="end" name="user_end" onfocus="disappear3()">
          <!-- <span id ="error3" class="error3" name="error3"style="color:red">
      <?php echo $_SESSION['edEmpty']."<br>"; echo $_SESSION['edErr']?>
      </span> -->
        
</div>
           <div>
          <input id="button" type="submit" value="Add another Action?" style="padding: 1px; border-radius:3px; float:left; width:50%;" onClick="document.form.action='event.php';document.form.submit();">
          </div>
</fieldset>
      <input type="submit" name="Submit" value="New Customer" style="float:left; width:50%"
                    onClick="document.form.action='customer.php';document.form.submit();" />
      <input type="submit" name="Submit" value="Next" style="width:50%;"
                    onClick="document.form.action='CT.php';document.form.submit();" />
</form>
<!-- <script type="text/javascript" src="js/event.js"></script> -->