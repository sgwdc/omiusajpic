		<!-- FOOTER -->
		<div id="footer">
			<div class="clearfix">

				<div class="footer-column" style="padding-top:10px;">
					<a href="/"><img src="<?php bloginfo('template_directory') ?>/images/logo_v2_100px.png" width="100" height="100"></a><br>
					<h3 class="main-section"><a href="/">Oblates JPIC</a></h3>
					391 Michigan Ave, NE<br>
					Washington, DC 20017<br>
					Phone: (202) 529-4505<br>
					Fax: (202) 529-4572<br>
					<strong><a href="/contact/">Contact Us</a></strong>
				</div>

				<?php
					echo '<div class="footer-column">';
						displaySectionPages('about');
						displaySectionPages('issues');
					echo '</div>';

					echo '<div class="footer-column">';
						displaySectionPages('our-impact');
						displaySectionPages('resources');
					echo '</div>';
				?>

				<div class="footer-column">
					<h3 class="main-section"><a href="/ministries/">OMI Ministries</a></h3>
					<br>
					<h3 class="main-section"><a href="/partners/">Partners</a></h3>
					<br>
					<h3 class="main-section"><a href="http://secure.oblatesusa.org/p-2023-donation.aspx?source=M17IGI202" target="_blank">Support Us</a></h3>
				</div>

				<?php
					function displaySectionPages($page_slug) {
						$page_details = get_page_by_path( $page_slug );
						$page_title = $page_details -> post_title;
						$page_id = $page_details -> ID;
						// Get any subpages for this page
						$args = array(
							'post_type' => 'page',
							'post_status' => 'publish',
							'child_of' => $page_id,
							'depth' => 1,
							'sort_column' => 'menu_order',
							'title_li' => null,
							'echo' => false,
						);
						$subnav_menu = wp_list_pages( $args );

						echo '<h3 class="main-section"><a href="/' . $page_slug . '/">' . $page_title . '</a></h3>';
						// If this page has any subpages, display them
						if (strlen($subnav_menu)) {
							echo '<ul>';
							echo $subnav_menu;
							echo '</ul>';
						}
					}
				?>
			</div><!-- end clearfix -->

			<br>
			<p style="text-align:center;">&copy; Copyright <?php echo date('Y') ?> Missionary Oblates of Mary Immaculate</p>

			<?php wp_footer(); ?>
		</div><!-- end #footer -->
	</div><!-- end #container -->
	<!-- Dropshadow -->
	<div id="bottom-dropshadow">&nbsp;</div>

	<?php
	$IPsToIgnore = ["73.212.168.134", "10.19.76.1", "104.129.81.54"];
	// Get the user's IP address
	$ip = $_SERVER['REMOTE_ADDR'];
	// Only track pageviews if it's not us
	if (!in_array($ip, $IPsToIgnore)) {
	?>
		<!-- Old Analytics account which Christina Herman's Google account cherman@omiusa.org has only user level access to -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-4947421-1', 'auto');
			ga('send', 'pageview');
		</script>

		<!-- New Analytics account created 9/8/2016 -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-83880741-1', 'auto');
			ga('send', 'pageview');
		</script>
	<?php
	}
	?>
	<br><br>
</body>
</html>
