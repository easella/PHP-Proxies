<?php
$url=$_GET['q'];
libxml_use_internal_errors(true);
$site='https://historybooks123.b-cdn.net/geographic/index.php?q='.$url;
$html = file_get_contents($site);

  

$dom = new DOMDocument();

$dom->loadHTML($html);
$domx = new DOMXPath($dom);
$items = $domx->query("//p[@style]");
$style = $dom->getElementsByTagName('style');
$link = $dom->getElementsByTagName('link');
$remove = [];
foreach($style as $item)
{
  $remove[] = $item;
}
foreach($items as $item) {
  $item->removeAttribute("style");
}
foreach($link as $item)
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
