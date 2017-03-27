<?php

require_once("Model/komisyon.php");
require_once("Model/proje.php");

class KomisyonListeleC
{

  public function danismanOgrenciProjeleriniListeleme()
  {

    $proje=new Proje();
    $proje->setTur(@$_GET["tur"]);

    $projeTipi="";
    if(@$_GET["kisi"]=="bireysel")
    $projeTipi="=";
    if(@$_GET["kisi"]=="grup")
    $projeTipi=">";


    $komisyon=new Komisyon();
    return $komisyon->projeleriListele($projeTipi,$proje);

  }

}

 ?>
