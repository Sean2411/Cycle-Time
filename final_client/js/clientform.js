//Problem: Hints are shown even when form is valid
//Solution: Hide and show them at appropriate times
var $name = $("#name");
var $email = $("#mail");
var $phone = $("#phone");

//Hide hints
$("form span").hide();

function isNameValid() {
  return $name.val().length > 0;
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

function canSubmit() {
  return isNameValid() && isEmailValid() && isPhoneValid();
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


function enableSubmitEvent() {
  $("#submit").prop("disabled", !canSubmit());
}

$name.focus(NameEvent).keyup(NameEvent).keyup(enableSubmitEvent);

$email.focus(EmailEvent).keyup(EmailEvent).keyup(enableSubmitEvent);

$phone.focus(PhoneEvent).keyup(PhoneEvent).keyup(enableSubmitEvent);

enableSubmitEvent();

function addInput(divName){
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<label for='campaigntype'>Campaign Type:</label><input type='text' id='campaigntype' name='Campaign_type[]'>" +
                             "<label for='subtype'>Sub Type:</label><input type='text' id='subtype' name='Sub_type[]'>";
          document.getElementById(divName).appendChild(newdiv);
}
// function RemoveInput(divName){
//           var olddiv = document.getElementById(divName);
//           olddiv.removeChild(olddiv.childNodes[0]);
// }
