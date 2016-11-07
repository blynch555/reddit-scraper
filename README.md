# reddit-scraper
A simple PHP script that allows you to list the most recent Reddit posts from a particular sub-reddit or 'multireddits'.

## Installation & configuration
To install,
1. Place all the files into your root folder
2. Create a new folder titled *cache*
3. Add the following code to the top of your page
```php
require_once('init.php');
```
Now on to configuring the thing:
Firstly, open up *init.php* and look for the following line:
```php
$posts = $reddit->get_posts($_GET['sub']??'NaturePics', $_GET['lim']??5,$_GET['override']??null);
```

Edit the following arguments:

|Argument|Description|Default|
|--------|---------|-----|
|```$_GET['sub']??'NaturePics'```|Change ```NaturePics``` to the subreddit of your choice. ```$_GETp['sub']``` can be safely discarded if you wish to do so. | ```NaturePics```
|```$_GET['lim']??5```| Limits the number of posts to display.|5
|```$_GET['override']??null```|Used to force-refresh the cache|```null```

## Usage
Example of usage:
```php
<?php foreach ($posts as $post) { ?>
    <h4><a href="<?php echo $post['url']; ?>"><?php echo $post['title']; ?></a></h4>
<?php } ?>
```

|Variables |Description
|--------|:---------:
|```title```| The posts' title
|```img_url```| The URL of the image (if any)
|```url```| URL of the actual post
|```post_url```| URL of the Reddit post

## Notes
* Multisubreddits are ***not*** yet supported.
