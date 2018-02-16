<?php
/*
Template Name: Videos
*/
?>

<?php get_header(); ?>

<?php
	// Include the horizontal navbar
	include 'navbar.php';
?>

<!-- MAIN SECTION -->
<div id="main" class="maininterior">
	<!-- Breadcrumb -->
	<div id="topbreadcrumb">    	
		Videos
		<!-- Insert GTranslate language selector -->
		<div style="width:165px; float:right; margin-top:-5px;">
			<?php echo do_shortcode('[gtranslate]'); ?>
		</div>
	</div>

	<?php
		// Include the sidebar template sidebar-interior.php
		get_sidebar('interior');
	?>

	<!-- Interior contents mid-width container -->
	<div id="interior-body">

	<?php
		// Start the Loop
		while ( have_posts() ) : the_post();
			// Display page content
			the_content();
		endwhile;

		// Get 10 most recent video posts (published posts in the category "videos")
		$args = array(
			'post_type' => 'post',
			'category_name' => 'videos',
			'post_status' => 'publish',
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => 10
		);
		$recent_videos_posts = get_posts( $args );

		// If at least one post was found
		if (count($recent_videos_posts) > 0) {
			// Create an arbitrary DOM element here as a guidepost for later
			echo '<span id="locator"></span>';
			$contentToInsert = '<h4>See more posts containing videos:</h4><ul class="lcp_catlist" id="lcp_instance_0"><ul>';
			// Iterate over the recent video posts
			foreach ( $recent_videos_posts as $post ) : setup_postdata( $post );
				$contentToInsert .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a> (' . get_the_time('F j, Y') . ')</li>';
			endforeach; 
			wp_reset_postdata();
			$contentToInsert .= '</ul>';
		    // Get the category ID
		    $category_id = get_cat_ID( 'videos' );
		    // Get the URL of this category
		    $category_link = get_category_link( $category_id );
		    $contentToInsert .= '<p><a href="' . esc_url( $category_link ) . '" title="Category Name">See all posts containing videos &gt;</a></p>';
			
			// Use jQuery to insert the HTML generated above before the AddThis social media if it exists, or before the guidepost created above
			?>
			<script>
				// jQuery ready
				jQuery( document ).ready(function() {
					var addThisArray = jQuery('div.addthis_toolbox');
					// If AddThis appears on the page, get the element before the last instance of it
					if (addThisArray.length > 0) var insertAfter = addThisArray.last().prev();
					// Otherwise get the element before the guidepost created above
					else var insertAfter = jQuery( 'span#locator' ).prev();
					// Insert the HTML containing the list of links to video posts after the page content
					insertAfter.after('<?php echo $contentToInsert; ?>');
				});
			</script>
		<?php
		}
		?>
	</div>
</div>

<p>&nbsp;</p>

<?php get_footer(); ?>
