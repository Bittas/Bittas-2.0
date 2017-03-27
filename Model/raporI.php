<?php
interface IRapor{
  public function raporYukle($dosya);//bitti
  public function raporYukleVeritabani($link);//bitti
  public function raporGetirKisiyeGore();//bitti
  public function raporYukleyebilirMi();//bitti
  public function danismanRaporOgrenciListeGetir();//bitti
  public function danismanRaporProjeGetir($projeId,$ogrenciId);//bitti
}
 ?>
