<?php

// Creating the widget
class PXL_CopyrightWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'pxl_copyright_widget',
            'Copyright',
            ['description' => 'Copyright notice, use (Y) for the year.']
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $copyrightNotice = '&copy; Copyright '. date('Y');
        if (isset($instance['copyright_notice']) && $instance['copyright_notice'] != '') {
            $copyrightNotice = str_replace('(Y)', date('Y'), $instance['copyright_notice']);
        }
        echo '<p>'. $copyrightNotice .'</p>';

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $copyright_notice = '';
        if (isset($instance['copyright_notice'])) {
            $copyright_notice = $instance['copyright_notice'];
        }
        ?>
        <p>
            <label for="<?= $this->get_field_id('copyright_notice'); ?>"><?php _e('Copyright notice:'); ?></label>
            <textarea class="widefat" id="<?= $this->get_field_id('copyright_notice'); ?>" name="<?= $this->get_field_name('copyright_notice'); ?>"><?= esc_attr($copyright_notice); ?></textarea>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['copyright_notice'] = (!empty($new_instance['copyright_notice'])) ? strip_tags($new_instance['copyright_notice']) : '';

        return $instance;
    }
}
