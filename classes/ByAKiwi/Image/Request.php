<?php
namespace ByAKiwi\Image;
use PDO;
use JsonSerializable;

class Request {

  public $image;
  public $type;
  public $referer;
  public $created; 
  public $updated;

  public function __construct(array $parameters = array()) {
    foreach ($parameters as $key => $value) {
      $this->{$key} = $value;
    }
  }

  public function persist($database) {
    $sql = "INSERT IGNORE INTO imageRequests 
            (image, type, referer, updated)
            VALUES (:image, :type, :referer, NOW());";

    $query = $database->prepare($sql);
    $query->execute(array(
      ':image' => $this->image,
      ':type' => $this->type,
      ':referer' => $this->referer
    ));
  }

  public static function findAllCoded($database) {
    $sql = "SELECT * 
            FROM imageRequests
            WHERE (referer IS NOT NULL 
                  AND referer != '')
                  AND type = 'coded'
            GROUP BY referer;
    ";

    $query = $database->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_CLASS, get_called_class());
  }
}
