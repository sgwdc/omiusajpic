<?php

function nbm_global_page_id()
{
  static $runBefore, $thisID;
  if (!$runBefore)
  {
    $runBefore = true;
    global $post;
    $thisID = $post->ID;
  }
  else
    return $thisID;
}

add_action('wp_head','nbm_global_page_id');

function omi_spanish_date($english_date) {
	$months = array(
		'January'=>'Enero',
		'February'=>'Febrero',
		'March'=>'Marzo',
		'April'=>'Abril',
		'May'=>'Mayo',
		'June'=>'Junio',
		'July'=>'Julio',
		'August'=>'Agosto',
		'September'=>'Septiembre',
		'October'=>'Octubre',
		'November'=>'Noviembre', 
		'December'=>'Diciembre'
	);
	$spanish_date=$english_date; 
	foreach ($months as $month1 => $month2) {
		$spanish_date = str_replace($month1,$month2,$spanish_date); 
		//echo $month2;
	}
	return $spanish_date; 
}

function remove_private_prefix($title) {
	$title = str_replace(
	'Protected:',
	'Members only:',
	$title);
	return $title;
}

add_filter('the_title','remove_private_prefix');
remove_action('wp_head', 'wp_generator');

// Enable "Featured Images" for pages and posts
add_theme_support('post-thumbnails');

?>
