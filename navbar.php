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
	<td<?php if($highest_page_slug =="issues") echo ' class="current"'; ?>><a href="/issues/">Issues</a></td>
	<td<?php if($highest_page_slug =="our-impact") echo ' class="current"'; ?>><a href="/our-impact/">Our Impact</a></td>
	<td<?php if($highest_page_slug =="ministries") echo ' class="current"'; ?>><a href="/ministries/">OMI Ministries</a></td>
	<td<?php if($highest_page_slug =="resources") echo ' class="current"'; ?>><a href="/resources/">Resources</a></td>
	<td<?php if($highest_page_slug =="partners") echo ' class="current"'; ?>><a href="/about/partners/">Partners</a></td>
	<td<?php if($highest_page_slug =="action") echo ' class="current"'; ?>><a href="/action/">Take Action</a></td>
	<td><a href="https://secure.oblatesusa.org/p-2023-donation.aspx?source=M17IGI202" target="_blank">Support Us</a></td>
</tr></table>
