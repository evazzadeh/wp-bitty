<?php
/**
 * @package fabthemes
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
	$thumb = get_post_thumbnail_id();
	$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
	$image = aq_resize( $img_url, 960, 460, true,true,true ); //resize & crop the image
	?>
	<?php if($image) : ?>
		<a href="<?php the_permalink();?>"> <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /> </a>
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<span> <?php echo _e( 'Posted by', 'fabthemes' ); ?> <?php the_author(); ?> </span>
			<span> / </span>
			<span> <?php the_category(', '); ?></span>
			<span> / </span>
			<span> <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> </span>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'fabthemes' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php the_tags(); ?>
		<?php fabthemes_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
