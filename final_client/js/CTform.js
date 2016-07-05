var $CT_name =  $("#CTname");

$("form span").hide();

function isalphanumericValid(value){
  return /^[a-z0-9 ]+$/i.test(value.val());
}

function canSubmit() {
  return isalphanumericValid();
}

function CTNameEvent(){
    if(isalphanumericValid($CT_name)) {
      $CT_name.next().hide();
    } else {
      $CT_name.next().show();
    }
}



function enableSubmitEvent() {
  $("#submit").prop("disabled", !canSubmit());
}

$CT_name.focus(CTNameEvent).keyup(CTNameEvent).keyup(enableSubmitEvent);




enableSubmitEvent();
