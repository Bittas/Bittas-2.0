<?php

include_once("Model/proje.php");
/**
 * 
 */
class OnerilenProjelerC
{
    public function komisyonOnerilenProjeDurum()
    {
        $proje=Proje::getProjeNesne();
        $kullaniciID=$_SESSION["staj"]["id"];
        $rol=$_SESSION["staj"]["rol"];
        $sonuc=$proje->onerilenProjeler($kullaniciID,$rol);
        return $sonuc;
    }
}


 ?>