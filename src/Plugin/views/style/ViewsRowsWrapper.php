<?php

namespace Drupal\views_rows_wrapper\Plugin\views\style;

use Drupal\views_rows_wrapper\ViewsRowsWrapperTypes;
use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * A Views style that renders markup for Bootstrap tabs.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "rows_wrapper",
 *   title = @Translation("Rows Wrapper"),
 *   help = @Translation("Views Rows Wrapper display plugin."),
 *   theme = "views_rows_wrapper",
 *   display_types = {"normal"}
 * )
 */
class ViewsRowsWrapper extends StylePluginBase {

  /**
   * Does this Style plugin allow Row plugins?
   *
   * @var bool
   */
  protected $usesRowPlugin = TRUE;

  /**
   * Does the Style plugin support grouping of rows?
   *
   * @var bool
   */
  protected $usesGrouping = FALSE;

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['use_wrapper'] = array('default' => TRUE);
    $options['element_type'] = array('default' => 0);
    $options['element_types'] = array('default' => ViewsRowsWrapperTypes::element_types());
    $options['attribute_type'] = array('default' => 0);
    $options['attribute_types'] = array('default' => ViewsRowsWrapperTypes::attribute_types());
    $options['attribute_name'] = array('default' => '');
    $options['rows_number'] = array('default' => 2);
    $options['wrap_method'] = array('default' => 0);
    $options['default_rows'] = array('default' => FALSE);
    $options['strip_rows'] = array('default' => FALSE);
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    $form['use_wrapper'] = array(
      '#type' => 'checkbox',
      '#title' => t('Use this row wrapper'),
      '#default_value' => $this->options['use_wrapper'],
      '#description' => t('Check if you want to use this plugin.'),
    );
    $form['element_type'] = array(
      '#type' => 'select',
      '#title' => t('Element type'),
      '#options' =>  $this->options['element_types'],
      '#default_value' => $this->options['element_type'],
      '#description' => t('Select element type.'),
    );
    $form['attribute_type'] = array(
      '#type' => 'select',
      '#title' => t('Attribute type'),
      '#options' => $this->options['attribute_types'],
      '#default_value' => $this->options['attribute_type'],
      '#description' => t('Select attribute type.'),
    );
    $form['attribute_name'] = array(
      '#title' => t('Class/ID attribute name(s)'),
      '#type' => 'textfield',
      '#default_value' => $this->options['attribute_name'],
    );
    $rows_num = array( 0 => t('Each'));
    $k=1;
    while ($k<50) {
      $rows_num[$k]=$k+1;
      $k++;
    }
    $form['rows_number'] = array(
      '#type' => 'select',
      '#title' => t('Number of rows to wrap'),
      '#options' => $rows_num,
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
