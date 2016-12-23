<?php
/*
Template Name: Email Lists
*/
?>

<?php get_header(); ?>

<?php
	// Include the horizontal navbar
	include 'navbar.php';
?>

<!-- MAIN SECTION -->
<div class="maininterior">

	<!-- Breadcrumb -->
	<div id="topbreadcrumb">    	
		Email Lists
	</div>

	<?php
		// Include the sidebar template sidebar-interior.php
		get_sidebar('interior');
	?>

	<!-- Interior contents mid-width container -->
	<div id="interior-body">
		<h1>Email Lists</h1>
		<p>Please support the work of this office by subscribing to our weekly news updates and action alerts:</p>
		<br>

		<form action="http://omiusajpic.us1.list-manage.com/subscribe/post?u=cc5976ca8e2c41ca79b0c739c&amp;id=dacd45ed3a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
			<h4 class="emailupdatesheader"><label>Receive Weekly News Updates</label></h4>
			<input type="text" name="EMAIL" class="lefttextinput" id="mce-EMAIL"
			value="Your email address" 
			onfocus="if (this.value=='Your email address') this.value='';" 
			onblur="if (this.value=='') this.value='Your email address';">
			<input type="submit" value="Go" name="subscribe" id="mc-embedded-subscribe" class="leftsubmit">
		</form>

		<br><br>

		<form id="signup" name="signup" method="get" action="http://list-manage.com/subscribe/post" target="_blank">
			<h4 class="actionalertheader"><label>Subscribe to Action Alerts</label></h4>
			<input type="text" name="EMAIL" class="lefttextinput" 
			value="Your email address" 
			onfocus="if (this.value=='Your email address') this.value='';" 
			onblur="if (this.value=='') this.value='Your email address';">
			<input type="hidden" name="u" value="cc5976ca8e2c41ca79b0c739c">
			<input type="hidden" name="id" value="dacd45ed3a">
			<input type="submit" value="Go" class="leftsubmit">
		</form>

		<?php
			// Get 10 most recent action alerts (published posts in the category "actionalert")
			$args = array(
				'post_type' => 'post',
				'category_name' => 'actionalert',
				'post_status' => 'publish',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => 10
			);
			$actionalert_posts = get_posts( $args );
		?>

		<br><br>
		<h1>Recent Action Alerts</h1>
		<?php
		// Iterate over the recent action alerts
		foreach ( $actionalert_posts as $post ) : setup_postdata( $post );
			echo '<br><h2><a href="' . get_the_permalink() . '" class="blacklink">' . get_the_title() . '</a></h2>';
			echo '<span class="newslistdate">' . get_the_time('F jS, Y') . '</span>';
			echo '<div class="clearfix">';
			the_content('<p><strong>Click here to read more &raquo;</strong></p>');
			echo '</div>';
			edit_post_link('Edit post', '<p align="center"><b>[ ', ' ]</b></p>');
		endforeach; 
		?>

		<p style="text-align:center;clear:both;"><a href="#top" class="small">Return to Top</a></p>
	</div>
</div><!-- end #maininterior -->

<?php get_footer(); ?>
