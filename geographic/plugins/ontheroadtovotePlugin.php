<?php
namespace Proxy\Plugin;

use Proxy\Plugin\AbstractPlugin;
use Proxy\Event\ProxyEvent;

use Proxy\Html;

class MultiSiteMatchPlugin extends AbstractPlugin {

	// Matches multiple domain names (abc.com, abc.de, abc.pl) using regex (you MUST use / character)
	protected $url_pattern = '/^ontheroadtovote\.(com|de|pl)$/is';
	// Matches a single domain name
	//protected $url_pattern = 'abc.com';
	
	public function onCompleted(ProxyEvent $event){
	
		$response = $event['response'];
		
		$html = $response->getContent();
		$dom = new DOMDocument();
$dom->loadHTML($html);
$images = $dom->getElementsById('avif');
 
foreach ($images as $image) {
 $old_src = $image->getAttribute('src');
 $new_src = 'https://voting123.b-cdn.net/sprite-min.avif';
 $image->setAttribute('src', $new_src);
 $image->setAttribute('data-src', $old_src);
}
 
$dataz = $dom->saveHTML();
		
		// do your stuff here...
		
		$response->setContent($dataz);
	}
}
?>
