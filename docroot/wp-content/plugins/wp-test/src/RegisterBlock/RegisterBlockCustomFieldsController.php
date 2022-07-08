<?php
  namespace WpTest\RegisterBlock;
  
  use WordPlate\Acf\Fields\Text;
  use WordPlate\Acf\Location;

  /**
   * This class is used to create custom fields to be used on block
   */
  class RegisterBlockCustomFieldsController {
    
    private $customField;
  
    /**
     *
     */
    public function __construct()
    {
      add_action('acf/init',[$this, 'registerCustomFields']);
      $this->setCustomFieldConfig();
    }
    
    public function getCustomFieldConfig()
    {
      return $this->customField;
    }
    
    public function setCustomFieldConfig()
    {
      $this->customField = [
        'title' => 'Resort setup',
        'fields' => [
          Text::make('Search', 'search_field'),
        ],
        'location' => [
          new Location('block', '==', 'acf/wptest'),
        ],
      ];
    }
  
    /**
     * @return void
     */
    public function registerCustomFields()
    {
      return register_extended_field_group( $this->getCustomFieldConfig() );
    }
  }