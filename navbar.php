<style>
	table#navbar {
		width:100%;
		background-color: #4281bf;
		color: #fff;
		font-size:18px;
		/* Single pixel border across the top */
		border-top: 1px solid #fff;
		/* 12px border across the bottom */
		border-bottom: 12px solid #0c1208;
		/* Not sure why this is necessary but it avoids a border around the td cells */
		border-collapse: collapse;
	}
	/* Add a vertical divider after each button (except the last) */
	table#navbar td {
		text-align: center;
		border-right: 1px #fff solid;
	}
	table#navbar td:last-child {
		border:0;
	}
	table#navbar td:hover, table#navbar td.current {
		background-color: #fff;
	}
	table#navbar td a {
		color: #fff;
		text-decoration: none;
		display:block;
		padding:10px 0;
	}
	table#navbar td:hover a, table#navbar td.current a {
		color: #4281bf; 
	}
	table#navbar td#home_icon {
		background-image: url('<?php echo get_template_directory_uri() . "/images/homeicon_white.png"; ?>');
		background-repeat: no-repeat;
		background-position: center; 
	}
	table#navbar td#home_icon:hover, table#navbar td#home_icon.current {
		background-image: url('<?php echo get_template_directory_uri() . "/images/homeicon_blue.png"; ?>');
	}
</style>
<?php
	//$slug = $post -> post_name;
	$highest_page_slug = "";
	// Is it a page
	if(is_page()) { 
		global $post;
		// Get an array of Ancestors and Parents if they exist
		$parents = get_post_ancestors($post -> ID);
		// Get the top Level page->ID count base 1, array base 0 so -1
		$id = ($parents) ? $parents[count($parents)-1]: $post -> ID;
		// Get the parent and set the $highest_page_slug with the page slug (post_name)
		$parent = get_post($id);
		$highest_page_slug = $parent->post_name;
	}
?>
<table id="navbar"><tr>
	<td id="home_icon"<?php if($highest_page_slug =="home") echo ' class="current"'; ?>><a href="/"> &nbsp; &nbsp; &nbsp; &nbsp; </a></td>
	<td<?php if($highest_page_slug =="about") echo ' class="current"'; ?>><a href="/about/">About Us</a></td>
	<td<?php if($highest_page_slug =="issues") echo ' class="current"'; ?>><a href="/issues/">Issue Areas</a></td>
	<td<?php if($highest_page_slug =="our-impact") echo ' class="current"'; ?>><a href="/our-impact/">Our Impact</a></td>
	<td<?php if($highest_page_slug =="action") echo ' class="current"'; ?>><a href="/action/">Get Involved</a></td>
	<td<?php if($highest_page_slug =="resources") echo ' class="current"'; ?>><a href="/resources/">Resources</a></td>
	<td<?php if($highest_page_slug =="partners") echo ' class="current"'; ?>><a href="/about/partners/">Partners</a></td>
	<td><a href="http://secure.oblatesusa.org/p-2023-donation.aspx?source=M17IGI202" target="_blank">Support Us</a></td>
</tr></table>
