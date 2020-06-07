<?php $unique_id = esc_attr(uniqid('search-form-')); ?>
<form role="search" method="get" class="search_form" action="<?php echo esc_url(home_url('/')); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'pxl'); ?></span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'pxl'); ?>" value="<?php echo get_search_query(); ?>" name="s"/>
	<button type="submit"><?php echo _x('Search', 'submit button', 'pxl'); ?></button>
</form>