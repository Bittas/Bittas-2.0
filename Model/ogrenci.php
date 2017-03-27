<?php

include_once("ogrenciI.php");
class Ogrenci implements IOgrenci
{
  private $id;
  private $numara;
  private $cinsiyet;
  private $dogum_tarihi;
  private $il;
  private $ilce;
  private $adres;
  private $uni;
  private $fakulte;
  private $bolum;
  private $sinif;
  private $user_id;

  public function getNumara()
  {
    return $this->numara;
  }
  public function setNumara($value)
  {
    $this->numara=$value;
  }
  public function getCinsiyet()
  {
    return $this->cinsiyet;
  }
  public function setCinsiyet($value)
  {
    $this->cinsiyet=$value;
  }
  public function getDogumTarihi()
  {
    return $this->$dogum_tarihi;
  }
  public function setDogumTarihi($value)
  {
    $this->$dogum_tarihi=$value;
  }
  public function getIl()
  {
    return $this->il;
  }
  public function setIl($value)
  {
    $this->il=$value;
  }
  public function getIlce()
  {
    return $this->ilce;
  }
  public function setIlce($value)
  {
    $this->ilce=$value;
  }
  public function getAdres()
  {
    return $this->adres;
  }
  public function setAdres($value)
  {
    $this->adres=$value;
  }
  public function getUniversite()
  {
    return $this->uni;
  }
  public function setUniversite($value)
  {
    $this->uni=$value;
  }
  public function getFakulte()
  {
    return $this->fakulte;
  }
  public function setFakulte($value)
  {
    $this->fakulte=$value;
  }
  public function getBolum()
  {
    return $this->bolum;
  }
  public function setBolum($value)
  {
    $this->bolum=$value;
  }
  public function getSinif()
  {
    return $this->sinif;
  }
  public function setSinif($value)
  {
    $this->sinif=$value;
  }
  public function getKullaniciId()
  {
    return $this->user_id;
  }
  public function setKullaniciId($value)
  {
    $this->user_id=$value;
  }

  public function ogrenciId($user_id)
  {
       global $conn;
           $query='SELECT
                    O.id AS ogrId
                  FROM
                    tbl_ogrenci AS O
                  WHERE
                   O.user_id='.$user_id.'';
           $sonuc =@mysqli_query($conn,$query);
           $sutun=@mysqli_fetch_array($sonuc);

           return $sutun["ogrId"];
  }


  	function profilGuncelleOgrenci()
  	{
  		$id =$_SESSION["staj"]["id"];

  		$mail=temizle(@$_POST["mail"]);
  		$parola=temizle(@$_POST["parola"]);
  		$adi=temizle(@$_POST["ad"]);
  		$soyadi=temizle(@$_POST["soyad"]);
  		$cinsiyet=temizle(@$_POST["cinsiyet"]);
  		$uni=temizle(@$_POST["uni"]);
  		$fakulte=temizle(@$_POST["fakulte"]);
  		$bolum=temizle(@$_POST["bolum"]);
  		$sinif=temizle(@$_POST["sinif"]);
  		$okul_no=temizle(@$_POST["okul_no"]);
  		$il=temizle(@$_POST["il"]);
  		$ilce=temizle(@$_POST["ilce"]);
  		$adres=temizle(@$_POST["adres"]);
  		$akademisyen=temizle(@$_POST["akademisyen"]);
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
  		$query2="UPDATE tbl_ogrenci set numara='$okul_no' , cinsiyet=$cinsiyet , il=$il , ilce=$ilce , adres='$adres' , uni=$uni , fakulte=$fakulte , bolum=$bolum , sinif='$sinif' where user_id=$id";

  		if(mysqli_query($conn,$query) && mysqli_query($conn,$query2))
  		{
  			return successMesaj("Profiliniz güncellenmiştir");
  		}else
  		{
  			return errorMesaj("Profil güncelleme işleminde hata");
  		}
  	}


    function ogrenciProjeAlmismi($ogrId,$projeTuruId){
        global $conn;
        if (isset($_GET["tur"])) {
		   $tur=$_GET["tur"];
		   if ($tur=="bitirme")
		   	$tur=2;
		   else if($tur=="tasarim")
		   	$tur=1;
        }
         $query1='SELECT
                      *
                    FROM
                      tbl_ogrenci_proje AS OP
                    INNER JOIN
                      tbl_ogrenci AS O ON O.id=OP.ogrenci_id
                    INNER JOIN
                      tbl_kullanici AS K ON K.id=O.user_id
                    INNER JOIN
                      tbl_proje AS P ON P.id = OP.proje_id
                    INNER JOIN
                      tbl_projeturu AS PT ON P.turu = PT.id
                    WHERE
                      O.id ='.$ogrId.'  AND OP.onay = 1 AND PT.id ='.$projeTuruId.'';
         $sonuc1 =mysqli_query($conn,$query1);
             if(@mysqli_num_rows($sonuc1) ==1)
                 return 1;
        return 0;
    }


