<!-- 
Widget control when editing widgets options in WP-admin
it should only contain form elements WP supplies the <form></form> tags

For each key in the ContentRotatorWidget::control_options array, 
you will have the following placeholders available
[+your_key.id+]			- used inside id attributtes, eg id="[+your_key.id+]"
[+your_key.name+]			- used inside name attributtes, eg id="[+your_key.name+]"
[+your_key.value+]			- used inside value attributtes, eg id="[+your_key.value+]"

WP appends text to the names and id's for multiple instances, so don't hardcode the values
-->

<h3>Display Settings</h3>
<label for="[+use_tabs.id+]">[+use_tabs.label+]</label> 
	<input type="checkbox" id="[+use_tabs.id+]" name="[+use_tabs.name+]" [+use_tabs.value+] /><br />
<label for="[+display_first.id+]">[+display_first.label+]</label> 
	<select id="[+display_first.id+]" name="[+display_first.name+]">
		[+display_first.options+]
	</select><br />

<!-- Twitter -->
<h3>Twitter Settings</h3>
<label for="[+use_twitter.id+]">[+use_twitter.label+]</label>
	<input type="checkbox" id="[+use_twitter.id+]" name="[+use_twitter.name+]" [+use_twitter.value+] /><br />
<label for="[+twitter_tag.id+]">[+twitter_tag.label+]</label><br />
	<input type="text" id="[+twitter_tag.id+]" name="[+twitter_tag.name+]" value="[+twitter_tag.value+]" /><br />
<label for="[+number_tweets.id+]">[+number_tweets.label+]</label><br />
	<input type="text" id="[+number_tweets.id+]" name="[+number_tweets.name+]" value="[+number_tweets.value+]" /><br />
<!-- Facebook -->	
<h3>Facebook Settings</h3>
<label for="[+use_facebook.id+]">[+use_facebook.label+]</label>
	<input type="checkbox" id="[+use_facebook.id+]" name="[+use_facebook.name+]" [+use_facebook.value+] /><br />
<img src="[+image_path+]green_line.gif" width="220" height="8" /><br />
<label for="[+use_face_likebox.id+]">[+use_face_likebox.label+]</label>
	<input type="checkbox" id="[+use_face_likebox.id+]" name="[+use_face_likebox.name+]" [+use_face_likebox.value+] /><br />
<label for="[+facebook_page.id+]">[+facebook_page.label+]</label><br />
	<input type="text" id="[+facebook_page.id+]" name="[+facebook_page.name+]" value="[+facebook_page.value+]" /><br />
	
<img src="[+image_path+]green_line.gif" width="220" height="8" /><br />
<label for="[+use_face_comments.id+]">[+use_face_comments.label+]</label>
	<input type="checkbox" id="[+use_face_comments.id+]" name="[+use_face_comments.name+]" [+use_face_comments.value+] /><br />
<label for="[+facebook_comments_url.id+]">[+facebook_comments_url.label+]</label><br />
	<input type="text" id="[+facebook_comments_url.id+]" name="[+facebook_comments_url.name+]" value="[+facebook_comments_url.value+]" /><br />
<label for="[+facebook_num_posts.id+]">[+facebook_num_posts.label+]</label><br />
	<input type="text" id="[+facebook_num_posts.id+]" name="[+facebook_num_posts.name+]" value="[+facebook_num_posts.value+]" /><br />

	
	