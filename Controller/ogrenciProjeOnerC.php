<?php

require_once("Model/proje.php");
class OgrenciProjeOnerC
{

public function ogrenciProjeOner($ogrenciId)
{ 
  $proje=new Proje();
  $proje->setAdi($_POST["adi"]);

  $proje->setKonu($_POST["konu"]);
  $proje->setTur($_POST["tur"]);
  $proje->setKisiSayisi($_POST["kisi"]);
  $proje->setDanismanSayisi($_POST["danisman"]);
  return $proje->ogrenciProjeOner($ogrenciId);

}


  /*
  private $padi;
  private  $pkonu;
  private  $ptur;
  private  $kisiSayisi;
  private  $danismanSayisi;

  public function getAdi()
  {
    return $padi;
  }
  public function setAdi($value)
  {
    $padi=$value;
  }

  public function getKonu()
  {
    return $pkonu;
  }
  public function setKonu($value)
  {
    $pkonu=$value;
  }

  public function getTur()
  {
    return $ptur;
  }
  public function setTur($value)
  {
    $ptur=$value;
  }

  public function getKisiSayisi()
  {
    return $kisiSayisi;
  }
  public function setKisiSayisi($value)
  {
    $kisiSayisi=$value;
  }

  public function getDanismanSayisi()
  {
    return $danismanSayisi;
  }
  public function setDanismanSayisi($value)
  {
    $danismanSayisi=$value;
  }*/
}

 ?>
