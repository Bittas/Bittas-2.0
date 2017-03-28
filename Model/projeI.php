<?php
interface IProje{
  public function proje_durum($tbldurum);//bitti
  public function projedanismansayisi();//bitti

  public function ogrenciTumProjeBasvurulariniListele();//öğrenci olabilir 3'ü// bitti
  public function ogrenciProjeBasvuruListeleHepsi($isaret,  $proje);//bitti
  public function ogrenciProjeBasvuruListeleDetayli($isaret,$proje);//bitti

  public function onerilenProjeler($kullaniciID,$rol);//bitti
  public function projeDurumList();//bitti
  public function projeTuruHepsiniGetir();//bitti
}
 ?>
