<?php
include_once("danismanI.php");
include_once("kullanici.php");
class Danisman extends Kullanici implements IDanisman
{
  private $id;
  private $tc;
  private $unvan;
  private $user_id;
  private $uni_id;

  public function getTc()
  {
    return $this->tc;
  }
  public function setTc($value)
  {
    $this->tc=$value;
  }
  public function getUnvan(){
    return $this->unvan;
  }
  public function setUnvan($value)
  {
    $this->unvan=$value;
  }
  public function getUserId(){
    return $this->user_id;
  }
  public function setUserId($value)
  {
    $this->user_id=$value;
  }
  public function getUniId(){
    return $this->uni_id;
  }
  public function setUniId($value)
  {
    $this->uni_id=$value;
  }

  public function danismanId($kullaniciId)
  {
       global $conn;
           $query='SELECT
                    D.id AS danismanID
                  FROM
                    tbl_danisman AS D
                  WHERE
                   D.user_id='.$kullaniciId.'';
           $sonuc =@mysqli_query($conn,$query);
           $sutun=@mysqli_fetch_array($sonuc);

           return $sutun["danismanID"];
  }

	function danismanOgrenciKayitOnayBekleyen(){
		global $conn;
		$sorgu="SELECT k.id AS kID, o.numara AS oNo, k.mail AS oEmail FROM tbl_kullanici AS k
INNER JOIN tbl_ogrenci AS o ON o.user_id=k.id
WHERE k.rol=1 AND k.onay=0";
		$sonuc=mysqli_query($conn,$sorgu);
		if ($sonuc) {
			while($satir=mysqli_fetch_array($sonuc)){
				echo '
                <tr data-cost='.$satir["kID"].'>
                  <td>'.$satir["oNo"].'</td>
                  <td>'.$satir["oEmail"].'</td>
                  <td><input type="checkbox" class="pasif" id="'.$satir["kID"].'" onchange="OgrKayitOnay(this);"
                   value="'.$satir["kID"].'"></td>
                </tr>
				';
			}
		}
		else
			echo "sorgu hatalı";
	}


	function danismanOgrenciKayitOnaylilar(){
		global $conn;
		$sorgu="SELECT k.id AS kID, o.numara AS oNo, k.mail AS oEmail FROM tbl_kullanici AS k
INNER JOIN tbl_ogrenci AS o ON o.user_id=k.id
WHERE k.rol=1 AND k.onay=1";
		$sonuc=mysqli_query($conn,$sorgu);
		if ($sonuc) {
			while($satir=mysqli_fetch_array($sonuc)){
				echo '
                <tr data-cost='.$satir["kID"].'>
                  <td>'.$satir["oNo"].'</td>
                  <td>'.$satir["oEmail"].'</td>
                  <td><input type="checkbox" class="pasif" checked id="'.$satir["kID"].'" onchange="OgrKayitIptal(this);"
                   value="'.$satir["kID"].'"></td>
                </tr>
				';
			}
		}
		else
			echo "sorgu hatalı";
	}


  function danismankontrol($proje_id)
  {
  	global $conn;
  	global $ogrId;
  	$sayi=0;
  	$sql= "SELECT count(*) as sayi FROM tbl_ogrenci_danisman as OD
  where OD.ogr_id='$ogrId' and OD.onay='1' and .proje_id='$proje_id'";
  	$sonuc =@mysqli_query($conn,$sql);
  	if(@$sutun=mysqli_fetch_array($sonuc))
  	{$sayi = $sutun['sayi'];
  	}
  	return $sayi;
  }


  	function profilGuncelleDanisman()
  	{
  		$id =$_SESSION["staj"]["id"];

  		$mail=temizle(@$_POST["mail"]);
  		$parola=temizle(@$_POST["parola"]);
  		$adi=temizle(@$_POST["ad"]);
  		$soyadi=temizle(@$_POST["soyad"]);
  		$tc=temizle(@$_POST["tc"]);
  		$unvan=temizle(@$_POST["unvan"]);
  		$uni=temizle(@$_POST["uni"]);
  		$hakkimda=temizle(@$_POST["hakkimda"]);

  		global $conn;
  		$msg ="";
  		$query ="UPDATE tbl_kullanici SET adi='$adi' , soyadi ='$soyadi' ,mail ='$mail',hakkimda='$hakkimda' ";
  		$yuklenecek_dosya = "profil/" . md5($_FILES['foto']['name']).substr($_FILES['foto']['name'], -4);
  		if($_FILES["foto"]["name"] != "")
  		{
  			if (move_uploaded_file($_FILES['foto']['tmp_name'], $yuklenecek_dosya))
  			{
  			    $query .=",foto='$yuklenecek_dosya' ";
  			    $_SESSION["staj"]["foto"]=$yuklenecek_dosya;
  				$query3="insert into tbl_foto(foto,user_id) values('$yuklenecek_dosya',$id)";
  				$sonuc4 =mysqli_query($conn,$query3);
  			}else
  			{
  				$msg =errorMesaj("Foto yüklenemedi");
  			}
  		}
  		if($parola !="")
  		{
  			$parola =md5($parola);
  			$query .=" , parola='$parola'";
  		}
  		$query .=" where id =$id ; ";
  		$query2="UPDATE tbl_danisman AS d SET tc='$tc', unvan='$unvan', uni_id=$uni WHERE user_id=$id";
  		if(mysqli_query($conn,$query) && mysqli_query($conn,$query2))
  		{
  			return successMesaj("Kayıt işlemi başarılı");
  		}else
  		{
  			return errorMesaj("Kayıt işlemi tamamlanamadı");
  		}
  	}


