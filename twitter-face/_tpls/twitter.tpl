


<script>!function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0];
	if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>

	<div id="kmj_twitter">
		<a href="https://twitter.com/[+twitter_tag+]" class="twitter-follow-button" data-size="small" data-show-count="false" data-lang="en">Follow</a><br />
		<a href="https://twitter.com/share" class="twitter-share-button" data-via="twitterapi" data-lang="en">Tweet me</a><br />
		<a href="https://twitter.com/#!/[+twitter_tag+]" target="_blank">
			<img src="[+image_path+]twitter.png" width="30" height="30" alt="Twitter" class="twit-img pull-left" />
			<p>
				[+twitter_tag+]<br />
				on Twitter
			</p>
		</a>
		<div style=" height: 280px; overflow-y: scroll;">
			<ul id="twitter_update_list"></ul>
		</div>
	</div>

<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/[+twitter_tag+].json?callback=twitterCallback2&count=[+number_tweets+]"></script>
