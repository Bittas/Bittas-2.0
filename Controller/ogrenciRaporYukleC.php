<?php

/**
 * 
 */
require_once("Model/ogrenci.php");
require_once("Model/rapor.php");
class OgrenciRaporYukle
{
    private static $rapor;
    function raporYukle($dosya){
        $rapor=Rapor::getRaporNesne();

        $userId=@$_SESSION['staj']['id'];
        $ogrId=Ogrenci::ogrenciId($userId);
        $projeID=Ogrenci::ogrenciOnaylanmisProjeIdGetir($ogrId);

        if ($dosya['name']!=""||$dosya['name']!=null) {
            $hata = $dosya['error'];
        if($hata != 0) {
            echo 'Yüklenirken bir hata gerçekleşmiş.';
        } 
        else {
            $boyut = $dosya['size'];
            if($boyut > (1024*1024*3)){
                echo 'Dosya 3MB den büyük olamaz.';
            } else {
                $tip = $dosya['type'];
                $isim = $dosya['name'];
                $uzanti = explode('.', $isim);
                $uzanti = $uzanti[count($uzanti)-1];
                if($uzanti == 'rar' || $uzanti == 'zip') {
                    $dosyaSon = $dosya['tmp_name'];
                    copy($dosyaSon, 'raporlar/' . $dosya['name']);
                    $link='raporlar/'.$dosya['name'];

                    $rapor->setRaporUrl($link);
                    $rapor->setOgrenciId($ogrId);
                    $rapor->setProjeId($projeID);
                    return $rapor->raporYukleVeritabani();
                }
                else {
                    return warningMesaj('Yanlızca "rar" ve "zip" uzantılı dosya gönderebilirsiniz.');
                }
            }
        }
        }

    }
    function raporGetirKisiyeGore(){
        $rapor=Rapor::getRaporNesne();

        $userId=@$_SESSION['staj']['id'];
        $ogrId=Ogrenci::ogrenciId($userId);
        $projeID=Ogrenci::ogrenciOnaylanmisProjeIdGetir($ogrId);
    
        $rapor->setOgrenciId($ogrId);
        $rapor->setProjeId($projeID);
        
        return $rapor->raporGetirKisiyeGore();//asdasd
    }

    function raporYukleyebilirMi(){
        $rapor=Rapor::getRaporNesne();
        
        $userId=@$_SESSION['staj']['id'];
        $ogrId=Ogrenci::ogrenciId($userId);
        $projeID=Ogrenci::ogrenciOnaylanmisProjeIdGetir($ogrId);
        
        $rapor->setOgrenciId($ogrId);
        $rapor->setProjeId($projeID);
        return $rapor->raporYukleyebilirMi();//asdasda
    
    }
}


 ?>