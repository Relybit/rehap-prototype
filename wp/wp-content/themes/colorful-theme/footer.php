<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 global $post;
 $post_id = null;
 if($post) $post_id = $post->ID;
 $theme_options = get_theme_options();
 $footer_target = get_field('footer_target', $post_id) ? get_field('footer_target', $post_id) : 'blank';
 $footer_target = '_'.$footer_target;
?>
	</div><!-- #main .wrapper -->

<?php if( get_field('footer_enable', $post_id) != 'off' ) : ?>
<?php if( get_field('footer_enable', $post_id) != 'sp' || wp_is_mobile() ) : ?>
<?php if( get_field('footer_code', $post_id) ) : ?>
<div class="btn-footer <?php echo get_field('footer_position', $post_id); ?>">
<?php echo get_field('footer_code', $post_id); ?>
</div>
<?php elseif( get_field('footer_image', $post_id) ) : ?>
<?php $footer_image = wp_get_attachment_image_src( get_field('footer_image', $post_id), 'full' ); ?>
<div class="btn-footer <?php echo get_field('footer_position', $post_id); ?>">
<a href="<?php echo get_field('footer_url', $post_id); ?>" target="<?php echo $footer_target; ?>"><img src="<?php echo $footer_image[0]; ?>" width="<?php echo $footer_image[1]; ?>" height="<?php echo $footer_image[2]; ?>" alt="<?php echo get_field('footer_text', $post_id); ?>"></a>
</div>
<?php elseif( get_field('footer_text', $post_id) ) : ?>
<div class="btn-footer <?php echo get_field('footer_position', $post_id); ?>">
<p class="<?php echo get_field('footer_class', $post_id); ?>"><a href="<?php echo get_field('footer_url', $post_id); ?>" target="<?php echo $footer_target; ?>"><?php echo get_field('footer_text', $post_id); ?></a></p>
</div>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>

</div><!-- #page -->
</div><!-- /.overflow-none -->

<?php if( is_home() || is_singular('post') || is_archive() || is_search() ) : ?>
	<?php if( $theme_options['footer_content'] > 0 ) : ?>
	<footer id="footer">
	<?php
	  $post = get_post($theme_options['footer_content']);
	  setup_postdata($post);
	?>
	<iframe src="<?php the_permalink(); ?>" width="100%" scrolling="no" frameBorder="0"></iframe>
	<?php wp_reset_postdata(); ?>
	</footer><!-- #footer -->
	<?php endif; ?>

	<?php if( $theme_options['footer_content'] == -1 ) : ?>
	<footer id="footer" class="widget-template clear">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?><div class="widget-area"><?php dynamic_sidebar( 'footer-1' ); ?></div><?php endif; ?>
		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?><div class="widget-area"><?php dynamic_sidebar( 'footer-2' ); ?></div><?php endif; ?>
		<?php if ( is_active_sidebar( 'footer-3' ) ) : ?><div class="widget-area"><?php dynamic_sidebar( 'footer-3' ); ?></div><?php endif; ?>
	</footer><!-- #footer -->
	<?php endif; ?>
<?php elseif( is_page() ) : ?>
	<?php if( (get_field('entire_hf_enable', $post_id) === 'on' || $theme_options['all_enable'] === 'on') && $theme_options['footer_content'] > 0 ) : ?>
	<footer id="footer">
	<?php
	  $post = get_post($theme_options['footer_content']);
	  setup_postdata($post);
	?>
	<iframe src="<?php the_permalink(); ?>" width="100%" scrolling="no" frameBorder="0"></iframe>
	<?php wp_reset_postdata(); ?>
	</footer><!-- #footer -->
	<?php endif; ?>

	<?php if( (get_field('entire_hf_enable', $post_id) === 'on' || $theme_options['all_enable'] === 'on') && $theme_options['footer_content'] == -1 ) : ?>
	<footer id="footer" class="widget-template clear">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?><div class="widget-area"><?php dynamic_sidebar( 'footer-1' ); ?></div><?php endif; ?>
		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?><div class="widget-area"><?php dynamic_sidebar( 'footer-2' ); ?></div><?php endif; ?>
		<?php if ( is_active_sidebar( 'footer-3' ) ) : ?><div class="widget-area"><?php dynamic_sidebar( 'footer-3' ); ?></div><?php endif; ?>
	</footer><!-- #footer -->
	<?php endif; ?>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>