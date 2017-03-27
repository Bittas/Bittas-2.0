<?php
include_once("Model/danisman.php");
/**
 * 
 */
class DanismanOgrenciKayitlariC
{
    public function danismanOgrenciKayitOnayBekleyen()
    {
        $danisman=Danisman::getDanismanNesne();
        $sonuc=$danisman->danismanOgrenciKayitOnayBekleyen();
        if($sonuc=="sorgu hatalı")
            return errorMesaj("sorgu hatalı");
        else
            return $sonuc;
    }


    public function danismanOgrenciKayitOnaylılar()
    {
        $danisman=Danisman::getDanismanNesne();
        $sonuc=$danisman->danismanOgrenciKayitOnaylilar();
        if($sonuc=="sorgu hatalı")
            return errorMesaj("sorgu hatalı");
        else
            return $sonuc;
    }
}


 ?>