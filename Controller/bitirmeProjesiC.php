<?php

require_once("Model/ogrenci.php");
class BitirmeProjesiC
{

public function ogrenciOnaylanmisProjeGetir()
{
  $proje=new Ogrenci();
  return $proje->ogrenciOnaylanmisProjeGetir();

}
}

 ?>
