<?php

/**
 * @file
 * Contains views_plugin_style_rows_wrapper.
 */

/**
 * Defines a style plugin that wraps rows inside view.
 *
 * @ingroup views_style_plugins
 */

class views_rows_wrapper_plugin_style_rows_wrapper extends views_plugin_style {

  /**
   * Overrides views_plugin_style::options_definition().
   */
  function option_definition() {
    $options = parent::option_definition();
    $options['use_wrapper'] = array('default' => 1);
    $options['element_type'] = array('default' => 0);
    $options['attribute_type'] = array('default' => 0);
    $options['attribute_name'] = array('default' => '');
    $options['rows_number'] = array('default' => 2);
    $options['wrap_method'] = array('default' => 0);
    $options['default_rows'] = array('default' => 1);
    $options['strip_rows'] = array('default' => 1);
    return $options;
  }

  /**
   * Overrides views_plugin_style::options_form().
   */
  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
    $element_types = views_rows_wrapper_element_types();
    $attribute_types = views_rows_wrapper_attribute_types();
    $form['use_wrapper'] = array(
      '#type' => 'checkbox',
      '#title' => t('Use this rows wrapper'),
      '#default_value' => $this->options['use_wrapper'],
      '#description' => t('Check if you want to use this plugin.'),
    );
    $form['element_type'] = array(
      '#type' => 'select',
      '#title' => t('Element type'),
      '#options' =>  $element_types,
      '#default_value' => $this->options['element_type'],
      '#description' => t('Select element type.'),
    );
    $form['attribute_type'] = array(
      '#type' => 'select',
      '#title' => t('Attribute type'),
      '#options' => $attribute_types,
      '#default_value' => $this->options['attribute_type'],
      '#description' => t('Select attribute type.'),
    );
    $form['attribute_name'] = array(
      '#title' => t('Class/ID attribute name(s)'),
      '#type' => 'textfield',
      '#default_value' => $this->options['attribute_name'],
    );
    $form['rows_number'] = array(
      '#title' => t('Number of rows to wrap'),
      '#type' => 'textfield',
      '#attributes' => array(
        ' type' => 'number',
        'min' => 1,
      ),
      '#default_value' => $this->options['rows_number'],
      '#description' => t('Choose the number of rows to be wrapped by selected element.'),
    );
    $form['wrap_method'] = array(
      '#type' => 'radios',
      '#title' => t('Wrap method'),
      '#default_value' => $this->options['wrap_method'],
      '#options' => array(0 => t('Apply to all items'), 1 => t('Wrap once (first rows only)')),
      '#description' => t('Select the method of how you want to wrap your view results.'),
    );
    $form['default_rows'] = array(
      '#type' => 'checkbox',
      '#title' => t('Add views row classes'),
      '#default_value' => $this->options['default_rows'],
      '#description' => t('Add the default row classes like views-row-1 to the output. You can use this to quickly reduce the amount of markup the view provides by default, at the cost of making it more difficult to apply CSS.'),
    );
    $form['strip_rows'] = array(
      '#type' => 'checkbox',
      '#title' => t('Add striping (odd/even), first/last row classes'),
      '#default_value' => $this->options['strip_rows'],
      '#description' => t('Add css classes to the first and last line, as well as odd/even classes for striping.'),
    );
  }

}
