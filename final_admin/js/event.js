var $event_dec = $("#Dec");
var $event_start = $("#start");
var $event_end = $("#end");

$("form span").hide();

function isalphanumericValid(value){
  return /^[a-z0-9 ]+$/i.test(value.val());
}
function isDateValid(value){
  var dateReg = /^\d{4}[./-]\d{2}[./-]\d{2}$/;
  return value.val().match(dateReg);
}


function canSubmit() {
  return isalphanumericValid($event_dec) && isDateValid($event_start) && isDateValid($event_end);
}

function EventDecEvent(){
    if(isalphanumericValid($event_dec)) {
      $event_dec.next().hide();
    } else {
      $event_dec.next().show();
    }
}
function EventStartEvent(){
    if(isDateValid($event_start)) {
      $event_start.next().hide();
    } else {
      $event_start.next().show();
    }
}
function EventEndEvent(){
  if(isDateValid($event_end)){
    $event_end.next().hide();
  }else{
    $event_end.next().hide();
  }
}

function enableSubmitEvent() {
  $("#submit").prop("disabled", !canSubmit());
}

$event_dec.focus(EventDecEvent).keyup(EventDecEvent).keyup(enableSubmitEvent);
$event_start.focus(EventStartEvent).keyup(EventStartEvent).keyup(enableSubmitEvent);
$event_end.focus(EventEndEvent).keyup(EventEndEvent).keyup(enableSubmitEvent);


enableSubmitEvent();