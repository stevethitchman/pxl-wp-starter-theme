<?php get_header(); ?>

<div class="row">
	<div class="large-9 medium-9 columns">
		<?php if (is_home() && !is_front_page()): ?>
			<header class="page_header">
				<h1><?php single_post_title(); ?></h1>
			</header>
		<?php else: ?>
			<header class="page_header">
				<h1><?php _e('Posts', 'pxl'); ?></h1>
			</header>
		<?php endif; ?>

		<main>
			<?php
				if (have_posts()) {
					while (have_posts()) {
						the_post();

						get_template_part('template-parts/post/content', get_post_format());
					}

					the_posts_pagination();
				} else {
					get_template_part('template-parts/post/content', 'none');
				}
			?>
		</main>
	</div>
	<?php get_sidebar(); ?>
</div>

<?php get_footer();
