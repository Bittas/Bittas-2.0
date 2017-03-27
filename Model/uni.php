<?php
class Proje
{
  private $id;
  private $uniAdi;

        public function __get($property)
        {
          switch ($property) {
            case 'id':
              return $this->id;
              break;
            case 'uniAdi':
              return $this->uniAdi;
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
            case 'uniAdi':
              $this->uniAdi=$value;
              break;

            default:
              # code...
              break;
          }
        }
}
