<?php
interface IMesaj{
  public function getMetoduIleAliciAdiSoyadi();//bitti çalışıyor
  public function mesajGonder();//bitti çalışıyor
  public function mesajSil();//bitti çalışıyor
  public function gelenGidenMesajSayisi($id);//bitti çalışıyor
  public function gelenKutusu($id);//bitti çalışıyor
  public function gidenKutusu($id);//bitti çalışıyor
  public function mesajGonderToplu($id,$aliciRol);//bitti çalışıyor
}
 ?>
