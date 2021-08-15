<?php
/**
 * The template for displaying Comments.
 *
 * @package Baylys
 * @since Baylys 1.0
 */
?>

	<div id="comments">
		<?php if ( post_password_required() ) : ?>
		<div class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'baylys' ); ?></div>
	</div><!-- end #comments -->

	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 id="comments-title">
			<?php
				printf( _n( '1 comment', '%1$s comments', get_comments_number(), 'baylys' ),
					number_format_i18n( get_comments_number() ) );
			?>
			<span><a href="#reply-title"><?php _e( 'Write a comment', 'baylys' ); ?></a></span>
		</h3>
			<ol class="commentlist">
				<?php
					wp_list_comments( array(
						'avatar_size' => 60,
						'style'       => 'li',
						'short_ping'  => true,
						'format'      => 'html5',
						'callback'    => 'baylys_comments_callback',
					) );
				?>
			</ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr;  Older Comments', 'baylys' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments  &rarr;', 'baylys' ) ); ?></div>
		</nav><!-- end #comment-nav -->
		<?php endif; // check for comment navigation ?>

		<?php else : // this is displayed if there are no comments so far ?>

		<?php if ( comments_open() ) : // If comments are open, but there are no comments ?>

		<?php endif; ?>

	<?php endif; ?>

	<?php comment_form (); ?>
	</div><!-- end #comments -->
