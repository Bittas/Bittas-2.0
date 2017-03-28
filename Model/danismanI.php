<?php
interface IDanisman{
  public function danismanId($kullaniciId);//bitti
  public function danismanOgrenciKayitOnayBekleyen();//bitti
  public function danismanOgrenciKayitOnaylilar();//bitti
  public function danismanOgrenciKayitSil($id);
  public function danismanOgrenciKayitOnayla($id,$onay);
  public function danismankontrol($proje_id);//bitti
  public function profilGuncelleDanisman($id);//bitti
  public function danismanProfilGetir($id);//bitti
  public function danismanOgrenciProjeListeleme($projeTipi,$proje);//bitti
  public function projeOner();//bitti
  /////////////////////////////////////////////////////////////////////////

  public function onerilenProjeler();//
  public function projeDurumList();//

  public function danismanProjeOner($proje,$kullaniciRol,$kullaniciID);//bitti//
  public function projeTuruHepsiniGetir();//
}
 ?>
