<?php
$url=$_GET['q'];
libxml_use_internal_errors(true);
$site='https://historybooks123.b-cdn.net/geographic/index.php?q='.$url;
$html = file_get_contents($site);

  

$dom = new DOMDocument();

$dom->loadHTML($html);
$images = $dom->getElementsByTagName('a');
foreach ($images as $image) {
 $old_src = $image->getAttribute('href');
 $new_src = 'https://historybooks123.b-cdn.net/nojsandimg.php?q='.$old_src;
 $image->setAttribute('href', $new_src);
 $image->setAttribute('data-src', $old_src);
}
$links = $dom->getElementsByTagName('link');
foreach ($links as $link) {
 $old_src = $link->getAttribute('rel');
 $new_src = 'https://historybooks123.b-cdn.net/nojsandimg.php?q='.$old_src;
 $link->setAttribute('rel', $new_src);
 $link->setAttribute('data-src', $old_src);
}

$script = $dom->getElementsByTagName('script');

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
foreach($script as $item)
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
