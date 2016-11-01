<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
?>
<?php 
// Set a variable so we know if this is the news page
global $newspage; 
$newspage = false; 
$page_uri = getenv('REQUEST_URI'); 
if (strstr($page_uri,'/news')) $newspage = true;
?>

<!-- LEFT BAR -->

    <div id="leftbar">
        <div id="leftsearch" class="leftform">
        <form id="searchform" name="searchform" method="get" action="/search-results/">
        	<input type="hidden" name="cx" value="017409278450099449193:wfbtxpyrh6k" />
            <input type="hidden" name="cof" value="FORID:11" />
            <input type="hidden" name="ie" value="UTF-8" />
            <h4><label><?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>Search<?php else : ?>Buscar<? endif; ?></label></h4>
            <input type="text" name="q" class="lefttextinput"<?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?> value="Search our site" 
            	onfocus="if (this.value=='Search our site') this.value='';" onblur="if (this.value=='') this.value='Search our site';" <? endif; ?> />
            <input type="submit" value="<?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>Go<?php else : ?>Ir<?php endif; ?>" class="leftsubmit" />
        </form>
        <!--<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&lang=en"></script>-->
        <div class="clearboth"></div>
        </div>

        <ul id="leftnav">
		<?php
			// Define function for getting children
			function return_children_array($parentID,$includeIDs) {
			// Pass the array of include IDs. If an empty array is passed, everything is included.
				global $wpdb; 
				$sql = " select ID, post_title, post_parent from ".$wpdb->posts;
				$sql .= " where post_type = 'page' and post_status = 'publish' and post_parent = " . $parentID;
				if (count($includeIDs) > 0) {
					$sql .= " and (";
					foreach ($includeIDs as $i) {
						$sql .= "ID=".$i." or ";
					}
					$sql=substr($sql,0,-3);
					$sql.=") ";
				}
				$sql .= " order by menu_order ";
				if($subpages = $wpdb->get_results($sql, ARRAY_A)) return $subpages;
				else return array();					
			}

			if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) {

				// Get top level nav
				$top_level_IDs = array(7,14,18,13,8,6,10);
				/* 
				News: 7 
				Issues: 14
				Global: 18
				Resources: 13
				Take Action: 8
				About: 6
				Members: 10
				*/ 
				$top_parent = 0;
			
			} else {

				// Spanish 
				$top_level_IDs = array(12);
				/* 
				Spanish: 12 
				*/ 
				$top_parent = 0;
			}

			if (is_home() || is_search() || is_404()) { 
			// Homepage: Level 0
				$top_level = return_children_array(0,$top_level_IDs);
				foreach ($top_level as $toppage) {
					echo '<li><a href="' . get_permalink($toppage['ID']) . '">'. $toppage['post_title'] .'</a></li>' ;
				}
			
			} else {
				// Get hierarchy for this menu item
				$parent_level = $post->post_parent;
				$navstack = array($post->ID,$parent_level);
				while ($parent_level != 0) {
					$parent = get_post($parent_level);
					$parent_level = $parent->post_parent;
					array_push($navstack,$parent_level);
				}
				// Get all menu items that will go in the menu
				$navstack = array_reverse($navstack);
				//foreach ($navstack as $i) echo $i.', ';
				$items = array();
				$i = 1;
				foreach ($navstack as $level) {
					if ($level == 0) $include_array = $top_level_IDs;
					else $include_array = array();
					$navmenus[$i] = return_children_array($level,$include_array);
					$i++;
				}
				//print_r($navmenus[1]);
				// Go ...

				foreach ($navmenus[1] as $toppage) {
					// Level 1
					echo '<li class="l1"><a href="'.get_permalink($toppage['ID']).'"';
					if (array_search($toppage['ID'],$navstack)) { 
						echo ' class="open"'.'>'.$toppage['post_title'].'</a>';
						if (isset($navmenus[2]) && count($navmenus[2]) > 0)
						//else echo '</li><!-- no children -->';
						if ($toppage['ID'] == 8) echo '</li>'; // just for the childless Action Alerts section 
						echo '<ul>';
						foreach ($navmenus[2] as $page2) {
							echo '<li class="l2"><a href="'.get_permalink($page2['ID']).'"';
							if (array_search($page2['ID'],$navstack)) { 
								echo ' class="open"'.'>'.$page2['post_title'].'</a>';
								// Level 3 
								if (isset($navmenus[3]) && count($navmenus[3]) > 0) {
									echo '<ul>';
									foreach ($navmenus[3] as $page3) {
										echo '<li class="l3"><a href="'.get_permalink($page3['ID']).'"';
										if (array_search($page3['ID'],$navstack)) {
											echo ' class="open"'.'>'.$page3['post_title'].'</a>';
											// Level 4
											if (isset($navmenus[4]) && count($navmenus[4]) > 0) {
												echo '<ul>';
												foreach ($navmenus[4] as $page4) {
													echo '<li class="l4"><a href="'.get_permalink($page4['ID']).'"';
													if (array_search($page4['ID'],$navstack)) {
														echo ' class="open"'.'>'.$page4['post_title'].'</a>';
														// Level 5
														if (isset($navmenus[5]) && count($navmenus[5]) > 0) {
															echo '<ul>';
															foreach ($navmenus[5] as $page5) {
																echo '<li class="l5"><a href="'.get_permalink($page5['ID']).'"';
																if (array_search($page5['ID'],$navstack)) {
																	echo ' class="open"'.'>'.$page5['post_title'].'</a>';
																	// Level 6
																	if (isset($navmenus[6]) && count($navmenus[6]) > 0) {
																		echo '<ul>';
																		foreach ($navmenus[6] as $page6) {
																			echo '<li class="l6"><a href="'.get_permalink($page6['ID']).'"';
																			if (array_search($page6['ID'],$navstack)) {
																				echo ' class="open"'.'>'.$page6['post_title'].'</a></li>';
																			} else echo '>'. $page6['post_title'] .'</a></li>'; 
																		}
																		echo '</ul>';
																	}
																} else echo '>'. $page5['post_title'] .'</a>'; 
																echo '</li>';
															}
															echo '</ul>';
														}
													} else echo '>'. $page4['post_title'] .'</a>';
													echo '</li>'; 
												} echo '</ul>';
											} 
											
											// end Level 4
										} else echo '>'. $page3['post_title'] .'</a>';
										echo '</li>';
									}
									echo '</ul>';
								} 
								// end Level 3
							} else echo '>'. $page2['post_title'] .'</a>'; 
							echo '</li>';
						}
						echo '</ul>'; // End level 2
					} else echo '>'. $toppage['post_title'] .'</a>';
					echo '</li>'; // End level 1
				} 
				/*if (isset($navmenus[8])) echo 'there is an 8th level';
				else echo 'there is no 8th level';*/
				echo $menu;
			}
		?>
        </ul>
        <div id="leftsignup" class="leftform">
        <h4>Follow JPIC OMI!</h4>
        <div class="connect">
            <a href="http://www.youtube.com/OMIJPIC" title="OMI Justice, Peace, and Integrity of Creation YouTube Channel"><img src="<?php bloginfo('template_directory'); ?>/images/youtube_32.png" alt="YouTube" target="_blank" /></a> 
            <a href="https://www.facebook.com/omiusajpic" title="OMI Justice, Peace, and Integrity of Creation Facebook" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/f_logo_32.png" alt="Facebook" /></a> 
            <a href="https://twitter.com/omiusajpic" title="OMI Justice, Peace, and Integrity of Creation Twitter" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/twitter-bird-white-on-blue_32.png" alt="Twitter" /></a>
			<?php /* This is the version of the Twitter logo with blue on white instead of the opposite -SNW
            <a href="https://twitter.com/OMIJPIC" title="OMI Justice, Peace, and Integrity of Creation YouTube Channel" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/twitter-bird-blue-on-white_32.png" alt="Twitter" /></a>
			*/ ?>

        </div>
        <form id="signup" name="signup" method="get" action="http://list-manage.com/subscribe/post" target="_blank">
            <h4 class="actionalertheader"><label><?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>Subscribe to Action Alerts<?php else : ?>Alertas de Acci&oacute;n de Email<?php endif; ?></label></h4>
            <input type="text" name="EMAIL" class="lefttextinput" 
            	<?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>
                    value="Your email address" 
                    onfocus="if (this.value=='Your email address') this.value='';" 
                    onblur="if (this.value=='') this.value='Your email address';" 
                <?php else : ?>
                    value="Su Direcci&oacute;n de Email" 
                    onfocus="this.value=''" 
                <?php endif; ?> />
            <input type="hidden" name="u" value="cc5976ca8e2c41ca79b0c739c">
			<input type="hidden" name="id" value="dacd45ed3a">
            <input type="submit" value="<?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>Go<?php else : ?>Ir <?php endif; ?>" class="leftsubmit" />
            <?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>
            	<a href="/action" class="actionalertlink">Current and past action alerts &gt;</a>
                </form>
                <form action="http://omiusajpic.us1.list-manage.com/subscribe/post?u=cc5976ca8e2c41ca79b0c739c&amp;id=dacd45ed3a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                <h4 class="emailupdatesheader"><label>Get Weekly News Updates</label></h4>
				<input type="text" name="EMAIL" class="lefttextinput" id="mce-EMAIL"
                	value="Your email address" 
                    onfocus="if (this.value=='Your email address') this.value='';" 
                    onblur="if (this.value=='') this.value='Your email address';" >
				<input type="submit" value="Go" name="subscribe" id="mc-embedded-subscribe" class="leftsubmit">
				</form>
            <?php else : ?>
            	<a href="/action">Alertas de Email actuales y anteriores &gt;</a></form>
			<?php endif; ?>
        	<div class="clear10px"></div>
        </div>
        <div class="clear10px"></div>
        <?php if ( is_front_page() || is_home() ) : ?>
        <div id="leftdonate" class="leftitem">
            <h4>Support Our Work</h4>
            <p>Support the work of this office by donating to the Missionary Oblates of Mary Immaculate. 
            <a href="http://secure.oblatesusa.org/p-2023-donation.aspx?source=M17IGI202" target="_blank">Donate online &gt;</a></p>
        </div>
        
        <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>
        <!-- non-sidebar code here? -->


        <?php endif; ?>
        
        <?php else : ?>
        
        <?php endif; ?>
    </div><!-- end #leftbar -->