<?php
namespace ByAKiwi\Image;
use PDO;
use JsonSerializable;

class Request {

  public $image;
  public $type;
  public $referer;
  public $favicon_url;
  public $created; 
  public $updated;

  public function __construct(array $parameters = array()) {
    foreach ($parameters as $key => $value) {
      $this->{$key} = $value;
    }
  }

  public function persist($database) {
    $sql = "INSERT IGNORE INTO imageRequests 
            (image, type, referer, favicon_url, updated)
            VALUES (:image, :type, :referer, :favicon_url, NOW());";

    $query = $database->prepare($sql);
    $query->execute(array(
      ':image' => $this->image,
      ':type' => $this->type,
      ':referer' => $this->referer,
      ':favicon_url' => $this->favicon_url
    ));
  }

  public static function findAll($database) {
    $sql = "SELECT * 
            FROM imageRequests
            WHERE referer IS NOT NULL 
                  AND referer != '';
    ";

    $query = $database->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_CLASS, get_called_class());
  }
}
