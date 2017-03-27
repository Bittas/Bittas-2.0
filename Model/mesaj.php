<?php
include_once("mesajI.php");
class Mesaj implements IMesaj
{
  private $id;
  private $gonderenId;
  private $aliciId;
  private $konu;
  private $mesaj;
  private $durum;
  private $tarih;

public function getGonderenId()
{
  return $this->gonderenId;
}
public function setGonderenId($value)
{
  $this->gonderenId=$value;
}
public function getAliciId()
{
  return $this->aliciId;
}
public function setAliciId($value)
{
  $this->aliciId=$value;
}
public function getKonu()
{
  return $this->konu;
}
public function setKonu($value)
{
  $this->konu=$value;
}
public function getMesaj()
{
  return $this->mesaj;
}
public function setMesaj($value)
{
  $this->mesaj=$value;
}
public function getDurum()
{
  return $this->durum;
}
public function setDurum($value)
{
  $this->durum=$value;
}
public function getTarih()
{
  return $this->tarih;
}
public function setTarih($value)
{
  $this->tarih=$value;
}

  	function gelenGidenMesajSayisi($id){
  		global $conn;
  		$sorgu1 ="select count(tbl_mesaj.id) from tbl_mesaj LEFT JOIN tbl_kullanici on tbl_mesaj.gonderen_id=tbl_kullanici.id where alici_id=".$id." and durum=0";
  		$sorgu2 ="select count(tbl_mesaj.id) from tbl_mesaj LEFT JOIN tbl_kullanici on tbl_mesaj.alici_id=tbl_kullanici.id where gonderen_id=".$id." and durum=0";
  		$sonuc1=mysqli_query($conn,$sorgu1);
  		$sonuc2=mysqli_query($conn,$sorgu2);
  		if($sonuc1){
  			$gelenMesajSayi=mysqli_fetch_row($sonuc1);
  		}
  		if($sonuc2){
  			$gidenMesajSayi=mysqli_fetch_row($sonuc2);
  		}
  		$tut = array('gelen' => $gelenMesajSayi, 'giden' => $gidenMesajSayi);
  		return $tut;
  	}
}
