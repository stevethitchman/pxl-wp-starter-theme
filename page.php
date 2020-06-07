<?php get_header(); ?>

	<div class="row">
		<div class="large-12 medium-12 columns">
			<main>
                <h1><?php the_title(); ?></h1>
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
		<?php //get_sidebar(); ?>
	</div>

<?php get_footer();
