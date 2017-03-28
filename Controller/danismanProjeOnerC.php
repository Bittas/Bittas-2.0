<?php

require_once("Model/danisman.php");
require_once("Model/proje.php");
class danismanProjeOnerC
{
  public function danismanProjeOner()
  {
    $proje=new Proje();
    $proje->setAdi($_POST["projeAdi"]);
    $proje->setKonu($_POST["projeAciklama"]);
    $proje->setTur($_POST["projeTuru"]);
    $proje->setKisiSayisi($_POST["grupSayisi"]);
    $proje->setDanismanSayisi($_POST["danismanSayisi"]);
    $kullaniciRol=$_SESSION["staj"]["rol"];
    $kullaniciID=$_SESSION["staj"]["id"];
    $danisman = new Danisman();
    return $danisman->danismanProjeOner($proje,$kullaniciRol,$kullaniciID);
  }
  
  public function danismanProjeSil($projeId)
  {
    $komisyon=new Komisyon();
    $komisyon->setId($projeId);

    $proje = new Proje();
    return $proje->projeSil($komisyon);
  }
  
}

?>
