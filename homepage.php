<?php
/*
Template Name: Homepage
*/
get_header();
// Hardcode hero images temporarily
$hero_images = ["hero_screenshot_cherryblossoms.jpg", "hero_screenshot_offices.jpg", "hero_screenshot_library.jpg", "hero_screenshot_whitehouse.jpg", "hero_screenshot_pope.jpg", "hero_screenshot_group1.jpg", "hero_screenshot_largegroup.jpg"];
$random_number = rand(1, count($hero_images));
$random_hero = $hero_images[$random_number - 1];
$hero_url = get_template_directory_uri() . '/images/' . $random_hero;
?>

<div>
	<img src="<?php echo $hero_url; ?>">
</div>

<?php
	// Include the horizontal navbar
	include 'navbar.php';
?>

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
						echo '<a href="' . get_the_permalink() . '"><img src="' . $thumbnailURL . '" style="float:left; padding:2px 5px 0 0;"></a>';
					}
					// Display the post date
					echo '<em>' . get_the_time('F jS, Y') . ' -- </em>';
					// Display an excerpt of the post content
					$thecontent = get_the_content();
					// Strip HTML tags, and remove left over line breaks and white space
					$thecontent = wp_strip_all_tags($thecontent, false);
					// Strip shortcodes
					$shortcode_pattern= '/\[(\/?caption.*?(?=\]))\]/';
					$thecontent = preg_replace($shortcode_pattern, '', $thecontent);
					// Take only the first 255 characters, and trim whitespace
					$thecontent = ltrim(rtrim(substr($thecontent, 0, 255))) . "...";
					echo $thecontent . '<br><a href="' . get_the_permalink() . '">Read more &gt;</a>';
				?>
				</p>
				<div class="clearboth"></div>
				<br>
			<?php endforeach; ?>

			<p><a href="/news/">See more news &amp; updates &gt;</a></p>
		</div>
	</div>
</div>

<style>
	div#social-media {
		padding:0 10px;
	}
	div#social-media img {
		display:inline;
		padding-right: 10px;
	}
</style>

<div class="column" id="homepageright">
	<div id="social-media" style="">
		<a href="https://twitter.com/omiusajpic" title="OMI Justice, Peace, and Integrity of Creation Twitter" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/twitter-bird-white-on-blue_32.png" alt="Twitter" /></a>
		<a href="https://www.facebook.com/omiusajpic" title="OMI Justice, Peace, and Integrity of Creation Facebook" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/f_logo_32.png" alt="Facebook" /></a>
		<a href="http://www.youtube.com/OMIJPIC" title="OMI Justice, Peace, and Integrity of Creation YouTube Channel" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/youtube_32.png" alt="YouTube" /></a>
		<a href="/email-list/" title="Email list"><img src="<?php bloginfo('template_directory'); ?>/images/email_list.png" alt="Email list" /></a>
	</div>
	<a class="twitter-timeline" href="https://twitter.com/omiusaJPIC" data-widget-id="682618667486556160">Tweets by @omiusaJPIC</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div><!-- end #mainhome -->

<div class="clearboth"></div>
<br>
<br>

<?php get_footer(); ?>
