<?php
/**
 * The template for the blog posts index page.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Graphy
 */

get_header(); ?>

	<div id="primary" <?php $page = $_SERVER["REQUEST_URI"]; if ($page != '/'){echo('class="content-area no-sidebar" style="width:100%;"');}else{echo('class="content-area"');}?> >
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post();
				get_template_part( 'content', get_theme_mod( 'graphy_content' ) );
			endwhile; ?>

			<?php
			the_posts_pagination( array(
				'prev_text' => esc_html__( '&laquo; Previous', 'graphy' ),
				'next_text' => esc_html__( 'Next &raquo;', 'graphy' ),
			) );
			?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
$page = $_SERVER["REQUEST_URI"];
if ($page == '/')
{get_sidebar();} ?>
<?php get_footer(); ?>
