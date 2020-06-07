<?php

// Creating the widget
class PXL_LogoWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'pxl_logo_widget',
            'Logos',
            ['description' => 'Repeated logo widget']
        );
    }

    public function widget($args, $instance)
    {
        $widget_id = $args['widget_id'];

        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $columns = get_field('columns', 'widget_'. $widget_id);
        $logos = get_field('logos', 'widget_'. $widget_id);
        if (!empty($logos)):
        ?>
            <div class="logo_widget logo_widget--<?= $columns; ?>">
                <?php foreach ($logos as $logo): ?>
                    <div>
                        <?php if (!empty($logo['link'])): ?>
                            <a href="<?= $logo['link']['url']; ?>" title="<?= $logo['link']['title']; ?>" target="<?= $logo['link']['target'] == '' ? '_self' : $logo['link']['target']; ?>">
                        <?php endif; ?>
                            <?= wp_get_attachment_image($logo['logo'], 'full'); ?>
                        <?php if (!empty($logo['link'])): ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php
        endif;
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = '';
        if (isset($instance['title'])) {
            $title = $instance['title'];
        }
        ?>
        <p>
            <label for="<?= $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" value="<?= esc_attr($title); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }
}
