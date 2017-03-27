<?php
interface IDanisman{
  public function danismanId($kullaniciId);//bitti
  public function danismanOgrenciKayitOnayBekleyen();//bitti
  public function danismanOgrenciKayitOnaylilar();//bitti
  public function danismankontrol($proje_id);//bitti
  public function profilGuncelleDanisman();//bitti
  public function danismanOgrenciProjeListeleme($projeTipi,$proje);//bitti
  public function projeOner();//bitti
}
 ?>
