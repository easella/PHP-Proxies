<?php

namespace Proxy\Plugin;

use Proxy\Event\ProxyEvent;
use Proxy\Html;
use YouTube\YouTubeDownloader;

class YoutubePlugin extends AbstractPlugin
{
    protected $url_pattern = 'youtube.com';

    public function onBeforeRequest(ProxyEvent $event)
    {
        //$event['request']->headers->set('Cookie', 'PREF=f6=8');
        $event['request']->headers->set('User-Agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');
    }

    public function onCompleted(ProxyEvent $event)
    {
        $response = $event['response'];
        $url = $event['request']->getUrl();
        $output = $response->getContent();

        // homepage will never work properly. Redirect to trending instead.
        

        // remove top banner that's full of ads
        $output = Html::remove("#header", $output);

        // do this on all youtube pages
        $output = preg_replace('@masthead-positioner">@', 'masthead-positioner" style="position:static;">', $output, 1);

        // data-thumb holds real image when it is available!
        $output = preg_replace_callback('/<img[^>]+data-thumb="(.*?)"[^>]*/is', function ($matches) {

            // may or may not have src= attribute
            $has_src = strpos($matches[0], 'src="') !== false;

            // proxified thumb url
            $thumb_url = proxify_url($matches[1], false);

            if ($has_src) {
                // TODO: maybe remove data-thumb too?
                $matches[0] = str_replace('data-thumb', 'remove-this', $matches[0]);
                return preg_replace('/src="(.*?)"/i', 'src_replaced="1" src="' . $thumb_url . '"', $matches[0]);
            }

            return preg_replace('/data-thumb="(.*?)"/i', 'src_added="1" src="' . $thumb_url . '"', $matches[0]);
        }, $output);

        $youtube = new YouTubeDownloader();
        // cannot pass HTML directly because all the links in it are already "proxified"...
        $links = $youtube->getDownloadLinks($url, "mp4 360, mp4");

        if ($links) {

            $url = current($links)['url'];

            $player = vid_player($url, '100%', '100%', 'mp4');

            // this div blocks our player controls
            $output = Html::remove("#theater-background", $output);

            // replace youtube player div block with our own
            $output = Html::replace_inner("#player-api", $player, $output);
        }

        // causes too many problems...
    

        $response->setContent($output);
    }
}
