<?php
/**
 * The template for displaying all pages.
 *
 * @package Graphy
 */

get_header(); ?>

	<div id="primary"<?php $page = $_SERVER["REQUEST_URI"]; if ($page != '/'){echo('class="content-area no-sidebar" style="width:100%;"');}else{echo('class="content-area"');}?>>
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
$page = $_SERVER["REQUEST_URI"];
if ($page == '/')
{get_sidebar();} ?>
<?php get_footer(); ?>
