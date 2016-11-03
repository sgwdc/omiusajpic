<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title><?php
	// If this is NOT the front page, include the page title in the HTML title
	if (!is_front_page()) {
		wp_title('&raquo;', true, 'right');
	}
	// Add the blog name to the HTML title
	bloginfo('name');
	?></title>
	<style media="all" type="text/css">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	<script type="text/javascript" src="<?php bloginfo('url'); ?>/scripts/swfobject.js"></script>
	<link rel="feed alternate" type="application/rss+xml"
	href="<?php bloginfo_rss('rss_url') ?>" title="<?php bloginfo_rss('title') ?>">
	<meta name="description" content="The Missionary Oblates of Mary Immaculate's Justice, Peace, and Integrity of Creation effort is a global initiative to promote justice, equality, peace, and a clean and sustainable environment for all." />
	<!--[if IE]><link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/images/favicon.ico"><![endif]-->
	<link rel="icon" href="<?php bloginfo('template_directory') ?>/images/favicon.png">
	<?php wp_head(); ?>
</head>

<?php 
	// Set a variable so we know if this is the news page
	global $newspage; 
	$newspage = false; 
	$page_uri = getenv('REQUEST_URI'); 
	if (strstr($page_uri,'/news')) $newspage = true;
?>

<body<?php if (!$newspage&&(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?> class="spanish"<?php endif; ?>>
	<a name="top"></a>
	<div id="container">

		<!-- HEADER -->
		<div id="topnav">
			<a href="#maincontent" class="hidden">Skip to main content</a>
			<?php if ($newspage || !is_home()) : ?>
			<a href="<?php bloginfo('url'); ?>">Home</a> | 
			<?php endif; ?>
			<?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>
			<a href="<?php bloginfo('url'); ?>/espanol">En Español</a>
			<?php else: ?>
			<a href="<?php bloginfo('url'); ?>">English</a>
			<?php endif; ?>
		</div><!-- end #topnav -->

		<div id="masthead">
			<div style="width:125px; float:left; padding:10px 75px 0 10px;">
				<a href="/"><img src="<?php bloginfo('template_directory') ?>/images/logo_v2.png" alt="OMI JPIC logo"></a>
			</div>
			<div style="width:600px; float:left; color:#fff;">
				<div style="padding-top:10px;">
					<a href="/">Home</a> &nbsp; | &nbsp; <a href="/about/contact/">Contact</a> &nbsp; | &nbsp; <a href="/search-results/">Search</a>
				</div>
				<div style="padding-top:20px;">
					<h1 style="font-size:28px;">Justice, Peace, and Integrity of Creation</h1>
				</div>
				<div style="padding-top:10px;">
					<h3 style="font-size:15px; font-style: italic;">A Ministry of Missionary Oblates of Mary Immaculate</h3>
				</div>
				<div style="padding-top:5px;">
					<h3 style="font-size:12px; font-style: italic;">United States Province</h3>
				</div>
			</div>
			<div style="width:139px; float:right; color:#fff; padding:25px 10px 0 0;">
				<a href="http://www.omiusa.org/" target="_blank"><img src="<?php bloginfo('template_directory') ?>/images/omi_logo_color.png" alt="OMI logo"></a>
			</div>
		</div><!-- end #masthead -->
