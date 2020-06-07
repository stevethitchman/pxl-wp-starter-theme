<?php get_header(); ?>

	<div class="row">
		<div class="large-9 medium-9 columns">
			<header class="page_header">
				<h1><?php the_archive_title(); ?></h1>
				<div class="archive_description">
					<?php the_archive_description(); ?>
				</div>
			</header>

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
