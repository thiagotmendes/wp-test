<?php
  namespace WpTest\RegisterBlock;

  /**
   * This class is used to create the block
   *
   * To create this block i choosed use ACF-PRO Plugin (personal) as I would use in some real project
   */
  class RegisterBlockController {
    public function __construct()
    {
      add_action('acf/init', [$this, 'registerCustomBlock']);
      new RegisterBlockCustomFieldsController();
    }
  
    /**
     * @return void
     */
    public function registerCustomBlock()
    {
      // Check function exists.
      if( function_exists('acf_register_block_type') ) {
    
        // Register a testimonial block.
        return acf_register_block_type( array(
          'name'              => 'WpTest',
          'title'             => __('WpTest'),
          'description'       => __('A custom WpTest block.'),
          'render_template'   => plugin_dir_path(dirname(__FILE__, 2))  . '/blocks/wpBlockTest.php',
          'category'          => 'formatting',
          'mode'              => 'edit',
          'supports'          => array(
            'align'   => false,
            'mode'    => false,
            'jsx'     => true,
            'anchor'  => true,
            'customClassName' => true
          ),
        ));
      }
    }
  }