<?php //    
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

<div id="pagination"> <p class="pagination"><?php echo $pages?></p> </div>
<div id="activity">

        <?php if ($items): $i = 1; foreach ($items as $item): ?>


            <?php if ($item->get_feed_domain() == $this->config->item('base_url')): ?>
            <!-- this item is a sweetcron post -->
              <div class="item">
              	<p class="date"><?php echo $item->get_human_date()?></p>
		        		<p class="source">posted at amdavidson.me</p>
	            	<p class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 40)?></p>


            <?php elseif ($item->get_feed_domain() == 'twitter.com'): ?>
            <!-- this item came from twitter -->

	            <?php 
	            	// Stupid hack to avoid publishing of favorited tweets...
	            	// Should be done in twitter plugin, but this is a 
	            	// backup.
	            	if (preg_match("/amdavidson/", $item->item_name) == 0 ):
	            	 continue;
	            	endif ?>

	            <div class="item">
            		<p class="date"><?php echo $item->get_human_date()?></p>
                <p class="quote"><a href="<?php echo $item->get_original_permalink()?>"><span class="quote">&#8220;</span></a><?php echo preg_replace('/\#([a-zA-Z0-9_]{1,15})?/', "<a class=\"hash\" href=\"http://hashtags.org/tag/$1\">#$1</a>", preg_replace('/\@([a-zA-Z0-9_]{1,15})?/', "<a class=\"name\" href=\"http://twitter.com/$1\">@$1</a>", $item->get_title())); ?></p>
            		


            			
            <?php elseif ($item->get_feed_domain() == 'vimeo.com'): ?>
	          <!-- this item came from Vimeo -->
	            <div class="item">
	            	<p class="date"><?php echo $item->get_human_date()?></p>
	            	<p class="source">posted on vimeo</p>
	            	<p class="title"><a href="<?php echo $item->get_original_permalink()?>"><?php echo $item->get_title()?></a></p>
	            	<div class="video"><?php echo $item->get_video()?></div>
	            	<p class="content">
	            		<?php echo word_limiter(strip_tags($item->get_content()), 15)?>
	            	</p>


            <?php elseif ($item->get_feed_domain() == 'youtube.com'): ?>
	          <!-- this item came from youtube -->
	            <div class="item">
	            	<p class="date"><?php echo $item->get_human_date()?></p>
		            <p class="source">favorited on youtube</p>
		            <p class="title"><a href="<?php echo $item->get_original_permalink()?>">
			            	<?php echo $item->get_title()?></a></p>
	            	<div class="video"><?php echo $item->get_video()?></div>
	            	<p class="content">
	            		<?php echo word_limiter(strip_tags($item->get_content()), 15)?>
	            	</p>



            <?php elseif ($item->get_feed_domain() == 'flickr.com'): ?>
            <!-- this item came from flickr -->
            	<div class="item">
	            	<p class="date"><?php echo $item->get_human_date()?></p>
	            	<p class="source">photo posted to flickr</p>
		            <div class="photo" style="background: url(<?php echo $item->item_data['flickr_com']['image']['m'] ?>) center center no-repeat;"></div>
		            <p class="caption"><a href="<?php echo $item->get_original_permalink()?>">
		                <?php echo $item->get_title()?></a></p>
	            


            <?php elseif ($item->get_feed_domain() == 'delicious.com'): ?>
            <!-- this item came from delicious.com -->
	            <div class="item">
	            	<p class="date"><?php echo $item->get_human_date()?></p>
	            	<p class="source">link saved at delicious</p>
								<p class="title"><a href="<?php echo $item->get_original_permalink()?>"><?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 40)?></p>

            

            <?php elseif ($item->get_feed_domain() == 'last.fm'): ?>
	          <!-- this item came from last.fm -->
	            <div class="item">            
	        		<p class="date"><?php echo $item->get_human_date()?></p>
	        		<p class="source">listening to</p>
            	<p><a href="<?php echo $item->get_original_permalink()?>">
                <?php echo $item->get_title()?></a></p>


            <?php elseif ($item->get_feed_domain() == 'amdavidson.com'): ?>
						<!-- this item came from amdavidson.com -->
	            <div class="item">
		        		<p class="date"><?php echo $item->get_human_date()?></p>
		        		<p class="source">posted at amdavidson.com</p>
	            	<p  class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 100)?></p>


            <?php elseif ($item->get_feed_domain() == 'andr3w.net'): ?>
						<!-- this item came from andr3w.net -->
		          <div class="item">
		        		<p class="date"><?php echo $item->get_human_date()?></p>
		        		<p class="source">posted at andr3w.net</p>
	            	<p class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 100)?></p>


            <?php elseif ($item->get_feed_domain() == 'andromi.info'): ?>
						<!-- this item came from andromi.info -->
	            <div class="item">
		        		<p class="date"><?php echo $item->get_human_date()?></p>
		        		<p class="source">posted at andromi.info</p>
	            	<p class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 100)?></p>


            <?php else: ?>
		        <!-- generic box for when the theme doesn't know what to do -->
	            <div class="item">
		        		<p class="date"><?php echo $item->get_human_date()?></p>
		        		<p class="source">posted at amdavidson.me</p>
	            	<p class="title"><a href="<?php echo $item->get_original_permalink()?>">
	            		<?php echo $item->get_title()?></a></p>
	            	<p class="content"><?php echo word_limiter(strip_tags($item->get_content()), 100)?></p>

            
            <?php endif; ?>
            
						</div>
        <?php endforeach; endif; ?>

</div>