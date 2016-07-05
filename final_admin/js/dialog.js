$(document).ready(function() {
$(function() {
$("#dialog").dialog({
autoOpen: false
});
$("#login").on("click", function() {
$("#dialog").dialog("open");
});
});


// Validating Form Fields.....
$("#submit").click(function(e) {
var password = $("#password").val();
var name = $("#name").val();
if (password === '' || name === '') {
alert("Please fill all fields...!!!!!!");
e.preventDefault();
}
});
});