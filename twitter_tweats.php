<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content="300">
<meta charset="utf-8">
<style >
    body{
        margin-top: 0px;
        margin-bottom: 0px;
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }
    #main
    {
           
    }
    img{
        width:71%;
    }
    #final{
        background:  url(bg.jpg) top left no-repeat;
width: 566px;
overflow: hidden;
height: 1166px;
margin: 0 auto;
margin-top: 0px;
padding: 127px 100px 568px;
color: #fff;
text-align: center;
position: relative;
float:left;
z-index:-1;
}
h3{

}
    
    .display{
        max-width: 100%;
        margin-top: -6%;
        color:white;
        padding: 1%;
        margin-left: -38%;
    
    }
</style>
<script id="twitter-wjs" src="//platform.twitter.com/widgets.js"></script>

<?php
header('Content-Type: text/html; charset=utf-8');
include_once("simple_html_dom.php");
set_time_limit(0);
$html=file_get_html('https://twitter.com/brad');
for($l=0;$l<5;$l++)
{
$json[$l]['source']="p2";
$json[$l]['author']="";
$json[$l]['title']="";
$json[$l]['time']="";
}
$i1=0;$ch=0;
$p1=0;
foreach($html->find('div') as $element1 ) {
    
    if($element1->class=='StreamItem js-stream-item'&&$p1<5)
    
{
         foreach($element1->find('p') as $element2 ) {
            if($element2->class=='ProfileTweet-text js-tweet-text u-dir')
            {
           $json[$ch]['title']=$element2->innertext;
           break;
       }
         }
          foreach($element1->find('a') as $element2 ) {
            if($element2->class=='ProfileTweet-timestamp js-permalink js-nav js-tooltip')
            {
                
           $json[$ch]['time']=$element2->getAttribute('data-original-title');
           break;
       }
         }
          foreach($element1->find('span') as $element2 ) {
            if($element2->class=='ProfileTweet-screenname u-inlineBlock u-dir')
            {
           $json[$ch]['author']=$element2->innertext;
           break;
       }
         }           
    foreach($element1->find('img') as $element2 ) {
            if($element2->class=='TwitterPhoto-mediaSource')
            {
           $json[$ch]['source']=$element2->src;
           break;
       }
         }
         $ch++;   
          $p1++;
    //break;
    
}
if($p1>=5)
break;
}
echo "<strong>".$json[0]['author']."</strong><br/>";
for($r=0;$r<5;$r++)
{
if($json[$r]['source']!="p2")
echo "<div class='display' style='display:none;position:absolute;'><h3 style='margin-left:52%;'>".$json[$r]['author']."</h3>"."<br/><h3 style='margin-left:52%;'>".$json[$r]['time']."</h3><br/>"."<h2 style='padding-left:12%;margin-left:17%; font-weight:normal;width:92%;color:#752e4a;'>".$json[$r]['title']."</h2>"."<br/>"."<img  style='margin-left:38%;' src='".$json[$r]['source']."'><br/></div>";
else
echo "<div class='display' style='display:none;position:absolute;'><h3 style='margin-left:52%;'>".$json[$r]['author']."</h3>"."<br/><h3 style='margin-left:52%;'>".$json[$r]['time']."</h3><br/>"."<h2 style='padding-left:12%;margin-left:17%;font-weight:normal;width:92%;color:#752e4a;'>".$json[$r]['title']."</h2>"."<br/></div>";
//sleep(10);
}
?>
<script src="jquery-1.11.1.min.js" type="text/javascript"></script>
<script >
$(document).ready(function()
{
var divs = document.getElementsByClassName('display');
    document.getElementById('final').appendChild(divs[0]);
divs[0].remove();
document.getElementById('final').appendChild(divs[0].cloneNode(true));
divs[0].remove();
document.getElementById('final').appendChild(divs[0].cloneNode(true));
divs[0].remove();
document.getElementById('final').appendChild(divs[0].cloneNode(true));
divs[0].remove();
document.getElementById('final').appendChild(divs[0].cloneNode(true));
divs[0].remove();
document.getElementById('final').appendChild(divs[0].cloneNode(true));
var i=0;


var divs = document.getElementsByClassName('display');
myTimer();

/*setInterval(function(){
  $(divs[0]).css({"left":"100px","display":"none"});
$(divs[1]).css({"left":"100px","display":"none"});
$(divs[2]).css({"left":"100px","display":"none"});
$(divs[3]).css({"left":"100px","display":"none"});
$(divs[4]).css({"left":"100px","display":"none"});myTimer();},28900);
*/});
function myTimer()
{ 
console.log('hello');
var divs = document.getElementsByClassName('display'); 
  $(divs[0]).delay(2000).fadeIn().delay(6000).animate({left:'-2650px'},"slow");
$(divs[1]).delay(8800).fadeIn().delay(6000).animate({left:'-2650px'},"slow");
$(divs[2]).delay(15600).fadeIn().delay(6000).animate({left:'-2650px'},"slow");
$(divs[3]).delay(22200).fadeIn().delay(6000).animate({left:'-2650px'},"slow");
$(divs[0]).delay(29000).css({"left":"100px","display":"none"});
//$(document).delay(31000).myTimer();
//$(divs[0]).delay(800).animate({left:'-2650px'},"slow");
//$(divs[1]).delay(4200).fadeIn();
//$(divs[1]).delay(800).animate({left:'-2650px'},"slow");
/*$(divs[2]).delay(6400).fadeIn();
$(divs[2]).delay(800).animate({left:'-2650px'},"slow");
$(divs[3]).delay(8600).fadeIn();
$(divs[3]).delay(800).animate({left:'-2650px'},"slow");
$(divs[4]).delay(11600).fadeIn();
$(divs[4]).delay(2200).animate({left:'-2750px'},"slow");*/
}
</script>
</head>
<body id="main">
<div id="final">
</div>
<div id="jkj">
</div>

</body>
</html>
