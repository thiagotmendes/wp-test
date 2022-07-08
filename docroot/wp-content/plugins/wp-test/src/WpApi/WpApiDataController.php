<?php
  namespace WpTest\WpApi;

  /**
   * This class is used to treatment of the data geted by APIController
   */
  class WpApiDataController {
    
    private $ApiCall;
  
    /**
     * @param $param
     */
    public function __construct($param)
    {
      $this->ApiCall = new WpApiController();
  
      $this->ApiCall->setUrl("https://api.fnugg.no/");
      $this->ApiCall->setParam("search?q=", $param);
    }
  
    /**
     * @return mixed
     */
    public function getApiData()
    {
      return $this->ApiCall->getApiParam();
    }
  
  }