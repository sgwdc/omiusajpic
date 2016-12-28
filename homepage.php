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
	foreach($homepageNewsPosts as $post) :
		setup_postdata($post);
		?>
		<p class="clearfix">
		<a href="<?php the_permalink(); ?>" class="homepage-title"><?php the_title(); ?></a><br>
		<?php
			// If a "Featured Image" exists for this post, display it
			if (has_post_thumbnail($post)) {
				$thumbnailURL = get_the_post_thumbnail_url($post, $size="thumbnail");
				echo '<a href="' . get_the_permalink() . '"><img src="' . $thumbnailURL . '" style="float:left; padding:2px 5px 0 0;" width="150" height="150"></a>';
			}
			// Display the post date
			echo '<span class="homepage-blurb"><em>' . get_the_time('F jS, Y') . ' &mdash; </em>';
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
		$fb_page_id = "omiusajpic";
		$profile_photo_src = "https://graph.facebook.com/{$fb_page_id}/picture?type=square";
		$access_token = "145646098930189|TZqBnqmHQBv6q2bHMKVIumMd6_I";
		//$fields = "id,application,call_to_action,caption,created_time,description,feed_targeting,from,icon,instagram_eligibility,is_hidden,is_instagram_eligible,is_published,link,message,message_tags,name,object_id,parent_id,permalink_url,picture,place,privacy,properties,shares,source,status_type,story,story_tags,targeting,to,type,updated_time,with_tags";
		$fields = "name,message,picture,permalink_url";
		$num_posts = 4;
		$json_link = "https://graph.facebook.com/{$fb_page_id}/posts?access_token={$access_token}&fields={$fields}&limit={$num_posts}";
		$json = file_get_contents($json_link);
		$obj = json_decode($json, true);
		// Iterate over the Facebook posts
		$feed_item_count = count($obj['data']);
		for($x=0; $x<$feed_item_count; $x++){
		    // user's custom message
		    $message = $obj['data'][$x]['message'];
		    // picture from the link
		    $picture = $obj['data'][$x]['picture'];
		    // name or title of the link posted
		    $name = $obj['data'][$x]['name'];
		    // when it was posted
		    $created_time = $obj['data'][$x]['created_time'];
		    $converted_date_time = date( 'Y-m-d H:i:s', strtotime($created_time));
		    $ago_value = time_elapsed_string($converted_date_time);
		    $facebook_permalink = $obj['data'][$x]['permalink_url'];
		    // Display the Facebook post
			echo '<p class="clearfix">';
				echo '<a href="https://www.facebook.com/omiusajpic" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/facebook_15px.png" alt="Facebook" style="vertical-align:middle; padding-bottom:3px;"></a> ';
		        echo "<a href='{$facebook_permalink}' class='facebook-title' target='_blank'>";
		        echo $name . '</a><br>';
		        echo "<a href='{$facebook_permalink}' target='_blank'>";
		        echo '<img src="' . $picture . '" style="float:left; padding:2px 5px 0 0;">';
		        echo "</a>";
		        echo '<span class="facebook-blurb"><em>' . $ago_value . ' &mdash; </em>' . $message;
		        echo "<br>";
		        echo "<a href='{$facebook_permalink}' target='_blank'>Read on Facebook &gt;</a></span>";
		    echo "</p>";
		}
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
</div>

<br>
<br>

<?php get_footer(); ?>
