<?php
include_once("danismanI.php");
include_once("kullanici.php");
class Danisman extends Kullanici implements IDanisman
{
  private $id;
  private $tc;
  private $unvan;
  private $user_id;
  private $uni;
  private static $danismanNesne;

  public static function getDanismanNesne()
  {
    if(@$danismanNesne==null)//undefine diyor
      $danismanNesne=new Danisman();
    return $danismanNesne;
  }

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
  public function getUni(){
    return $this->uni;
  }
  public function setUni($value)
  {
    $this->uni=$value;
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

	function danismanOgrenciKayitOnayBekleyen()
	{
		global $conn;
		$sorgu="SELECT k.id AS kID, o.numara AS oNo, k.mail AS oEmail FROM tbl_kullanici AS k
		INNER JOIN tbl_ogrenci AS o ON o.user_id=k.id
		WHERE k.rol=1 AND k.onay=0";
		$sonuc=mysqli_query($conn,$sorgu);
		if ($sonuc)
			return $sonuc;
		else
			return "sorgu hatalı";
	}


	function danismanOgrenciKayitOnaylilar(){
		global $conn;
		$sorgu="SELECT k.id AS kID, o.numara AS oNo, k.mail AS oEmail FROM tbl_kullanici AS k
		INNER JOIN tbl_ogrenci AS o ON o.user_id=k.id
		WHERE k.rol=1 AND k.onay=1";
		$sonuc=mysqli_query($conn,$sorgu);
		if ($sonuc)
			return $sonuc;
		else
			return "sorgu hatalı";
	}
  public function danismanOgrenciKayitSil($id)
  {
    global $conn;
    $sorgu1="DELETE FROM tbl_kullanici WHERE id=$id";
    if(mysqli_query($conn,$sorgu1)){
      $sorgu2="DELETE FROM tbl_ogrenci WHERE user_id=$id";
      if(mysqli_query($conn,$sorgu2))
        return "kayıt silindi";
      else
        return "sorgu 2";
    }
      else
        return "sorgu 1";
  }
  public function danismanOgrenciKayitOnayla($id,$onay)
  {
    global $conn;
    $sorgu="UPDATE tbl_kullanici AS k SET k.onay=$onay WHERE k.id=$id";
    $sonuc=mysqli_query($conn,$sorgu);
    if($sonuc)
      return true;
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


  	function profilGuncelleDanisman($id)
  	{

  		global $conn;
  		$msg ="";
  		$query ="UPDATE tbl_kullanici SET adi='".parent::getAdi()."' , soyadi ='".parent::getSoyadi()."' ,mail ='".parent::getMail()."',hakkimda='".parent::getHakkimda()."' ";
  		$yuklenecek_dosya = "profil/" . md5(parent::getFoto()['name']).substr(parent::getFoto()['name'], -4);
  		if(parent::getFoto()["name"] != "")
  		{
  			if (move_uploaded_file(parent::getFoto()['tmp_name'], $yuklenecek_dosya))
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
  		if(parent::getParola() !="")
  		{
  			parent::setParola(md5(parent::getParola()));
  			$query .=" , parola='".parent::getParola()."'";
  		}
  		$query .=" where id =$id ; ";
  		$query2="UPDATE tbl_danisman AS d SET tc='$this->tc', unvan='$this->unvan', uni_id=$this->uni WHERE user_id=$id";
  		if(mysqli_query($conn,$query) && mysqli_query($conn,$query2))
  		{
  			return successMesaj("Profiliniz güncellenmiştir");
  		}else
  		{
  			return errorMesaj("Profil güncelleme işleminde hata");
  		}
  	}

    function danismanProfilGetir($id){//////// dikkat
      global $conn;
      $query_profil="SELECT * from tbl_kullanici as k inner join tbl_danisman as d on k.id=d.user_id where k.id='$id'";

      $kisi_sonuc=mysqli_query($conn,$query_profil);
      return mysqli_fetch_array($kisi_sonuc);
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
/////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function onerilenProjeler()
  {
      global $conn;
      $kullaniciID=$_SESSION["staj"]["id"];
      $danismanID=danismanId($kullaniciID);
        if (isset($_GET["rol"])) {
          $rol=$_GET["rol"];
        }

            if ($_SESSION["staj"]["rol"] == 1) {
              $sorgu="select op.proje_id as op_proje_id, op.onay, p.id as p_id, p.oneren_id, p.adi, p.konu, p.accept_date, p.end_date, p.kisi_sayisi, p.danisman_sayisi, d.id as d_id, d.durum from tbl_ogrenci_proje as op left join tbl_proje as p on op.proje_id=p.id left join tbl_projedurum as d on p.projedurum_id=d.id left join tbl_onay as o on o.id= where op.ogrenci_id='$kullaniciID'";
            }
            else if($_SESSION["staj"]["rol"] == 2){
            $sorgu="select p.id, p.adi, p.konu, p.kisi_sayisi, p.danisman_sayisi, d.durum from tbl_proje as p left join tbl_projedurum as d on p.projedurum_id=d.id where p.oneren_id='$danismanID'";
            $sorgu="SELECT
                p.id,
                p.adi,
                p.konu,
                p.turu,
                pt.tur AS pTur,
                p.kisi_sayisi,
                p.danisman_sayisi,
                d.durum
                FROM tbl_proje AS p
                INNER JOIN tbl_projedurum AS d ON p.projedurum_id=d.id
                INNER JOIN tbl_projeturu AS pt ON pt.id=p.turu
                WHERE p.oneren_id='$danismanID'";
            }
            else if($_SESSION["staj"]["rol"] == 3){
              /*if ($rol==1) {
                $sorgu="SELECT
                o.id AS ogId,
                k.adi AS ogAdi,
                k.soyadi AS ogSoyadi,
                k.rol,
                p.id AS pId,
                p.adi AS pAdi,
                p.konu AS pKonu,
                p.turu,
                pt.tur AS pTur,
                p.kisi_sayisi,
                p.danisman_sayisi,
                pd.id AS pdId,
                pd.durum
                FROM tbl_kullanici AS k
                INNER JOIN tbl_ogrenci AS o ON o.user_id=k.id
                INNER JOIN tbl_proje AS p ON p.oneren_id=o.id
                INNER JOIN tbl_projeturu AS pt ON pt.id=p.turu
                INNER JOIN tbl_projedurum AS pd ON pd.id=p.projedurum_id
                WHERE k.rol=1";
              }*/
               if ($rol==2) {
                $sorgu="SELECT
                  d.id AS dId,
                  k.adi as dAdi,
                  k.soyadi AS dSoyadi,
                  k.rol,
                  p.id as pId,
                  p.adi AS pAdi,
                  p.konu AS pKonu,
                  p.turu,
                  pt.tur AS pTur,
                  p.kisi_sayisi,
                  p.danisman_sayisi,
                  pd.id as pdId,
                  pd.durum
                  FROM tbl_kullanici AS k
                  INNER JOIN tbl_danisman AS d ON d.user_id=k.id
                  INNER JOIN tbl_proje AS p ON p.oneren_id=d.id
                  INNER JOIN tbl_projeturu AS pt ON pt.id=p.turu
                  INNER JOIN tbl_projedurum AS pd ON pd.id=p.projedurum_id
                  WHERE k.rol=2";
            }
      }
        //	$sorgu="select p.id, p.oneren_id, p.adi, p.konu, p.kisi_sayisi, p.danisman_sayisi, d.id as d_id,
        // d.durum from tbl_proje as p left join tbl_projedurum as d on p.projedurum_id=d.id";
          //$sorgu1 = "SELECT COUNT(`tbl_mesaj`.`id`) FROM `tbl_mesaj` LEFT JOIN `tbl_kullanici` ON tbl_mesaj.gonderen_id = tbl_kullanici.id WHERE `alici_id`='".$id."'";
          //$query_uni ="Select id, uni_adi from tbl_proje";
      $sonuc =mysqli_query($conn,$sorgu);

      if($sonuc)
      {
            if ($_SESSION["staj"]["rol"] == 1) {
              return $sonuc;
            }
        else{

                    while($row=mysqli_fetch_array($sonuc))
                    {
            if($_SESSION["staj"]["rol"] == 2){
              $durum = $row["durum"];
              if ($durum == "Revize")
              {
                echo '<tr>';
                echo '<td>'.$row["id"].'</td>';
                echo '<td>'.$row["adi"].'</td>';
                echo '<td>'.$row["pTur"].'</td>';
                echo '<td>'.$row["kisi_sayisi"].'</td>';
                echo '<td>'.$row["danisman_sayisi"].'</td>';
                echo '<td>'.$row["durum"].'</td>';
                echo '<td><a href="index.php?sayfa=proje-revize&id='.$row["id"].'" class="fa fa-search"/></td>';
                echo '</tr>';
              }else {
                echo '<tr>';
                echo '<td>'.$row["id"].'</td>';
                echo '<td>'.$row["adi"].'</td>';
                echo '<td>'.$row["pTur"].'</td>';
                echo '<td>'.$row["kisi_sayisi"].'</td>';
                echo '<td>'.$row["danisman_sayisi"].'</td>';
                echo '<td>'.$row["durum"].'</td>';
                echo '</tr>';
              }
                }
            else if($_SESSION["staj"]["rol"] == 3){
                        echo '<tr data-cost='.$row["pId"].'>';
                        echo '<td>'.$row["pId"].'</td>';
                        if ($rol==1)
                          echo '<td>'.$row["ogAdi"].' '.$row["ogSoyadi"].'</td>';
                        else if($rol==2)
                          echo '<td>'.$row["dAdi"].' '.$row["dSoyadi"].'</td>';
                        echo '<td>'.$row["pAdi"].'</td>';
                        echo '<td>'.$row["pTur"].'</td>';
                        echo '<td>'.$row["kisi_sayisi"].'</td>';
                        echo '<td>'.$row["danisman_sayisi"].'</td>';
                        echo '<td>';
                        echo '<div class="form-group">';
               if(ogrenciProjeBasvurmusmu($row["pId"])==0){
                echo '<select class="form-control">';
                $sonuc2=projeDurumList();
                $i=0;
                while ($row2=mysqli_fetch_array($sonuc2)) {
                  if($row["pdId"]==$i)
                  echo '<option value="'.$i.'" selected>'.$row2["durum"].'</option>';
                  else
                  echo '<option value="'.$i.'">'.$row2["durum"].'</option>';

                  $i++;
                }
                echo '</select>';
              }
                        echo '</div>';
                        echo '</td>';
                        echo '</tr>';
                  }
                }
              }
           }
      else{
        echo "sorgu yanlış";
      }
   }


  function projeDurumList()
  {
      global $conn;
      $sorgu="select durum from tbl_projedurum";
      $sonuc =mysqli_query($conn,$sorgu);
      if ($sonuc) {
        return $sonuc;
      }
  }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  function danismanProjeOner($proje,$kullaniciRol,$kullaniciID)
  {

        $projeAd= $proje->getAdi();
        $projeAciklama= $proje->getKonu();
        $projeTuru= $proje->getTur();
        $grupSayisi= $proje->getKisiSayisi();
        $danismanSayisi= $proje->getDanismanSayisi();

          if ($proje->getKisiSayisi()=="") {
            $grupSayisi=1;
          }
          if ($proje->getDanismanSayisi()=="") {
            $danismanSayisi=1;
          }
        global $conn;
        $danismanID=danismanId($kullaniciID);

        $query="INSERT INTO tbl_proje(oneren_id,adi,konu,turu,kisi_sayisi,danisman_sayisi,projedurum_id,accept_date) VALUES
        ('$danismanID','$projeAd','$projeAciklama','$projeTuru','$grupSayisi','$danismanSayisi', 0, ".date("Y/m/d").")";

          if (@mysqli_query($conn,$query)) {
            echo successMesaj("İşlem başarılı bir şekilde tamamlandı...");
          }
          else{
            echo errorMesaj("Proje önerisi başarısız...");
          }
  }

  function projeTuruHepsiniGetir()
  {
      global $conn;
      $sorgu="select * from tbl_projeturu";
      $sonuc =mysqli_query($conn,$sorgu);
      if ($sonuc)
      {
        return $sonuc;
     //         while($row=mysqli_fetch_array($sonuc)){
     //         	echo '<option value="'.$row["id"].'">'.$row["tur"].'</option>';
     //         }
      }
   }
  }

 ?>
