<?php
/**
 * Available Baylys Shortcodes
 *
 *
 * @package Baylys
 * @since Baylys 1.1.2
 */

 /*-----------------------------------------------------------------------------------*/
 /* Baylys Shortcodes
 /*-----------------------------------------------------------------------------------*/

 // Enable shortcodes in widget areas
 add_filter( 'widget_text', 'do_shortcode' );

 // Replace WP autop formatting
 if (!function_exists( "baylys_remove_wpautop")) {
	 function baylys_remove_wpautop($content) {
		 $content = do_shortcode( shortcode_unautop( $content ) );
		 $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
		 return $content;
	 }
 }


 /*-----------------------------------------------------------------------------------*/
 /* Multi Columns Shortcodes
 /* Don't forget to add "_last" behind the shortcode if it is the last column.
 /*-----------------------------------------------------------------------------------*/

 // Two Columns
 function baylys_shortcode_two_columns_one( $atts, $content = null ) {
		return '<div class="two-columns-one">' . baylys_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'two_columns_one', 'baylys_shortcode_two_columns_one' );

 function baylys_shortcode_two_columns_one_last( $atts, $content = null ) {
		return '<div class="two-columns-one last">' . baylys_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'two_columns_one_last', 'baylys_shortcode_two_columns_one_last' );

 // Three Columns
 function baylys_shortcode_three_columns_one($atts, $content = null) {
		return '<div class="three-columns-one">' . baylys_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'three_columns_one', 'baylys_shortcode_three_columns_one' );

 function baylys_shortcode_three_columns_one_last($atts, $content = null) {
		return '<div class="three-columns-one last">' . baylys_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'three_columns_one_last', 'baylys_shortcode_three_columns_one_last' );

 function baylys_shortcode_three_columns_two($atts, $content = null) {
		return '<div class="three-columns-two">' . baylys_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'three_columns_two', 'baylys_shortcode_three_columns_two' );

 function baylys_shortcode_three_columns_two_last($atts, $content = null) {
		return '<div class="three-columns-two last">' . baylys_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'three_columns_two_last', 'baylys_shortcode_three_columns_two_last' );

 // Four Columns
 function baylys_shortcode_four_columns_one($atts, $content = null) {
		return '<div class="four-columns-one">' . baylys_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'four_columns_one', 'baylys_shortcode_four_columns_one' );

 function baylys_shortcode_four_columns_one_last($atts, $content = null) {
		return '<div class="four-columns-one last">' . baylys_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'four_columns_one_last', 'baylys_shortcode_four_columns_one_last' );

 function baylys_shortcode_four_columns_two($atts, $content = null) {
		return '<div class="four-columns-two">' . baylys_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'four_columns_two', 'baylys_shortcode_four_columns_two' );

 function baylys_shortcode_four_columns_two_last($atts, $content = null) {
		return '<div class="four-columns-two last">' . baylys_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'four_columns_two_last', 'baylys_shortcode_four_columns_two_last' );

 function baylys_shortcode_four_columns_three($atts, $content = null) {
		return '<div class="four-columns-three">' . baylys_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'four_columns_three', 'baylys_shortcode_four_columns_three' );

 function baylys_shortcode_four_columns_three_last($atts, $content = null) {
		return '<div class="four-columns-three last">' . baylys_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'four_columns_three_last', 'baylys_shortcode_four_columns_three_last' );

 // Divide Text Shortcode
 function baylys_shortcode_divider($atts, $content = null) {
		return '<div class="divider"></div>';
 }
 add_shortcode( 'divider', 'baylys_shortcode_divider' );

 /*-----------------------------------------------------------------------------------*/
 /* Text Highlight and Info Boxes Shortcodes
 /*-----------------------------------------------------------------------------------*/

 function baylys_shortcode_white_box($atts, $content = null) {
		return '<div class="white-box">' . do_shortcode( baylys_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'white_box', 'baylys_shortcode_white_box' );

 function baylys_shortcode_yellow_box($atts, $content = null) {
		return '<div class="yellow-box">' . do_shortcode( baylys_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'yellow_box', 'baylys_shortcode_yellow_box' );

 function baylys_shortcode_red_box($atts, $content = null) {
		return '<div class="red-box">' . do_shortcode( baylys_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'red_box', 'baylys_shortcode_red_box' );

 function baylys_shortcode_blue_box($atts, $content = null) {
		return '<div class="blue-box">' . do_shortcode( baylys_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'blue_box', 'baylys_shortcode_blue_box' );

 function baylys_shortcode_green_box($atts, $content = null) {
		return '<div class="green-box">' . do_shortcode( baylys_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'green_box', 'baylys_shortcode_green_box' );

 function baylys_shortcode_lightgrey_box($atts, $content = null) {
		return '<div class="lightgrey-box">' . do_shortcode( baylys_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'lightgrey_box', 'baylys_shortcode_lightgrey_box' );

 function baylys_shortcode_grey_box($atts, $content = null) {
		return '<div class="grey-box">' . do_shortcode( baylys_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'grey_box', 'baylys_shortcode_grey_box' );

 function baylys_shortcode_dark_box($atts, $content = null) {
		return '<div class="dark-box">' . do_shortcode( baylys_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'dark_box', 'baylys_shortcode_dark_box' );

 /*-----------------------------------------------------------------------------------*/
 /* General Buttons Shortcodes
 /*-----------------------------------------------------------------------------------*/

 function baylys_button( $atts, $content = null ) {
		 extract(shortcode_atts(array(
		 'link'	=> '#',
		 'target' => '',
		 'color'	=> '',
		 'size'	=> '',
		'form'	=> '',
		'style'	=> '',
		 ), $atts));

	 $color = ($color) ? ' '.$color. '-btn' : '';
	 $size = ($size) ? ' '.$size. '-btn' : '';
	 $form = ($form) ? ' '.$form. '-btn' : '';
	 $target = ($target == 'blank') ? ' target="_blank"' : '';

	 $out = '<a' .$target. ' class="standard-btn' .$color.$size.$form. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

		 return $out;
 }
 add_shortcode('button', 'baylys_button');
