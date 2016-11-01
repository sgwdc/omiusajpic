<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<?php get_sidebar(); ?>

	<!-- MAIN SECTION -->
    <div id="main" class="mainhome">

        <!-- MAIN CONTENT -->
        <div class="homecontents">
    	<a name="maincontent"></a>
        <div class="column" id="homepageleft">
	
        <!-- News -->
        <h3><a href="news" class="darkgraylink">Recent News &amp; Updates</a></h3>
        <ul class="homebullets">
        <?php
		// Get homepage posts 
		 $lastposts = get_posts('numberposts=3&category=90');
		 foreach($lastposts as $post) :
			setup_postdata($post);
		 ?>
		 <li><a href="<?php the_permalink(); ?>" class="big"><?php the_title(); ?></a> <?php the_time('F jS, Y') ?></li>
		 <?php endforeach; ?>
		
        </ul>
      	
        <!-- Issues -->
        <h3><a href="issues" class="darkgraylink">Our Key Issues</a></h3>
        <ul class="homebullets">
        
        <?php $issue_bullet_id = 0; ?>
            
            <!-- Human Dignity -->
            <?php $issue_bullet_id = 7083; ?>
            <li><a href="<?php echo get_permalink($issue_bullet_id); ?>" class="big">Human Dignity</a>
            <ul class="inlinelist blacklink">
			<? wp_list_pages("sort_column=menu_order&child_of=$issue_bullet_id&depth=1&title_li="); ?>
            <li class="last"><a href="<?php echo get_permalink($issue_bullet_id); ?>">more...</a></li>
            </ul>
            </li>
            
            <!-- Integrity of Creation -->
            <?php $issue_bullet_id = 19; ?>
            <li><a href="<?php echo get_permalink($issue_bullet_id); ?>" class="big">Integrity of Creation</a>
            <ul class="inlinelist blacklink">
			<? wp_list_pages("sort_column=menu_order&child_of=$issue_bullet_id&depth=1&title_li="); ?>
            <li class="last"><a href="<?php echo get_permalink($issue_bullet_id); ?>">more...</a></li>
            </ul>
            </li>
            
            <!-- Faith Consistent investing --> 
            <li class="last"><a href="<?php echo get_permalink(20); ?>" class="big">Faith Consistent Investing</a>
            <ul class="inlinelist blacklink">
			<? wp_list_pages('sort_column=menu_order&child_of=20&depth=1&title_li='); ?>
            <li class="last"><a href="<?php echo get_permalink(20); ?>">more...</a></li>
            </ul>
            </li>
            
            <!-- Peace -->
            <?php $issue_bullet_id = 47; ?>
            <li><a href="<?php echo get_permalink($issue_bullet_id); ?>" class="big">Peace</a>
            <ul class="inlinelist blacklink">
			<? wp_list_pages("sort_column=menu_order&child_of=$issue_bullet_id&depth=1&title_li="); ?>
            <li class="last"><a href="<?php echo get_permalink($issue_bullet_id); ?>">more...</a></li>
            </ul>
            </li>
            
            <?php /* <!-- Integrity of Creation -->
            <li><a href="<?php echo get_permalink(19); ?>" class="big">Integrity of Creation</a>
            <ul class="inlinelist blacklink">
			<? wp_list_pages('sort_column=menu_order&child_of=19&depth=1&title_li='); ?>
            <li><a href="<?php echo get_permalink(19); ?>">more...</a></li>
            </ul>
            </li>
            
            <!-- Faith Consistent Investing -->
            <li><a href="<?php echo get_permalink(21); ?>">more...</a></li>
            <li><a href="<?php echo get_permalink(21); ?>" class="big">Social Justice</a>
            
            <!-- Peace -->
            <ul class="inlinelist blacklink">
			<? wp_list_pages('sort_column=menu_order&child_of=21&depth=1&title_li='); ?>
            <li><a href="<?php echo get_permalink(21); ?>">more...</a></li>
			
			*/ ?>
            
            <?php /*
            <!-- Social Justice -->
            <li><a href="<?php echo get_permalink(21); ?>" class="big">Social Justice</a>
            <ul class="inlinelist blacklink">
			<? wp_list_pages('sort_column=menu_order&child_of=21&depth=1&title_li='); ?>
            <li><a href="<?php echo get_permalink(21); ?>">more...</a></li>
            
            <!-- Social Justice -->
            <li><a href="<?php echo get_permalink(21); ?>" class="big">Social Justice</a>
            <ul class="inlinelist blacklink">
			<? wp_list_pages('sort_column=menu_order&child_of=21&depth=1&title_li='); ?>
            <li><a href="<?php echo get_permalink(21); ?>">more...</a></li>
            </ul>
			</li>
            
            <!-- Economic Justice -->
            <li><a href="<?php echo get_permalink(46); ?>" class="big">Economic Justice</a>
            <ul class="inlinelist blacklink">
			<? wp_list_pages('sort_column=menu_order&child_of=46&depth=1&title_li='); ?>
            <li><a href="<?php echo get_permalink(46); ?>">more...</a></li>
            </ul>
            </li>
            
            <!-- Peace -->
            <li><a href="<?php echo get_permalink(47); ?>" class="big">Peace</a>
            <ul class="inlinelist blacklink">
			<? wp_list_pages('sort_column=menu_order&child_of=47&depth=1&title_li='); ?>
            <li><a href="<?php echo get_permalink(47); ?>">more...</a></li>
            </ul>
            </li>
			*/ ?>

    	</ul>
        
        <!-- Issues -->
     
        <ul class="homebullets">
