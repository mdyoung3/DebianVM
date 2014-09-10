<?php

$result = $view->result;
$news = array();



print "<div id='news'>";


foreach($result as $k => $v) {
$title = $v->node_title;
$more = "https://ovprea-dev.asu.edu/news";
$date = $v->field_field_news_date[0]['raw']['value'];
$partial_date = date('m.d.y', $date);
$pdf = "";
if(isset($v->field_field_news_pdf[0])){
$pdf= $v->field_field_news_pdf[0]['raw']['uri'];
}
$link="";
if (isset($v->field_field_news_link[0])){
$link = $v->field_field_news_link[0]['raw']['value'];	
}

if ($pdf != false){
print "<a href=$pdf  target='_blank'><span class='news-date'>" . $title . "</span></a>";
} else {
print "";
}
if($link != false){
print "<a href=$link  target='_blank'><span class='news-date'>" . $title . "</span></a>";
} else {
print "";
}
print " [" . $partial_date . "]";
/*if($pdf != false){
print $pdf;
}*/
print "<pre>";
//print_r($result);
print "</pre>";
}
print "<div class='news-more'>";
print "<a href=" . $more . " target='_blank'>more</a>" ;
print "</div>";
print "</div>";

?>


