<?php
/*
Template Name: Search template
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
		Search Results
	</div>

	<!-- Interior contents mid-width container -->
	<div class="interiorcontents">
		<?php /* Google Custom Search (Created 11/2/2016, and owned by Google account: s@livingstreets.com) - See https://cse.google.com/cse/ */ ?>
		<script>
			(function() {
				var cx = '005609722693116340484:x5z1u9nrdyk';
				var gcse = document.createElement('script');
				gcse.type = 'text/javascript';
				gcse.async = true;
				gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(gcse, s);
			})();
		</script>
		<gcse:search></gcse:search>

		<?php
			/* Old version:
			<ul>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
			<li><a href="<?php the_permalink() ?>"><strong><?php the_title(); ?></strong></a> 
			<?php the_excerpt() ?>
			</li>
			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			<?php endwhile;  else: ?>
			<p>Your search returned no results. Please try again.</p>
			<?php endif; ?>
			</ul>
			*/ ?>
		<?php
		// Display page content
		if (have_posts()) : while (have_posts()) : the_post();
			the_excerpt();
		endwhile;
		endif; ?>

	</div><!-- End div#interiorcontents -->

	<?php include (TEMPLATEPATH . '/sidebar2_newspageversion.php'); ?>

</div><!-- End #maininterior -->

<?php get_footer(); ?>