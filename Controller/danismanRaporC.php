<?php 
include_once("Model/danisman.php");
include_once("Model/rapor.php");
class DanismanRaporC
{
    function danismanRaporOgrenciListeGetir(){
    global $conn;
        $rapor=Rapor::getRaporNesne();
            if (isset($_GET["tur"])) {
            $tur=$_GET["tur"];
            if ($tur=="bitirme")
                $tur=2;
            else if($tur=="tasarim")
                $tur=1;
            }
            $userId=@$_SESSION['staj']['id'];
            $danismanId=Danisman::danismanId($userId);
            $sonuc=$rapor->danismanRaporOgrenciListeGetir($danismanId,$tur);
    if ($sonuc) {
        return $sonuc;
    }
    else
        return "sorgu hatalı";
    }



  function danismanRaporProjeGetir(){
     global $conn;
     $rapor=Rapor::getRaporNesne();
     $rapor->setProjeId($_GET["projeID"]);
     $rapor->setogrenciId($_GET["ogrenciID"]);
     $sonuc=$rapor->danismanRaporProjeGetir();
     if ($sonuc) {
         return $sonuc;
     }
  }

    }


?>