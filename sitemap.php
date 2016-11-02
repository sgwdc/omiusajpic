<?php
/*
Template Name: Sitemap
*/
?>


<?php get_header(); ?>
<?php // Not included in v2.0 of OMI JPIC theme: get_sidebar(); ?>

	<!-- MAIN SECTION -->
    <div class="maininterior">

    <!-- Breadcrumb -->
    <div id="topbreadcrumb">    	
	Sitemap
    </div>
    
    <!-- Interior contents mid-width container -->
    <div class="interiorcontents">
	
    <ul>
	<?php wp_list_pages('title_li='); ?>
    </ul>
    
    </div>
    
    <?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
 

	</div><!-- end #main -->
    
<?php get_footer(); ?>