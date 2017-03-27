<?php
interface IKomisyon{
  public function komisyonEslesmeGor();//bitti
  public function danisman_ekle($danisman);//bitti

  public function komisyonProjeBasvuruListeleHepsi();//bitti
  public function commissionProjectBasedDetailedView();//bitti
  public function commissionSearchApplicantStudentList();//bitti
  public function projeleriListele($projeTipi,$proje);
  public function projeListeleDanismanSayisiIslem($proje);
}
 ?>
