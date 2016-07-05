//Problem: Hints are shown even when form is valid
//Solution: Hide and show them at appropriate times
var $campaigntype = $("#campaigntype");
var $subtype = $("#subtype");
var $eventName = $("#eventName");

//Hide hints
$("form span").hide();

function isValid(value){
  var id = /^[a-zA-Z0-9_]+$/i;
  if(value.val().match(id)){
    return true;
  }else{
    return false;
  }
}
function isCTValid(){
   if($campaigntype.val().length > 0 && /^[a-z0-9 ]+$/i.test($campaigntype.val()) > 0){
    return true;
   }else{
    return false;
   }
}

function isETValid(){
   if($subtype.val().length > 0 && /^[a-z0-9 ]+$/i.test($subtype.val()) > 0){
    return true;
   }else{
    return false;
   }
}

function canSubmit() {
  return isValid && isCTValid() && isETValid();
}

function CTEvent(){
  if(isCTValid()){
    $campaigntype.next().hide();
  }else{
    $campaigntype.next().show();
  }
}

function STEvent(){
   if(isETValid()){
    $subtype.next().hide();
  }else{
    $subtype.next().show();
  }
}
function EEvent(){
   if(isValid($eventName)){
    $eventName.next().hide();
  }else{
    $eventName.next().show();
  }
}


function enableSubmitEvent() {
  $("#submit").prop("disabled", !canSubmit());
}


$campaigntype.focus(CTEvent).keyup(CTEvent).keyup(enableSubmitEvent);

$subtype.focus(STEvent).keyup(STEvent).keyup(enableSubmitEvent);

$eventName.focus(EEvent).keyup(EEvent).keyup(enableSubmitEvent);


enableSubmitEvent();
