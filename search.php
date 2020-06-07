<?php get_header(); ?>

	<div class="row">
		<div class="large-9 medium-9 columns">
			<header class="page_header">
				<?php if (have_posts()): ?>
					<h1><?php printf(__('Search results for: %s', 'pxl'), '<span>'. get_search_query() .'</span>'); ?></h1>
				<?php else: ?>
					<h1><?php _e('Nothing found', 'pxl'); ?></h1>
				<?php endif; ?>
			</header>
			<main>
				<?php
					if (have_posts()) {
						while (have_posts()) {
							the_post();

							get_template_part('template-parts/post/content', 'excerpt');
						}

						the_posts_pagination(pxl_get_post_pagination_settings());
					} else {
						?>
							<p><?php _e('Sorry, but nothing matched your search terms. Please try again.', 'pxl'); ?></p>
						<?php
						get_search_form();
					}
				?>
			</main>
		</div>
		<?php get_sidebar(); ?>
	</div>

<?php get_footer();