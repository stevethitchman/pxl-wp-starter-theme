<?php if (post_password_required()) { return; } ?>
<div id="comments" class="comments_wrapper">
	<?php if (have_comments()): ?>
		<h2 class="comments_title">
			<?php
				$comments_count = get_comments_number();
				if ($comments_count === '1') {
					printf(_x('One reply to &ldquo;%s&rdquo;', 'comments title', 'pxl'), get_the_title());
				} else {
					printf(_nx('%1$s Reply to &ldquo;%2$s&rdquo;','%1$s Replies to &ldquo;%2$s&rdquo;', $comments_count, 'comments title', 'pxl'),
						number_format_i18n($comments_count), get_the_title());
				}
			?>
		</h2>
		<ol class="comments_list">
			<?php wp_list_comments(pxl_get_comment_list_settings()); ?>
		</ol>

		<?php the_comments_pagination(pxl_get_comment_pagination_settings()); ?>
	<?php endif; ?>

	<?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')): ?>
		<p class="no_comments"><?php _e('Comments are closed', 'pxl'); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>