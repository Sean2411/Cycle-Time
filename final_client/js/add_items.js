<script type="text/javascript">
function(){
        $('#AddNum').click(function(){
            $($('#list tr').eq(0)).clone(true).insertAfter($('#list tr:last'));
            $('#list tr:last td').eq(1).text('Process'+($('#list tr').length));
        });
};
</script>

/*
function add(){
	var trlen = document.getElementsByTagName('tr').length;
	if(trlen<100){
		var a='';
		for(var i=1;i<=trlen+1;i++){
		a+="<tr>
				<td> Process "+i+" </td>
				<td> <input type = \"text\"  name = \"processName\" id =\"PN"+i+"\" /> </td>
				<td> <input type = \"number\"  name = \"cycleTime\" id =\"CT"+i+"\" /> </td>
			<tr>";
		}

	document.getElementById('tab').innerHTML="<table border=\"1\">"+a+"</table>";
		}else{
			alert('Cannot to add!');
			}
}
*/