    function danismanOgrenciProjeListeleme($projeTipi,$proje){

         global $conn;
         $query='SELECT
                  P.id AS projeId,
                  O.numara AS numara,
                  K.adi AS ogrAdi,
                  K.soyadi AS ogrSoyadi,
                  P.adi AS projeAdi,
                  P.konu AS projeKonu,
                  P.kisi_sayisi AS kisiSayisi,
                  P.danisman_sayisi AS danismanSayisi,
                  P.accept_date AS acceptDate,
                  p.end_date AS endDate
                FROM
                  tbl_proje AS P
                INNER JOIN
                  tbl_ogrenci_proje AS OP ON OP.proje_id = P.id
                INNER JOIN
                  tbl_ogrenci AS O ON O.id = OP.ogrenci_id
                INNER JOIN
                  tbl_kullanici AS K ON K.id = O.user_id
                WHERE
                  OP.onay = 1 AND  P.turu='.$proje->getTur().' AND P.kisi_sayisi'.$projeTipi.'1 AND P.projedurum_id='.$proje->getDurum().'
                ORDER BY OP.proje_id

                  '; 
        $currentId=0; $sayac=0;
         $sonuc =mysqli_query($conn,$query);
    	       while(@$sutun=mysqli_fetch_array($sonuc)){
                     if($sayac==0){
                          $currentId=$sutun["projeId"];
                          $sayac=1;
                     }
                   if($sutun["projeId"]!=$currentId){
                       echo "<tr><td colspan=9 style='background-color:#aaabad'></td></tr>";
                       $currentId=$sutun["projeId"];
                   }
                     echo '<tr>
                      <td title="'.$sutun["numara"].'">'.$sutun["numara"].'</td>
                      <td title="'.$sutun["ogrAdi"].'">'   .$sutun["ogrAdi"].'</td>
                      <td title="'.$sutun["ogrSoyadi"].'">'.$sutun["ogrSoyadi"].'</td>
                      <td title="'.$sutun["projeAdi"].'">'   .$sutun["projeAdi"].'</td>
                      <td title="'.$sutun["projeKonu"].'">'  .$sutun["projeKonu"].'</td>
                      <td title="'.$sutun["kisiSayisi"].'">'.$sutun["kisiSayisi"].'</td>
                      <td title="'.$sutun["danismanSayisi"].'">'.$sutun["danismanSayisi"].'</td>
                      <td title="'.$sutun["acceptDate"].'">'.$sutun["acceptDate"].'</td>
                      <td title="'.$sutun["endDate"].'">'.$sutun["endDate"].'</td>
                      </tr>';

               }
        }


        	function projeOner(){
        		$kullaniciRol=$_SESSION["staj"]["rol"];
        		$kullaniciID=$_SESSION["staj"]["id"];
        		$projeAd=$_POST["projeAdi"];
        		$projeAciklama=$_POST["projeAciklama"];
        		$projeTuru=$_POST["projeTuru"];
        		//$projeDosya=$_POST["projeDosya"];
        		$grupSayisi=$_POST["grupSayisi"];
        		$danismanSayisi=$_POST["danismanSayisi"];
        		if ($grupSayisi=="") {
        			$grupSayisi=1;
        		}
        		if ($danismanSayisi=="") {
        			$danismanSayisi=1;
        		}
        		global $conn;
        		$danismanID=danismanId($kullaniciID);

        		$query="INSERT INTO tbl_proje(oneren_id,adi,konu,turu,kisi_sayisi,danisman_sayisi,projedurum_id,accept_date) VALUES ('$danismanID','$projeAd','$projeAciklama','$projeTuru','$grupSayisi','$danismanSayisi', 0, ".date("Y/m/d").")";

        			if (@mysqli_query($conn,$query)) {
        				echo successMesaj("Proje önerisi başarılı bir şekilde tamamlandı...");
        			}
        			else{
        				echo errorMesaj("Proje önerisi başarısız...");
        			}
        	}
}

 ?>
