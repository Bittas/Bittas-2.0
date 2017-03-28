<?php

require_once("Model/danisman.php");
require_once("Model/komisyon.php");
class danismanEkleC
{
    public function danismanEkle()
    {
      //$kullanici=new Kullanici();
      $danisman=new Danisman();

      $danisman->setMail(@$_POST["email"]);
      $danisman->setParola(@$_POST["parola"]);
      $danisman->setRol("2");
      $danisman->setAdi(@$_POST["adi"]);
      $danisman->setSoyadi(@$_POST["soyadi"]);
      $danisman->setFoto("../profil/".@$_POST['file-2']."");
      $danisman->setHakkinda(@$_POST["hakkimda"]);
      $danisman->setUniId(@$_POST["uni"]);
      $danisman->setUnvan(@$_POST["unvan"]);
      $danisman->setTc(@$_POST["tc"]);

      $komisyon=new Komisyon();
      //$proje=new Danisman();

      return $komisyon->danismanEkle($danisman);

    }
}

 ?>
