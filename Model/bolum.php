<?php
class Proje
{
  private $id;
  private $bolumAdi;
  private $fakulteId;

  public function __get($property)
  {
    switch ($property) {
      case 'id':
        return $this->id;
        break;
      case 'bolumAdi':
        return $this->bolumAdi;
        break;
      case 'fakulteId':
        return $this->fakulteId;
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
      case 'bolumAdi':
        $this->bolumAdi=$value;
        break;
      case 'fakulteId':
        $this->fakulteId=$value;
        break;

      default:
        # code...
        break;
    }
  }
}
