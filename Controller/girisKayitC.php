<?php
include_once("Model/ogrenci.php");
class GirisKayitC
{
    public function ogrenciGiris()
    {
        $ogrenci=Ogrenci::getOgrenciNesne();
        $ogrenci->setMail(htmlspecialchars($_POST["email"]));
        $ogrenci->setParola(MD5($_POST["parola"]));
        $user=$ogrenci->giris();
        if($user=="Kullanıcı kayıtlı veya Onaylı değil.")
            return errorMesaj($user);
        $_SESSION["staj"]=$user;
        header("Location: index.php");
    }

    public function ogrenciKayit()
    {
        $ogrenci=Ogrenci::getOgrenciNesne();
        $ogrenci->setMail(htmlspecialchars($_POST["email"]));
        $ogrenci->setParola(MD5($_POST["parola"]));
        $ogrenci->setNumara($_POST["no"]);
        return $ogrenci->kayit();
    }
}


 ?>