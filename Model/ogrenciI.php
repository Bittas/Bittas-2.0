<?php
interface IOgrenci{
  public function ogrenciId($kullaniciId);//bitti
  public function profilGuncelleOgrenci($id);//bitti //çalışıyor
  public function ogrenciProfilGetir($id);//bitti //çalışıyor
  public function ogrenciProjeAlmismi($ogrId,$projeTuruId);//bitti
  public function ogrenciProjeBasvurmusmu($projeId);//bitti
  public function ogrenciProjesiBitmismi($ogrId,$projeTuruId);//bitti
  public function ogrenciOnaylanmisProjeIdGetir($ogrenciId);//bitti
  public function ogrenciOnaylanmisProjeDurumuGetir($ogrenciId);//bitti
  public function ogrenciOnaylanmisProjeGetir();//bitti
  public function ogrenci_proje_getir();//bitti
  public function ogrenci_proje_hepsini_getir();//bitti
  public function ogrenci_proje_bilgisi();//bitti
  public function ogrenciprojekontrol($turu);//bitti
  public function ogr_proje_id();//onaylanmış ve durumu=1 olan// bitti
  public function giris();
  public function kayit();
}
 ?>
