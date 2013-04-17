<?php
namespace ByAKiwi\Coded;
use ByAKiwi\Image;
use ByAKiwi\Image\Request as ImageRequest;
use Tonic;
use Tonic\Response;

/**
 * @uri /coded/:image
 */
class Coded extends Tonic\Resource { 
  
  public $type = 'coded';

  /**
   * @method GET
   * @cache 864000
   * @param str $imageName
   */
  public function image($imageName) {
    
    // Because for some reason png files come through without the extension
    if (strpos($imageName, '.') === false) {
        $imageName .= '.png';
    }

    $image = new Image($imageName, $this->type);

    if (!$image->exists()) {
      return false;
    }

    $imageRequest = new ImageRequest($imageName, $this->type);
    $imageRequest->persist($this->container['database']);

    return new Response(200, $image->content(), array(
      'ContentType' => $image->mimeType()
    ));
  }
}
