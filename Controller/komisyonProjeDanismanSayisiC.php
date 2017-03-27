<?php

require_once("Model/komisyon.php");
require_once("Model/proje.php");

class KomisyonProjeDanismanSayisiC
{

  public function listele()
  {

    $proje=new Proje();
    $proje->setAdi(@$_POST["adi"]);
    $proje->setDanismanSayisi(@$_POST["danismanSayisi"]);
    if(@$_POST["tur"])
    $proje->setTur(@$_POST["tur"]);
    else {
      $proje->setTur("1");
    }
    if (@$_POST["durum"]) {
      $proje->setDurum(@$_POST["durum"]);
    } else {
      $proje->setDurum("1");
    }


    $komisyon=new Komisyon();
    return $komisyon->projeListeleDanismanSayisiIslem($proje);

  }

}

 ?>
