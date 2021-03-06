<?php get_header(); ?>

<?php
	// Include the horizontal navbar
	include 'navbar.php';
?>

<!-- MAIN SECTION -->
<div class="maininterior">

	<!-- Breadcrumb -->
	<div id="topbreadcrumb">    	
		Error
	</div>

	<?php
		// Include the sidebar template sidebar-interior.php
		get_sidebar('interior');
	?>

	<!-- Interior contents mid-width container -->
	<div id="interior-body">
		<h1>Page Not Found</h1>

		<p>You may wish to return to the <a href="/">homepage</a> to find what you're looking for. Please feel 
		free to <a href="/about/contact">contact us</a> regarding this error.</p>
	</div>
</div><!-- end #maininterior -->

<?php get_footer(); ?>
