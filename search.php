<?php
/*
Template Name: Search template
*/
?>

<?php get_header(); ?>

<?php // Not included in v2.0 of OMI JPIC theme: get_sidebar(); ?>

	<!-- MAIN SECTION -->
    <div class="maininterior">

    <!-- Breadcrumb -->
    <div id="topbreadcrumb">
        Search Results
    </div>
    
    <!-- Interior contents mid-width container -->
    <div class="interiorcontents">
	
        <div id="leftsearch" class="leftform">
        <form id="searchform" name="searchform" method="get" action="/search-results/">
            <input type="hidden" name="cx" value="017409278450099449193:wfbtxpyrh6k" />
            <input type="hidden" name="cof" value="FORID:11" />
            <input type="hidden" name="ie" value="UTF-8" />
            <h4><label><?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>Search<?php else : ?>Buscar<?php endif; ?></label></h4>
            <input type="text" name="q" class="lefttextinput"<?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?> value="Search our site" 
                onfocus="if (this.value=='Search our site') this.value='';" onblur="if (this.value=='') this.value='Search our site';" <?php endif; ?> />
            <input type="submit" value="<?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>Go<?php else : ?>Ir<?php endif; ?>" class="leftsubmit" />
        </form>
        <!--<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&lang=en"></script>-->
        <div class="clearboth"></div>
        </div>

<?php /* Probably not needed since the input field is now on the search results page
  	<p><strong>You searched for:</strong> <?php echo the_search_query(); ?></p>
*/ ?>

    <!-- Display search results -->
    <div id="cse-search-results"></div>
    <script type="text/javascript">
      var googleSearchIframeName = "cse-search-results";
      var googleSearchFormName = "searchform";
      var googleSearchFrameWidth = 700;
      var googleSearchDomain = "www.google.com";
      var googleSearchPath = "/cse";
    </script>
    <script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
    <style>
    /* Seems to not be necessary to override the external CSS:
    .gs-webResult {
        width:900px;
    }
    */
    </style>

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

    </div>
    
    <?php // include (TEMPLATEPATH . '/sidebar2.php'); ?>
 
    <?php include (TEMPLATEPATH . '/sidebar2_newspageversion.php'); ?>

	</div><!-- end #main -->
    
<?php get_footer(); ?>