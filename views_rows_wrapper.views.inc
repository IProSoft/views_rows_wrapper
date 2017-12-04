<?php

/**
 * Implementation of hook_views_plugins().
 */
function views_rows_wrapper_views_plugins() {
  return array(
    'module' => 'views_rows_wrapper',
    'style' => array(
      'rows_wrapper' => array(
        'title' => t('Rows wrapper'),
        'handler' => 'views_rows_wrapper_plugin_style_rows_wrapper',
        'path' => drupal_get_path('module', 'views_rows_wrapper'),
        'theme' => 'views_rows_wrapper',
        'js' => array(),
        'type' => 'normal',
        'uses row plugin' => TRUE,
        'uses fields' => TRUE,
        'uses options' => TRUE,
        'uses grouping' => FALSE,
        'even empty' => FALSE,
      ),
    ),
  );
}

