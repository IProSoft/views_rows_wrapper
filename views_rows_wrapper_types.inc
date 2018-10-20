<?php

/**
 * @file
 * Views Rows Wrapper helper class.
 */

namespace Drupal\views_rows_wrapper;

class ViewsRowsWrapperTypes {

  /**
   * Returns wrapper element types()
   */
  public static function element_types() {
    return ["DIV", "SPAN"];
  }

  /**
   * Returns wrapper attribute types()
   */
  public static function attribute_types() {
    return ["CLASS", "ID"];
  }

}
