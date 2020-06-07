<?php get_header(); ?>

	<div class="row">
		<div class="large-9 medium-9 columns">
			<main>
				<?php
				if (have_posts()) {
					while (have_posts()) {
						the_post();

						get_template_part('template-parts/post/content', 'page');

						if (comments_open() || get_comments_number()) {
							comments_template();
						}
					}

				}
				?>
			</main>
		</div>
		<?php get_sidebar(); ?>
	</div>

<?php get_footer();
