<?php
namespace ByAKiwi;
use Tonic;
use Tonic\Response;

/**
 * @uri /
 */
class Home extends Tonic\Resource { 
  
  /**
   * @method GET
   */
  public function home() {
    $response = new Response(302);
    $response->location = 'http://by-a.kiwi.nz';
    return $response;
  }
}
