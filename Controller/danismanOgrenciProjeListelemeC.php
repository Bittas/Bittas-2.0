<?php

require_once("Model/danisman.php");
require_once("Model/proje.php");

class DanismanOgrenciProjeListelemeC
{

  public function danismanOgrenciProjeListeleme()
  {
    $proje=new Proje();
    $proje->setTur(@$_POST["tur"]);
    $proje->setDurum(@$_POST["durum"]);
    $projeTipi="";

    if(@$_POST["projeTipi"]=="bireysel")
    $projeTipi="=";

    if(@$_POST["projeTipi"]=="grup")
    $projeTipi=">";
    $danisman=new Danisman();
    return $danisman->danismanOgrenciProjeListeleme($projeTipi,$proje);

  }
}

 ?>
