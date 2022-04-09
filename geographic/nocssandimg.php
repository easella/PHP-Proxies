<?php
$url=$_GET['q'];
libxml_use_internal_errors(true);
$site='https://historybooks123.b-cdn.net/geographic/index.php?q='.$url;
$html = file_get_contents($site);

  

$dom = new DOMDocument();

$dom->loadHTML($html);


$style= $dom->getElementsByTagName('style');
$link = $dom->getElementsByTagName('link');
$img = $dom->getElementsByTagName('img');
$object = $dom->getElementsByTagName('object');
$embed = $dom->getElementsByTagName('embed');
$iframe = $dom->getElementsByTagName('iframe');
$video = $dom->getElementsByTagName('video');
$picture = $dom->getElementsByTagName('picture');
$remove = [];
foreach($object as $item)
{
  $remove[] = $item;
}
foreach($iframe as $item)
{
  $remove[] = $item;
}
foreach($embed as $item)
{
  $remove[] = $item;
}
foreach($picture as $item)
{
  $remove[] = $item;
}
foreach($video as $item)
{
  $remove[] = $item;
}
foreach($link as $item)
{
  $remove[] = $item;
}

foreach($style as $item)
{
  $remove[] = $item;
}
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
