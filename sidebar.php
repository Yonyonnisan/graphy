<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Graphy
 */
//$page = $_SERVER["REQUEST_URI"];
if (   ! is_active_sidebar( 'sidebar' ) /*|| $page!='/'*/) {
	return;
}
?>

<div id="secondary" class="sidebar-area" role="complementary" <?php $page = $_SERVER["REQUEST_URI"]; if ($page != '/'){echo('style="display:none;"');}?>>
	<?php /*echo $page;*/ if ( is_active_sidebar( 'sidebar' ) /*&& $page=='/'*/) : ?>
	<div class="normal-sidebar widget-area">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div><!-- .normal-sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->
