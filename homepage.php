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

<script>
	// Callback function called by the Slider Revolution plugin to add a "click" effect so the user knows something is happening
	function readMoreClicked() {
		jQuery('a.rev-btn').css('background-color', '#f00');
		setTimeout(function() {
			jQuery('a.rev-btn').css('background-color', '#fff');
		}, 25);
	}
</script>
<!-- Breadcrumb -->
<div id="topbreadcrumb">
	Homepage
</div>

<div id="homepage-body">
	<!-- News -->
	<h3><a href="news" class="darkgraylink">Website Updates</a></h3>
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
	$posts_returned = count($homepageNewsPosts);
	$count = 0;
	foreach($homepageNewsPosts as $post) :
		setup_postdata($post);
		$count++;
		// If this is not the last website post
		if ($count < $posts_returned) {
			echo '<p class="homepage-post clearfix">';
		// Otherwise it's the last website post
		} else {
			echo '<p class="homepage-post homepage-post-last clearfix">';
		}
		?>
		<a href="<?php the_permalink(); ?>" class="homepage-title"><?php the_title(); ?></a><br>
		<?php
			// If a "Featured Image" exists for this post, display it
			if (has_post_thumbnail($post)) {
				$thumbnailURL = get_the_post_thumbnail_url($post, $size="thumbnail");
				echo '<a href="' . get_the_permalink() . '"><img src="' . $thumbnailURL . '" style="float:left; padding:2px 5px 0 0;" width="150" height="150"></a>';
			}
			// Display the post date
			echo '<span class="homepage-blurb"><em>' . get_the_time('D M j, Y') . ' &mdash; </em>';
			// Display an excerpt of the post content
			$thecontent = get_the_content();
			// Strip HTML tags, and remove left over line breaks and white space
			$thecontent = wp_strip_all_tags($thecontent, false);
			// Strip shortcodes
			$shortcode_pattern= '/\[(\/?caption.*?(?=\]))\]/';
			$thecontent = preg_replace($shortcode_pattern, '', $thecontent);
			// Remove multiple spaces
			$thecontent = preg_replace('/\s+/', ' ', $thecontent);
			// Convert string into an array of words
			$thecontent_array = explode(' ', $thecontent);
			$excerpt = '';
			// Set the maximum length of the excerpt
			$max_length = 255;
			// While the excerpt is less than the maximum number of characters, AND there is still more to be displayed
			while (strlen($excerpt) < $max_length && count($thecontent_array) > 0) {
				// Append the next array element to the excerpt string
				$excerpt .= array_shift($thecontent_array) . ' ';
			}
			// Trim whitespace, AND add an ellipsis
			$excerpt = ltrim(rtrim($excerpt)) . "&hellip;";
			echo $excerpt . '<br><a href="' . get_the_permalink() . '">Read more &gt;</a></span>';
		?>
		</p>
	<?php
	endforeach;
	?>
	<p><a href="/news/">See more website updates &gt;</a></p>
</div>

