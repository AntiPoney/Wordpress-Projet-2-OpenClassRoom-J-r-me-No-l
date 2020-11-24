<?php
/**
 * The template for displaying Archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Catch Themes
 * @subpackage Catch Adaptive
 * @since Catch Adaptive 0.1
 */

get_header(); ?>

	<section id="primary" class="content-area">

		<?php if ( have_posts() ) :
			$options = catchadaptive_get_theme_options();
			if ( ( is_archive() || is_home() ) && 'columns-layout' == $options['content_layout'] ) {
				echo '<div class="columns-header-wrap displaynone">';
					catchadaptive_archive_page_header();
				echo '</div><!-- .columns-header-wrap -->';
				echo '<main id="main" class="site-main" role="main">';
			} 
			else {
				echo '<main id="main" class="site-main" role="main">';
				catchadaptive_archive_page_header();
			}
			?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php catchadaptive_content_nav( 'nav-below' ); ?>

		<?php else : ?>
			<main id="main" class="site-main" role="main">

				<?php get_template_part( 'content', 'none' ); ?>

			</main><!-- #main -->

		<?php endif; ?>

	
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>