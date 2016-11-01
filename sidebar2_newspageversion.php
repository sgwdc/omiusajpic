<?php 
// HIDE FROM SOME PAGES
if (!is_page('search-results')) : 
?>

<?php 
// Set a variable so we know if this is the news page
global $newspage; 
$newspage = false; 
$page_uri = getenv('REQUEST_URI'); 
if (strstr($page_uri,'/news')) $newspage = true;
?>

<?php 
$news_cat = 90; 
$posts_num = 4;
$news_title = 'Recent News';
$show_members_sidebar = 0;
?>

<?php 
	// spanish
	if (!$newspage && (is_page_template('spanish.php')||is_category(206)||in_category(206))) {
		$news_cat = 206; 
		$news_title="Noticias en Espa&Ntilde;ol";
	// take action
	} elseif (is_page('action')) {
		$news_cat = '13'; 
		$news_title="Recent Action Alerts";
	// resources
	} elseif (is_page('resources')) { 
		$news_cat = '10'; 
		$news_title="New Resources";
	// issues
	} elseif (is_page('issues')) {
		$news_cat = '5'; 
		$news_title="News in Issues";
	// global 
	} elseif (is_page('global')) {
		$news_cat = '4'; 
		$news_title="News in Global";
	// member news 
	} elseif ((is_page('members')||$post->post_parent==10) && $_COOKIE['wp-postpass_' . COOKIEHASH]) {
		$news_cat = '6'; 
		$news_title="<small><a href='/?member_logout=1' style='text-align:right;'>Logout</a></small> Member News";
	// member news in protected news item 
	} 
	
	if($_COOKIE['wp-postpass_' . COOKIEHASH] && (!(is_page('members')||$post->post_parent==10))) {
		$show_members_sidebar = 1;
	}

	// global sub sections 
	if (is_page(39)||$post->post_parent==39) {
		$news_cat = '15'; 
		$news_title="Africa News";

	} elseif (is_page(40)||$post->post_parent==40) {
		$news_cat = '16'; 
		$news_title="Asia &amp; Pacific News";

	} elseif (is_page(41)||$post->post_parent==41) {
		$news_cat = '8'; 
		$news_title="North America News";

	} elseif (is_page(38)||$post->post_parent==38) {
		$news_cat = '12'; 
		$news_title="Latin America &amp; Carribean News";

	} elseif (is_page(42)||$post->post_parent==42) {
		$news_cat = '20'; 
		$news_title="Europe News";

	} elseif (is_page(194)||$post->post_parent==194) {
		$news_cat = '14'; 
		$news_title="United Nations News";
	} 

	// issues subsections
	if (is_page(21)||$post->post_parent==21) {
		$news_cat = '11'; 
		$news_title="Social Justice News";
	} elseif (is_page(46)||$post->post_parent==46) {
		$news_cat = '19'; 
		$news_title="Economic Justice News";
	} elseif (is_page(19)||$post->post_parent==19) {
		$news_cat = '18'; 
		$news_title="Ecology News";
	} elseif (is_page(20)||$post->post_parent==20) {
		$news_cat = '21'; 
		$news_title="Faith Responsible Investing News";
	} elseif (is_page(47)||$post->post_parent==47) {
		$news_cat = '9'; 
		$news_title="Peace Movement News";
	} 

?>



<?php if(is_single() || !is_page()) $posts_num = 3; ?>

<!-- News sidebar -->
    <div class="interiornews">
    	

        <?php /* special sidebar for logged in members only */ ?>
        <?php if ($show_members_sidebar) : ?>
        <?php $news_cat2 = '6'; 
		$news_title2="<small><a href='/?member_logout=1' style='text-align:right;'>Logout</a></small> Member News"; ?>
		<h4><?php echo $news_title2; ?></h4>
        <ul>
        <?php
		// Get homepage posts 
		 $lastposts = get_posts('numberposts='.$posts_num.'&category='.$news_cat2);
		 foreach($lastposts as $post) :
			setup_postdata($post);
		 ?>
         <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php the_time('F jS, Y') ?></li>
         <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <? /* end special sidebar */ ?>


        <h4><?php echo $news_title; ?></h4>
        <ul>
        <?php
		// Get homepage posts 
		 if ($news_cat != '206') $lastposts = get_posts('numberposts='.$posts_num.'&category='.$news_cat.',-206');
		 else $lastposts = get_posts('numberposts='.$posts_num.'&category='.$news_cat);
		 foreach($lastposts as $post) :
			setup_postdata($post);
		 ?>
         <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
		 <?php if ($news_cat != '206') : ?><?php the_time('F jS, Y') ?>
		 <?php else: ?><?php echo omi_spanish_date(the_date('j F Y','','',FALSE)); ?>
		 <?php endif; ?></li>
         <?php endforeach; ?>

        </ul>
        
       
        
        
		<?php // Show more links only on the News pages ?>
		<?php if(is_single() || !is_page()) : ?>
        <h4>News Feed</h4>
        <ul><li><a href="<?php bloginfo_rss('rss_url') ?>">Subscribe to RSS/XML feed</a></li></ul>
        <h4>News Archives</h4>
        <!--<ul><?php wp_get_archives('type=monthly'); ?></ul>-->
        <select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
        <option value=""><?php echo attribute_escape(__('Select Month')); ?></option>
        <?php wp_get_archives('type=monthly&format=option'); ?> </select> <br />
        <?php endif; ?>
        
        <?php if (is_page_template('spanish.php')) : ?>
        	<a href="/posts/spanish">Noticias en Espa&ntilde;ol &gt;</a>
		<?php elseif (is_page('action')) : ?>
        	<a href="/posts/actionalert">All Action Alerts &gt;</a>
        <?php elseif (is_page('resources')) : ?>
			<a href="/posts/resources">More Resources &gt;</a>
		<?php elseif ((is_page('members')) && $_COOKIE['wp-postpass_' . COOKIEHASH]) : ?>
			<a href="/posts/members">More Member News &gt;</a>
        <?php else: ?>
        	<!--<a href="/news">More News &gt;</a>-->
		<?php endif; ?>
        
        
        
        <!-- Video/audio sidebar -->
        <?php 
		$news_cat = 884; 
		$news_title="Latest Video &amp; Audio";
		$posts_num = 2;
		$showing_videos=false;
		?>
        <h4><?php echo $news_title; ?></h4>
        <ul>
        <?php
		// Get homepage posts 
		 if ($news_cat != '206') $lastposts = get_posts('numberposts='.$posts_num.'&category='.$news_cat.',-206');
		 else $lastposts = get_posts('numberposts='.$posts_num.'&category='.$news_cat);
		 foreach($lastposts as $post) :
			setup_postdata($post);
		 ?>
         <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
         <?php $showing_videos=true; ?>
		 <?php if ($news_cat != '206') : ?><?php the_time('F jS, Y') ?>
		 <?php else: ?><?php echo omi_spanish_date(the_date('j F Y','','',FALSE)); ?>
		 <?php endif; ?></li>
         <?php endforeach; ?>
        </ul>
        <?php if ($showing_videos) : ?><a href="http://omiusajpic.org/resources/video/">More video &amp; audio &gt;</a><?php endif; ?>
        <!-- end video/audio sidebar -->
        

    </div>
    
<? endif ; ?>