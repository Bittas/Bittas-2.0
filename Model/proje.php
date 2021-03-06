<?php
include_once("projeI.php");
include_once("danisman.php");
//new Proje($_POST["adi"],$_POST["konu"],$_POST["tur"],$_POST["kisi"],$_POST["danisman"])
class Proje implements IProje
{
  private $padi;
  private $pkonu;
  private $ptur;
  private $kisiSayisi;
  private $danismanSayisi;
  private $durum;
  private $projeNesne;

  public function getProjeNesne()
  {
    if (@$projeNesne==null)
      $projeNesne=new Proje();
    return $projeNesne;
  }

  public function getAdi()
  {
    return $this->padi;
  }
  public function setAdi($value)
  {
    $this->padi=$value;
  }

  public function getKonu()
  {
    return $this->pkonu;
  }
  public function setKonu($value)
  {
     $this->pkonu=$value;
  }

  public function getTur()
  {
    return $this->ptur;
  }
  public function setTur($value)
  {
    $this->ptur=$value;
  }

  public function getKisiSayisi()
  {
    return $this->kisiSayisi;
  }
  public function setKisiSayisi($value)
  {
    $this->kisiSayisi=$value;
  }

  public function getDanismanSayisi()
  {
    return $this->danismanSayisi;
  }
  public function setDanismanSayisi($value)
  {
    $this->danismanSayisi=$value;
  }
  public function getDurum()
  {
    return $this->durum;
  }
  public function setDurum($value)
  {
    $this->durum=$value;
  }

    	function proje_durum($tbldurum)
    	{
    		if($tbldurum==0)
    		{
    		$durum="Pasif";
    		}else if($tbldurum==1)
    		{
    		$durum="Aktif";
    		}else if($tbldurum==2)
    		{
    		$durum="revize";
    		}
    		else if($tbldurum==3)
    		{
    		$durum="ret";
    		}
    		else if($tbldurum==4)
    		{
    		$durum="bitir";
    		}
    		return $durum;
    	}

      function projedanismansayisi()
      {
      global $conn;
      	global $ogrId;
      	$sayi=0;

      	$sql= "SELECT count(*) as sayi FROM tbl_ogrenci_proje as OP
      	inner join tbl_ogrenci as O on O.id = OP.ogrenci_id
      	inner join tbl_proje as P on P.id = OP.proje_id
      	where OP.ogrenci_id='$ogrId' and P.projedurum_id='1'";
      	$sonuc =@mysqli_query($conn,$sql);
      	if(@$sutun=mysqli_fetch_array($sonuc))
      	{$sayi = $sutun['sayi'];
      	}
      	return $sayi;
      }


