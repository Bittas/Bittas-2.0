<?php
interface IKomisyon{
  public function danismanEkle($danisman);//bitti
  public function mailkont($email);//bitti
  public function tckont($tc);//bitti

  public function komisyonEslesmeGor();//bitti
  public function komisyonProjeBasvuruListeleHepsi();//bitti
  public function commissionProjectBasedDetailedView();//bitti
  public function commissionSearchApplicantStudentList();//bitti
  public function danismanProjeleriListele($proje);
  public function projeListeleDanismanSayisiIslem($proje);
	//////////////////
  public function komisyonTumProjeDanismanlariniListele();
  public function komisyonProjeDanismanlariniListele($danisman);
}
 ?>
