<jsp:include page="common/common.jsp"></jsp:include>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<title>Non login alert</title>

</head>
<body style="background: #384047">
<div id="CID">
	<fieldset style="background: #fff; width: 40%; height: 30%; border-radius: 5px;margin: 200px auto" >
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" style="font-size: large;">
	     Email does not exist! <br>
	     This page will automatically jump to login page in 
         <span id="endtime" style="color:blue">5</span>
         seconds!
         <br/>
         <a href = "find_pw_form1.php">
         Click here! Jump to the login page directly!
         </a>
    </td>
  </tr>
</table>
	</fieldset>
</div>
</body>
<script type="text/javascript">
var basePath="http://localhost/546/final/"
var id = 	setInterval(function(){
	if(navigator.userAgent.indexOf("MSIE")>0) {
      var obj = document.getElementById('endtime');
        var num = parseInt(obj.innerHTML);
        if(num<=0){
     		 window.location.href= basePath + "find_pw_form1.php";
     	}
			    obj.innerHTML = num-1;
	}else if(isFirefox=navigator.userAgent.indexOf("Firefox")>0){
		     var obj = document.getElementById('endtime');
     var num = parseInt(obj.textContent);
     if(num<=0){
     		 window.location.href= basePath + "find_pw_form1.php";
     	}
	       obj.textContent = num-1;
	} else{
		var obj = document.getElementById('endtime');
        var num = parseInt(obj.innerHTML);
        if(num<=0){
     		 window.location.href= basePath + "find_pw_form1.php";
     	}
			    obj.innerHTML = num-1;
	}
	},1000);
	
setTimeout(function(){
window.location.href = basePath + "find_pw_form1.php";
clearInterval(id);
},10000);
</script>
</html>

