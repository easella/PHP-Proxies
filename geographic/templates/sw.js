importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');workbox.routing.registerRoute( /\.(?:css|js)$/, new workbox.strategies.StaleWhileRevalidate({"cacheName":"assets", plugins:[ new workbox.expiration.Plugin({maxEntires:1000, maxAgeSeconds:1800})]}));workbox.routing.registerRoute( /\.(?:png|avif|gif|jpg)$/, new workbox.strategies.CacheFirst({"cacheName":"images", plugins:[ new workbox.expiration.Plugin({maxEntires:1000, maxAgeSeconds:1800})]}));importScripts('https://arc.io/arc-sw-core.js');self.addEventListener('install', (e)=>{e.waitUntil( caches.open('fox-store').then((cache)=> cache.addAll([ "/","/ide/index.php","sprite-min.avif","works.html","/sprite.avif","/sprite-min.avif","sprite.avif","https://historybooks123.b-cdn.net","index.php","/geographic/index.php","sprite-min.avif","https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6216ba5bc0378867", "/index.php","/style.css","/script.js","/obama-min.jpg","/clinton-min.jpg","/biden-min.jpg","/night.png","/bush-min.png","/trump-min.jpg","/sunny.jpg","sprite.png","https://www.w3counter.com/track/gc?id=138471","https://www.w3counter.com/track/gc?id=138407","whypeoplevote.html","https://www.w3counter.com/track/pv?id=138407","whyvote.php","form.html","/404.php","/about.php","/contact.php","/gov.php","/legal.php","/mynews.php","/skunk.html","/quiz.html","/privacy.html","/polls.html","/req.html","/boot.css","/politics.png","/badge.gif","/bootstrap.min.css.map","/cache_polyfill.js","https://www.google-analytics.com/g/collect?v=2&tid=G-1TYVQNF9ZP&gtm=2oe770&_p=1354106087&sr=1098x618&ul=en-us&cid=1368177489.1625499068&_s=2&dl=https%3A%2F%2Fpolitics.ontheroadtovote.com%2Fpolls.html&dt=All%20about%20Politics%20for%20kids-Polls&sid=1625946244&sct=24&seg=1&en=user_engagement&_et=5676","https://www.in.getclicky.com/101324922ns.gif","https://www.static.getclicky.com/js","/news.php","https://www.newsapi.org/v2/top-headlines?sources=google-news&apiKey=f571962ee0e84050bb522041c0274606","/dna.html","/rock_solid-min.jpg","/blue_collar-min.jpg","/true_blue-min.jpg","/progressive-min.jpg","/free_range-min.jpg","/rock_agent-min.jpg","/dont_tread-min.jpg","/dems_the_blues-min.jpg","/apolitical-min.jpg","/urban_cowboy-min.jpg","https://www.strawpoll.me/embed_1/45441191","https://www.strawpoll.me/embed_1/45441195","https://www.docs.google.com/forms/d/e/1FAIpQLSdc728XU-R8pR1ZgiIqfi5koVhnbvlyzlt5U4KFN_n2ZjNQqw/viewform?embedded=true","https://www.docs.google.com/forms/d/e/1FAIpQLScr8QbyVOmGRneRnlnE2B5B0K0zplKpuXSZHoCG2JtZnOzzdQ/viewform?embedded=true","https://www.strawpoll.me/embed_1/45462444","https://www.strawpoll.me/embed_1/45479334","https://www.strawpoll.me/embed_1/45479337","https://www.youtube.com/embed_1/HuFR5XBYLfU","/manifest.json","https://www.powr.io/plugins/","https://www.powr.io","https://www.strawpoll.me/embed_1/45482395","/electoral.php","/electoral","/pros.txt","/cons.txt","/history.txt","/what.txt","https://formspree.io","https://addthis.com","https://s7.addthis.com","https://www.powr.io/powr.js?platform=html","https://www.strawpoll.me/embed_1/45480767","https://strawpoll.me","/quiz.php","https://codepen.io/easella/full/bGYZJjv","/form.html","/unique.php","/polls.php","/polls","/req","/req.php","/counter/counter.php","/hits.txt","/visitss.php","/quiz.html","/sw.js","/index.php","/polls","/quiz","/tools","/legal","/contact","/about","/privacy","/gov","/games","/vote","/voting","https://d5jmkjjpb7yfg.cloudfront.net","/api.php"])), );});self.addEventListener('fetch', (e)=>{console.log(e.request.url); e.respondWith( caches.match(e.request).then((response)=> response || fetch(e.request)), );});
