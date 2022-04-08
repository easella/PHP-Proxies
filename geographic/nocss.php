<?php
$url=$_GET['q'];
libxml_use_internal_errors(true);
$site='https://historybooks123.b-cdn.net/geographic/index.php?q='.$url;
$html = file_get_contents($site);

  

$dom = new DOMDocument();
$dom->loadHTML($html);
$tags_to_remove = array('style','link');
foreach($tags_to_remove as $tag){
    $element = $dom->getElementsByTagName($tag);
    foreach($element  as $item){
        $item->parentNode->removeChild($item);
    }
}
$html = $dom->saveHTML();
echo $html;
?>
