<?php get_header(); ?>

	<div class="row">
		<div class="large-9 medium-9 columns">
			<main>
				<?php
				if (have_posts()) {
					while (have_posts()) {
						the_post();

						get_template_part('template-parts/post/content', get_post_format());

						if (comments_open() || get_comments_number()) {
							comments_template();
						}
					}

					the_posts_pagination(pxl_get_post_pagination_settings());
				} else {
					get_template_part('template-parts/post/content', 'none');
				}
				?>
			</main>
		</div>
		<?php get_sidebar(); ?>
	</div>

<?php get_footer();
