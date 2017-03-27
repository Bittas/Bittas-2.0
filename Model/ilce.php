<?php
class Ilce
{
  private $id;
  private $ilce;
  private $ilId;

      public function __get($property)
      {
        switch ($property) {
          case 'id':
            return $this->id;
            break;
          case 'ilce':
            return $this->ilce;
            break;
          case 'ilId':
            return $this->ilId;
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
          case 'ilce':
            $this->ilce=$value;
            break;
          case 'ilId':
            $this->ilId=$value;
            break;

          default:
            # code...
            break;
        }
      }
}
