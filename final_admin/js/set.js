var $Set_name =  $("#name");

 $("form span").hide();

function isalphanumericValid(value){
  return /^[a-z0-9]+$/i.test(value.val()) ;
}

function canSubmit() {
  return isalphanumericValid($Set_name);
}

function SetNameEvent(){
    if(isalphanumericValid($Set_name)) {
      $Set_name.next().hide();
    } else {
      $Set_name.next().show();
    }
}



function enableSubmitEvent() {
  $("#submit").prop("disabled", !canSubmit());
}

$Set_name.focus(SetNameEvent).keyup(SetNameEvent).keyup(enableSubmitEvent);




enableSubmitEvent();
