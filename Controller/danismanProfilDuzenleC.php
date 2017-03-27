<?php
require_once("Model/danisman.php");

/**
 * 
 */
class danismanProfilDuzenleC
{
    public function profilDuzenle()
    {
        $danisman=danisman::getDanismanNesne();// singleton
        $danisman->setMail(htmlspecialchars($_POST["mail"]));
        $danisman->setParola(htmlspecialchars($_POST["parola"]));
        $danisman->setAdi(htmlspecialchars($_POST["ad"]));
        $danisman->setSoyadi(htmlspecialchars($_POST["soyad"]));
        $danisman->setTc(htmlspecialchars($_POST["tc"]));
        $danisman->setUnvan(htmlspecialchars($_POST["unvan"]));
        $danisman->setUni(htmlspecialchars($_POST["uni"]));
        $danisman->setHakkimda(htmlspecialchars($_POST["hakkimda"]));

        return $danisman->profilGuncelleDanisman($_SESSION["staj"]["id"]);
    }
    public function profilGetir()
    {
		$id =$_SESSION["staj"]["id"];
		$danisman=danisman::getDanismanNesne();// singleton
		return $danisman->danismanProfilGetir($id);
    }
}


 ?>