<html>
<head>

<script src="jquery-1.11.1.min.js" type="text/javascript"></script>
<?php

include_once("simple_html_dom.php");
set_time_limit(0);
$url="http://dhsprogram.com/email-subscribe.cfm?Email=&emailSignUp_btn=";
$html=file_get_html($url);
	echo $html->find('[class=tdtext]').value;
	echo $html;
//usleep(2000);
?>

</head>

<body>
<script>
$(document).ready(function()
{
var divs = document.getElementsByClassName('tdtext');
divs[3].value='recovery@gmail.com';
divs[6].value='hello';
divs[9].value='hello';
//document.getElementById('cntry').value ='INDIA';​​​​​​​​​​

$('#cntry').val('IA');
$('form').attr("action","http://dhsprogram.com/email-subscribe.cfm");
document.forms[1].setAttribute('target','_blank');
document.forms[1].submit();
console.log('dere');
var delay=3000;
setTimeout(function()
{
window.location = 'http://localhost/extra/test.php';
},delay);
console.log('bhbc');
});

</script>
</body>
</html>
