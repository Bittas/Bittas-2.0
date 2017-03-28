<?php

require_once("Model/komisyon.php");
require_once("Model/danisman.php");
class komisyonProjeDanismanlariListeleC
{
    public function komisyonDanismanlariListele()
    {
      $danisman = new Danisman();
      $danisman->setAdi(@$_POST["dadi"]);
      $danisman->setSoyadi(@$_POST["dasoyadi"]);
      $komisyon = new Komisyon($danisman);
      return $komisyon->komisyonProjeDanismanlariniListele($danisman);
    }
    public function komisyonTumDanismanlariListele()
    {
      $komisyon = new Komisyon();
      return $komisyon->komisyonTumProjeDanismanlariniListele();
    }

}

?>
