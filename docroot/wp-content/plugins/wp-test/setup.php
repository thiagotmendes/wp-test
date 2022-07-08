<?php
  /**
   * Plugin name: wp-test
   * Author: Thiago Mendes
   * Description: This is a WP Gutemberg test from Multivision
   */
  
  require_once __DIR__ . '/vendor/autoload.php';
  
  define( 'WP_DIR_PATH', plugin_dir_url(dirname(__FILE__, 2)));
  
  use WpTest\RegisterBlock\RegisterBlockController;
  
  new RegisterBlockController();
