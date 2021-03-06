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

/********************************************************************************/
/* BEGIN: Add meta box with a custom field for the homepage slider captions		*/
/* Generated by the WordPress Meta Box Generator at https://jeremyhixon.com/tool/wordpress-meta-box-generator/
/********************************************************************************/
// Usage: homepage_slider_intro_get_meta( 'homepage_slider_intro' )
function homepage_slider_intro_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}
function homepage_slider_intro_add_meta_box() {
	add_meta_box(
		'homepage_slider_intro',
		__( 'Homepage slider caption', 'homepage_slider_intro' ),
		'homepage_slider_intro_html',
		'post',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'homepage_slider_intro_add_meta_box' );
function homepage_slider_intro_html( $post) {
	wp_nonce_field( '_homepage_slider_intro_nonce', 'homepage_slider_intro_nonce' ); ?>
	<p>
	<?php /*
		<label for="homepage_slider_intro"><?php _e( 'homepage-slider-intro', 'homepage_slider_intro' ); ?></label><br>
		*/ ?>
		<textarea name="homepage_slider_intro" id="homepage_slider_intro" style="width:254px; height:150px;"><?php echo homepage_slider_intro_get_meta( 'homepage_slider_intro' ); ?></textarea>
	</p><?php
}
function homepage_slider_intro_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['homepage_slider_intro_nonce'] ) || ! wp_verify_nonce( $_POST['homepage_slider_intro_nonce'], '_homepage_slider_intro_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['homepage_slider_intro'] ) )
		update_post_meta( $post_id, 'homepage_slider_intro', esc_attr( $_POST['homepage_slider_intro'] ) );
}
add_action( 'save_post', 'homepage_slider_intro_save' );
/********************************************************************************/
/* END: Add meta box with a custom field for the homepage slider captions		*/
/********************************************************************************/
?>
