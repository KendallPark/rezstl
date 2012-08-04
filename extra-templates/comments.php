<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to rezSTL_comment which is
 * located in the /includes/theme-setup.php file.
 *
 * @package WordPress
 * @subpackage #rezSTL
 */
?>

<?php if ( post_password_required() ) : ?>
		<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'rezSTL' ); ?></p>
<?php
	return;
	endif;
?>

<?php if ( have_comments() ) : ?>
			<!-- *The following h3 id is left intact so that comments can be referenced on the page -->
			<h3 id="comments-title"><?php
			printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'rezSTL' ),
			number_format_i18n( get_comments_number() ), '' . get_the_title() . '' );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<?php previous_comments_link( __( '&larr; Older Comments', 'rezSTL' ) ); ?>
				<?php next_comments_link( __( 'Newer Comments &rarr;', 'rezSTL' ) ); ?>
<?php endif; // check for comment navigation ?>

			<ol>
				<?php
					/* 
					 * Loop through and list the comments. Tell wp_list_comments()
					 * to use rezSTL_comment() to format the comments.
					 * See rezSTL_comment() in /includes/theme-setup.php for more.
					 *
					 */
					wp_list_comments( array( 'callback' => 'rezSTL_comment' ) );
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<?php previous_comments_link( __( '&larr; Older Comments', 'rezSTL' ) ); ?>
				<?php next_comments_link( __( 'Newer Comments &rarr;', 'rezSTL' ) ); ?>
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	if ( ! comments_open() ) :
?>
	<p><?php _e( 'Comments are closed.', 'rezSTL' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>