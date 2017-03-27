<?php
class Fakulte
{
  private $id;
  private $uniId;
  private $fakulteAdi;

    public function __get($property)
    {
      switch ($property) {
        case 'id':
          return $this->id;
          break;
        case 'uniId':
          return $this->uniId;
          break;
        case 'fakulteAdi':
          return $this->fakulteAdi;
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
        case 'uniId':
          $this->uniId=$value;
          break;
        case 'fakulteAdi':
          $this->fakulteAdi=$value;
          break;

        default:
          # code...
          break;
      }
    }
}
