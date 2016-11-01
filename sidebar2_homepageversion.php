<?php 
// HIDE FROM SOME PAGES
if (!is_page('search-results')) : 
?>

    	
<div>
        
        <!-- Video/audio sidebar -->
        <?php 
		$news_cat = 884; 
		$posts_num = 3;
		$showing_videos=false;
		?>
        <ul>
        <?php
		// Get homepage posts 
		 if ($news_cat != '206') $lastposts = get_posts('numberposts='.$posts_num.'&category='.$news_cat.',-206');
		 else $lastposts = get_posts('numberposts='.$posts_num.'&category='.$news_cat);
		 foreach($lastposts as $post) :
			setup_postdata($post);
		 ?>
         <li><a href="<?php the_permalink(); ?>" class="big_latestaudiovideo"><?php the_title(); ?></a><br />
         <?php $showing_videos=true; ?>
		 <?php if ($news_cat != '206') : ?><?php the_time('F jS, Y') ?>
		 <?php else: ?><?php echo omi_spanish_date(the_date('j F Y','','',FALSE)); ?>
		 <?php endif; ?></li>
         <?php endforeach; ?>
        </ul>
        <?php if ($showing_videos) : ?><a href="http://omiusajpic.org/resources/video/">More video &amp; audio &gt;</a><?php endif; ?>
        <!-- end video/audio sidebar -->
        

    </div>
    
<?php endif ; ?>

<?
/*
            <!-- Human Dignity -->
            <?php $issue_bullet_id = 7083; ?>
            <li><a href="<?php echo get_permalink($issue_bullet_id); ?>" class="big">Human Dignity</a>
            <ul class="inlinelist blacklink">
			<?php wp_list_pages("sort_column=menu_order&child_of=$issue_bullet_id&depth=1&title_li="); ?>
            <li class="last"><a href="<?php echo get_permalink($issue_bullet_id); ?>">more...</a></li>
            </ul>
            </li>

*/
?>
