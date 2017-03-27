<?php

require_once("Model/ogrenci.php");

class OgrenciProfilDuzenleC{
    
    public function profilDuzenle()
    {
        $ogrenci=Ogrenci::getOgrenciNesne();// singleton
        $ogrenci->setMail($_POST["mail"]);
		$ogrenci->setParola($_POST["parola"]);
		$ogrenci->setAdi($_POST["ad"]);
		$ogrenci->setSoyadi($_POST["soyad"]);
		$ogrenci->setCinsiyet($_POST["cinsiyet"]);
		$ogrenci->setUni($_POST["uni"]);
		$ogrenci->setFakulte($_POST["fakulte"]);
		$ogrenci->setBolum($_POST["bolum"]);
		$ogrenci->setSinif($_POST["sinif"]);
		$ogrenci->setNumara($_POST["okul_no"]);
		$ogrenci->setIl($_POST["il"]);
		$ogrenci->setIlce($_POST["ilce"]);
		$ogrenci->setAdres($_POST["adres"]);
		$ogrenci->setHakkimda($_POST["hakkimda"]);
		$ogrenci->setFoto($_FILES['foto']);

		return $ogrenci->profilGuncelleOgrenci($_SESSION["staj"]["id"]);
    }
	public function profilGetir()
	{
		$id =$_SESSION["staj"]["id"];
		$ogrenci=ogrenci::getOgrenciNesne();// singleton
		return $ogrenci->ogrenciProfilGetir($id);
	}
}

 ?>