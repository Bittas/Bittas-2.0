<?php

 require_once("include/config.php");
 require_once("include/function.php");
 include_once("Model/danisman.php");
 if(isset($_POST['sil'])){
     echo kayitSil();
 }
 else if(isset($_POST['pasifYap'])){
    echo danismanOgrenciKayitOnayla();
 }

	function danismanOgrenciKayitOnayla(){
        $danisman=Danisman::getDanismanNesne();
        $kullaniciID = $_POST['id'];
        $onay = $_POST['pasifYap'];
        if($danisman->danismanOgrenciKayitOnayla($kullaniciID,$onay)){
            if($onay=="1")
                return successMesaj("Kayıt onaylandı."); 
            else if($onay=="0")
                return successMesaj("Kayıt onayı kaldırıldı."); 
        }
        else
            return errorMesaj("Bir hata oluştu.");
	}
    function kayitSil()
    {
        $danisman=Danisman::getDanismanNesne();
        $sonuc=$danisman->danismanOgrenciKayitSil($_POST['id']);
        if($sonuc=="kayıt silindi")
            return successMesaj($sonuc);
        else
            return errorMesaj($sonuc);
    }
?>