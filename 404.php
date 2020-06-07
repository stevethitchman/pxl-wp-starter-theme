<?php get_header(); ?>

	<div class="row">
		<div class="large-9 medium-9 columns">
			<main>
				<section>
					<header class="page_header">
						<h1><?php _e('Page not found!', 'pxl'); ?></h1>
					</header>
					<div class="post_content">
						<p>
							It looks like what you were trying to find doesn't exist, why not try the search?
						</p>

						<?php get_search_form(); ?>
					</div>
				</section>
			</main>
		</div>
		<?php get_sidebar(); ?>
	</div>

<?php get_footer();