	 function ogrenciProjeBasvurmusmu($projeId){
        global $conn;
         $query1='SELECT
                      COUNT(*) AS sayi
                    FROM
                      tbl_ogrenci_proje AS OP
                    WHERE
                      OP.proje_id ='.$projeId.' ';
         $sonuc1 =mysqli_query($conn,$query1);
             if(@$row=mysqli_fetch_array($sonuc1))
			 {
				 if(@ $row[sayi]>0)
					 return 1;
			 }

        return 0;
    }


	 function ogrenciProjesiBitmismi($ogrId,$projeTuruId){
        global $conn;
        if (isset($_GET["tur"])) {
		   $tur=$_GET["tur"];
		   if ($tur=="bitirme")
		   	$tur=2;
		   else if($tur=="tasarim")
		   	$tur=1;
        }
         $query1='SELECT
                      *
                    FROM
                      tbl_ogrenci_proje AS OP
                    INNER JOIN
                      tbl_ogrenci AS O ON O.id=OP.ogrenci_id
                    INNER JOIN
                      tbl_kullanici AS K ON K.id=O.user_id
                    INNER JOIN
                      tbl_proje AS P ON P.id = OP.proje_id
                    INNER JOIN
                      tbl_projeturu AS PT ON P.turu = PT.id
                    WHERE
                      O.id ='.$ogrId.'  AND OP.onay = 1 AND P.projedurum_id=4 AND PT.id ='.$projeTuruId.'';
         $sonuc1 =mysqli_query($conn,$query1);
             if(@mysqli_num_rows($sonuc1) ==1)
                 return 1;
        return 0;
    }


	function ogrenciOnaylanmisProjeIdGetir($ogrenciId){
   global $conn;

        if (isset($_GET["tur"])) {
		   $tur=$_GET["tur"];
		   if ($tur=="bitirme")
		   	$tur=2;
		   else if($tur=="tasarim")
		   	$tur=1;
        }

   $sorgu="SELECT proje_id FROM tbl_ogrenci_proje WHERE ogrenci_id=$ogrenciId AND onay=$tur";
   $sorgu="SELECT * FROM tbl_proje AS p
LEFT JOIN tbl_ogrenci_proje AS op ON p.id=op.proje_id
WHERE p.turu=$tur AND op.onay=1 AND op.ogrenci_id=$ogrenciId";
   $sonuc =mysqli_query($conn,$sorgu);
   $proje=mysqli_fetch_array($sonuc);
   return $proje["proje_id"];
}


