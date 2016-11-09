<?php 

/**-------------------------------------------------------------------------**/
/* CONFIGURE YOUR LISITNGS BELOW */	

//SET TIMEZONE
$settings['timezone'] = "GMT+8";

//GENERAL CONFIGS
$settings['subreddit'] = $_GET['sub'] ?? "NaturePics";
$settings['limit'] = $_GET['lim'] ?? 5;
$settings['override'] = $_GET['override'] ?? null;

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

/**-------------------------------------------------------------------------**/
/** INITIAL CHECKS, DON'T ALTER THE CODE UNLESS YOU KNOW WHAT YOU'RE DOING! **/
/**-------------------------------------------------------------------------**/

//CHECK WHETHER THE CORE FILES EXISTS
if(!file_exists('includes/reddit.php')) {
	die("Please check that all the files are in the correct root directory!");
}

//CHECK WHETER THE CACHE FOLDER EXISTS, IF NOT CREATE IT
if (!file_exists("cache")&&!is_dir("cache")) {
	mkdir("cache");
	header("Location: //".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
}

//LOAD FUNCTIONS FILE
require_once('includes/reddit.php');

//SET SETTINGS
date_default_timezone_set($timezone);

//DEFINE NEW VARIABLE
$reddit = new reddit;

//SUBREDDIT TO DISPLAY
$posts = $reddit->get_posts($settings['subreddit'],$settings['limit'],$settings['override']);
$cacheAge = $reddit->getCacheAge($settings['subreddit']);
