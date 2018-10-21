<?php

/**
 * @file
 * Template to display a views wrapped rows.
 *
 * @ingroup views_templates
 */

?>

<div class="views-rows-wrapper">
  <?php
  foreach ($rows_wrapped as $row) {
    print $row;
  }
  ?>
</div>
