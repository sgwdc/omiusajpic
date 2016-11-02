<?php 
/* Password Protected Page Logout 
This code allows people to log out of the members area, by linking to the homepage like this: 
<a href="/?member_logout=1">Logout</a> */
function member_logout() { $cookie_result = setcookie('wp-postpass_' . COOKIEHASH, '' , time() - 3600, COOKIEPATH); }
if ($_REQUEST['member_logout']==1) member_logout(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php /* if (in_category(206)) echo '<!--- Category 206 --->'; else echo '<!--- no category info --->'; */ ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title('',true,''); ?><?php if (!is_home()) echo " - "; ?><?php bloginfo('name'); ?></title>
<style media="all" type="text/css">
@import url( <?php bloginfo('stylesheet_url'); ?> );
</style>
<script type="text/javascript" src="<?php bloginfo('url'); ?>/scripts/swfobject.js"></script>
<link rel="feed alternate" type="application/rss+xml"
      href="<?php bloginfo_rss('rss_url') ?>" title="<?php bloginfo_rss('title') ?>">
<meta name="description" content="The Missionary Oblates of Mary Immaculate's Justice, Peace, and Integrity of Creation effort is a global initiative to promote justice, equality, peace, and a clean and sustainable environment for all." />
<link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/favicon.ico">
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
            <img src="<?php bloginfo('template_directory') ?>/images/logo_v2.png" alt="OMI JPIC logo">
        </div>
        <div style="width:600px; float:left; color:#fff;">
            <div style="padding-top:10px;">
                <a href="/">Home</a> &nbsp; | &nbsp; <a href="/about/contact/">Contact</a> &nbsp; | &nbsp; <a href="http://omiusajpic.livingstreets.com:8601/search-results/?cx=017409278450099449193%3Awfbtxpyrh6k&cof=FORID%3A11&ie=UTF-8&q=Search+our+site&siteurl=">Search</a>
            </div>
            <div style="padding-top:20px;">
                <h1 style="font-size:28px;"><?php bloginfo('name'); ?></h1>
            </div>
            <div style="padding-top:0px;">
                <h3 style="font-size:14px; font-style: italic;"><?php bloginfo('description'); ?></h3>
            </div>
        </div>
        <div style="width:139px; float:right; color:#fff; padding:25px 10px 0 0;">
            <img src="<?php bloginfo('template_directory') ?>/images/omi_logo_color.png" alt="OMI logo">
        </div>
    </div><!-- end #masthead -->
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
</style>
<table id="navbar"><tr>
    <td><a href="/">Home</a></td>
    <td><a href="1">About Us</a></td>
    <td><a href="2">Issue Areas</a></td>
    <td><a href="3">Our Impact</a></td>
    <td><a href="4">Get Involved</a></td>
    <td><a href="5">Resources</a></td>
    <td><a href="6">Partners</a></td>
    <td><a href="7">Support Us</a></td>
</tr></table>
