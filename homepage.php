<?php
/*
Template Name: Homepage
*/
get_header();
?>

<div>
    <img src="<?php bloginfo('template_directory') ?>/images/hero_screenshot_for_placement.jpg" >
</div>

<?php
// Include the horizontal navbar
include 'navbar.php';
?>

<?php // Not included in v2.0 of OMI JPIC theme: get_sidebar(); ?>

	<!-- MAIN SECTION -->
    <div class="mainhome">

    <!-- Breadcrumb -->
    <div id="topbreadcrumb">
        Homepage
    </div>

        <!-- MAIN CONTENT -->
        <div class="homecontents">
    	<a name="maincontent"></a>
        <div class="column" id="homepageleft">
	
        <!-- News -->
        <h3><a href="news" class="darkgraylink">Recent News &amp; Updates</a></h3>
        <ul class="homebullets">
        <?php
		// Get homepage posts 
		 $lastposts = get_posts('numberposts=3&category=90');
		 foreach($lastposts as $post) :
			setup_postdata($post);
		 ?>
		 <li><a href="<?php the_permalink(); ?>" class="big"><?php the_title(); ?></a> <?php the_time('F jS, Y') ?></li>
		 <?php endforeach; ?>
		
        </ul>
      	
     
        <ul class="homebullets">
<a class="twitter-timeline" href="https://twitter.com/omiusaJPIC" data-widget-id="682618667486556160">Tweets by @omiusaJPIC</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		
        </ul>
       
        
        </div>

        <div class="column" id="homepageright">
            Insert right side content here
        </div><!-- end #main -->
    
<?php get_footer(); ?>