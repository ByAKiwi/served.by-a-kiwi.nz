<?php
namespace ByAKiwi\API;
use ByAKiwi\Image\Request as ImageRequest;
use Tonic;
use Tonic\Response;

/**
 * @uri /api/projects
 */
class Projects extends Tonic\Resource { 
  
  /**
   * @method GET
   */
  public function projects() {
    $requests = ImageRequest::findAll($this->container['database']);

    return new Response(200, json_encode($requests), array(
      'Content-Type' => 'application/json'
    ));
  }
}
