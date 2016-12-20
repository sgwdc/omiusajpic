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

	<!-- Interior contents mid-width container -->
	<div id="interior-body">
		<h1>Page Not Found</h1>

		<p>You may wish to return to the <a href="/">homepage</a> to find what you're looking for. Please feel 
		free to <a href="/about/contact">contact us</a> regarding this error.</p>
	</div>

	<?php include get_template_directory() . '/sidebar2_newspageversion.php'; ?>
</div><!-- end #maininterior -->

<?php get_footer(); ?>
