<?php
include 'simple_html_dom.php';
$html = file_get_html('http://www.ikub.al/Horoskopi/Default.aspx');

foreach($html->find('a') as $element) {
 if(strpos($element->href, "Horoskopi"))
       echo "http://www.ikub.al/Horoskopi/".$element->href . '<br>';
}
?>