<?php 
	require_once('includes/reddit.php');

	$reddit = new reddit;

	$posts = $reddit->get_posts($_GET['sub']??'foxes', $_GET['lim']??5,$_GET['override']??null);
	$cacheAge = $reddit->getCacheAge($_GET['sub']??'foxes');