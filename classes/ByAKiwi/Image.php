<?php
namespace ByAKiwi;

class Image {

  public $imageName;
  public $type;

  public function __construct($imageName, $type) {
    $this->imageName = $imageName;
    $this->type = $type;
  }

  public function path() {
    return ROOT."/images/{$this->type}/{$this->imageName}";
  }

  public function exists() {
    return file_exists($this->path());
  }

  public function mimeType() {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $this->path());
    finfo_close($finfo);
    return $mimeType;
  }

  public function content() {
    return file_get_contents($this->path());
  }
}
