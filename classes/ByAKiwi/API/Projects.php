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
   * @cache 864000
   */
  public function projects() {
    // Get list of image requests, exclude domains like github, google code etc
    // Return as JSON

//    $imageRequest = new ImageRequest($imageName, $this->type);
//    $imageRequest->persist($this->container['database']);
//
//    return new Response(200, $image->content(), array(
//      'ContentType' => $image->mimeType()
//    ));
  }
}
