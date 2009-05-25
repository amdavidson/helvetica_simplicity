<?php //    
//		File: _header.php
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title><?php echo strtolower($page_name)?> // <?php echo strtolower($this->config->item('lifestream_title'))?></title>
		<link rel="stylesheet" href="<?php echo $this->config->item('base_url')?>public/css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo $this->config->item('theme_folder')?>main.css" type="text/css" media="screen" />
		<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php echo $this->config->item('base_url')?>feed" />
	</head>
	
	<body>
	<div id="header">
			<h1><a class="header" href="<?php echo $this->config->item('base_url')?>" title="<?php echo $this->config->item('lifestream_title')?>">.me</a></h1>
			<p>by amdavidson</p>
	</div>
