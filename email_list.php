<?php
/*
Template Name: Email List
*/
?>

<?php get_header(); ?>

<?php
	// Include the horizontal navbar
	include 'navbar.php';
?>

<!-- MAIN SECTION -->
<div class="maininterior">

	<!-- Breadcrumb -->
	<div id="topbreadcrumb">    	
		Email List
	</div>

	<?php
		// Include the sidebar template sidebar-interior.php
		get_sidebar('interior');
	?>

	<!-- Interior contents mid-width container -->
	<div id="interior-body">
		<h1>Email List</h1>
		<!--
		<p>You may wish to return to the <a href="/">homepage</a> to find what you're looking for. Please feel 
		free to <a href="/about/contact">contact us</a> regarding this error.</p>
		-->
		<p>Please support the work of this office by subscribing to our weekly news updates, and action alerts using the forms below:</p>
		<br>

		<form action="http://omiusajpic.us1.list-manage.com/subscribe/post?u=cc5976ca8e2c41ca79b0c739c&amp;id=dacd45ed3a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
			<h4 class="emailupdatesheader"><label>Get Weekly News Updates</label></h4>
			<input type="text" name="EMAIL" class="lefttextinput" id="mce-EMAIL"
			value="Your email address" 
			onfocus="if (this.value=='Your email address') this.value='';" 
			onblur="if (this.value=='') this.value='Your email address';" >
			<input type="submit" value="Go" name="subscribe" id="mc-embedded-subscribe" class="leftsubmit">
		</form>

		<br><br>

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
			<?php endif; ?>>
			<input type="hidden" name="u" value="cc5976ca8e2c41ca79b0c739c">
			<input type="hidden" name="id" value="dacd45ed3a">
			<input type="submit" value="<?php if ($newspage || !(is_page_template('spanish.php')||is_category(206)||in_category(206))) : ?>Go<?php else : ?>Ir <?php endif; ?>" class="leftsubmit">
		</form>

		<a href="/action" class="actionalertlink">See current and past action alerts &gt;</a>

	</div>
</div><!-- end #maininterior -->

<?php get_footer(); ?>
