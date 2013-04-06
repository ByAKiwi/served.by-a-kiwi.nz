<?php
namespace ByAKiwi\Image;
use PDO;

class Request {

  public $image;
  public $type;

  public function __construct($image, $type) {
    $this->image = $image;
    $this->type = $type;
  }

  public function persist($database) {
    $sql = "INSERT IGNORE INTO imageRequests (image, type)
            VALUES (:image, :type);";

    $query = $database->prepare($sql);
    $query->execute([
      ':image' => $this->image,
      ':type' => $this->type
    ]);
  }
}
