<?php
function avengers_social_links( $atts ) {
	extract( shortcode_atts( array(
		'social_id' => ' ',
		'link_title' => 'Link Title',
	), $atts ) );
	
		$themeOptions = get_option( 'avengers_theme_options' );
		return '<a href="'.esc_url($themeOptions[$social_id]).'">'.$link_title.'</a>';
}
add_shortcode( 'social-link', 'avengers_social_links' );

function avengers_text_info( $atts ) {
	extract( shortcode_atts( array(
		'text_id' => ' '
	), $atts ) );
	
		$themeOptions = get_option( 'footer_options' );
		return '<p>'.$themeOptions[$text_id].'</p>';
		//return '<a href="'.esc_url($themeOptions[$social_id]).'">'.$link_title.'</a>';
}
add_shortcode( 'text-info', 'avengers_text_info' );

?>
