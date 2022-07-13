<?php
namespace WpTest\WpApi;

/**
 * Get API controller
 *
 * Get the Data from API Rest
 */
class WpApiController {
  
  private $url;
  private $param;
  
  public function __construct()
  {
  }
  
  /**
   * @return string
   */
  public function getUrl(): string
  {
    return $this->url;
  }
  
  /**
   * @param string $url
   */
  public function setUrl(string $url)
  {
    $this->url = $url;
  }
  
  
  /**
   * @param mixed $param
   */
  public function setParam($action = null, $param = null)
  {
    if(!empty($this->filterApiFields())) {
      $param .= "&sourceFields=" . $this->filterApiFields();
    }
    
    $this->param = $action . $param;
  }
  
  /**
   * @return mixed
   */
  public function getParam()
  {
    return $this->param;
  }
  
  public function filterApiFields()
  {
    return "name, description,lifts.count,lifts.open";
  }
  
  /**
   * @return mixed
   */
  public function getApiParam()
  {
    $ch = curl_init();
  
    curl_setopt($ch, CURLOPT_URL, $this->getUrl().$this->getParam());
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
    $result = curl_exec($ch);
    
    if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
  
    return json_decode($result);
    
  }
}