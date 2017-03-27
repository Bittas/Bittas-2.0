<?php

include_once("Model/mesaj.php");
class MesajlarC
{
    public function getMetoduIleAliciAdiSoyadi()
    {
        if(isset($_GET["aliciId"]) && $_GET["aliciId"]!=null){
            $aliciId=$_GET['aliciId'];
            $mesaj=Mesaj::getMesajNesne();
            $mesaj->setAliciId($aliciId);
            $sonuc=$mesaj->getMetoduIleAliciAdiSoyadi();

            while($row=mysqli_fetch_assoc($sonuc)){
                $aliciAdiSoyadi=$row['adi']." ".$row['soyadi'];
            }
            return $aliciAdiSoyadi;
        }
    }
    public function mesajGonder()
    {
		if(@$_POST["m"]=="gitti"){
			if ($_POST["aliciIDgiden"]) {
	        $id=$_SESSION['staj']['id'];
            $mesaj=Mesaj::getMesajNesne();

            $mesaj->setGonderenId($id);
            $mesaj->setAliciId($_POST["aliciIDgiden"]);
            $mesaj->setKonu($_POST["konu"]);
            $mesaj->setMesaj($_POST["alicininMesaj"]);
            $mesaj->setTarih(Date("j-n-o"));
            $sonuc=$mesaj->mesajGonder();
            if($sonuc=="mesaj gönderildi")
                return successMesaj($sonuc);
            else
                return errorMesaj($sonuc);
            }
			else
				return errorMesaj("Alıcı girmediniz, tekrar deneyin");
		}
		else{
			//Mesaj silme işlemi
            $mesaj=Mesaj::getMesajNesne();
            $mesaj->setId($_POST["idgizli"]);
            $sonuc=$mesaj->mesajSil();
            return successMesaj($sonuc);
		}
    }

	function gelenGidenMesajSayisi(){
	    $id=$_SESSION['staj']['id'];
        $mesaj=Mesaj::getMesajNesne();
        $sonuc=$mesaj->gelenGidenMesajSayisi($id);
        return $sonuc;
	}
    public function gelenKutusu()
    {
	    $id=$_SESSION['staj']['id'];
        $mesaj=Mesaj::getMesajNesne();
        $sonuc=$mesaj->gelenKutusu($id);
        return $sonuc;
    }
    public function gidenKutusu()
    {
	    $id=$_SESSION['staj']['id'];
        $mesaj=Mesaj::getMesajNesne();
        $sonuc=$mesaj->gidenKutusu($id);
        return $sonuc;
    }
    public function mesajGonderToplu()
    {
		if(@$_POST["m"]=="gitti"){
	        $id=$_SESSION['staj']['id'];
			$aliciRol=$_POST["aliciRol"];
            $mesaj=Mesaj::getMesajNesne();

            $mesaj->setGonderenId($id);
            $mesaj->setKonu($_POST["konu"]);
            $mesaj->setMesaj($_POST["alicininMesaj"]);
            $mesaj->setTarih(Date("j-n-o"));
            $sonuc=$mesaj->mesajGonderToplu($id,$aliciRol);
            return successMesaj($sonuc);
		}
		else{
			//Mesaj silme işlemi
            $mesaj=Mesaj::getMesajNesne();
            $mesaj->setId($_POST["idgizli"]);
            $sonuc=$mesaj->mesajSil();
            return successMesaj($sonuc);
		}
    }
}


 ?>