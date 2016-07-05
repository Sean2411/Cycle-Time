var count = 1;
var $customer_name =  $("#name");
var $customer_email = $("#email");
var $customer_phone = $("#phone");
var $customer_fax =   $("#fax");
var $customer_company = $("#company");
var $customer_address = $("#address");
var $customer_city = $("#city");
var $customer_state = $("#state");
var $customer_zip = $("#zip");
var $customer_country = $("#country");

$("form span").hide();

function isLetterValid(value) {
  return /^[a-zA-Z ]+$/.test(value.val());
}

function isEmailValid() {
  var x = $customer_email.val();
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
  if($customer_phone.val().match(phoneno)){
    return true;
  }
  else{
    return false;
  }
}

function isFaxValid(){
   var faxno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  if($customer_fax.val().match(faxno)){
    return true;
  }
  else{
    return false;
  }
}
function isnumericValid(value){
  return  /^\d+$/.test(value.val());
}
function isalphanumericValid(value){
  return /^[a-z0-9 ]+$/i.test(value.val());
}



function canSubmit() {
  return isLetterValid() && isEmailValid() &&  isPhoneValid() && isFaxValid() && isnumericValid() && isalphanumericValid();
}

function CustomerNameEvent(){
    if(isLetterValid($customer_name)) {
      $customer_name.next().hide();
    } else {
      $customer_name.next().show();
    }
}

function CustomerEmailEvent(){
    if(isEmailValid()) {
      $customer_email.next().hide();
    } else {
      $customer_email.next().show();
    }
}

function CustomerPhoneEvent(){
    if(isPhoneValid()) {
      $customer_phone.next().hide();
    } else {
      $customer_phone.next().show();
    }
}

function CustomerFaxEvent(){
    if(isFaxValid()) {
      $customer_fax.next().hide();
    } else {
    }
}
function CustomerCompanyEvent(){
    if(isnumericValid($customer_company)) {
      $customer_company.next().hide();
    } else {
      $customer_company.next().show();
    }
}
function CustomerAddressEvent(){
    if(isalphanumericValid($customer_address)) {
      $customer_address.next().hide();
    } else {
      $customer_address.next().show();
    }
}
function CustomerCityEvent(){
    if(isLetterValid($customer_city)) {
      $customer_city.next().hide();
    } else {
      $customer_city.next().show();
    }
}
function CustomerStateEvent(){
    if(isLetterValid($customer_state)) {
      $customer_state.next().hide();
    } else {
      $customer_state.next().show();
    }
}
function CustomerZipEvent(){
    if(isnumericValid($customer_zip)) {
      $customer_zip.next().hide();
    } else {
      $customer_zip.next().show();
    }
}
function CustomerCountryEvent(){
    if(isLetterValid($customer_country)) {
      $customer_country.next().hide();
    } else {
      $customer_country.next().show();
    }
}


function enableSubmitEvent() {
  $("#submit").prop("disabled", !canSubmit());
}

$customer_name.focus(CustomerNameEvent).keyup(CustomerNameEvent).keyup(enableSubmitEvent);
$customer_email.focus(CustomerEmailEvent).keyup(CustomerEmailEvent).keyup(enableSubmitEvent);
$customer_phone.focus(CustomerPhoneEvent).keyup(CustomerPhoneEvent).keyup(enableSubmitEvent);
$customer_fax.focus(CustomerFaxEvent).keyup(CustomerFaxEvent).keyup(enableSubmitEvent);
$customer_company.focus(CustomerCompanyEvent).keyup(CustomerCompanyEvent).keyup(enableSubmitEvent);
$customer_address.focus(CustomerAddressEvent).keyup(CustomerAddressEvent).keyup(enableSubmitEvent);
$customer_city.focus(CustomerCityEvent).keyup(CustomerCityEvent).keyup(enableSubmitEvent);
$customer_state.focus(CustomerStateEvent).keyup(CustomerStateEvent).keyup(enableSubmitEvent);
$customer_zip.focus(CustomerZipEvent).keyup(CustomerZipEvent).keyup(enableSubmitEvent);
$customer_country.focus(CustomerCountryEvent).keyup(CustomerCountryEvent).keyup(enableSubmitEvent);



enableSubmitEvent();
