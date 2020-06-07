<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page_header">
		<h1><?php _e('Nothing found', 'pxl'); ?></h1>
	</header>
	<div class="post_content">
		<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pxl'); ?></p>
		<?php get_search_form(); ?>
	</div>
</article>