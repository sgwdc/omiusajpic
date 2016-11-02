<?php get_header(); ?>

<?php
	// Include the horizontal navbar
	include 'navbar.php';
?>

<?php /* Not included in v2.0 of OMI JPIC theme:
	get_sidebar();
*/ ?>

<!-- MAIN SECTION -->
<div class="maininterior">

	<!-- Breadcrumb -->
	<div id="topbreadcrumb">    	
		Error
	</div>

	<!-- Interior contents mid-width container -->
	<div class="interiorcontents">
		<h1>Page Not Found</h1>

		<p>You may wish to return to the <a href="/">homepage</a> to find what you're looking for. Please feel 
		free to <a href="/about/contact">contact us</a> regarding this error.</p>
	</div>

	<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
</div><!-- end #main -->

<?php get_footer(); ?>