<div id="homepage-sidebar">
	<h3><a href="news" class="darkgraylink">Social Media Updates</a></h3>

	<div class="clearfix">
		<div id="social-media-left">
			<a href="https://www.facebook.com/omiusajpic" title="Open OMI JPIC Facebook in a new tab/window" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/facebook_30px.png" alt="Facebook"></a>
			<a href="https://twitter.com/omiusajpic" title="Open OMI JPIC Twitter in a new tab/window" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/twitter_30px.png" alt="Twitter"></a>
			<a href="https://www.youtube.com/OMIJPIC" title="Open OMI JPIC YouTube Channel in a new tab/window" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/youtube_30px.png" alt="YouTube"></a>
			<a href="https://missionary-oblates-jpic.blogspot.com/" title="Open OMI JPIC Blogspot blog in a new tab/window" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/blogger_30px.png" alt="Blogger"></a>
		</div>
		<div id="social-media-right">
			<a id="subscribe-button" href="/subscribe/" title="Subscribe to OMI JPIC's email lists" alt="Subscribe">Subscribe</a>
		</div>
	</div>

	<?php
	    /* CONNECT TO THE FACEBOOK GRAPH API TO GET FACEBOOK POSTS */
		$fb_page_id = "omiusajpic";
		$profile_photo_src = "https://graph.facebook.com/{$fb_page_id}/picture?type=normal";
		$access_token = "145646098930189|TZqBnqmHQBv6q2bHMKVIumMd6_I";
		//$fields = "id,application,call_to_action,caption,created_time,description,feed_targeting,from,icon,instagram_eligibility,is_hidden,is_instagram_eligible,is_published,link,message,message_tags,name,object_id,parent_id,permalink_url,picture,place,privacy,properties,shares,source,status_type,story,story_tags,targeting,to,type,updated_time,with_tags";
		$fields = "name,message,description,picture,permalink_url";
		$display_posts = 2;
		// Request more posts than we'll display since some may be filtered out
		$request_posts = $display_posts * 2;
		$json_link = "https://graph.facebook.com/{$fb_page_id}/posts?access_token={$access_token}&fields={$fields}&limit={$request_posts}";
		$json = file_get_contents($json_link);
		$obj = json_decode($json, true);

	    /* ITERATE OVER THE FACEBOOK POSTS */
		$feed_item_count = count($obj['data']);
		$actually_displayed = 0;
		for($x=0; $x<$feed_item_count; $x++){
			// Get the Facebook fields
			$facebook_permalink = $obj['data'][$x]['permalink_url'];
			$created_time = $obj['data'][$x]['created_time'];
			if (isset($obj['data'][$x]['message'])) $message = $obj['data'][$x]['message']; else unset($message);
			if (isset($obj['data'][$x]['description'])) $description = $obj['data'][$x]['description']; else unset($description);
			if (isset($obj['data'][$x]['name'])) $name = $obj['data'][$x]['name']; else unset($name);
			if (isset($obj['data'][$x]['picture'])) $picture = $obj['data'][$x]['picture']; else unset($picture);

			// Abort the loop if there's no custom message or description (in which case it's just a photo, and we have no way yet to display it at full width)
			if (!isset($message) && !isset($description)) continue;

		    /* ADD CUSTOM MESSAGE TO BLURB */
	    	$blurb = '';
		    // If the Facebook post has a custom message
			if (isset($message)) {
				// Abort the loop if this is a website articles posted to Facebook since it's already displayed on the homepage
				if (gettype(strpos($message, 'http://omiusajpic.org/20')) == "integer") continue;
				// Only use the "message" as the blurb if it's not a link
			    if (substr($message, 0, 4) != "http") {
			    	// Start the blurb with the custom message
			    	$blurb = $message;
			    }
			}

		    /* ADD DESCRIPTION TO BLURB */
		    // If the Facebook post has a description
		    if (isset($description)) {
		    	// If the blurb already has content, add a long dash to separate the custom message and description
		    	if (strlen($blurb) > 0) {
		    		$blurb .= ' &mdash; ';
		    	}
		    	// Append the description
	    		$blurb .= $description;
		    }

		    /* CREATE AN EXCERPT */
			// Convert string into an array of words
			$blurb_array = explode(' ', $blurb);
			$excerpt = '';
			// Set the maximum length of the excerpt
			$max_length = 180;
			// While the excerpt is less than the maximum number of characters, AND there is still more to be displayed
			while (strlen($excerpt) < $max_length && count($blurb_array) > 0) {
				// Append the next array element to the excerpt string
				$excerpt .= array_shift($blurb_array) . ' ';
			}
			// Trim whitespace, AND add an ellipsis
			$excerpt = ltrim(rtrim($excerpt));
			// If it was shortened
			//echo '<h2>' . strlen($excerpt)
			if (strlen($excerpt) < strlen($blurb)) {
				// Only append an ellipsis if Facebook didn't already do so
				$excerpt_length = count($excerpt);
				if (substr($excerpt, $excerpt_length - 4) != "...") $excerpt .= "&hellip;";
			}

		    // If the post has no picture, use the OMI JPIC profile photo
		    if (!isset($picture)) $picture = $profile_photo_src;

		    // If the post has no "name" field, duplicate the excerpt for the title
		    if (!isset($name)) $name = $excerpt;

		    // when it was posted
		    $converted_date_time = date( 'Y-m-d H:i:s', strtotime($created_time));
		    // How long ago the post was published
		    $ago_value = time_elapsed_string($converted_date_time);
		    
		    /* DISPLAY THE FACEBOOK POST */
		    // If this is not the last Facebook post
		    if (($x + 1) < $actually_displayed) {
		      echo '<p class="facebook-post clearfix">';
		    // Otherwise it's the last Facebook post
		    } else {
		      echo '<p class="facebook-post facebook-post-last clearfix">';
		    }
			echo '<a href="' . $facebook_permalink . '" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/facebook_15px.png" alt="Facebook" style="vertical-align:middle; padding-bottom:3px;"></a> ';
	        echo "<a href='{$facebook_permalink}' class='facebook-title' target='_blank'>";
	        echo $name . '</a><br>';
	        echo "<a href='{$facebook_permalink}' target='_blank'>";
	        echo '<img src="' . $picture . '" style="float:left; padding:2px 5px 0 0;">';
	        echo "</a>";
	        echo '<span class="facebook-blurb"><em>' . $ago_value . ' &mdash; </em>' . $excerpt;
	        echo "<br>";
	        echo "<a href='{$facebook_permalink}' target='_blank'>See on Facebook &gt;</a></span>";
		    echo "</p>";
		    $actually_displayed++;
			// Stop running the loop if we've reached the number of posts to display
			if ($actually_displayed >= $display_posts) break;
		} // END of looping over the posts

		// Convert datetime object to 'time ago' text
		function time_elapsed_string($datetime, $full = false) {
		    $now = new DateTime;
		    $ago = new DateTime($datetime);
		    $diff = $now->diff($ago);
		    $diff->w = floor($diff->d / 7);
		    $diff->d -= $diff->w * 7;
		    $string = array(
		        'y' => 'year',
		        'm' => 'month',
		        'w' => 'week',
		        'd' => 'day',
		        'h' => 'hour',
		        'i' => 'minute',
		        's' => 'second',
		    );
		    foreach ($string as $k => &$v) {
		        if ($diff->$k) {
		            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		        } else {
		            unset($string[$k]);
		        }
		    }
		     if (!$full) $string = array_slice($string, 0, 1);
		    return $string ? implode(', ', $string) . ' ago' : 'just now';
		}
	?>
	<p><a href="https://www.facebook.com/omiusajpic" target="_blank">See more Facebook updates &gt;</a></p>

	<br>
	<h3><a href="/resources/video/" class="darkgraylink">Video Updates</a></h3>
	<iframe width="375" height="210" src="https://www.youtube.com/embed/gTRhyIcqDhQ" frameborder="0" allowfullscreen></iframe>
	<p><a href="/resources/video/">See more video updates &gt;</a></p>
</div>

<br>
<br>

<?php get_footer(); ?>

<?php
/* DEV output
echo '<pre style="text-align:left;">';
print_r($obj);
*/
?>