	function ogrenciOnaylanmisProjeDurumuGetir($ogrenciId){
   global $conn;

        if (isset($_GET["tur"])) {
		   $tur=$_GET["tur"];
		   if ($tur=="bitirme")
		   	$tur=2;
		   else if($tur=="tasarim")
		   	$tur=1;
        }

   $projeID=ogrenciOnaylanmısProjeIdGetir($ogrenciId,$projeTuru);
   $sorgu="SELECT p.projedurum_id FROM tbl_proje AS p LEFT JOIN tbl_ogrenci_proje AS op ON p.id=op.proje_id WHERE op.ogrenci_id=$ogrenciId AND op.proje_id=$projeID AND p.turu=$tur";
   $sonuc =mysqli_query($conn,$sorgu);
   $proje=mysqli_fetch_array($sonuc);
   return $proje["projedurum_id"];
}


function ogrenciOnaylanmisProjeGetir(){
      if (isset($_GET["sayfa"])) {
     $tur=$_GET["sayfa"];
     if ($tur=="bitirme-projesi")
      $tur=2;
     else if($tur=="tasarim-projesi")
      $tur=1;
      }
  global $ogrId;
  global $conn;
  $sorgu="SELECT p.id,p.adi,p.konu,p.kisi_sayisi,p.danisman_sayisi,pd.durum FROM tbl_ogrenci_proje AS op
    INNER JOIN tbl_proje AS p ON p.id=op.proje_id
    INNER JOIN tbl_projedurum AS pd ON pd.id=p.projedurum_id
    WHERE op.onay=1 AND op.ogrenci_id=$ogrId AND p.turu=$tur";

  $sonuc=mysqli_query($conn,$sorgu);
  if ($sonuc) {
    while($satir=mysqli_fetch_array($sonuc)){
      $isimler_o = array();
      $isimler_d = array();
      $sorgu2="SELECT CONCAT_WS(' ',k.adi, k.soyadi) AS ogrenci_adi FROM tbl_ogrenci_proje AS op
        INNER JOIN tbl_ogrenci AS o ON o.id=op.ogrenci_id
        INNER JOIN tbl_kullanici AS k ON k.id=o.user_id
        WHERE op.proje_id=".$satir["id"]." AND op.onay=1";
      $sorgu3="SELECT CONCAT_WS(' ',k.adi, k.soyadi) AS d_adsoyad FROM tbl_ogrenci_danisman AS od
        INNER JOIN tbl_danisman AS d ON d.id=od.danisma_id
        INNER JOIN tbl_kullanici AS k ON k.id=d.user_id
        WHERE od.proje_id=".$satir["id"]." AND od.onay=1";
      $sonuc2=mysqli_query($conn,$sorgu2);
      $sonuc3=mysqli_query($conn,$sorgu3);
      if ($sonuc2) {
                while($satir2=mysqli_fetch_array($sonuc2))
                  array_push($isimler_o, $satir2["ogrenci_adi"]);
                $isimler_o_str = implode(", ", $isimler_o);
            }
      else
        echo "sorgu2 hatalı";
      if ($sonuc3) {
                while($satir3=mysqli_fetch_array($sonuc3))
                  array_push($isimler_d, $satir3["d_adsoyad"]);
                $isimler_d_str = implode(", ", $isimler_d);
            }
      else
        echo "sorgu3 hatalı";

      echo '
              <tr>
                <td>'.$satir["adi"].'</td>
                <td>'.$satir["konu"].'</td>';
                echo '
                <td><span class="label label-success" data-toggle="tooltip" data-placement="top" title="'.$isimler_o_str.'">'.$satir["kisi_sayisi"].'</span></td>
                <td><span class="label label-success" data-toggle="tooltip" data-placement="top" title="'.$isimler_d_str.'">'.$satir["danisman_sayisi"].'</span></td>';
                if ($satir["durum"]=="Aktif")
                  echo '<td><span class="label label-success">'.$satir["durum"].'</span></td></tr>';
                else
                  echo '<td><span class="label label-danger">'.$satir["durum"].'</span></td></tr>';

                //<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Tooltip on top</button>

    }
  }
  else
    echo "sorgu1 hatalı";
}


	function ogrenci_proje_getir()
	{
		$sayac=0;
		global $conn;
		$ogrenciNumara=@$_POST["ogrenciNumara"];
        $ogrenciAdi=@$_POST["ogrenciAdi"];
		$ogrenciSoyadi=@$_POST["ogrenciSoyadi"];
        $projeTuru=@$_POST["projeTuru"];
		//echo "$ogrenciNumara $ogrenciAdi $ogrenciSoyadi $projeTuru";

		$sorgu = "SELECT K.adi,
		K.soyadi,
		O.numara,O.id as ogrid,
		P.projedurum_id,
		P.adi as p_adi,
		P.id as p_id,
		P.turu as turu
		FROM tbl_ogrenci AS O
		INNER JOIN
		tbl_kullanici AS K on K.id = O.user_id
		INNER JOIN
		tbl_ogrenci_proje AS OP on O.id = OP.ogrenci_id
		INNER JOIN
		tbl_proje AS P on P.id = OP.proje_id
		WHERE P.turu LIKE'%".$projeTuru."%' AND O.numara LIKE'%".$ogrenciNumara."%'
		AND K.adi LIKE'%".$ogrenciAdi."%' AND K.soyadi LIKE'%".$ogrenciSoyadi."%'
		GROUP BY K.id";

	if($sonuc=@mysqli_query($conn,$sorgu))
	{
		while($satir = mysqli_fetch_array($sonuc))
		{
		$sayac++;
		$durum = proje_durum($satir['projedurum_id']);
		$id = $satir['ogrid'];
		$numara = $satir['numara'];
		$p_adi = $satir['p_adi'];
		$p_id = $satir['p_id'];
		$turu = turu($satir['turu']);
		if($durum == "Aktif")
		{
		       echo '<tr>
				  <td>'.$sayac.'</td>
                  <td>'.$satir["numara"].'</td>
                  <td>'.$satir["adi"].'</td>
                  <td>'.$satir["soyadi"].'</td>
                  <td>'.$satir["p_adi"].'</td>
				  <td>'.$turu.'</td>
				<td>
				<a href="index.php?sayfa=danisman-onaylama&pid='.$p_id.'&id='.$id.'&numara='.$numara.'&proje='.$p_adi.'"
				class="fa fa-search"/>
				  </a></td></tr>';
		}
		else
		{
			echo '<tr><td>'.$sayac.'</td>
                  <td>'.$satir["numara"].'</td>
                  <td>'.$satir["adi"].'</td>
                  <td>'.$satir["soyadi"].'</td>
                  <td>'.$satir["p_adi"].'</td>
				  <td>'.$turu.'</td>
				  <td></td></tr>';
		}
		}}
	}


