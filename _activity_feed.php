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
              <div class="item">
              	<p class="date"><?php echo $item->get_human_date()?></p>
		        		<p class="source">I posted this at amdavidson.me</p>
	            	<p class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 40)?></p>


            <?php elseif ($item->get_feed_domain() == 'twitter.com'): ?>
            <!-- this item came from twitter -->

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
            		
                <p class="quote"><a href="<?php echo $item->get_original_permalink()?>"><span class="quote">&#8220;</span></a><?php echo preg_replace('/\#([a-zA-Z0-9_]{1,25})?/', "<a class=\"hash\" href=\"http://hashtags.org/tag/$1\">#$1</a>", preg_replace('/\@([a-zA-Z0-9_]{1,15})?/', "<a class=\"name\" href=\"http://twitter.com/$1\">@$1</a>", $item->get_title())); ?></p>
                
								<?php if ($twitter_username != "amdavidson"): ?>
 	               <p class="attribution">By <a href="http://twitter.com/<?php echo $twitter_username ?>">@<?php echo $twitter_username ?></a></p>
            		<?php endif; ?>


            			
            <?php elseif ($item->get_feed_domain() == 'vimeo.com'): ?>
	          <!-- this item came from Vimeo -->
	            <div class="item">
	            	<p class="date"><?php echo $item->get_human_date()?></p>
	            	
	            	<?php if (preg_match('/likes\/rss/', $item->get_feed_url())) : ?> 	
	            	<p class="source">I liked this video on Vimeo</p>
								<?php else : ?>
	            	<p class="source">I posted a video on Vimeo</p>
	            	<?php endif ?>
	            	
	            	<div class="video"><?php echo $item->get_video()?></div>
	            	<p class="caption">
	            		<?php echo word_limiter(strip_tags($item->get_content()), 25)?>
	            	</p>


            <?php elseif ($item->get_feed_domain() == 'youtube.com'): ?>
	          <!-- this item came from youtube -->
	            <div class="item">
	            	<p class="date"><?php echo $item->get_human_date()?></p>
		            <p class="source">I favorited a video on YouTube</p>
		            <p class="title"><a href="<?php echo $item->get_original_permalink()?>">
			            	<?php echo $item->get_title()?></a></p>
	            	<div class="video"><?php echo $item->get_video()?></div>
	            	<p class="caption">
	            		<?php echo word_limiter(strip_tags($item->item_data['description']), 15)?>
	            	</p>



            <?php elseif ($item->get_feed_domain() == 'flickr.com'): ?>
            <!-- this item came from flickr -->
            	<div class="item">
	            	<p class="date"><?php echo $item->get_human_date()?></p>
 	           		<p class="source">I posted a photo to Flickr</p>
		            <div class="photo" style="background: url(<?php echo $item->item_data['flickr_com']['image']['m'] ?>) center center no-repeat;"></div>
 	           		<p class="photo_title"><a href="<?php echo $item->get_original_permalink()?>"><?php echo $item->get_title()?></a></p>
		            <div class="caption"><?php echo $item->get_content()?></div>
	            


            <?php elseif ($item->get_feed_domain() == 'delicious.com'): ?>
            <!-- this item came from delicious.com -->
	            <div class="item">
	            	<p class="date"><?php echo $item->get_human_date()?></p>
	            	<p class="source">I saved a link to Delicious</p>
								<p class="title"><a href="<?php echo $item->get_original_permalink()?>"><?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo strip_tags($item->get_content())?></p>

            

            <?php elseif ($item->get_feed_domain() == 'last.fm'): ?>
	          <!-- this item came from last.fm -->
	            <div class="item">            
	        		<p class="date"><?php echo $item->get_human_date()?></p>
	        		<p class="source">I am listening to</p>
            	<p><a href="<?php echo $item->get_original_permalink()?>">
                <?php echo $item->get_title()?></a></p>


            <?php elseif ($item->get_feed_domain() == 'amdavidson.com'): ?>
						<!-- this item came from amdavidson.com -->
	            <div class="item">
		        		<p class="date"><?php echo $item->get_human_date()?></p>
		        		<p class="source">I posted this at AMDavidson.com</p>
	            	<p  class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 150)?></p>


            <?php elseif ($item->get_feed_domain() == 'andr3w.net'): ?>
						<!-- this item came from andr3w.net -->
		          <div class="item">
		        		<p class="date"><?php echo $item->get_human_date()?></p>
		        		<p class="source">I posted this at andr3w.net</p>
	            	<p class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 150)?></p>


            <?php elseif ($item->get_feed_domain() == 'andromi.info'): ?>
						<!-- this item came from andromi.info -->
	            <div class="item">
		        		<p class="date"><?php echo $item->get_human_date()?></p>
		        		<p class="source">I posted this at Andromi.info</p>
	            	<p class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 150)?></p>


            <?php else: ?>
		        <!-- this item came from an unknown source -->
		        <!-- This theme is only rudimentally prepared to handle this. -->
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