<a class="twitter-timeline" href="https://twitter.com/omiusaJPIC" data-widget-id="682618667486556160">Tweets by @omiusaJPIC</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		
        </ul>
       
        
        </div>
        <div class="column" id="homepageright">
        
        <!-- About OMIUSAJPIC -->
        <div id="homepageabout" class="rightbox">
        	<div id="player">Loading image rotator (requires Flash)</div>
			<script type="text/javascript">
            var so = new SWFObject('<?php bloginfo('url'); ?>/imagerotator/imagerotator.swf','mpl','360','270','8');
            so.addParam('allowscriptaccess','always');
            so.addParam('allowfullscreen','true');
            so.addVariable('height','270');
            so.addVariable('width','360');
            so.addVariable('file','<?php bloginfo('url'); ?>/imagerotator/imagelist.xml');
            so.addVariable('transition','fade');
            so.addVariable('overstretch','fit');
            so.addVariable('showicons','false');
            so.addVariable('shownavigation','false');
            so.addVariable('repeat','true');
            so.addVariable('shuffle','false');
            so.addVariable('linkfromdisplay','false');
			so.addVariable('rotatetime','3');
            so.write('player');
            </script>

        	<!-- Mission (page contents) -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; endif; ?>
            <?php edit_post_link('Edit', '[ ', ' ]'); ?>

        </div>
        
        <!-- World map -->
        <div id="homepagemap">
        	<h3><a href="<?php echo get_permalink(18); ?>" class="darkgraylink">OMI World</a></h3>
            <a href="<?php echo get_permalink(18); ?>"><img src="<?php echo bloginfo('template_directory'); ?>/images/map_world.gif" alt="World Map (Click Your Region)" width="340" height="118" /></a><br />
            	<ul class="list1">
                	<li><a href="<?php echo get_permalink(41); ?>">North America</a></li>
                    <li><a href="<?php echo get_permalink(38); ?>">Latin America &amp; Caribbean</a></li>
                </ul>
            	<ul class="list2">
                	<li><a href="<?php echo get_permalink(39); ?>">Africa</a></li>
                    <li><a href="<?php echo get_permalink(40); ?>">Asia &amp; Pacific</a></li>
                    <li><a href="<?php echo get_permalink(42); ?>">Europe</a></li>
                </ul>
                <ul class="list3">
                	<li><a href="<?php echo get_permalink(194); ?>">United Nations</a></li>
                </ul>
            </div>

        </div>
        <div class="clear10px"></div>
    </div></div><!-- end #main -->
    
<?php get_footer(); ?>