     function ogrenciTumProjeBasvurulariniListele()
         {
              global $conn;
             global $ogrId;
             $projeTuru=$_GET["tur"];
             $projeTuru3=$_GET["tur"];
              	$query2 ="SELECT
                           P.id AS projeID,
                           P.adi AS projeAdi,
                           P.konu,
                           P.kisi_sayisi,
                           P.danisman_sayisi,
                           K.adi AS onerenAdi,
                           K.soyadi AS onerenSoyadi,
                           P.projedurum_id AS projeDurumId
                         FROM
                           tbl_proje AS P
                         INNER JOIN
                           tbl_ogrenci AS O ON P.oneren_id = O.id
                         INNER JOIN
                           tbl_kullanici AS K ON K.id = O.user_id
                         INNER JOIN
                           tbl_projedurum AS PD ON P.projedurum_id = PD.id
                         WHERE
                          (P.Turu=".$projeTuru." OR P.Turu=".$projeTuru3."   )
                         UNION
                          SELECT
                           P.id AS projeID,
                           P.adi AS projeAdi,
                           P.konu,
                           P.kisi_sayisi,
                           P.danisman_sayisi,
                           K.adi AS onerenAdi,
                           K.soyadi AS onerenSoyadi,
                           P.projedurum_id AS projeDurumId
                         FROM
                           tbl_proje AS P
                         INNER JOIN
                           tbl_danisman AS D ON P.oneren_id = D.id
                         INNER JOIN
                           tbl_kullanici AS K ON K.id = D.user_id
                         INNER JOIN
                           tbl_projedurum AS PD ON P.projedurum_id = PD.id
                         WHERE
                        (P.Turu=".$projeTuru." OR P.Turu=".$projeTuru3."   )
                     ";
               $sonuc2 =mysqli_query($conn,$query2);
     	       while($sutun=mysqli_fetch_array($sonuc2)){
                     $query ='SELECT
                               *
                             FROM
                               tbl_ogrenci_proje AS OP
                               INNER JOIN
                               tbl_ogrenci AS O ON OP.ogrenci_id=O.id
                               INNER JOIN
                               tbl_kullanici AS K ON O.user_id=K.id
                             WHERE
                               O.id ='.$ogrId.' AND OP.proje_id ='.$sutun["projeID"].'';
                     $sonuc =mysqli_query($conn,$query);
                     if(@mysqli_num_rows($sonuc) ==1)
                     {
                       echo '<tr>
                       <td title="'.$sutun["projeAdi"].'">'.$sutun["projeAdi"].'</td>
                       <td title="'.$sutun["konu"].'">'.$sutun["konu"].'</td>
                       <td title="'.$sutun["kisi_sayisi"].'">'.$sutun["kisi_sayisi"].'</td>
                       <td title="'.$sutun["danisman_sayisi"].'">'.$sutun["danisman_sayisi"].'</td>
                       <td>  <input type="checkbox" class="active" name="'.$sutun["projeID"].'" id="'.$sutun["projeID"].'"   onchange="handleClick(this);"  value="'.$ogrId.'" checked>  </td>
                     </tr>  ';
                     }
                }
     }


