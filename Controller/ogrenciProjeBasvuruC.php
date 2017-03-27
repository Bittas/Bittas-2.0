<?php

require_once("Model/proje.php");
require_once("Model/ogrenci.php");
class OgrenciProjeBasvuruC
{

    public function ogrenciProjeBasvuruListeleDetayli($isaret)
    {
      $proje=new Proje();

      $proje->setAdi(@$_POST["adi"]);
      $proje->setKisiSayisi(@$_POST["kisi"]);
      $proje->setDurum(@$_POST["durum"]);
      return $proje->ogrenciProjeBasvuruListeleDetayli($isaret,$proje);
    }
    public function ogrenciProjeBasvuruListeleHepsi($isaret)
    {
      $proje=new Proje();
      $proje->setTur($_GET["tur"]);
      return $proje->ogrenciProjeBasvuruListeleHepsi($isaret,  $proje);

    }
    public function ogrenciTumProjeBasvurulariniListele()
    {
      $proje=new Proje();
      return $proje->ogrenciTumProjeBasvurulariniListele();

    }
    public function ogrenciProjeAlmismi($ogrId,$projeTuruId)
    {
      $ogrenci=new Ogrenci();
      return $ogrenci->ogrenciProjeAlmismi($ogrId,$projeTuruId);
    }
}

 ?>
