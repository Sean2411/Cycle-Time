//Problem: Hints are shown even when form is valid
//Solution: Hide and show them at appropriate times
var $name = $("#name");
var $email = $("#mail");
var $phone = $("#phone");
var $combo = $("#combo");
var $events = $("#event");
var $username = $("#username");
var $password = $("#Password");



//Hide hints
$("form span").hide();

function isNameValid() {
  var value = $name.val();
  return (value.length > 0) && (/^[a-z0-9 ]+$/i.test(value));
}

function isUserNameValid(){
  var value = $username.val();
  return (value.length > 0) && (/^[a-z0-9 ]+$/i.test(value));
}
function isEmailValid() {
  var x = $email.val();
  var atpos = x.indexOf("@");
  var dotpos = x.lastIndexOf(".");
  if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length){
      return false;
  }
  else{
    return true;
  }
}
function isPhoneValid(){
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  if($phone.val().match(phoneno)){
    return true;
  }
  else{
    return false;
  }
}
function isPasswordValid(){
  return $password.val().length > 8;
}

function isComboNumberic(){
  var value = $combo.val();
    return  /^\d+$/.test(value);
}
function isEventNumberic(){
  var value = $events.val();
    return  /^\d+$/.test(value);
}

function canSubmit() {
  return isNameValid() && isUserNameValid() && isPasswordValid() && isEmailValid() && isPhoneValid() && isComboNumberic() && isEventNumberic();
}

function NameEvent(){
    //Find out if password is valid  
    if(isNameValid()) {
      //Hide hint if valid
      $name.next().hide();
    } else {
      //else show hint
      $name.next().show();
    }
}

function EmailEvent(){
    //Find out if password is valid  
    if(isEmailValid()) {
      //Hide hint if valid
      $email.next().hide();
    } else {
      //else show hint
      $email.next().show();
    }
}

function PhoneEvent(){
    //Find out if password is valid  
    if(isPhoneValid()) {
      //Hide hint if valid
      $phone.next().hide();
    } else {
      //else show hint
      $phone.next().show();
    }
}
function ComboEvent(){
  if(isComboNumberic()){
    $combo.next().hide();
  }else{
    $combo.next().show();
  }
}

function EEvent(){
   if(isEventNumberic()){
    $events.next().hide();
  }else{
    $events.next().show();
  }
}

function usernameEvent(){
  if(isUserNameValid()){
    $username.next().hide();
  }else{
    $username.next().show();
  }
}

function passwordEvent(){
  if(isPasswordValid()){
    $password.next().hide();
  }else{
    $password.next().show();
  }
}


function enableSubmitEvent() {
  $("#submit").prop("disabled", !canSubmit());
}

$name.focus(NameEvent).keyup(NameEvent).keyup(enableSubmitEvent);

$email.focus(EmailEvent).keyup(EmailEvent).keyup(enableSubmitEvent);

$phone.focus(PhoneEvent).keyup(PhoneEvent).keyup(enableSubmitEvent);

$combo.focus(ComboEvent).keyup(ComboEvent).keyup(enableSubmitEvent);

$events.focus(EEvent).keyup(EEvent).keyup(enableSubmitEvent);

$username.focus(usernameEvent).keyup(usernameEvent).keyup(enableSubmitEvent);

$password.focus(passwordEvent).keyup(passwordEvent).keyup(enableSubmitEvent);

enableSubmitEvent();
