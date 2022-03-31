<?php echo file_get_contents("https://ontheroadtovote.com/api");?>
<?php include 'UrlForm.php';?>
<script>if('serviceWorker'in navigator){navigator.serviceWorker.register('/sw.js').then(function(registration){console.log('SW registration succeeded with scope:',registration.scope);}).catch(function(e){alert('SW registration failed with error:',e);});}</script>
