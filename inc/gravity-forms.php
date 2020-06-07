<?php

function pxl_gravity_forms_class($classes, $field, $form)
{
    $classes .= ' size-' . $field->size;
    if ($field->type !== 'honeypot') {
        $classes .= ' type-' . $field->type;
    } else {
        $classes = str_replace('gform_validation_container', '', $classes);
        $classes .= ' type-honeybadger';
    }

    return $classes;
}
add_filter('gform_field_css_class', 'pxl_gravity_forms_class', 10, 3);


function pxl_gform_form_settings($settings, $form)
{
    $checked = rgar($form, 'clear_button');
    if ($checked === 'yes') {
        $selected = 'checked';
    }

    $settings[__('Form Options', 'gravityforms')]['clear_button'] = '
        <tr>
            <th><label for="clear_button">Display reset form button</label></th>
            <td>
                <input type="checkbox" value="yes" name="clear_button" id="clear_button" '.$selected.'>
            </td>
        </tr>';

    return $settings;
}
add_filter('gform_form_settings', 'pxl_gform_form_settings', 10, 2);

function pxl_gform_pre_form_settings_save($form)
{
    $form['clear_button'] = rgpost('clear_button');
    return $form;
}
add_filter('gform_pre_form_settings_save', 'pxl_gform_pre_form_settings_save');

function pxl_gform_submit_button($button, $form)
{
    $startPosition = strpos($button, "value='");
    $endPosition = strpos($button, "'", $startPosition + 8);

    $buttonValue = substr($button, $startPosition + 7, $endPosition - $startPosition - 7);

    $button = str_replace('<input', '<button ', $button);

    $prefix = '';
    if ($form['clear_button'] === 'yes') {
        $prefix = '<button type="button" data-js="reset-form">Clear</button>';
    }

    return $prefix . $button . $buttonValue . '</button>';
}
add_filter('gform_submit_button', 'pxl_gform_submit_button', 10, 2);

function pxl_alter_form_output($field_content, $field)
{
    $fieldsets = [
        'radio',
        'checkbox',
        'address',
        'name',
        'time',
        'consent',
        'shipping',
    ];
    if (in_array($field->type, $fieldsets)) {
        $dom = new DOMDocument;
        $dom->loadHTML($field_content);

        $labels = $dom->getElementsByTagName('label');
        for ($i = 0; $i < $labels->length; $i++) {
            if (strpos($labels->item($i)->getAttribute('class'), 'gfield_label') !== false) {
                $label = $labels->item($i)->textContent;
                $legend = $dom->createElement('legend');
                $legend->nodeValue = $label;

                $labels->item($i)->parentNode->replaceChild($legend, $labels->item($i));
            }
        }

        $field_content = $dom->saveHTML();

        $html = '<fieldset>';
        $html .= $field_content;
        $html .= '</fieldset>';

        $field_content = $html;
    }

    if ('product' == $field->type) {
        // span.ginput_quantity_label

        $dom = new DOMDocument;
        $dom->loadHTML($field_content);

        $singleProduct = false;
        $divs = $dom->getElementsByTagName('div');


        for ($i = 0; $i < $divs->length; $i++) {
            if (strpos($divs->item($i)->getAttribute('class'), 'ginput_container_singleproduct') !== false) {
                $singleProduct = true;
                break;
            }
            if (strpos($divs->item($i)->getAttribute('class'), 'ginput_container_product_calculation') !== false) {
                $singleProduct = true;
                break;
            }
            if (strpos($divs->item($i)->getAttribute('class'), 'ginput_container_radio') !== false) {
                $singleProduct = true;
                break;
            }
            //ginput_container_radio
        }
        if ($singleProduct) {

            $labels = $dom->getElementsByTagName('label');
            for ($i = 0; $i < $labels->length; $i++) {
                if (strpos($labels->item($i)->getAttribute('class'), 'gfield_label') !== false) {
                    $label = $labels->item($i)->textContent;
                    $legend = $dom->createElement('legend');
                    $legend->nodeValue = $label;

                    $labels->item($i)->parentNode->replaceChild($legend, $labels->item($i));
                }
            }

            $quantityInput = false;
            $inputs = $dom->getElementsByTagName('input');
            for ($i = 0; $i < $inputs->length; $i++) {
                if (strpos($inputs->item($i)->getAttribute('class'), 'ginput_quantity') !== false) {
                    $quantityInput = $inputs->item($i)->getAttribute('id');
                    break;
                }
            }

            if ($quantityInput) {
                $spans = $dom->getElementsByTagName('span');
                for ($i = 0; $i < $spans->length; $i++) {
                    if (strpos($spans->item($i)->getAttribute('class'), 'ginput_quantity_label') !== false) {
                        $label = $dom->createElement('label');
                        $label->setAttribute('class', $spans->item($i)->getAttribute('class'));
                        $label->setAttribute('style', $spans->item($i)->getAttribute('style'));
                        $label->setAttribute('for', $quantityInput);
                        $label->nodeValue = $spans->item($i)->textContent;
                        $spans->item($i)->parentNode->replaceChild($label, $spans->item($i));
                        break;
                    }
                }
            }

            $field_content = $dom->saveHTML();

            $html = '<fieldset>';
            $html .= $field_content;
            $html .= '</fieldset>';

            $field_content = $html;
        }
    }

    if ('fileupload' == $field->type) {
        $dom = new DOMDocument;
        $dom->loadHTML($field_content);
        $inputs = $dom->getElementsByTagName('input');
        for ($i = 0; $i < $inputs->length; $i++) {
            if ($inputs->item($i)->getAttribute('type') == 'file') {
                $aria = explode(' ', $inputs->item($i)->getAttribute('aria-describedby'));
                $parent = $inputs->item($i)->parentNode;
                $div = $dom->createElement('div');
                $div->setAttribute('id', $aria[0]);
                $parent->appendChild($div);
            }
        }
        $field_content = $dom->saveHTML();
    }

    if ('list' === $field->type) {
        $dom = new DOMDocument;
        $dom->loadHTML($field_content);

        $listItems = $dom->getElementsByTagName('img');
        for ($i = 0; $i < $listItems->length; $i++) {
            $title = $listItems->item($i)->getAttribute('title');
            if ($title == esc_attr__('Add a new row', 'gravityforms')) {
                $listItems->item($i)->setAttribute('alt', $title);
                $listItems->item($i)->removeAttribute('title');
            } else if ($title == esc_attr__('Remove this row', 'gravityforms')) {
                $listItems->item($i)->setAttribute('alt', $title);
                $listItems->item($i)->removeAttribute('title');
            }
        }

        $labels = $dom->getElementsByTagName('label');
        for ($i = 0; $i < $labels->length; $i++) {
            if (strpos($labels->item($i)->getAttribute('class'), 'gfield_label') !== false) {
                $label = $labels->item($i)->textContent;
                $legend = $dom->createElement('legend');
                $legend->nodeValue = $label;

                $labels->item($i)->parentNode->replaceChild($legend, $labels->item($i));
            }
        }

        $field_content = $dom->saveHTML();

        $html = '<fieldset>';
        $html .= $field_content;
        $html .= '</fieldset>';

        $field_content = $html;
    }

    if ('time' === $field->type) {
        $field_content = str_replace('<i>:</i>', '<span>:</span>', $field_content);
    }

    return $field_content;
}
add_action('gform_field_content', 'pxl_alter_form_output', 10, 2);