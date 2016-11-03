<?php
/*
Template Name: Spanish
*/
?>

<?php get_header(); ?>

	<!-- MAIN SECTION -->
    <div class="maininterior">
    <a name="maincontent"></a>

    <!-- Breadcrumb -->
    <div id="topbreadcrumb">    	
		<?php 
		// Breadcrumb 
		$breadcrumb = '';
		if (is_page && $post->post_parent != 0) { 
			$breadcrumb = '';
			$bcn_parent_id = $post->post_parent;
			while(is_numeric($bcn_parent_id) && $bcn_parent_id != 0) {
					$bcn_parent = get_post($bcn_parent_id);
					if ($bcn_parent_id == $post->post_parent) {
						$breadcrumb = '<a href="' . get_permalink($bcn_parent_id).'" class="open">' . $bcn_parent->post_title . '</a>';
					} else {
						$breadcrumb = '<a href="' . get_permalink($bcn_parent_id).'">' . $bcn_parent->post_title . '</a>: ' . $breadcrumb;
					} 
					$bcn_parent_id = $bcn_parent->post_parent;
					$lev_count++;
			}
		} elseif (is_page()) {
			$breadcrumb = '<a href="' . $post->permalink .'" class="open">' . $post->post_title . '</a>'; 
		} else {
			$breadcrumb = '<a href="/news">News</a>';
		}
		echo $breadcrumb;
		?>
    </div> 
    
    <!-- Interior contents mid-width container -->
    <div class="interiorcontents">
    
    <?php if (!is_single() && !is_page()) : ?>
    	<?php if (is_archive()) : ?>
        <h1>News Archives <?php wp_title(); ?></h1>
        <?php else : ?>
    	<h1>Latest OMI JPIC News <?php if (is_category()) : ?> in <em><?php single_cat_title(); ?></em> <?php elseif (is_tag()) : ?> 
 tagged with <em><?php single_tag_title(); ?></em>   <?php endif; ?></h1>
 		<?php endif; ?>
    <?php endif; ?>
    
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
	<?php // News page 
	if (is_page() && $post->post_parent == 0) $top_level_landing = true;
	else $top_level_landing = false;
	if ( is_single() || is_page() ) : ?>
    	<?php if (!$top_level_landing) : ?><h1><?php the_title(); ?></h1><?php endif; ?>
        <?php if(!is_page()) : ?>
    	<p class="gray"><span><strong><?php the_time('F jS, Y') ?></strong></span></p>
    	<?php endif; ?>
    <?php else : ?>
    	<br />
    	<h2><a href="<?php the_permalink(); ?>" class="blacklink"><?php the_title(); ?></a>
    	<span class="newslistdate"><?php the_time('F jS, Y') ?></span>
        </h2>
    <?php endif; ?>
       
	<?php the_content('<p><strong>Read the rest of the story &raquo;</strong></p>'); ?>
    <?php if (!is_page() and is_single()) : ?>
    	<div class="singlepagebottom">
        <p><strong>Posted in:</strong> <?php the_category(', ') ?></p>
		<p><?php the_tags('<strong>Related keywords:</strong> ', ', ', ''); ?></p>
        </div>
    <?php endif; ?>
	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    <?php edit_post_link('Edit', '<p align="center"><b>[ ', ' ]</b></p>'); ?>

		<!-- Comments if applicable -->
        <?php if ((is_page() || is_single()) && ('open' == $post-> comment_status)) : ?>	
            <?php comments_template(); ?>
        <?php endif; ?>
    	<!-- End comments -->
        
	<?php endwhile; endif; ?>

        <div class="navigation">
        <div class="alignleft"><?php next_posts_link('&laquo; anterior') ?></div>
        <div class="alignright"><?php previous_posts_link('siguiente &raquo;') ?></div>
        </div>


		<p style="text-align:center;clear:both;"><a href="#maincontent" class="small">arriba</a></p>
    </div>
    
    <?php include (TEMPLATEPATH . '/sidebar2_newspageversion.php'); ?>

	</div><!-- end #maininterior -->
    
<?php get_footer(); ?>