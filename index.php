<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>GramGrab - Instagram viewing and downloading tool</title>
  <meta name="description" content="Easily view and download all your Instgrams pics in a kick ass fashion!">

  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/style.css">

  <script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

  <a href="http://github.com/jwhelton/gramgrab"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://a248.e.akamai.net/assets.github.com/img/e6bef7a091f5f3138b8cd40bc3e114258dd68ddf/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub"></a>
  
  <header>
    <div id="inner">
      <div id="instruct"></div>
      <img src="img/logo.png" class="logo" />
      <div class="follow">
        <a href="https://twitter.com/jwhelton" class="twitter-follow-button" data-show-count="false">Follow @jwhelton</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>
      <div class="tweet">
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://gramgrab.com" data-text="Awesome Instagram pic viewing and saving tool" data-via="jwhelton">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>
      <div class="like">
        <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fgramgrab.com&amp;send=false&amp;layout=box_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90&amp;appId=162166313824216" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:60px; height:90px;" allowTransparency="true"></iframe>
      </div>
    </div>
  </header>
  <div id="main">
    <div id="welcome">
      <div class="login_button"><a href="https://instagram.com/oauth/authorize/?client_id=client_id&redirect_uri=redirect_uri&response_type=code"><img src="img/login.png" /></a></div>
    </div>
    <div class="gram">
     <?php
			mysql_connect("host","user","password");
	        @mysql_select_db("database") or die( "Unable to select database");
	     	     
	         $user = mysql_fetch_assoc(mysql_query("SELECT * FROM  `gramgrab` LIMIT 1"));
	         mysql_close();
             //Grab Some random Instagrams
             $feed = json_decode(file_get_contents("https://api.instagram.com/v1/media/popular?access_token=".$user['access_token']."&min_timestamp=1286323200&count=16"));
             	foreach ($feed->data as $gram) {
             		echo '<div class="gram">
                         <img src="'.$gram->images->low_resolution->url.'" class="image" />
                         <input type="hidden" value="'.$gram->images->standard_resolution->url.'" class="url"/>
                         <div class="dim"></div>
                         <div class="meta">
                           <div class="caption">'.(isset($gram->caption->text)?((strlen($gram->caption->text) > 80)?substr($gram->caption->text, 0, 77)."...":$gram->caption->text):'No Caption').'</div>
                           <div class="likes">Likes: '.$gram->likes->count.'</div>
                           <div class="comments">Comments: '.$gram->comments->count.'</div>
                           <div class="filter">Filter: '.$gram->filter.'</div>
                           <div class="created"><a href="'.$gram->link.'" TARGET="_blank">'.date("j/n/y H:i",$gram->created_time).'</a></div>
                         </div>
                       </div>';
               	}
         ?>

  <div id="popular">
    <div class="bg"></div>
    <div class="title">@JWhelton's Most Popular Instagram</div>
    <div class="likes">Likes: 100</div>
    <div class="comments">Comments: 200</div>
    <div class="filter">Filter: Lo-Fi</div>
    <div class="date">Taken: 1/1/11 11:11</div>
    <div class="gram"><img src="http://distilleryimage0.s3.amazonaws.com/ea886f407f2f11e18cf91231380fd29b_6.jpg" class="image" /></div>
    <div class="tweet"><a href="https://twitter.com/intent/tweet?related=jwhelton&text=My%20most%20popular%20Instagram%3A%20http%3A%2F%2Finstagr.am%2Fp%2FJCsxdpC-nI%2F%20with%20100%20likes%2C%20200%20comments.%20Find%20yours%20here%20http%3A%2F%2Fgramgrab.com "style="color: #fff; font-size:25px;">Click here to tweet this with link to the Instagram...</a></div>
  </div>
  <footer>
    <div class="inner">
       Hacked togther in a couple of hours by <a href="http://twitter.com/jwhelton" style="color: #fff; text-decoration:underline;">@JWhelton</a> while he had the flu. <br />This site isn't gonna exit for $1 Billion, but please buy me some chicken soup: <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=GAMRXNR9T2PJG&lc=IE&item_name=James%20Whelton%20Chicken%20Soup%20Fund&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted" style="color: #fff; text-decoration:underline;">Donate on PayPal</a>
    </div>
  </footer>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>

  <script>
    var _gaq=[['_setAccount','UA-30729619-1'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</body>
</html>
