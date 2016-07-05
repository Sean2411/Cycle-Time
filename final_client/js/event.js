var count = 1;
var $event_id = $("#eventid");
var $event_name = $("#event");
var $event_dec = $("#Dec");
var $event_campaign = $("#campaign");
var $event_start = $("#start");
var $event_end = $("#end");
var $Profile_id = $("#Profile");

$("form span").hide();


function isValid(value){
  var id = /^[a-zA-Z0-9_]+$/i;
  if(value.val().match(id)){
    return true;
  }else{
    return false;
  }
}

function isnumericValid(value){
  return  /^\d+$/.test(value.val());
}
function isalphanumericValid(value){
  return /^[a-z0-9 ]+$/i.test(value.val());
}
function isDateValid(value){
  var dateReg = /^\d{2}[./-]\d{2}[./-]\d{4}$/;
  return value.val().match(dateReg);
}


function canSubmit() {
  return  isValid() &&  isnumericValid() && isalphanumericValid() && isDateValid;
}


function EventIdEvent(){
    if(isValid($event_id)) {
      $event_id.next().hide();
    } else {
      $event_id.next().show();
    }
}
function EventNameEvent(){
    if(isalphanumericValid($event_name)) {
      $event_name.next().hide();
    } else {
      $event_name.next().show();
    }
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
function ProfileEvent(){
  if(isnumericValid($Profile_id)){
    $Profile_id.next().hide();
  }else{
    $Profile_id.next().show();
  }
}


function enableSubmitEvent() {
  $("#submit").prop("disabled", !canSubmit());
}

$event_id.focus(EventIdEvent).keyup(EventIdEvent).keyup(enableSubmitEvent);
$event_name.focus(EventNameEvent).keyup(EventNameEvent).keyup(enableSubmitEvent);
$event_dec.focus(EventDecEvent).keyup(EventDecEvent).keyup(enableSubmitEvent);
$event_start.focus(EventStartEvent).keyup(EventStartEvent).keyup(enableSubmitEvent);
$event_end.focus(EventEndEvent).keyup(EventEndEvent).keyup(enableSubmitEvent);
$Profile_id.focus(ProfileEvent).keyup(ProfileEvent).keyup(enableSubmitEvent);


enableSubmitEvent();

function addInput(divName){
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<label for='eventId'>Event ID("+count+")</label><input type='text' id='eventid' name='event_id[]''>"+
          "<label for='event'>Event Name("+count+"):</label><input type='text' id='event' name='user_event[]'>"+
          "<label for='Dec'>Event Dec("+count+"):</label><textarea id='Dec' name='user_dec[]'></textarea>"+
          "<label for='Profile'>Profile_id("+count+")</label><input type='text' id='Profile' name='profile_id[]'>"+
          "<label for='start'>Start Date:</label><input type='text' id='start' name='user_start[]'>"+
          "<label for='end'>End Date:</label><input type='text' id='end' name='user_end[]'>";
          document.getElementById(divName).appendChild(newdiv);
          count++;
}