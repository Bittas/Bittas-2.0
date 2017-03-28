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
  private $mesajNesne;

  public function getMesajNesne()
  {
    if(@$mesajNesne==null)
      $mesajNesne=new Mesaj();
    return $mesajNesne;
  }
public function setId($value)
{
  $this->id=$value;
}
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
    public function getMetoduIleAliciAdiSoyadi()
    {
      global $conn;
      $sorgu="SELECT k.adi, k.soyadi FROM tbl_kullanici AS k WHERE k.id=".$this->aliciId;
      $sonuc=mysqli_query($conn,$sorgu);
      if($sonuc){
        return $sonuc;
      }
    }
    
    public function mesajGonder()
    {
      global $conn;
			$sorgu="insert into tbl_mesaj(gonderen_id,alici_id,konu,mesaj,durum,tarih)
       value('$this->gonderenId','$this->aliciId','$this->konu','$this->mesaj','0','$this->tarih')";

			if (@mysqli_query($conn,$sorgu)) {
				return "mesaj gönderildi";
			}
			else{
				return "mesaj gönderilemedi";
			}
    }

    public function mesajSil()
    {
      global $conn;
			$sorgu="delete from tbl_mesaj where id=$this->id";
			$sonuc=mysqli_query($conn,$sorgu);
      return "Mesaj silindi";
    }

  	public function gelenGidenMesajSayisi($id){
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

    public function gelenKutusu($id)
    {
		global $conn;
		$sorgu = "SELECT `adi`,`soyadi`,`foto`,`tarih`,`tbl_mesaj`.`id`,`tbl_mesaj`.`durum` FROM `tbl_mesaj` LEFT JOIN `tbl_kullanici` ON tbl_mesaj.gonderen_id = tbl_kullanici.id WHERE `alici_id`='".$id."' ORDER BY `id` DESC";
		$sonuc=mysqli_query($conn,$sorgu);

		if($sonuc){
      return $sonuc;
      }
    }
    
    public function gidenKutusu($id)
    {
      global $conn;
      $sorgu = "SELECT `adi`,`soyadi`,`foto`,`tarih`,`tbl_mesaj`.`id` FROM `tbl_mesaj` LEFT JOIN `tbl_kullanici` ON tbl_mesaj.alici_id = tbl_kullanici.id WHERE `gonderen_id`='".$id."' ORDER BY `id` DESC";
      $sonuc=mysqli_query($conn,$sorgu);

      if($sonuc){
        return $sonuc;
      }
    }

    public function mesajGonderToplu($id,$aliciRol)
    {
      global $conn;
      if($aliciRol==1)
        $sorgu2="SELECT o.user_id FROM tbl_ogrenci AS o";
      else if($aliciRol==2)
        $sorgu2="SELECT d.user_id FROM tbl_danisman AS d";
      $sonuc2=mysqli_query($conn,$sorgu2);
      if($sonuc2){
        $i=0;
        $j=0;
        while($row=mysqli_fetch_array($sonuc2)){
          $j++;
          $sorgu="insert into tbl_mesaj(gonderen_id,alici_id,konu,mesaj,durum,tarih) value('$id','".$row['user_id']."','$this->konu','$this->mesaj','0','$this->tarih')";
          if (@mysqli_query($conn,$sorgu))
            $i++;
        }
        return "".$j."/".$i." mesaj gönderildi !";
        }
    }
}