     function ogrenciProjeBasvuruListeleHepsi($isaret,$proje)
         {

             global $conn;
             global $ogrId;

     		$query ="SELECT
                       P.id AS projeID,
                       P.adi AS projeAdi,
                       P.konu,
                       P.kisi_sayisi,
                       P.danisman_sayisi,
                       K.adi AS danismanAdi,
                       K.soyadi AS danimanSoyadi,
                       P.projedurum_id AS projeDurumId
                     FROM
                       tbl_proje AS P
                     INNER JOIN
                       tbl_danisman AS D ON P.oneren_id = D.id
                     INNER JOIN
                       tbl_kullanici AS K ON D.user_id = K.id
                     INNER JOIN
                       tbl_projedurum AS PD ON P.projedurum_id = PD.id
                     WHERE
                       P.projedurum_id = 1  AND P.kisi_sayisi ".$isaret." 1 AND
     				 (P.Turu=".$proje->getTur()." OR P.Turu=".$proje->getTur()."   )
                     ";
     		$sonuc =mysqli_query($conn,$query);
     	   if($sonuc){
     	       while($sutun=mysqli_fetch_array($sonuc)){
                    $query2 ='SELECT
                               *
                             FROM
                               tbl_ogrenci_proje AS OP
                               INNER JOIN
                               tbl_ogrenci AS O ON OP.ogrenci_id=O.id
                               INNER JOIN
                               tbl_kullanici AS K ON O.user_id=K.id
                             WHERE
                               O.id ='.$ogrId.' AND OP.proje_id ='.$sutun["projeID"].'';
                    $sonuc2 =mysqli_query($conn,$query2);

                  echo '<tr>
                       <td title="'.$sutun["projeAdi"].'">'.$sutun["projeAdi"].'</td>
                       <td title="'.$sutun["konu"].'">'.$sutun["konu"].'</td>
                       <td title="'.$sutun["kisi_sayisi"].'">'.$sutun["kisi_sayisi"].'</td>
                       <td title="'.$sutun["danisman_sayisi"].'">'.$sutun["danisman_sayisi"].'</td>
                       <td>  <input type="checkbox" class="active" name="'.$sutun["projeID"].'" id="'.$sutun["projeID"].'"';
                       if(@mysqli_num_rows($sonuc2) ==1) echo "checked";
                       echo '   onchange="handleClick(this);"  value="'.$ogrId.'" >  </td>
                     </tr>
                 ';


     	       }
             }
         }
        function ogrenciProjeBasvuruListeleDetayli($isaret,$proje)
         {
             global $conn;
             global $ogrId;
               $projeTuru=$_GET["tur"];
     		$query ="SELECT
                       P.id AS projeID,
                       P.adi AS projeAdi,
                       P.konu,
                       P.kisi_sayisi,
                       P.danisman_sayisi,
                       P.projedurum_id AS projeDurumId
                     FROM
                       tbl_proje AS P
                     INNER JOIN
                       tbl_projedurum AS PD ON P.projedurum_id = PD.id
                     WHERE
                       P.projedurum_id =1  AND P.kisi_sayisi ".$isaret." 1
     				  AND   P.Turu=".$projeTuru."
     				   AND P.adi LIKE'%".$proje->getAdi()."%' AND
     				  P.danisman_sayisi LIKE'%".$proje->getKisiSayisi()."%'
                     ";
     	   if($sonuc=mysqli_query($conn,$query)){
     	       while($sutun=mysqli_fetch_array($sonuc)){
                    $query2 ='SELECT
                               *
                             FROM
                               tbl_ogrenci_proje AS OP
                               INNER JOIN
                               tbl_ogrenci AS O ON OP.ogrenci_id=O.id
                               INNER JOIN
                               tbl_kullanici AS K ON O.user_id=K.id
                             WHERE
                               O.id ='.$ogrId.' AND OP.proje_id ='.$sutun["projeID"].'';
                    $sonuc2 =mysqli_query($conn,$query2);
                  if($proje->getDurum()==1){// basvuran
                        if(mysqli_num_rows($sonuc2)==1){
                          echo '<tr>
                               <td title="'.$sutun["projeAdi"].'">'.$sutun["projeAdi"].'</td>
                               <td title="'.$sutun["konu"].'">'.$sutun["konu"].'</td>
                               <td title="'.$sutun["kisi_sayisi"].'">'.$sutun["kisi_sayisi"].'</td>
                               <td title="'.$sutun["danisman_sayisi"].'">'.$sutun["danisman_sayisi"].'</td>
                               <td>  <input type="checkbox" class="active" name="'.$sutun["projeID"].'" id="'.$sutun["projeID"].'"';
                               if(@mysqli_num_rows($sonuc2) ==1) echo "checked";
                               echo '   onchange="handleClick(this);"  value="'.$ogrId.'" >  </td>
                             </tr>
                         ';
                       }
                   }
                   else if($proje->getDurum()==2)
                   {
                     if(!mysqli_num_rows($sonuc2)){
                       echo '<tr>
                            <td title="'.$sutun["projeAdi"].'">'.$sutun["projeAdi"].'</td>
                            <td title="'.$sutun["konu"].'">'.$sutun["konu"].'</td>
                            <td title="'.$sutun["kisi_sayisi"].'">'.$sutun["kisi_sayisi"].'</td>
                            <td title="'.$sutun["danisman_sayisi"].'">'.$sutun["danisman_sayisi"].'</td>
                            <td>  <input type="checkbox" class="active" name="'.$sutun["projeID"].'" id="'.$sutun["projeID"].'"';
                            if(@mysqli_num_rows($sonuc2) ==1) echo "checked";
                            echo '   onchange="handleClick(this);"  value="'.$ogrId.'" >  </td>
                          </tr>
                      ';
                    }
                   }
                   else {
                     echo '<tr>
                          <td title="'.$sutun["projeAdi"].'">'.$sutun["projeAdi"].'</td>
                          <td title="'.$sutun["konu"].'">'.$sutun["konu"].'</td>
                          <td title="'.$sutun["kisi_sayisi"].'">'.$sutun["kisi_sayisi"].'</td>
                          <td title="'.$sutun["danisman_sayisi"].'">'.$sutun["danisman_sayisi"].'</td>
                          <td>  <input type="checkbox" class="active" name="'.$sutun["projeID"].'" id="'.$sutun["projeID"].'"';
                          if(@mysqli_num_rows($sonuc2) ==1) echo "checked";
                          echo '   onchange="handleClick(this);"  value="'.$ogrId.'" >  </td>
                        </tr>
                    ';
                  }


     	       }
             }
         }


