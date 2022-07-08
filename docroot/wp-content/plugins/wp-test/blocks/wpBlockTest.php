<?php
  /**
   * This file responsible to render block on front-end and wp-admin
   */
  use WpTest\WpApi\WpApiDataController;
  
  if(is_admin()) {

    echo get_field('search_field');
  } else {
    /** @var  $resortSearch */
    $resortSearch = get_field('search_field');
    $test = new WpApiDataController($resortSearch);

    echo "<pre>";
    var_dump($test->getApiData());
    echo "</pre>";
  }