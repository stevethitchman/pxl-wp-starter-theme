<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page_header">
		<?php
			if (is_single()) {
				the_title('<h1>', '</h1>');
			} else {
				the_title('<h2><a href="'. esc_url(get_permalink()) .'" rel="bookmark">', '</a></h2>');
			}
		?>
	</header>
	<?php if (get_the_post_thumbnail() !== '' && !is_single()): ?>
		<div class="post_thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
	<?php endif; ?>
	<div class="post_content">
		<?php the_content(sprintf(__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'pxl'), get_the_title())); ?>

		<?php wp_link_pages(pxl_get_page_link_settings()); ?>

        <?php
            if (is_single()) {
                the_tags();
            }
        ?>
	</div>
</article>