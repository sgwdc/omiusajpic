<?php get_header(); ?>

<?php get_sidebar(); ?>

	<!-- MAIN SECTION -->
    <div id="main" class="maininterior">

    <!-- Breadcrumb -->
    <div id="topbreadcrumb">    	
	Search Results
    </div>
    
    <!-- Interior contents mid-width container -->
    <div class="interiorcontents">
	
  	<p><strong>You searched for:</strong> <?php echo the_search_query(); ?></p>
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
    
    </div>
    
    <?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
 

	</div><!-- end #main -->
    
<?php get_footer(); ?>