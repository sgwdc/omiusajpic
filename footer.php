		<!-- FOOTER -->
		<div id="footer">
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/about/">About Us</a></li>
				<li><a href="/issues/">Issue Areas</a></li>
				<li><a href="/our-impact/">Our Impact</a></li>
				<li><a href="/action/">Get Involved</a></li>
				<li><a href="/resources/">Resources</a></li>
				<li><a href="/about/partners/">Partners</a></li>
				<li><a href="http://secure.oblatesusa.org/p-2023-donation.aspx?source=M17IGI202" target="_blank">Support Us</a></li>
				<li><a href="/espanol">En Español</a></li>
			</ul>
			<p>Oblates JPIC Office 391 Michigan Ave NE, Washington, DC 20017 USA | phone (202) 529-4505 | fax (202) 529-4572<br />
			&copy;<?php echo date('Y') ?> Missionary Oblates of Mary Immaculate | <a href="/about/privacy">Privacy Policy</a> | <a href="/about/contact">Contact Us</a></p>
			<p><a href="http://www.livingstreets.com/" title="Living Streets Consulting">Website by Living Streets Consulting</a></p>
			<?php wp_footer(); ?>
		</div><!-- end #footer -->
	</div><!-- end #container -->

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
</body>
</html>
