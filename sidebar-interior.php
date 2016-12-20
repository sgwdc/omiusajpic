<?php 
// NO, do not hide this sidebar from the search results page
//if (!is_page('search-results')) : 
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
	} 
?>

<?php if(is_single() || !is_page()) $posts_num = 3; ?>

<!-- News sidebar -->
    <div id="interior-sidebar">

	    <?php
	    	// Get any subpages for this page
	    	$args = array(
	    		'post_status' => 'publish',
	    		'child_of' => $post -> ID,
	    		'depth' => 1,
	    		'title_li' => null,
	    		'echo' => false
	    	);
	    	$subnav_menu = wp_list_pages( $args );
	    	
	    	// If this page has any subpages, display them
	    	if (strlen($subnav_menu)) {
		    	echo '<h4>Sections</h4><ul>';
		    	echo $subnav_menu;
				echo '</ul>';
	    	}
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
        <option value=""><?php echo esc_attr(__('Select Month')); ?></option>
        <?php wp_get_archives('type=monthly&format=option'); ?> </select> <br />
        <?php endif; ?>
        
        <?php if (is_page_template('spanish.php')) : ?>
        	<a href="/posts/spanish">Noticias en Espa&ntilde;ol &gt;</a>
		<?php elseif (is_page('action')) : ?>
        	<a href="/posts/actionalert">All Action Alerts &gt;</a>
        <?php elseif (is_page('resources')) : ?>
			<a href="/posts/resources">More Resources &gt;</a>
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
        <?php if ($showing_videos) : ?><a href="/resources/video/">More video &amp; audio &gt;</a><?php endif; ?>
        <!-- end video/audio sidebar -->
        

    </div>
<?php // endif ; ?>
