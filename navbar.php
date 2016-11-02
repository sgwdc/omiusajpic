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
	table#navbar td:hover {
		background-color: #fff;
	}
	table#navbar td a {
		color: #fff;
		text-decoration: none;
		display:block;
		padding:10px 0;
	}
	table#navbar td:hover a {
		color: #4281bf; 
	}
	table#navbar td#home_icon {
		background-image: url('<?php echo get_template_directory_uri() . "/images/homeicon_white.png"; ?>');
		background-repeat: no-repeat;
		background-position: center; 
	}
	table#navbar td#home_icon:hover {
		background-image: url('<?php echo get_template_directory_uri() . "/images/homeicon_blue.png"; ?>');
	}
</style>
<table id="navbar"><tr>
	<td id="home_icon"><a href="/"> &nbsp; &nbsp; &nbsp; &nbsp; </a></td>
	<td><a href="/about/">About Us</a></td>
	<td><a href="/issues/">Issue Areas</a></td>
	<td><a href="/our-impact/">Our Impact</a></td>
	<td><a href="/action/">Get Involved</a></td>
	<td><a href="/resources/">Resources</a></td>
	<td><a href="/about/partners/">Partners</a></td>
	<td><a href="http://secure.oblatesusa.org/p-2023-donation.aspx?source=M17IGI202" target="_blank">Support Us</a></td>
</tr></table>
