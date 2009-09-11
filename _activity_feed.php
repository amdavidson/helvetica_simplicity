<?php //    
//		File: _activity_feed.php
//		Theme: Helvetica Simplicty
//		Software: Sweetcron
//
//    Copyright (C) 2009 Andrew Davidson
//
//    This program is free software: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    This program is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
?>

<div class="pagination"> <p class="pagination"><?php echo $pages?></p> </div>
<div id="activity">

        <?php if ($items): $i = 1; foreach ($items as $item): ?>


            <?php if ($item->get_feed_domain() == $this->config->item('base_url')): ?>
            	<!-- this item is a sweetcron post -->
              	<div class="type"><a href="<?php echo $item->get_original_permalink()?>"><img src="<?php echo $this->config->item('theme_folder')?>/icons/dev_60.png" /></a></div>
				<div class="item">
              	<p class="date"><?php echo $item->get_human_date()?></p>
		        		<p class="source">I posted this at amdavidson.me</p>
	            	<p class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 40)?></p>


            <?php elseif ($item->get_feed_domain() == 'twitter.com'): ?>
            	<!-- this item came from twitter -->
              	<div class="type"><a href="<?php echo $item->get_original_permalink()?>"><img src="<?php echo $this->config->item('theme_folder')?>/icons/chat_60.png" /></a></div>
	            <div class="item">
            		<p class="date"><?php echo $item->get_human_date()?></p>
            		<?php 
            			$twitter_username = split(':', $item->item_data['title']);
            			$twitter_username = $twitter_username[0];
            			if ( $twitter_username != "amdavidson" ):
            				echo "<p class=\"source\">I favorited a tweet on Twitter.com</p>";
            			else:
            				
            			endif;
            		?>
            		
                <p class="quote"><a href="<?php echo $item->get_original_permalink()?>"></a><?php echo preg_replace('/\#([a-zA-Z0-9_]{1,25})?/', "<a class=\"hash\" href=\"http://hashtags.org/tag/$1\">#$1</a>", preg_replace('/\@([a-zA-Z0-9_]{1,15})?/', "<a class=\"name\" href=\"http://twitter.com/$1\">@$1</a>", $item->get_title())); ?></p>
                
								<?php if ($twitter_username != "amdavidson"): ?>
 	               <p class="attribution">By <a href="http://twitter.com/<?php echo $twitter_username ?>">@<?php echo $twitter_username ?></a></p>
            		<?php endif; ?>


            			
            <?php elseif ($item->get_feed_domain() == 'vimeo.com'): ?>
	          	<!-- this item came from Vimeo -->
              	<div class="type"><a href="<?php echo $item->get_original_permalink()?>"><img src="<?php echo $this->config->item('theme_folder')?>/icons/video_60.png" /></a></div>
	            <div class="item">
	            	<p class="date"><?php echo $item->get_human_date()?></p>
	            	
	            	<?php if (preg_match('/likes\/rss/', $item->get_feed_url())) : ?> 	
	            	<p class="source">I liked this video on Vimeo</p>
								<?php else : ?>
	            	<p class="source">I posted a video on Vimeo</p>
	            	<?php endif ?>
	
	            	<div class="video"><?php echo $item->get_video()?></div>


            <?php elseif ($item->get_feed_domain() == 'youtube.com'): ?>
	          	<!-- this item came from youtube -->
              	<div class="type"><a href="<?php echo $item->get_original_permalink()?>"><img src="<?php echo $this->config->item('theme_folder')?>/icons/video_60.png" /></a></div>
	            <div class="item">
	            	<p class="date"><?php echo $item->get_human_date()?></p>
		            <p class="source">I favorited a video on YouTube</p>
	            	<div class="video"><?php echo $item->get_video()?></div>


            <?php elseif ($item->get_feed_domain() == 'flickr.com'): ?>
            	<!-- this item came from flickr -->
              	<div class="type"><a href="<?php echo $item->get_original_permalink()?>"><img src="<?php echo $this->config->item('theme_folder')?>/icons/photo_60.png" /></a></div>
            	<div class="item">
	            	<p class="date"><?php echo $item->get_human_date()?></p>
 	           		<p class="source">I posted a photo to Flickr</p>
 	           		<p class="title"><a href="<?php echo $item->get_original_permalink()?>"><?php echo $item->get_title()?></a></p>
					<img src="<?php echo $item->item_data['flickr_com']['image']['m']?>">
		            <div class="content"><?php echo $item->get_content()?></div>

	            


            <?php elseif ($item->get_feed_domain() == 'delicious.com'): ?>
            	<!-- this item came from delicious.com -->
              	<div class="type"><a href="<?php echo $item->get_original_permalink()?>"><img src="<?php echo $this->config->item('theme_folder')?>/icons/link_60.png" /></a></div>
	            <div class="item">
	            	<p class="date"><?php echo $item->get_human_date()?></p>
	            	<p class="source">I saved a link to Delicious</p>
								<p class="title"><a href="<?php echo $item->get_original_permalink()?>"><?php echo $item->get_title()?></a></p>


	            <?php elseif ($item->get_feed_domain() == 'pinboard.in'): ?>
	            	<!-- this item came from pinboard -->
	              	<div class="type"><a href="<?php echo $item->get_original_permalink()?>"><img src="<?php echo $this->config->item('theme_folder')?>/icons/link_60.png" /></a></div>
		            <div class="item">
		            	<p class="date"><?php echo $item->get_human_date()?></p>
		            	<p class="source">I saved a link to Pinboard</p>
									<p class="title"><a href="<?php echo $item->get_original_permalink()?>"><?php echo $item->get_title()?></a></p>


            

            <?php elseif ($item->get_feed_domain() == 'last.fm'): ?>
  	            <!-- this item came from last.fm -->
              	<div class="type"><a href="<?php echo $item->get_original_permalink()?>"><img src="<?php echo $this->config->item('theme_folder')?>/icons/music_60.png" /></a></div>
	            <div class="item">            
	        		<p class="date"><?php echo $item->get_human_date()?></p>
	        		<p class="source">I loved this track on last.fm</p>
				<div class="albumart"><a href="<?php echo $item->item_data['album_url']?>"><img style="width:64px;height:64px;" src="<?php echo $item->item_data['image_url_small'] ?>" /></a></div>
            	<div class="song_text">
						<a href="<?php echo $item->item_data['artist_url'] ?>"><?php echo $item->item_data['artist']?></a> - <a href="<?php echo $item->item_data['track_url']?>"><?php echo $item->item_data['track_title']?></a>
				</div>


            <?php elseif ($item->get_feed_domain() == 'amdavidson.com'): ?>
				<!-- this item came from amdavidson.com -->
              	<div class="type"><a href="<?php echo $item->get_original_permalink()?>"><img src="<?php echo $this->config->item('theme_folder')?>/icons/post_60.png" /></a></div>
	            <div class="item">
		        		<p class="date"><?php echo $item->get_human_date()?></p>
		        		<p class="source">I posted this at AMDavidson.com</p>
	            	<p  class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 150)?></p>


            <?php elseif ($item->get_feed_domain() == 'andr3w.net'): ?>
				<!-- this item came from andr3w.net -->
              	<div class="type"><a href="<?php echo $item->get_original_permalink()?>"><img src="<?php echo $this->config->item('theme_folder')?>/icons/post_60.png" /></a></div>
		        <div class="item">
		        	<p class="date"><?php echo $item->get_human_date()?></p>
		        	<p class="source">I posted this at andr3w.net</p>
	              <p class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            	<?php echo $item->get_title()?></a></p>
	              <p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 150)?></p>


            <?php elseif ($item->get_feed_domain() == 'andromi.info'): ?>
				<!-- this item came from andromi.info -->
              	<div class="type"><a href="<?php echo $item->get_original_permalink()?>"><img src="<?php echo $this->config->item('theme_folder')?>/icons/post_60.png" /></a></div>
	            <div class="item">
		        		<p class="date"><?php echo $item->get_human_date()?></p>
		        		<p class="source">I posted this at Andromi.info</p>
	            	<p class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 150)?></p>


            <?php else: ?>
		        <!-- this item came from an unknown source -->
		        <!-- This theme is only rudimentally prepared to handle this. -->
              	<div class="type"><a href="<?php echo $item->get_original_permalink()?>"><img src="<?php echo $this->config->item('theme_folder')?>/icons/blank_60.png" /></a></div>
	            <div class="item">
		        		<p class="date"><?php echo $item->get_human_date()?></p>
	            	<p class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 100)?></p>

            
            <?php endif; ?>
            
						</div>
        <?php endforeach; endif; ?>

</div>
<div class="pagination"> <p class="pagination"><?php echo $pages?></p> </div>