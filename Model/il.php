<?php
class Il
{
  private $id;
  private $il;
  public function __get($property)
  {
    switch ($property) {
      case 'id':
        return $this->id;
        break;
      case 'il':
        return $this->il;
        break;

      default:
        # code...
        break;
    }
  }
  public function __set($property, $value)
  {
    switch ($property) {
      case 'id':
        $this->id=$value;
        break;
      case 'il':
        $this->il=$value;
        break;

      default:
        # code...
        break;
    }
  }
}
