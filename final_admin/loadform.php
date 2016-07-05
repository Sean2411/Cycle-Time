 <style>
 * {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

/*body {
  padding: 20px 15%;
}*/
form header {
  margin: 0 0 20px 0; 
}
form header div {
  font-size: 90%;
  color: #999;
}
form header h2 {
  margin: 0 0 5px 0;
}
form > div {
  clear: both;
  overflow: hidden;
  padding: 1px;
  margin: 0 0 10px 0;
}
form > div > fieldset > div > div {
  margin: 0 0 5px 0;
}
form > div > label,
legend {
  width: 25%;
  float: left;
  padding-right: 10px;
}
form > div > div,
form > div > fieldset > div {
  width: 75%;
  float: right;
}
form > div > fieldset label {
  font-size: 90%;
}
fieldset {
  border: 0;
  padding: 0;
}

input[type=text],
input[type=email],
input[type=url],
input[type=password],
textarea {
  width: 100%;
  border-top: 1px solid #ccc;
  border-left: 1px solid #ccc;
  border-right: 1px solid #eee;
  border-bottom: 1px solid #eee;
}
input[type=text],
input[type=email],
input[type=url],
input[type=password] {
  width: 50%;
}
input[type=text]:focus,
input[type=email]:focus,
input[type=url]:focus,
input[type=password]:focus,
textarea:focus {
  outline: 0;
  border-color: #4697e4;
}

@media (max-width: 600px) {
  form > div {
    margin: 0 0 15px 0; 
  }
  form > div > label,
  legend {
    width: 100%;
    float: none;
    margin: 0 0 5px 0;
  }
  form > div > div,
  form > div > fieldset > div {
    width: 100%;
    float: none;
  }
  input[type=text],
  input[type=email],
  input[type=url],
  input[type=password],
  textarea,
  select {
    width: 100%; 
  }
}
@media (min-width: 1200px) {
  form > div > label,
  legend {
    text-align: right;
  }
}
 </style>
 <form action="mapping.php" method="POST" style="background:#e1e1e1;">  
  <div>
    <label class="desc" id="title1" for="ProcessName">ProcessName</label>
    <div>
      <input id="ProcessName" name="ProcessName" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
  <div id="event">
  <div>
    <label class="desc" id="title3" for="EventName">
      EventName
    </label>
    <div>
      <input id="EventName" name="EventName[]" type="text" spellcheck="false" value="" maxlength="255" tabindex="3"> 
   </div>
  </div>
    <div>
    <label class="desc" id="title3" for="CycleTime">
      CycleTime(hour)
    </label>
    <div>
      <input id="CycleTime" name="CycleTime[]" type="text" spellcheck="false" value="" maxlength="255" tabindex="3"> 
   </div>
  </div>
  <div>
    <label class="desc" id="title4" for="Description">
      Description
    </label>
  
    <div>
      <textarea id="Description" name="Description[]" spellcheck="true" rows="10" cols="50" tabindex="4"></textarea>
    </div>
  </div>
</div>
  <div>
     <input class="desc" type="button" value="Add another Event" onClick="addInput('event');">
   </div>
  
  <div>
		<div>
  		<input id="saveForm" name="saveForm" type="submit" value="Submit">
    </div>
	</div>
  
</form>
<script>
  function addInput(divName){
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<br><lable for='EventName'>EventName</lable><br><input type='text' name='EventName[]' id='EventName' spellcheck='false' maxlength='255' tabindex='3'/>"+
          "<br><lable for='CycleTime'>CycleTime</lable><br><input type='text' name='CycleTime[]' id='CycleTime' spellcheck='false' maxlength='255' tabindex='3'/>" +
          "<br><lable for='Description'>Description</lable><br><br><textarea name='Description[]' id='Desciption' spellcheck='true' rows='10' cols='50' tabindex='4'></textarea>";
          document.getElementById(divName).appendChild(newdiv);
}
</script>

