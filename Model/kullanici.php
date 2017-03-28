<?php
include_once("kullaniciI.php");
class Kullanici implements IKullanici
{
 private  $id;
 private  $adi;
 private  $soyadi;
 private  $mail;
 private  $parola;
 private  $rol;
 private  $onay;
 private  $foto;
 private  $hakkimda;
 

  public function getAdi()
  {
    return $this->adi;
  }
  public function setAdi($value)
  {
    $this->adi=$value;
  }
  public function getSoyadi(){
    return $this->soyadi;
  }
  public function setSoyadi($value)
  {
    $this->soyadi=$value;
  }
  public function getMail(){
    return $this->mail;
  }
  public function setMail($value)
  {
    $this->mail=$value;
  }
  public function getParola(){
    return $this->parola;
  }
  public function setParola($value)
  {
    $this->parola=$value;
  }
  public function getRol(){
    return $this->rol;
  }
  public function setRol($value)
  {
    $this->rol=$value;
  }
  public function getOnay(){
    return $this->onay;
  }
  public function setOnay($value)
  {
    $this->onay=$value;
  }
  public function getFoto(){
    return $this->foto;
  }
  public function setFoto($value)
  {
    $this->foto=$value;
  }
  public function getHakkimda(){
    return $this->hakkinda;
  }
  public function setHakkimda($value)
  {
    $this->hakkinda=$value;
  }

	function girisYap($mail,$sifre)
	{

		$mail=temizle($mail);
		$sifre=MD5($sifre);
		global $conn;
		$query ="select * from tbl_kullanici where mail='$mail' and parola='$sifre' and onay=1"; //şifresi,mail doğru ve aktif olanlar
		$sonuc =mysqli_query($conn,$query);
		if(@mysqli_num_rows($sonuc) ==1)
		{
			$row=mysqli_fetch_array($sonuc);
			$rol=$row["rol"];
			$mail=$row["mail"];
			$id=$row["id"];
			$adi =$row["adi"];
			$soyadi =$row["soyadi"];
			$foto =$row["foto"];

			$query ="select id from tbl_mesaj where durum =0 and alici_id =$id";
			$b_sayi=0;
			if($sonuc=mysqli_query($conn,$query))
			{
				$b_sayi=mysqli_num_rows($sonuc);
			}
			$user=array("id"=>$id,"adi"=>$adi,"soyadi"=>$soyadi,"mail"=>$mail,"rol"=>$rol,"mesaj"=>$b_sayi,"foto"=>$foto);

			$_SESSION["staj"] =$user;
			header("Location: index.php");

		}else
		{
			return errorMesaj("Kullanıcı kayıtlı veya Onaylı değil.");
		}
	}


  	function kaydol($email,$sifre,$no){
      $email=temizle($email);
      $sifre=md5($sifre);
      global $conn;
      $query="insert into tbl_kullanici(mail,parola,rol,onay,foto) value('$email','$sifre','1','0','profil/user.png')";
      if (@mysqli_query($conn,$query)) {
        $id = mysqli_insert_id($conn);
        $query ="";
        $query ="insert into tbl_ogrenci(numara,user_id)
        value($no,$id)";

        if (@mysqli_query($conn,$query)) {
  				//header("Location: index.php");
          return "<script>alert('kayıt başarılı...');</script>";

        }
        else{
          return "<script>alert('kayıt başarısız...');</script>";
        }
      }
      else{
        return "<script>alert('kayıt başarısız...');</script>";
      }
    }


    	function mailkont($email)
    	{
    		$query="SELECT * FROM `tbl_kullanici` WHERE mail='$email'";
    		global $conn;

    		$sonuc =mysqli_query($conn,$query);
    		$durum=mysqli_num_rows($sonuc);
    	return $durum;
    	}


      	function tckont($tc)
      	{
      		$query="SELECT * FROM `tbl_danisman` WHERE tc='$tc'";
      		global $conn;

      		$sonuc =mysqli_query($conn,$query);
      		$durum=mysqli_num_rows($sonuc);
      	return $durum;
      	}
}
