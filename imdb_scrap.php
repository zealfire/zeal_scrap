<html>
<head>
<?php
include_once("simple_html_dom.php");

//$base = 'http://www.imdb.com/movies-in-theaters/?ref_=nv_tp_inth_1';
set_time_limit(0);
$html=file_get_html('http://www.imdb.com/search/title?count=100&title_type=feature,tv_series&ref_=nv_ch_mm_1');

/*$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);
$html_base->load($str)*/
//print_r( $str);
//$xpath = new DOMXPath($document);
//$doc = new DOMDocument();

//@$doc->loadHTML($str);
/*$json="[";
foreach($html->find('tr') as $element1 ) {
	//if($element1->class=="source-view")
//	for($i=0;$i<sizeof($element1);$i++)
	//foreach($element1->find('a') as $element2 )
	//{
		//print_r($element2->innertext);
//	print_r($element2->getAttribute('href'));
//}
    //print_r($element1->innertext);
    if($element1->class=='odd detailed')
    foreach ($element1->find('img') as $element2) {

        $json.="{image:".$element2->src."},";
            //print_r($element2->src);
        }
        # code...
    
    
}
$json = substr_replace($json, '', -1);
$json.="]";
print_r($json."<br><br>");*/
$i1=0;
//$json1="[";
foreach($html->find('td') as $element1 ) {
    //if($element1->class=="source-view")
//  for($i=0;$i<sizeof($element1);$i++)
    //foreach($element1->find('a') as $element2 )
    //{
        //print_r($element2->innertext);
//  print_r($element2->getAttribute('href'));
//}
    //print_r($element1->innertext);

    if($element1->class=='title')
    foreach ($element1->find('a') as $element2) {

       if($element2->title==""&&$element2->parent()->class!="credit"&&$element2->parent()->class!="genre")
         
         {
            $json1[$i1]['title']=$element2->innertext;
            $json1[$i1]['href']=$element2->getAttribute('href');
            $i1++;
         }     
        //$json1.="{title:".$element2->innertext.",href:".$element2->getAttribute('href')."},";
            //print_r($element2->src);
       
        # code...
    
    
}
}
//$json1 = substr_replace($json1, '', -1);
//$json1.="]";
//echo json_encode($json1);
$i=0;
//json_decode($json1);
foreach($html->find('tr') as $element1 ) {
if($element1->class=='odd detailed'||$element1->class=='even detailed')
    foreach ($element1->find('img') as $element2) {

        $json1[$i]['image']=$element2->src;
        $i++;
            //print_r($element2->src);
        }
        # code...
    
    
}
$i=0;
foreach($html->find('span') as $element1 ) {
if($element1->class=='outline')
{
            $json1[$i]['text']=$element1->innertext;
        $i++;
 }           //print_r($element2->src);
        }
        $i=0;
foreach($html->find('span') as $element1 ) {
if($element1->class=='year_type')
{
            $json1[$i]['year']=$element1->innertext;
        $i++;
 }           //print_r($element2->src);
        }
        $i=0;$k=0;
foreach($html->find('div') as $element1 ) {
if($element1->class=='user_rating')
{
            foreach($element1->find('span') as $element2 ) {
                if($element2->class=='value')
                {
            $json1[$i]['value']=$element2->innertext;
            $i++;
            $k=1;
        }
        
 }      
 if($k==0)
 $i++;
 $k=0;     //print_r($element2->src);
        }
    }
        # code...
echo json_encode($json1);
// Create a DOM object
?>
</head>
<body>
</body>
</html>
