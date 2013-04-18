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
    die(__FUNCTION__);
    // return new Response(302, null, array(
    //   'Location' => 'http://by-a.kiwi.nz'
    // ));
  }
}
