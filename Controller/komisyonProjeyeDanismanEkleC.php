<?php

require_once("Model/komisyon.php");
require_once("Model/proje.php");
class komisyonProjeyeDanismanEkleC
{
    public function komisyonProjeleriListele()
    {
      $proje = new Proje();
      //echo $_POST["projeOnay"];
      $proje->setAdi(@$_POST["projeAdi"]);
      $proje->setTur(@$_POST["projeTuru"]);
      $proje->setProjeDurum(@$_POST["projeOnay"]);
      $komisyon = new Komisyon();
      return $komisyon->danismanProjeleriListele($proje);
    }
    public function komisyonProjeleriListeleHepsi()
    {
      $komisyon = new Komisyon();
      return $komisyon->danismanProjeleriListeleHepsi();
    }

}

?>