  	function ogrenci_proje_hepsini_getir()
  	{$sayac=0;
  		global $conn;
  		$sorgu = "SELECT K.adi,
  		K.soyadi,
  		O.numara,O.id as ogrid,
  		P.projedurum_id,
  		P.adi as p_adi,
  		P.id as p_id,
  		P.turu as turu
  		FROM tbl_ogrenci AS O
  		INNER JOIN tbl_kullanici AS K on K.id = O.user_id
  		INNER JOIN tbl_ogrenci_proje AS OP on O.id = OP.ogrenci_id
  		INNER JOIN tbl_proje AS P on P.id = OP.proje_id
  		WHERE OP.onay=1 order by projedurum_id";

  	if($sonuc=@mysqli_query($conn,$sorgu))
  	{
  		while($satir = mysqli_fetch_array($sonuc))
  		{
  		$sayac++;
  		$durum = proje_durum($satir['projedurum_id']);
  		$id = $satir['ogrid'];
  		$numara = $satir['numara'];
  		$p_adi = $satir['p_adi'];
  		$p_id = $satir['p_id'];
  		$turu = turu($satir['turu']);
  		if($durum == "Aktif")
  		{
  		       echo '<tr>
  				  <td>'.$sayac.'</td>
                    <td>'.$satir["numara"].'</td>
                    <td>'.$satir["adi"].'</td>
                    <td>'.$satir["soyadi"].'</td>
                    <td>'.$satir["p_adi"].'</td>
  				  <td>'.$turu.'</td>
  				<td>
  				<a href="index.php?sayfa=danisman-onaylama&pid='.$p_id.'&id='.$id.'&numara='.$numara.'&proje='.$p_adi.'"
  				class="fa fa-search"/>
  				  </a></td></tr>';
  		}
  		else
  		{
  			echo '<tr><td>'.$sayac.'</td>
                    <td>'.$satir["numara"].'</td>
                    <td>'.$satir["adi"].'</td>
                    <td>'.$satir["soyadi"].'</td>
                    <td>'.$satir["p_adi"].'</td>
  				  <td>'.$turu.'</td>
  				  <td></td></tr>';
  		}
  		}}
  	}


    function ogrenci_proje_bilgisi()
    {
    	global $conn;
    	global $ogrId;
         $turu=0;
    	$sql= "select P.turu from tbl_ogrenci_proje as OP
    		inner join tbl_ogrenci as O on O.id=OP.ogrenci_id
    		inner join tbl_proje as P on P.id= OP.proje_id
    		where OP.ogrenci_id='$ogrId' and OP.onay='1'";
    		$sonuc =@mysqli_query($conn,$sql);
    	if(@$sutun=mysqli_fetch_array($sonuc))
    	{$turu = $sutun['turu'];
    	}
    	return $turu;
    }


    function ogrenciprojekontrol($turu)
    {
    	global $conn;
    	global $ogrId;
    	$sayi=0;
    	if($turu == 1)
    	{
    	$sql= "SELECT count(*) as sayi FROM tbl_ogrenci as O
    	inner join tbl_ogrenci_proje as OP on O.id = OP.ogrenci_id
    	inner join tbl_proje as P on P.id = OP.proje_id
    	where P.projedurum_id='1' and O.id='$ogrId' and OP.onay='1' and P.turu='$turu'";
    	}else if ($turu == 2 or $turu == 3)
    	{
    	$sql= "SELECT count(*) as sayi FROM tbl_ogrenci as O
    	inner join tbl_ogrenci_proje as OP on O.id = OP.ogrenci_id
    	inner join tbl_proje as P on P.id = OP.proje_id
    	where P.projedurum_id='1' and O.id='$ogrId' and OP.onay='1' and P.turu='$turu' ";
    	}
    	$sonuc =@mysqli_query($conn,$sql);
    	if(@$sutun=mysqli_fetch_array($sonuc))
    	{$sayi = $sutun['sayi'];
    	}
    	return $turu;
    }


    function ogr_proje_id()
    {
    	global $conn;
    	global $ogrId;
    	$sayi=0;

    	$sql= "SELECT P.id FROM tbl_ogrenci_proje as OP
    	inner join tbl_ogrenci as O on O.id = OP.ogrenci_id
    	inner join tbl_proje as P on P.id = OP.proje_id
    	where OP.ogrenci_id='$ogrId' and OP.onay='1' and P.projedurum_id='1'";
    	$sonuc =@mysqli_query($conn,$sql);
    	if(@$sutun=mysqli_fetch_array($sonuc))
    	{$sayi = $sutun['id'];
    	}
    	return $sayi;
    }
}

 ?>