         	function onerilenProjeler($kullaniciID,$rol){
         		global $conn;
         		$danismanID=Danisman::danismanId($kullaniciID);

         		if($rol == 2){
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
         		$sonuc =mysqli_query($conn,$sorgu);
             if($sonuc){
               return $sonuc;
               /*while($row=mysqli_fetch_array($sonuc))
               {
         					if($rol == 2){
         	                    echo '<tr>';
         	                    echo '<td>'.$row["id"].'</td>';
         	                    echo '<td>'.$row["adi"].'</td>';
         	                    echo '<td>'.$row["pTur"].'</td>';
         	                    echo '<td>'.$row["kisi_sayisi"].'</td>';
         	                    echo '<td>'.$row["danisman_sayisi"].'</td>';
         	                    echo '<td>'.$row["durum"].'</td>';
         	                    echo '</tr>';
                           	}
                           }*/
             }
         		else{
         			echo "sorgu yanlış";
         		}
         		}
         		else if($rol == 3){
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
         		$sonuc =mysqli_query($conn,$sorgu);
             if($sonuc){
               return $sonuc;
               /*while($row=mysqli_fetch_array($sonuc))
               {
         	                    echo '<tr data-cost='.$row["pId"].'>';
         	                    echo '<td>'.$row["pId"].'</td>';
         	                    if ($rol==1)
         	                    	echo '<td>'.$row["ogAdi"].' '.$row["ogSoyadi"].'</td>';
         	                    else if($rol==2)
         	                    	echo '<td>'.$row["dAdi"].' '.$row["dSoyadi"].'</td>';
         	                    echo '<td>'.$row["pAdi"].'</td>';
         	                    echo '<td>'.$row["pKonu"].'</td>';
         	                    echo '<td>'.$row["kisi_sayisi"].'</td>';
         	                    echo '<td>'.$row["danisman_sayisi"].'</td>';
         	                    echo '<td>';
         	                    echo '<div class="form-group">';
         							echo '<select class="form-control">';
         							$sonuc2=Proje::projeDurumList();
         							$i=0;
         							while ($row2=mysqli_fetch_array($sonuc2)) {
         								if($row["pdId"]==$i)
         							  echo '<option value="'.$i.'" selected>'.$row2["durum"].'</option>';
         								else
         							  echo '<option value="'.$i.'">'.$row2["durum"].'</option>';

         							  $i++;
         							}
         							echo '</select>';
         	                    echo '</div>';
         	                    echo '</td>';
         	                    echo '</tr>';
                           }*/
             }
         		else{
         			echo "sorgu yanlış";
         		}
         		}
         	}


        	function projeDurumList(){
        		global $conn;
        		$sorgu="select durum from tbl_projedurum";
        		$sonuc =mysqli_query($conn,$sorgu);
        		if ($sonuc) {
        			return $sonuc;
        		}
        	}


          	function projeTuruHepsiniGetir(){
          		global $conn;
          		$sorgu="select * from tbl_projeturu";
          		$sonuc =mysqli_query($conn,$sorgu);
          		if ($sonuc) {
          			return $sonuc;
          		}
          	}
////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////

      function projeBilgileriGetir($komisyon)
      {
          global $conn;
          $projeId=$komisyon->getId();
          $sorgu="SELECT * FROM tbl_proje WHERE id='$projeId'";
          $sonuc =mysqli_query($conn,$sorgu);
          if ($sonuc)
            return $sonuc;
      }

      function projeSil($komisyon)
      {
          global $conn;
          $projeId=$komisyon->getId();
          $sorgu="DELETE FROM tbl_proje WHERE id='$projeId'";
          $sonuc =mysqli_query($conn,$sorgu);
          if ($sonuc)
            return $sonuc;
      }

}
 ?>