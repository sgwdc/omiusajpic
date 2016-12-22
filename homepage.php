<?php
/*
Template Name: Homepage
*/
get_header();

// Use the "Slider Revolution" plugin to insert the slider with the slug "homepage-slider", which rotates through the Featured Images and captions for all published posts in the category with the slug "homepage-slider"
echo do_shortcode('[rev_slider alias="homepage-slider"]');
	// Include the horizontal navbar
	include 'navbar.php';
?>

<!-- Breadcrumb -->
<div id="topbreadcrumb">
	Homepage
</div>

<div id="homepage-body">
	<!-- News -->
	<h3><a href="news" class="darkgraylink">Recent News &amp; Updates</a></h3>
	<?php
	// Get homepage posts
	$args = array(
		'post_type' => 'post',
		'category_name' => 'homepage-news',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => 4
	);
	$homepageNewsPosts = get_posts( $args );
	foreach($homepageNewsPosts as $post) :
		setup_postdata($post);
		?>
		<p class="clearfix">
		<a href="<?php the_permalink(); ?>" class="homepage-title"><?php the_title(); ?></a><br>
		<?php
			// If a "Featured Image" exists for this post, display it
			if (has_post_thumbnail($post)) {
				$thumbnailURL = get_the_post_thumbnail_url($post, $size="thumbnail");
				echo '<a href="' . get_the_permalink() . '"><img src="' . $thumbnailURL . '" style="float:left; padding:2px 5px 0 0;"></a>';
			}
			// Display the post date
			echo '<span class="homepage-blurb"><em>' . get_the_time('F jS, Y') . ' -- </em>';
			// Display an excerpt of the post content
			$thecontent = get_the_content();
			// Strip HTML tags, and remove left over line breaks and white space
			$thecontent = wp_strip_all_tags($thecontent, false);
			// Strip shortcodes
			$shortcode_pattern= '/\[(\/?caption.*?(?=\]))\]/';
			$thecontent = preg_replace($shortcode_pattern, '', $thecontent);
			// Remove multiple spaces
			$thecontent = preg_replace('/\s+/', ' ', $thecontent);
			// Take only the first 255 characters, and trim whitespace
			$thecontent = ltrim(rtrim(substr($thecontent, 0, 255))) . "...";
			echo $thecontent . '</span><br><a href="' . get_the_permalink() . '">Read more &gt;</a>';
		?>
		</p>
	<?php endforeach; ?>

	<p><a href="/news/">See more news &amp; updates &gt;</a></p>
</div>

<div id="homepage-sidebar">
	<div class="clearfix">
		<div id="social-media-left">
			<a href="https://twitter.com/omiusajpic" title="Open OMI JPIC Twitter in a new tab/window" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/twitter_30px.png" alt="Twitter"></a>
			<a href="https://www.facebook.com/omiusajpic" title="Open OMI JPIC Facebook in a new tab/window" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/facebook_30px.png" alt="Facebook"></a>
			<a href="https://www.youtube.com/OMIJPIC" title="Open OMI JPIC YouTube Channel in a new tab/window" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/youtube_30px.png" alt="YouTube"></a>
			<a href="https://missionary-oblates-jpic.blogspot.com/" title="Open OMI JPIC Blogspot blog in a new tab/window" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/blogger_30px.png" alt="Blogger"></a>
		</div>
		<div id="social-media-right">
			<a id="subscribe-button" href="/subscribe/" title="Subscribe to OMI JPIC's email lists" alt="Subscribe">Subscribe</a>
		</div>
	</div>
	<a class="twitter-timeline" data-height="850" href="https://twitter.com/omiusaJPIC">Tweets by omiusaJPIC</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
</div>

<br>
<br>

<?php get_footer(); ?>
