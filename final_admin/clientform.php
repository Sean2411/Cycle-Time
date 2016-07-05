<?php 
session_start();?>
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
// </script>
</head>
<form action="process_detail.php" method="post">

        <h1>Client Profile</h1>

        <fieldset>

          <legend><p class="number">1</p> Client basic info</legend>

          <label for="name">Name(Full Name):</label>
          <input type="text" id="name" name="name" onfocus="disappear1()">
          <!-- <span id ="error1" class="error" name="error" style="color:red">
      <?php echo $_SESSION['nameEmpty']; echo $_SESSION['nameErr']?>
      </span><br/> -->
          <span>Notice: Name filed can not be empty</span>

          <label for="mail">Email:</label>
          <input type="email" id="mail" name="user_email" onfocus="disappear2()">
          <!-- <span id ="error2" class="error" name="error"style="color:red">
      <?php echo $_SESSION['emailEmpty']; echo $_SESSION['emailErr']?>
      </span><br/> -->
          <span>Notice: Please type vaild email address</span>

          <label for="phone">PhoneNo:</label>
          <input type="text" id="phone" name="user_phone" onfocus="disappear3()">
          <!-- <span id ="error3" class="error" name="error"style="color:red">
      <?php echo $_SESSION['phoneEmpty']; echo $_SESSION['phoneErr']?>
      </span><br/> -->
          <span>Notice: Phone formate: XXX-XXX-XXXX</span>

        </fieldset>

         <fieldset>

          <legend><p class="number">2</p> Client account info</legend>

          <label for="username">User Name:</label>
          <input type="text" id="username" name="user_name" >
          <span>Notice: User_Name filed can not be empty</span>

          <label for="Password">Password:</label>
          <input type="text" id="Password" name="Password">
          <span>Notice: Enter a password longer than 8 characters</span>

        </fieldset>
        
        <fieldset>
          <legend><p class="number">3</p> Process basic Info</legend>
          <label for="combo">How many combination of Campaigntype and subtype are you?</label>
          <input type="text" id="combo" name="combo_number" onfocus="disappear4()">
          <!-- <span id ="error4" class="error" name="error" style="color:red">
      <?php echo $_SESSION['cnEmpty']; echo $_SESSION['cnErr']?>
      </span><br/> -->
          <span>Notice: Please type a number only</span>

          <label for="event">How many Events are you?</label>
          <input type="text" id="event" name="event" onfocus="disappear5()">
          <!-- <span id ="error5" class="error" name="error" style="color:red">
      <?php echo $_SESSION['eventEmpty']; echo $_SESSION['eventErr']?>
      </span><br/> -->
          <span>Notice: Please type a number only</span>

        </fieldset>

        <input type="submit" id="submit" value="Service Information->"/>

</form>

<script type="text/javascript" src="js/clientform.js"></script>
<?php 
// unset($_SESSION['nameEmpty']);unset($_SESSION['nameErr']);unset($_SESSION['emailEmpty']);unset($_SESSION['emailErr']);unset($_SESSION['phoneEmpty']);unset($_SESSION['phoneErr']);unset($_SESSION['cnEmpty']);unset($_SESSION['cnErr']);unset($_SESSION['eventEmpty']);unset($_SESSION['eventErr'])?>