<?php

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

// Enable "Featured Images" for pages and posts
add_theme_support('post-thumbnails');
?>
