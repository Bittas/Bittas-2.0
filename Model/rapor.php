<?php
include_once("raporI.php");
//new Proje($_POST["adi"],$_POST["konu"],$_POST["tur"],$_POST["kisi"],$_POST["danisman"])
class Rapor implements IRapor
{
  private $id;
  private $projeId;
  private $ogrenciId;
  private $raporUrl;
  private $tarih;
  private $puan;
  private static $raporNesne;

  public static function getRaporNesne()
  {
    if(@$raporNesne==null)
      $raporNesne=new Rapor();
    return $raporNesne;
  }

  public function getProjeId()
  {
    return $this->projeId;
  }
  public function setProjeId($value)
  {
    $this->projeId=$value;
  }
  public function getOgrenciId()
  {
    return $this->ogrenciId;
  }
  public function setOgrenciId($value)
  {
    $this->ogrenciId=$value;
  }
  public function getRaporUrl()
  {
    return $this->raporUrl;
  }
  public function setRaporUrl($value)
  {
    $this->raporUrl=$value;
  }
  public function getTarih()
  {
    return $this->tarih;
  }
  public function setTarih($value)
  {
    $this->tarih=$value;
  }
  public function getPuan()
  {
    return $this->puan;
  }
  public function setPuan($value)
  {
    $this->puan=$value;
  }



  function raporYukleVeritabani(){
     global $conn;
     $sorgu2="INSERT INTO tbl_rapor(proje_id, org_id, rapor_url, date) VALUES ($this->projeId, $this->ogrenciId, '$this->raporUrl', '".date("Y/m/d")."')";
     if(mysqli_query($conn,$sorgu2))
        return successMesaj("Dosyanız yüklendi");
     else
        return errorMesaj("Dosyanız yüklenemedi");
  }


  function raporGetirKisiyeGore(){
     global $conn;

     $sorgu="SELECT p.adi AS pAdi, r.rapor_url, r.date FROM tbl_rapor AS r
  LEFT JOIN tbl_proje AS p ON p.id=r.proje_id
  WHERE proje_id=$this->projeId AND org_id=$this->ogrenciId ORDER BY date DESC";
     $sonuc=mysqli_query($conn,$sorgu);
     if ($sonuc) {
       return $sonuc;
     }
  }


  function raporYukleyebilirMi(){
     global $conn;
     $sorgu1="SELECT op.ogrenci_id, op.proje_id, p.projedurum_id FROM tbl_ogrenci_proje as op LEFT JOIN tbl_proje as p ON op.proje_id=p.id WHERE op.proje_id=$this->projeId AND op.ogrenci_id=$this->ogrenciId";
     $sonuc1=mysqli_query($conn,$sorgu1);
     return $sonuc1;
  }


  function danismanRaporOgrenciListeGetir($id,$tur){
     global $conn;
     
     $sorgu="SELECT o.id as oID, p.id as pID, k.adi as kAdi, k.soyadi as kSoyadi, p.adi as pAdi, p.kisi_sayisi, p.danisman_sayisi, pd.durum, p.projedurum_id FROM tbl_ogrenci as o
LEFT JOIN tbl_kullanici as k on k.id=o.user_id
LEFT JOIN tbl_ogrenci_proje as op on op.ogrenci_id=o.id
LEFT JOIN tbl_proje as p on p.id=op.proje_id
LEFT JOIN tbl_projeturu as pt on pt.id=p.turu
LEFT JOIN tbl_projedurum as pd on pd.id=p.projedurum_id
LEFT JOIN tbl_proje_danisman as pda on pda.proje_id=p.id

WHERE op.onay=1 and pda.danisma_id=$id and p.turu=$tur";
     $sonuc=mysqli_query($conn,$sorgu);
     return $sonuc;
  }
  function sonRaporTarihi($projeId,$ogrenciId)
  {
    global $conn;
    $sorgu2="SELECT pr.date FROM tbl_rapor AS pr
    WHERE pr.proje_id=$projeId AND pr.org_id=$ogrenciId
    ORDER BY pr.id DESC";
    $sonuc2=mysqli_query($conn,$sorgu2);
    return $sonuc2;
  }


  function danismanRaporProjeGetir(){
     global $conn;
     $sorgu="SELECT p.adi AS pAdi, r.rapor_url, r.date FROM tbl_rapor AS r
  LEFT JOIN tbl_proje AS p ON p.id=r.proje_id
  WHERE proje_id=$this->projeId AND org_id=$this->ogrenciId ORDER BY date DESC";
     $sonuc=mysqli_query($conn,$sorgu);
     return $sonuc;
  }
}
