<?php //    
//		File: rss_feed.php
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

<rss version="2.0">
   <channel>
      <title><?php echo $this->config->item('lifestream_title')?></title>
      <link><?php echo $this->config->item('base_url')?>feed</link>
      <description></description>
      <language>en-us</language>
      <docs>http://amdavidson.me/p/about</docs>
      <generator>SweetCron</generator>
      <webMaster><?php echo $this->config->item('admin_email')?></webMaster>
      <?php foreach ($items as $item): ?>
      <item>
         <title><?php echo $item->get_title()?></title>
         <link><?php echo $item->get_original_permalink()?></link>
         <?php if ($item->get_feed_domain() == 'twitter.com'): ?>
           <description><![CDATA[<?php echo $item->get_title()?>]]></description>	
         <?php else: ?>
	         <description><![CDATA[<?php echo $item->get_content()?>]]></description>
	       <?php endif; ?>
         <pubDate><?php echo date('r', $item->get_date())?></pubDate>
         <guid><?php echo $item->get_original_permalink()?></guid>
      </item>
      <?php endforeach; ?>
   </channel>
</rss>