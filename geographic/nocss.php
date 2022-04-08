<?php
$url=$_GET['q'];
libxml_use_internal_errors(true);
$site='https://historybooks123.b-cdn.net/geographic/index.php?q='.$url;
$html = file_get_contents($site);

  

$dom = new DOMDocument();

$dom->loadHTML($html);

$style = $dom->getElementsByTagName('style');
$link = $dom->getElementsByTagName('link');
$remove = [];
foreach($style as $item)
{
  $remove[] = $item;
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
$page = preg_replace('/\sstyle=("|\').*?("|\')/i', '', $html);

echo $html.$page;
?>
