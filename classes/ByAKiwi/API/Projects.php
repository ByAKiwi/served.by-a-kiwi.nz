<?php
namespace ByAKiwi\API;
use ByAKiwi\Image\Request as ImageRequest;
use Tonic;
use Tonic\Response;

/**
 * @uri /api/projects/coded
 */
class Projects extends Tonic\Resource { 
  
  /**
   * @method GET
   */
  public function coded() {
    $requests = ImageRequest::findAllCoded($this->container['database']);

    return new Response(200, json_encode(array('projects' => $requests)), array(
      'Content-Type' => 'application/json'
    ));
  }
}
