<?php
/**
 * Available Baylys Custom Widgets
 *
 * @package Baylys
 * @since Baylys 1.1.2
 */

 /*-----------------------------------------------------------------------------------*/
 /* Include Baylys Flickr Widget
 /*-----------------------------------------------------------------------------------*/

 class baylys_flickr extends WP_Widget {

	 public function __construct() {
		 parent::__construct( 'baylys_flickr', __( 'Baylys Flickr', 'baylys' ), array(
			 'classname'   => 'widget_baylys_flickr',
			 'description' => __( 'Show your Flickr preview images', 'baylys' ),
		 ) );
	 }

	 function widget($args, $instance) {
		 extract( $args );
		 $title = $instance['title'];
		 $id = $instance['id'];
		 $linktext = $instance['linktext'];
		 $linkurl = $instance['linkurl'];
		 $number = $instance['number'];
		 $type = $instance['type'];
		 $sorting = $instance['sorting'];

		 echo $before_widget; ?>
		 <?php if($title != '')
			 echo '<h3 class="widget-title">'.$title.'</h3>'; ?>

				 <div class="flickr_badge_wrapper"><script type="text/javascript" src="https://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=<?php echo $sorting; ?>&amp;&amp;source=<?php echo $type; ?>&amp;<?php echo $type; ?>=<?php echo $id; ?>&amp;size=s&amp;layout=v"></script>
			 <div class="clear"></div>
			 <?php if($linktext == ''){echo '';} else {echo '<div class="flickr-bottom"><a href="'.$linkurl.'" class="flickr-home" target="_blank">'.$linktext.'</a></div>';}?>
		 </div><!-- end .flickr_badge_wrapper -->

			<?php
			echo $after_widget;
		}

		function update($new_instance, $old_instance) {
				return $new_instance;
		}

		function form($instance) {
		 $title = esc_attr($instance['title']);
		 $id = esc_attr($instance['id']);
		 $linktext = esc_attr($instance['linktext']);
		 $linkurl = esc_attr($instance['linkurl']);
		 $number = esc_attr($instance['number']);
		 $type = esc_attr($instance['type']);
		 $sorting = esc_attr($instance['sorting']);
		 ?>

			<p>
						 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
				 </p>

				 <p>
						 <label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Flickr ID:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('id'); ?>" value="<?php echo $id; ?>" class="widefat" id="<?php echo $this->get_field_id('id'); ?>" />
				 </p>

			 <p>
						 <label for="<?php echo $this->get_field_id('linktext'); ?>"><?php _e('Flickr Profile Link Text:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('linktext'); ?>" value="<?php echo $linktext; ?>" class="widefat" id="<?php echo $this->get_field_id('linktext'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('linkurl'); ?>"><?php _e('Flickr Profile URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('linkurl'); ?>" value="<?php echo $linkurl; ?>" class="widefat" id="<?php echo $this->get_field_id('linkurl'); ?>" />
				 </p>

					<p>
						 <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of photos:','baylys'); ?></label>
						 <select name="<?php echo $this->get_field_name('number'); ?>" class="widefat" id="<?php echo $this->get_field_id('number'); ?>">
								 <?php for ( $i = 1; $i <= 10; $i += 1) { ?>
								 <option value="<?php echo $i; ?>" <?php if($number == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
								 <?php } ?>
						 </select>
				 </p>

				 <p>
						 <label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Choose user or group:','baylys'); ?></label>
						 <select name="<?php echo $this->get_field_name('type'); ?>" class="widefat" id="<?php echo $this->get_field_id('type'); ?>">
								 <option value="user" <?php if($type == "user"){ echo "selected='selected'";} ?>><?php _e('User', 'baylys'); ?></option>
								 <option value="group" <?php if($type == "group"){ echo "selected='selected'";} ?>><?php _e('Group', 'baylys'); ?></option>
						 </select>
				 </p>
				 <p>
						 <label for="<?php echo $this->get_field_id('sorting'); ?>"><?php _e('Show latest or random pictures:','baylys'); ?></label>
						 <select name="<?php echo $this->get_field_name('sorting'); ?>" class="widefat" id="<?php echo $this->get_field_id('sorting'); ?>">
								 <option value="latest" <?php if($sorting == "latest"){ echo "selected='selected'";} ?>><?php _e('Latest', 'baylys'); ?></option>
								 <option value="random" <?php if($sorting == "random"){ echo "selected='selected'";} ?>><?php _e('Random', 'baylys'); ?></option>
						 </select>
				 </p>
		 <?php
	 }
 }

 register_widget('baylys_flickr');

 /*-----------------------------------------------------------------------------------*/
 /* Include Baylys About Widget
 /*-----------------------------------------------------------------------------------*/

 class baylys_about extends WP_Widget {

	 public function __construct() {
		 parent::__construct( 'baylys_about', __( 'Baylys About', 'baylys' ), array(
			 'classname'   => 'widget_baylys_about',
			 'description' => __( 'About widget with picture and intro text', 'baylys' ),
		 ) );
	 }

	 function widget($args, $instance) {
		 extract( $args );
		 $title = $instance['title'];
		 $imageurl = $instance['imageurl'];
		 $imagewidth = $instance['imagewidth'];
		 $imageheight = $instance['imageheight'];
		 $abouttext = $instance['abouttext'];

		 echo $before_widget; ?>
		 <?php if($title != '')
			 echo '<h3 class="widget-title">'.$title.'</h3>'; ?>

			 <div class="about-image-wrap">
			 <img src="<?php echo $imageurl; ?>" width="<?php echo $imagewidth; ?>" height="<?php echo $imageheight; ?>" class="about-image">
			 </div><!-- end .about-image-wrap -->
			 <div class="about-text-wrap">
			 <p class="about-text"><?php echo $abouttext; ?></p>
			 </div><!-- end .about-text-wrap -->
			<?php
			echo $after_widget;
		}

		function update($new_instance, $old_instance) {
				return $new_instance;
		}

		function form($instance) {
		 $title = esc_attr($instance['title']);
		 $imageurl = esc_attr($instance['imageurl']);
		 $imagewidth = esc_attr($instance['imagewidth']);
		 $imageheight = esc_attr($instance['imageheight']);
		 $abouttext = esc_attr($instance['abouttext']);
		 ?>

			<p>
						 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
				 </p>

			 <p>
						 <label for="<?php echo $this->get_field_id('imageurl'); ?>"><?php _e('Image URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('imageurl'); ?>" value="<?php echo $imageurl; ?>" class="widefat" id="<?php echo $this->get_field_id('imageurl'); ?>" />
				 </p>

			 <p>
						 <label for="<?php echo $this->get_field_id('imagewidth'); ?>"><?php _e('Image Width (only value, no px):','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('imagewidth'); ?>" value="<?php echo $imagewidth; ?>" class="widefat" id="<?php echo $this->get_field_id('imagewidth'); ?>" />
				 </p>

				<p>
						 <label for="<?php echo $this->get_field_id('imageheight'); ?>"><?php _e('Image Height (only value, no px):','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('imageheight'); ?>" value="<?php echo $imageheight; ?>" class="widefat" id="<?php echo $this->get_field_id('imageheight'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('abouttext'); ?>"><?php _e('About Text:','baylys'); ?></label>
						<textarea name="<?php echo $this->get_field_name('abouttext'); ?>" class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('abouttext'); ?>"><?php echo( $abouttext ); ?></textarea>
				 </p>

		 <?php
	 }
 }

 register_widget('baylys_about');

 /*-----------------------------------------------------------------------------------*/
 /* Include Baylys Video Widget
 /*-----------------------------------------------------------------------------------*/

 class baylys_video extends WP_Widget {

	 public function __construct() {
		 parent::__construct( 'baylys_video', __( 'Baylys Featured Video', 'baylys' ), array(
			 'classname'   => 'widget_baylys_video',
			 'description' => __( 'Show a featured video', 'baylys' ),
		 ) );
	 }

	 function widget($args, $instance) {
		 extract( $args );
		 $title = $instance['title'];
		 $embedcode = $instance['embedcode'];

		 echo $before_widget; ?>
		 <?php if($title != '')
			 echo '<h3 class="widget-title">'.$title.'</h3>'; ?>

				 <div class="video_widget">
			 <div class="featured-video"><?php echo $embedcode; ?></div>
			 </div><!-- end .video_widget -->

			<?php
			echo $after_widget;
		}

		function update($new_instance, $old_instance) {
				return $new_instance;
		}

		function form($instance) {
		 $title = esc_attr($instance['title']);
		 $embedcode = esc_attr($instance['embedcode']);
		 ?>

			<p>
						 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
				 </p>

				 <p>
						 <label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Video embed code:','baylys'); ?></label>
				 <textarea name="<?php echo $this->get_field_name('embedcode'); ?>" class="widefat" rows="6" id="<?php echo $this->get_field_id('embedcode'); ?>"><?php echo( $embedcode ); ?></textarea>
				 </p>

		 <?php
	 }
 }

 register_widget('baylys_video');

 /*-----------------------------------------------------------------------------------*/
 /* Including Baylys Social Links Widget
 /*-----------------------------------------------------------------------------------*/

	class baylys_sociallinks extends WP_Widget {

	 public function __construct() {
		 parent::__construct( 'baylys_sociallinks', __( 'Baylys Social Links', 'baylys' ), array(
			 'classname'   => 'widget_baylys_sociallinks',
			 'description' => __( 'Link to your social profile sites', 'baylys' ),
		 ) );
	 }

	 function widget($args, $instance) {
		 extract( $args );
		 $title = $instance['title'];
		 $twitter = $instance['twitter'];
		 $facebook = $instance['facebook'];
		 $googleplus = $instance['googleplus'];
		 $flickr = $instance['flickr'];
		 $instagram = $instance['instagram'];
		 $picasa = $instance['picasa'];
		 $fivehundredpx = $instance['fivehundredpx'];
		 $youtube = $instance['youtube'];
		 $vimeo = $instance['vimeo'];
		 $dribbble = $instance['dribbble'];
		 $ffffound = $instance['ffffound'];
		 $pinterest = $instance['pinterest'];
		 $behance = $instance['behance'];
		 $deviantart = $instance['deviantart'];
		 $squidoo = $instance['squidoo'];
		 $slideshare = $instance['slideshare'];
		 $lastfm = $instance['lastfm'];
		 $grooveshark = $instance['grooveshark'];
		 $soundcloud = $instance['soundcloud'];
		 $foursquare = $instance['foursquare'];
		 $github = $instance['github'];
		 $linkedin = $instance['linkedin'];
		 $xing = $instance['xing'];
		 $wordpress = $instance['wordpress'];
		 $tumblr = $instance['tumblr'];
		 $rss = $instance['rss'];
		 $rsscomments = $instance['rsscomments'];
		 $target = $instance['target'];


		 echo $before_widget; ?>
		 <?php if($title != '')
			 echo '<h3 class="widget-title">'.$title.'</h3>'; ?>

				 <ul class="sociallinks">
			 <?php
			 if($twitter != '' && $target != ''){
				 echo '<li><a href="'.$twitter.'" class="twitter" title="Twitter" target="_blank">Twitter</a></li>';
			 } elseif($twitter != '') {
				 echo '<li><a href="'.$twitter.'" class="twitter" title="Twitter">Twitter</a></li>';
			 }
			 ?>

			 <?php
			 if($facebook != '' && $target != ''){
				 echo '<li><a href="'.$facebook.'" class="facebook" title="Facebook" target="_blank">Facebook</a></li>';
			 } elseif($facebook != '') {
				 echo '<li><a href="'.$facebook.'" class="facebook" title="Facebook">Facebook</a></li>';
			 }
			 ?>

			 <?php
			 if($googleplus != '' && $target != ''){
				 echo '<li><a href="'.$googleplus.'" class="googleplus" title="Google+" target="_blank">Google+</a></li>';
			 } elseif($googleplus != '') {
				 echo '<li><a href="'.$googleplus.'" class="googleplus" title="Google+">Google+</a></li>';
			 }
			 ?>

			 <?php if($flickr != '' && $target != ''){
				 echo '<li><a href="'.$flickr.'" class="flickr" title="Flickr" target="_blank">Flickr</a></li>';
			 } elseif($flickr != '') {
				 echo '<li><a href="'.$flickr.'" class="flickr" title="Flickr">Flickr</a></li>';
			 }
			 ?>

			 <?php if($instagram != '' && $target != ''){
				 echo '<li><a href="'.$instagram.'" class="instagram" title="Instagram" target="_blank">Instagram</a></li>';
			 } elseif($instagram != '') {
				 echo '<li><a href="'.$instagram.'" class="instagram" title="Instagram">Instagram</a></li>';
			 }
			 ?>

			 <?php if($picasa != '' && $target != ''){
				 echo '<li><a href="'.$picasa.'" class="picasa" title="Picasa" target="_blank">Picasa</a></li>';
			 } elseif($picasa != '') {
				 echo '<li><a href="'.$picasa.'" class="picasa" title="Picasa">Picasa</a></li>';
			 }
			 ?>

			 <?php if($fivehundredpx != '' && $target != ''){
				 echo '<li><a href="'.$fivehundredpx.'" class="fivehundredpx" title="500px" target="_blank">500px</a></li>';
			 } elseif($fivehundredpx != '') {
				 echo '<li><a href="'.$fivehundredpx.'" class="fivehundredpx" title="500px">500px</a></li>';
			 }
			 ?>

			 <?php if($youtube != '' && $target != ''){
			 echo '<li><a href="'.$youtube.'" class="youtube" title="YouTube" target="_blank">YouTube</a></li>';
			 } elseif($youtube != '') {
				 echo '<li><a href="'.$youtube.'" class="youtube" title="YouTube">YouTube</a></li>';
			 }
			 ?>

			 <?php if($vimeo != '' && $target != ''){
			 echo '<li><a href="'.$vimeo.'" class="vimeo" title="Vimeo" target="_blank">Vimeo</a></li>';
			 } elseif($vimeo != '') {
				 echo '<li><a href="'.$vimeo.'" class="vimeo" title="Vimeo">Vimeo</a></li>';
			 }
			 ?>

			 <?php if($dribbble != '' && $target != ''){
			 echo '<li><a href="'.$dribbble.'" class="dribbble" title="Dribbble" target="_blank">Dribbble</a></li>';
			 } elseif($dribbble != '') {
				 echo '<li><a href="'.$dribbble.'" class="dribbble" title="Dribbble">Dribbble</a></li>';
			 }
			 ?>

			 <?php if($ffffound != '' && $target != ''){
			 echo '<li><a href="'.$ffffound.'" class="ffffound" title="Ffffound" target="_blank">Ffffound</a></li>';
			 } elseif($ffffound != '') {
				 echo '<li><a href="'.$ffffound.'" class="ffffound" title="Ffffound">Ffffound</a></li>';
			 }
			 ?>

			 <?php if($pinterest != '' && $target != ''){
			 echo '<li><a href="'.$pinterest.'" class="pinterest" title="Pinterest" target="_blank">Pinterest</a></li>';
			 } elseif($pinterest != '') {
				 echo '<li><a href="'.$pinterest.'" class="pinterest" title="Pinterest">Pinterest</a></li>';
			 }
			 ?>

			 <?php if($behance != '' && $target != ''){
				 echo '<li><a href="'.$behance.'" class="behance" title="Behance Network" target="_blank">Behance Network</a></li>';
			 } elseif($behance != '') {
				 echo '<li><a href="'.$behance.'" class="behance" title="Behance Network">Behance Network</a></li>';
			 }
			 ?>

			 <?php if($deviantart != '' && $target != ''){
				 echo '<li><a href="'.$deviantart.'" class="deviantart" title="deviantART" target="_blank">deviantART</a></li>';
			 } elseif($deviantart != '') {
				 echo '<li><a href="'.$deviantart.'" class="deviantart" title="deviantART">deviantART</a></li>';
			 }
			 ?>

			 <?php if($squidoo != '' && $target != ''){
				 echo '<li><a href="'.$squidoo.'" class="squidoo" title="Squidoo" target="_blank">Squidoo</a></li>';
			 } elseif($squidoo != '') {
				 echo '<li><a href="'.$squidoo.'" class="squidoo" title="Squidoo">Squidoo</a></li>';
			 }
			 ?>

			 <?php if($slideshare != '' && $target != ''){
				 echo '<li><a href="'.$slideshare.'" class="slideshare" title="Slideshare" target="_blank">Slideshare</a></li>';
			 } elseif($slideshare != '') {
				 echo '<li><a href="'.$slideshare.'" class="slideshare" title="Slideshare">Slideshare</a></li>';
			 }
			 ?>

			 <?php if($lastfm != '' && $target != ''){
				 echo '<li><a href="'.$lastfm.'" class="lastfm" title="Lastfm" target="_blank">Lastfm</a></li>';
			 } elseif($lastfm != '') {
				 echo '<li><a href="'.$lastfm.'" class="lastfm" title="Lastfm">Lastfm</a></li>';
			 }
			 ?>

			 <?php if($grooveshark != '' && $target != ''){
				 echo '<li><a href="'.$grooveshark.'" class="grooveshark" title="Grooveshark" target="_blank">Grooveshark</a></li>';
			 } elseif($grooveshark != '') {
				 echo '<li><a href="'.$grooveshark.'" class="grooveshark" title="Grooveshark">Grooveshark</a></li>';
			 }
			 ?>

			 <?php if($soundcloud != '' && $target != ''){
				 echo '<li><a href="'.$soundcloud.'" class="soundcloud" title="Soundcloud" target="_blank">Soundcloud</a></li>';
			 } elseif($soundcloud != '') {
				 echo '<li><a href="'.$soundcloud.'" class="soundcloud" title="Soundcloud">Soundcloud</a></li>';
			 }
			 ?>

			 <?php if($foursquare != '' && $target != ''){
				 echo '<li><a href="'.$foursquare.'" class="foursquare" title="Foursquare" target="_blank">Foursquare</a></li>';
			 } elseif($foursquare != '') {
				 echo '<li><a href="'.$foursquare.'" class="foursquare" title="Foursquare">Foursquare</a></li>';
			 }
			 ?>

			 <?php if($github != '' && $target != ''){
				 echo '<li><a href="'.$github.'" class="github" title="GitHub" target="_blank">GitHub</a></li>';
			 } elseif($github != '') {
				 echo '<li><a href="'.$github.'" class="github" title="GitHub">GitHub</a></li>';
			 }
			 ?>

			 <?php if($linkedin != '' && $target != ''){
				 echo '<li><a href="'.$linkedin.'" class="linkedin" title="LinkedIn" target="_blank">LinkedIn</a></li>';
			 } elseif($linkedin != '') {
				 echo '<li><a href="'.$linkedin.'" class="linkedin" title="LinkedIn">LinkedIn</a></li>';
			 }
			 ?>

			 <?php if($xing != '' && $target != ''){
				 echo '<li><a href="'.$xing.'" class="xing" title="Xing" target="_blank">Xing</a></li>';
			 } elseif($xing != '') {
				 echo '<li><a href="'.$xing.'" class="xing" title="Xing">Xing</a></li>';
			 }
			 ?>

			 <?php if($wordpress != '' && $target != ''){
				 echo '<li><a href="'.$wordpress.'" class="wordpress" title="WordPress" target="_blank">WordPress</a></li>';
			 } elseif($wordpress != '') {
				 echo '<li><a href="'.$wordpress.'" class="wordpress" title="WordPress">WordPress</a></li>';
			 }
			 ?>

			 <?php if($tumblr != '' && $target != ''){
				 echo '<li><a href="'.$tumblr.'" class="tumblr" title="Tumblr" target="_blank">Tumblr</a></li>';
			 } elseif($tumblr != '') {
				 echo '<li><a href="'.$tumblr.'" class="tumblr" title="Tumblr">Tumblr</a></li>';
			 }
			 ?>

			 <?php if($rss != '' && $target != ''){
				 echo '<li><a href="'.$rss.'" class="rss" title="RSS Feed" target="_blank">RSS Feed</a></li>';
			 } elseif($rss != '') {
				 echo '<li><a href="'.$rss.'" class="rss" title="RSS Feed">RSS Feed</a></li>';
			 }
			 ?>

			 <?php if($rsscomments != '' && $target != ''){
				 echo '<li><a href="'.$rsscomments.'" class="rsscomments" title="RSS Comments" target="_blank">RSS Comments</a></li>';
			 } elseif($rsscomments != '') {
				 echo '<li><a href="'.$rsscomments.'" class="rsscomments" title="RSS Comments">RSS Comments</a></li>';
			 }
			 ?>

		 </ul><!-- end .sociallinks -->

			<?php
			echo $after_widget;
		}

		function update($new_instance, $old_instance) {
				return $new_instance;
		}

		function form($instance) {
		 $title = esc_attr($instance['title']);
		 $twitter = esc_attr($instance['twitter']);
		 $facebook = esc_attr($instance['facebook']);
		 $googleplus = esc_attr($instance['googleplus']);
		 $flickr = esc_attr($instance['flickr']);
		 $instagram = esc_attr($instance['instagram']);
		 $picasa = esc_attr($instance['picasa']);
		 $fivehundredpx = esc_attr($instance['fivehundredpx']);
		 $youtube = esc_attr($instance['youtube']);
		 $vimeo = esc_attr($instance['vimeo']);
		 $dribbble = esc_attr($instance['dribbble']);
		 $ffffound = esc_attr($instance['ffffound']);
		 $pinterest = esc_attr($instance['pinterest']);
		 $behance = esc_attr($instance['behance']);
		 $deviantart = esc_attr($instance['deviantart']);
		 $squidoo = esc_attr($instance['squidoo']);
		 $slideshare = esc_attr($instance['slideshare']);
		 $lastfm = esc_attr($instance['lastfm']);
		 $grooveshark = esc_attr($instance['grooveshark']);
		 $soundcloud = esc_attr($instance['soundcloud']);
		 $foursquare = esc_attr($instance['foursquare']);
		 $github = esc_attr($instance['github']);
		 $linkedin = esc_attr($instance['linkedin']);
		 $xing = esc_attr($instance['xing']);
		 $wordpress = esc_attr($instance['wordpress']);
		 $tumblr = esc_attr($instance['tumblr']);
		 $rss = esc_attr($instance['rss']);
		 $rsscomments = esc_attr($instance['rsscomments']);
		 $target = esc_attr($instance['target']);

		 ?>

			<p>
						 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $twitter; ?>" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $facebook; ?>" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('googleplus'); ?>"><?php _e('Google+ URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('googleplus'); ?>" value="<?php echo $googleplus; ?>" class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('flickr'); ?>" value="<?php echo $flickr; ?>" class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" />
				 </p>

			<p>
						 <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo $instagram; ?>" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('picasa'); ?>"><?php _e('Picasa URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('picasa'); ?>" value="<?php echo $picasa; ?>" class="widefat" id="<?php echo $this->get_field_id('picasa'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('fivehundredpx'); ?>"><?php _e('500px URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('fivehundredpx'); ?>" value="<?php echo $fivehundredpx; ?>" class="widefat" id="<?php echo $this->get_field_id('fivehundredpx'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('youtube'); ?>" value="<?php echo $youtube; ?>" class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php _e('Vimeo URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('vimeo'); ?>" value="<?php echo $vimeo; ?>" class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e('Dribbble URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('dribbble'); ?>" value="<?php echo $dribbble; ?>" class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('ffffound'); ?>"><?php _e('Ffffound URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('ffffound'); ?>" value="<?php echo $ffffound; ?>" class="widefat" id="<?php echo $this->get_field_id('ffffound'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php echo $pinterest; ?>" class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('behance'); ?>"><?php _e('Behance Network URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('behance'); ?>" value="<?php echo $behance; ?>" class="widefat" id="<?php echo $this->get_field_id('behance'); ?>" />
				 </p>

			<p>
						 <label for="<?php echo $this->get_field_id('deviantart'); ?>"><?php _e('deviantART URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('deviantart'); ?>" value="<?php echo $deviantart; ?>" class="widefat" id="<?php echo $this->get_field_id('deviantart'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('squidoo'); ?>"><?php _e('Squidoo URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('squidoo'); ?>" value="<?php echo $squidoo; ?>" class="widefat" id="<?php echo $this->get_field_id('squidoo'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('slideshare'); ?>"><?php _e('Slideshare URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('slideshare'); ?>" value="<?php echo $slideshare; ?>" class="widefat" id="<?php echo $this->get_field_id('slideshare'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('lastfm'); ?>"><?php _e('Last.fm URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('lastfm'); ?>" value="<?php echo $lastfm; ?>" class="widefat" id="<?php echo $this->get_field_id('lastfm'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('grooveshark'); ?>"><?php _e('Grooveshark URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('grooveshark'); ?>" value="<?php echo $grooveshark; ?>" class="widefat" id="<?php echo $this->get_field_id('grooveshark'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('soundcloud'); ?>"><?php _e('Soundcloud URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('soundcloud'); ?>" value="<?php echo $soundcloud; ?>" class="widefat" id="<?php echo $this->get_field_id('soundcloud'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('foursquare'); ?>"><?php _e('Foursquare URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('foursquare'); ?>" value="<?php echo $foursquare; ?>" class="widefat" id="<?php echo $this->get_field_id('foursquare'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('github'); ?>"><?php _e('GitHub URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('github'); ?>" value="<?php echo $github; ?>" class="widefat" id="<?php echo $this->get_field_id('github'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $linkedin; ?>" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('xing'); ?>"><?php _e('Xing URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('xing'); ?>" value="<?php echo $xing; ?>" class="widefat" id="<?php echo $this->get_field_id('xing'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('wordpress'); ?>"><?php _e('WordPress URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('wordpress'); ?>" value="<?php echo $wordpress; ?>" class="widefat" id="<?php echo $this->get_field_id('wordpress'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php _e('Tumblr URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('tumblr'); ?>" value="<?php echo $tumblr; ?>" class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS-Feed URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('rss'); ?>" value="<?php echo $rss; ?>" class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" />
				 </p>

		 <p>
						 <label for="<?php echo $this->get_field_id('rsscomments'); ?>"><?php _e('RSS for Comments URL:','baylys'); ?></label>
						 <input type="text" name="<?php echo $this->get_field_name('rsscomments'); ?>" value="<?php echo $rsscomments; ?>" class="widefat" id="<?php echo $this->get_field_id('rsscomments'); ?>" />
				 </p>

		 <p>
			 <input class="checkbox" type="checkbox" <?php checked( $instance['target'], true ); ?> id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" <?php checked( $target, 'on' ); ?>> <?php _e('Open all links in a new browser tab', 'baylys'); ?></input>
		 </p>

		 <?php
	 }
 }

 register_widget('baylys_sociallinks');
