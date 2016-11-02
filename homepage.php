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

<?php
/* Not included in v2.0 of OMI JPIC theme:
	get_sidebar();
*/ ?>

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
			<?php
			// Get homepage posts 
			$lastposts = get_posts('numberposts=3&category=90');
			foreach($lastposts as $post) :
				setup_postdata($post);
				?>
				<p>
				<a href="<?php the_permalink(); ?>" class="big"><?php the_title(); ?></a><br>
				<?php
					// If a "Featured Image" exists for this post, display it
					if (has_post_thumbnail($post)) {
						$thumbnailURL = get_the_post_thumbnail_url($post, $size="thumbnail");
						echo '<img src="' . $thumbnailURL . '" style="float:left; padding:2px 5px 0 0;">';
					}
					// Display the post date
					the_time('F jS, Y');
					echo ' -- ';
					// Display an excerpt of the post content
					$thecontent = wp_strip_all_tags(get_the_content(), false);
					$excerpt = substr($thecontent, 0, 255);
					echo $excerpt;
				?>
				</p>
				<div class="clearboth"></div>
				<br>
			<?php endforeach; ?>

			<p><a href="/news/">See more news &amp; updates &gt;</a></p>
		</div>
	</div>
</div>

<div class="column" id="homepageright">
	<a class="twitter-timeline" href="https://twitter.com/omiusaJPIC" data-widget-id="682618667486556160">Tweets by @omiusaJPIC</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div><!-- end #main -->

<div class="clearboth"></div>
<br>
<br>

<?php get_footer(); ?>
