<?php 
	/*	This is the homepage and news page, also the main page template
		No, the home page is now in homepage.php -SW
	*/
?>

<?php 
// Set a variable so we know if this is the news page
global $newspage; 
$newspage = false; 
$page_uri = getenv('REQUEST_URI'); 
if (strstr($page_uri,'/news')) $newspage = true;
?>

<?php get_header(); ?>

<?php get_sidebar(); ?>

	<!-- MAIN SECTION -->
    <div id="main" class="maininterior">
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
			if (!$newspage && (is_page_template('spanish.php')||is_category(206)||in_category(206))) $breadcrumb = '<a href="/posts/spanish/">Noticias</a>';
			else $breadcrumb = '<a href="/news">News</a>';
		}
		echo $breadcrumb;
		?>
    </div> 
    
    <!-- Interior contents mid-width container -->
    <div class="interiorcontents">
    <?php $main_news_page = 0 ?>
    
    <?php if (!is_single() && !is_page()) : ?>
    	<?php if (is_archive()) : ?>
        <h1><?php if (!$newspage && (is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>Noticias en Espa&ntilde;ol 
			<?php else : ?>News Archives <?php wp_title(); ?><?php endif; ?></h1>
        <? else : ?>
    	<h1>Latest OMI JPIC News <?php if (is_category()) : ?> in <em><?php single_cat_title(); ?></em> <?php elseif (is_tag()) : ?> 
 tagged with <em><?php single_tag_title(); ?></em> <?php else : $main_news_page = 1 ?>   <?php endif; ?></h1>
 		<? endif; ?>
    <?php endif; ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <?php if (in_category(206) && !is_category(206) && !is_single()) : ?>
    <?php echo '<!-- Hide spanish from non-spanish page '; ?>
    <?php endif; ?>
    
    <?php 
	/* Make sure the post isn't password protected */ 
	if (($post->post_password == '' && !$_COOKIE['wp-postpass_' . COOKIEHASH])) : 
	?> 
    
		<?php // News page 
        if (is_page() && $post->post_parent == 0) $top_level_landing = true;
        else $top_level_landing = false;
        if ( is_single() || is_page() ) : ?>
            <?php if (!$top_level_landing) : ?><h1><?php the_title(); ?></h1><?php endif; ?>
            <?php if(!is_page()) : ?>
            	<?php /* english or spanish date? */ if (!$newspage && (is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>
                	<p class="gray"><span><strong><?php echo omi_spanish_date(the_date('j F Y','','',FALSE)); ?></strong></span></p>
                <?php else: ?>
                	<p class="gray"><span><strong><?php the_time('F jS, Y'); ?></strong></span></p>
                <?php endif; ?>
            <?php endif; ?>
        <?php else : ?>
            <br />
            <h2 class="newsheadline"><a href="<?php the_permalink(); ?>" class="blacklink"><?php the_title(); ?></a>
            <?php /* english or spanish date? */ if (!$newspage && (is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>
            <span class="newslistdate"><?php echo omi_spanish_date(the_date('j F Y','','',FALSE)); ?></span>
            <?php else: ?>
            <span class="newslistdate"><?php the_time('F jS, Y') ?></span>
            <?php endif; ?>
            </h2>
        <?php endif; ?>
        
       	
        <?php 
		if (!$newspage && (is_page_template('spanish.php')||is_category(206)||in_category(206))) the_content('<p><strong>Leer el resto del art&iacute;culo &raquo;</strong></p>'); 
		else the_content('<p><strong>Click here to read more &raquo;</strong></p>'); 
		// Leer el resto del artículo
		?>
        
		<?php /* start remove 
		<?php if (!is_page() and is_single()) : ?>
            <div class="singlepagebottom">
            <p><strong>Posted in:</strong> <?php the_category(', ') ?></p>
            <p><?php the_tags('<strong>Related keywords:</strong> ', ', ', ''); ?></p>
            </div>
        <?php endif; ?>
        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
        <?php edit_post_link('Edit', '<p align="center"><b>[ ', ' ]</b></p>'); ?>
        <?php if (is_page_template('spanish.php')||is_category(206)) : ?><br /><br /><br /><br /><br /><br /><br />
        <br /><br /><br /><br /><br /><br /><br /><br /><? endif; ?>
    
            <!-- Comments if applicable -->
            <?php if ((is_page() || is_single()) && ('open' == $post-> comment_status)) : ?>	
                <?php comments_template(); ?>
            <?php endif; ?>
            <!-- End comments -->
            
			/* end remove  
			?>
			
			
            
        <?php 
        /* If we're viewing the MEMBERS news category */
        elseif (is_category(6) || $_COOKIE['wp-postpass_' . COOKIEHASH]) : 
        ?>

            <?php if (is_page()) : ?>
				<?php if ($post->post_parent != 0) : ?>
                <h1 class="newsheadline"><a href="<?php the_permalink(); ?>" class="blacklink"><?php the_title(); ?></a></h1>
                <?php endif; ?>
			<?php elseif (is_single()) : ?>
                <h1 class="newsheadline"><a href="<?php the_permalink(); ?>" class="blacklink"><?php the_title(); ?></a>
                <span class="newslistdate"><?php the_time('F jS, Y') ?></span></h1>
            <?php else : ?>
                <br />
                <h2 class="newsheadline"><a href="<?php the_permalink(); ?>" class="blacklink"><?php the_title(); ?></a>
                <span class="newslistdate"><?php the_time('F jS, Y') ?></span></h2>
            <?php endif; ?>
            <?php the_content('<p><strong>Click here to read more &raquo;</strong></p>'); ?>
            
       <?php 
	   /* Otherwise, we're just showing a password-protected page or post */
	   elseif (is_page() || is_single()) : 
	   ?>
   		<?php if (!$top_level_landing) : ?><h1><?php the_title(); ?></h1><?php endif; ?>
			<?php if(!is_page()) : ?>
            <p class="gray"><span><strong><?php the_time('F jS, Y') ?></strong></span></p>
            <?php endif; ?>
        <?php the_content('<p><strong>Click here to read more &raquo;</strong></p>'); ?>
        <!--- removed --->
             

	<?php 
	/* End if not password protected */
	endif; 
	?>
    
    
    	<?php if (!is_page() and is_single()) : ?>
            <div class="singlepagebottom">
            <?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?><p><strong>Posted in:</strong> <?php the_category(', ') ?></p><? endif; ?>
            <p><?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?><?php the_tags('<strong>Related keywords:</strong> ', ', ', ''); ?><?php else : ?><?php the_tags('<strong>Palabras clave relacionadas:</strong> ', ', ', ''); // spanish ?><?php endif; ?></p>
            </div>
        <?php endif; ?>
        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
        
        <?php /* Hide the stray edit post link? */ ?>
		<?php edit_post_link('Edit', '<p align="center"><b>[ ', ' ]</b></p>'); ?>

        <?php /*<!-- Comments if applicable -->*/ ?>
        <?php if ((is_page() || is_single()) && ('open' == $post-> comment_status)) : ?>	
        <?php comments_template(); ?>
        <?php endif; ?>
        <?php /*<!-- End comments -->   */ ?>
    
	<?php if (in_category(206) && !is_category(206) && !is_single()) : ?>
    <?php echo 'End hide spanish from non-spanish page --->'; ?>
    <?php endif; ?>
	
	<?php endwhile; endif; ?>


        <div class="navigation">
        <div class="alignleft"><?php if (!$newspage && (is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>
			<?php next_posts_link('&laquo; Informaci&oacute;n anterior') ?>
            <?php else : ?>
            <?php next_posts_link('&laquo; Older Entries') ?>
            <?php endif; ?>
        </div>
        <div class="alignright"><?php if (!$newspage && (is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>
			<?php previous_posts_link('Informaci&oacute;n Reciente &raquo;') // spanish goes here ?>
            <?php else : ?>
            <?php previous_posts_link('Newer Entries &raquo;') ?>
            <?php endif; ?>
        </div>
        </div>


		<p style="text-align:center;clear:both;"><a href="#top" class="small"><?php if (!$newspage && (is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>arriba<?php else : ?>Return to Top<?php endif; ?></a></p>
    </div>
    
    <?php include (TEMPLATEPATH . '/sidebar2_newspageversion.php'); ?>
 

	</div><!-- end #main -->
    
<?php get_footer(); ?>