<?php
$url=$_GET['q'];
libxml_use_internal_errors(true);
$site='https://historybooks123.b-cdn.net/geographic/index.php?q='.$url;
$html = file_get_contents($site);

  

$dom = new DOMDocument();

$dom->loadHTML($html);


$img = $dom->getElementsByTagName('img');
$remove = [];

foreach($img as $item)
{
  $remove[] = $item;
}
foreach ($remove as $item)
{
  $item->parentNode->removeChild($item); 
}

$html = $dom->saveHTML();
echo $html;
?>
