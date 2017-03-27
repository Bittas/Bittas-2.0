<?php
include_once("komisyonI.php");
class Komisyon implements IKomisyon
{
  private $id;
  private $adi;
  private $soyadi;
  private $mail;
  private $parola;
  private $rol;
  private $onay;
  private $foto;
  private $hakkinda;


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
    public function getHakkinda(){
      return $this->hakkinda;
    }
    public function setHakkinda($value)
    {
      $this->hakkinda=$value;
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


  	function komisyonEslesmeGor(){
          if (isset($_GET["tur"])) {
  		   $tur=$_GET["tur"];
  		   if ($tur=="bitirme")
  		   	$tur=2;
  		   else if($tur=="tasarim")
  		   	$tur=1;
          }
  		global $conn;
  		$sorgu="SELECT
  p.adi as proje_adi,
  CONCAT_WS(' ',ko.adi, ko.soyadi) AS ogrenci_adi,
  CONCAT_WS(' ',kd.adi, kd.soyadi) AS danisman_adi,
  pd.durum
  FROM tbl_ogrenci_proje as op
  INNER JOIN tbl_proje as p on p.id=op.proje_id
  INNER JOIN tbl_ogrenci as o on o.id=op.ogrenci_id
  INNER JOIN tbl_kullanici as ko on ko.id=o.user_id
  INNER JOIN tbl_ogrenci_danisman as od on od.ogr_id=o.id
  INNER JOIN tbl_danisman as d on d.id=od.danisma_id
  INNER JOIN tbl_kullanici as kd on kd.id=d.user_id
  INNER JOIN tbl_projedurum as pd on pd.id=p.projedurum_id
  WHERE op.onay=1 and od.onay=1 and p.turu=1";
  		$sonuc=mysqli_query($conn,$sorgu);
  		if ($sonuc) {
  			while($satir=mysqli_fetch_array($sonuc)){

  				echo '
                  <tr>
                    <td>'.$satir["proje_adi"].'</td>
                    <td>'.$satir["ogrenci_adi"].'</td>
                    <td>'.$satir["danisman_adi"].'</td>
                    <td><span class="label label-success">'.$satir["durum"].'</span></td>
                  </tr>
  				';
  			}
  		}
  		else
  			echo "sorgu hatalı";

  	}


    	function danisman_ekle($danisman)
    	{
    		$sifre=MD5($danisman->getParola());
    		global $conn;
    		if(mailkont($danisman->getMail())==0 )
    		{
          if(tckont($danisman->getUniId())==0){
    		$query ="INSERT INTO `bittas`.`tbl_kullanici` (`id`, `adi`, `soyadi`, `mail`, `parola`, `rol`, `onay`, `foto`, `hakkimda`)
        VALUES ('', '".$danisman->getAdi()."', '".$danisman->getSoyadi()."','".$danisman->getMail()."', '$sifre', '".$danisman->getRol()."', '1', '".$danisman->getFoto()."', '".$danisman->getHakkinda()."');";
    		$sonuc =mysqli_query($conn,$query);
    		$query1= "Select id from tbl_kullanici where mail='".$danisman->getMail()."'";

    		$sonuc1 =mysqli_query($conn,$query1);
    		if($satir = mysqli_fetch_array($sonuc1))
    		{
    		$user_id= $satir["id"];
    		$query2= "INSERT INTO `bittas`.`tbl_danisman` (`id`, `tc`, `unvan`, `user_id`, `uni_id`)
    		VALUES ('', '".$danisman->getTc()."','".$danisman->getUnvan()."', '".$danisman->getUserId()."','".$danisman->getUniId()."')";
//echo "id ".$user_id;
//echo "/n".$query2;
        $sonuc2 =mysqli_query($conn,$query2);
      }
    		return successMesaj("Danışman eklendi");

    		}else
    			return errorMesaj("Lütfen farklı bir tc kimlik numarası giriniz");

    		}else
    			return errorMesaj("Lütfen farklı bir mail adresi giriniz");
    	}

          function komisyonProjeBasvuruListeleHepsi()
          {

               global $conn;

               	$query2 ="SELECT
                            K.id,
                            K.adi AS ogrenciAdi,
                            K.soyadi AS ogrenciSoyadi,
                            K.foto AS foto,
                            K.rol AS rol,
                            O.numara AS numara,
                            O.id AS ogrenciId,
                            P.id AS projeId,
                            PT.id AS projeTuruId,
                            PT.tur AS projeTuru
                          FROM
                            tbl_ogrenci AS O
                          INNER JOIN
                            tbl_kullanici AS K ON O.user_id = K.id
                          INNER JOIN
                            tbl_ogrenci_proje AS OP ON OP.ogrenci_id = O.id
                          INNER JOIN
                            tbl_proje AS P ON P.id = OP.proje_id
                          INNER JOIN
                            tbl_projeturu AS PT ON P.turu = PT.id
                          WHERE
                            PT.id = 1
                          GROUP BY
                            K.id
                      ";
                $sonuc2 =mysqli_query($conn,$query2);
                  $satir=0;
      	       while($sutun=mysqli_fetch_array($sonuc2)){
                        $query ='
                              SELECT
                              *
                              FROM
                              tbl_ogrenci_proje AS OP
                              INNER JOIN
                                tbl_proje AS P ON P.id = OP.proje_id
                              INNER JOIN
      				          tbl_projeturu AS PT ON P.turu = PT.id
                              WHERE OP.ogrenci_id='.$sutun["ogrenciId"].' AND onay=1 AND PT.id =1 ' ;
                      $sonuc =mysqli_query($conn,$query);
                          if(@mysqli_num_rows($sonuc) ==1 )
                          {
                               $satir++;
                                echo '<tr>
                                <td title="'.$satir.'">'.$satir.'</td>
                                <td title="'.$sutun["numara"].'">'.$sutun["numara"].'</td>
                                <td title="'.$sutun["ogrenciAdi"].'">'.$sutun["ogrenciAdi"].'</td>
                                <td title="'.$sutun["ogrenciSoyadi"].'">'.$sutun["ogrenciSoyadi"].'</td>
                                <td title="'.$sutun["projeTuru"].'">'.$sutun["projeTuru"].'</td>
                                <td><span class="label label-success ">Onaylanmış</span></td>
                                <td><a href="index.php?sayfa=komisyon-proje-tabanli-detayli-gorunum&id='.$sutun["ogrenciId"].'&ogrenciAdi='.$sutun["ogrenciAdi"].'&foto='.$sutun["foto"].'&ogrenciSoyadi='.$sutun["ogrenciSoyadi"].'&numara='.$sutun["numara"].'&projeTuru='.$sutun["projeTuru"].'&projeTuruId='.$sutun["projeTuruId"].'&rol='.$sutun["rol"].'" class="fa fa-search"/></td>
                                </tr>  ';
                          }
                          else if(@mysqli_num_rows($sonuc) ==0){
                              $satir++;
                                echo '<tr>
                                <td title="'.$satir.'">'.$satir.'</td>
                                <td title="'.$sutun["numara"].'">'.$sutun["numara"].'</td>
                                <td title="'.$sutun["ogrenciAdi"].'">'.$sutun["ogrenciAdi"].'</td>
                                <td title="'.$sutun["ogrenciSoyadi"].'">'.$sutun["ogrenciSoyadi"].'</td>
                                <td title="'.$sutun["projeTuru"].'">'.$sutun["projeTuru"].'</td>
                                <td><span class="label label-warning">Onaylanmamış</span></td>
                                <td><a href="index.php?sayfa=komisyon-proje-tabanli-detayli-gorunum&id='.$sutun["ogrenciId"].'&ogrenciAdi='.$sutun["ogrenciAdi"].'&foto='.$sutun["foto"].'&ogrenciSoyadi='.$sutun["ogrenciSoyadi"].'&numara='.$sutun["numara"].'&projeTuru='.$sutun["projeTuru"].'&projeTuruId='.$sutun["projeTuruId"].'&rol='.$sutun["rol"].'" class="fa fa-search"/></td>
                                </tr>  ';
                          }

                 }
              }


                 function commissionProjectBasedDetailedView()
                 {
                    $ogrId=$_GET["id"];
                    $rol=$_GET["rol"];
                    $projeTuru=$_GET["projeTuru"];
                    $projeTuruId=$_GET["projeTuruId"];
                       global $conn;
                     $query="SELECT
                            OP.id AS basvuruId,
                            P.id AS projeId,
                            P.adi AS projeAdi,
                            P.konu AS projeKonu,
                            P.turu AS projeTuru,
                            P.kisi_sayisi AS kisiSayisi,
                            P.danisman_sayisi AS danismanSayisi,
                            P.oneren_id AS onerenId,
                            (SELECT adi FROM tbl_kullanici AS TK  INNER JOIN tbl_ogrenci AS O ON O.user_id=TK.id WHERE O.id= P.oneren_id
                            UNION
                             SELECT adi FROM tbl_kullanici AS TK  INNER JOIN tbl_danisman AS D ON D.user_id=TK.id WHERE D.id= P.oneren_id
                            ) AS onerenAdi,
                            (SELECT soyadi FROM tbl_kullanici AS TK  INNER JOIN tbl_ogrenci AS O ON O.user_id=TK.id WHERE O.id= P.oneren_id
                            UNION
                             SELECT soyadi FROM tbl_kullanici AS TK  INNER JOIN tbl_danisman AS D ON D.user_id=TK.id WHERE D.id= P.oneren_id
                            ) AS onerenSoyadi,
                            OP.onay AS onay
                          FROM
                            tbl_ogrenci AS O
                          INNER JOIN
                            tbl_kullanici AS K ON O.user_id = K.id
                          INNER JOIN
                            tbl_ogrenci_proje AS OP ON OP.ogrenci_id = O.id
                          INNER JOIN
                            tbl_proje AS P ON P.id = OP.proje_id
                          INNER JOIN
                            tbl_projeturu AS PT ON P.turu = PT.id
                          WHERE
                            PT.id =".$projeTuruId." AND O.id=".$ogrId."    ";
                        $sonuc =mysqli_query($conn,$query);
                          $satir=0;
              	       while($sutun=mysqli_fetch_array($sonuc)){
                                      $satir++;
                                         $query2 =' SELECT * FROM `tbl_ogrenci_proje` WHERE proje_id='.$sutun["projeId"].' AND ogrenci_id='.$ogrId.' AND onay=1';
                                         $sonuc2 =mysqli_query($conn,$query2);

                                        echo '<tr>
                                        <td title="'.$satir.'">'.$satir.'</td>
                                        <td title="'.$sutun["projeAdi"].'">'.$sutun["projeAdi"].'</td>
                                        <td title="'.$sutun["projeKonu"].'">'.$sutun["projeKonu"].'</td>
                                        <td title="'.$sutun["kisiSayisi"].'">'.$sutun["kisiSayisi"].'</td>
                                        <td title="'.$sutun["danismanSayisi"].'">'.$sutun["danismanSayisi"].'</td>
                                        <td title="'.$sutun["onerenAdi"].' '.$sutun["onerenSoyadi"].'">'.$sutun["onerenAdi"].' '.$sutun["onerenSoyadi"].'</td>
                                        <td>  <input type="checkbox" class="active"  basvuruid="'.$sutun["basvuruId"].'" projeid="'.$sutun["projeId"].'"  projeTuruId="'.$projeTuruId.'"  onchange="acceptingApplications(this);"  value="'.$ogrId.'"';
                                        if(@mysqli_num_rows($sonuc2) ==1) echo "checked";  echo'/></td>
                                        </tr>  ';

                         }
                 }


                 function commissionSearchApplicantStudentList(){
                    global $conn;

                    $ogrenciNumara=@$_POST["ogrenciNumara"];
                          $ogrenciAdi=@$_POST["ogrenciAdi"];
                          $projeTuru=@$_POST["projeTuru"];
                          $onay=@$_POST["onay"];
                      $query2 ="SELECT
                                    K.id,
                                    K.adi AS ogrenciAdi,
                                    K.soyadi AS ogrenciSoyadi,
                                    K.foto AS foto,
                                    O.numara AS numara,
                                    K.id AS ogrenciId,
                                    P.id AS projeId,
                                    PT.id AS projeTuruId,
                                    PT.tur AS projeTuru
                                  FROM
                                    tbl_ogrenci AS O
                                  INNER JOIN
                                    tbl_kullanici AS K ON O.user_id = K.id
                                  INNER JOIN
                                    tbl_ogrenci_proje AS OP ON OP.ogrenci_id = O.id
                                  INNER JOIN
                                    tbl_proje AS P ON P.id = OP.proje_id
                                  INNER JOIN
                                    tbl_projeturu AS PT ON P.turu = PT.id
                                  WHERE
                                    PT.id = ".$projeTuru." AND O.numara LIKE'%".$ogrenciNumara."%' AND  K.adi LIKE'%".$ogrenciAdi."%'
                                  GROUP BY
                                    K.id
                              ";
                        $sonuc2 =mysqli_query($conn,$query2);
                          $satir=0;
                       while($sutun=mysqli_fetch_array($sonuc2)){
                                $query ='
                                      SELECT
                                      *
                                      FROM
                                      tbl_ogrenci_proje AS OP
                                      INNER JOIN
                                        tbl_proje AS P ON P.id = OP.proje_id
                                      INNER JOIN
                                tbl_projeturu AS PT ON P.turu = PT.id
                                      WHERE OP.ogrenci_id='.$sutun["ogrenciId"].' AND onay=1 AND PT.id =1 ' ;
                              $sonuc =mysqli_query($conn,$query);
                                  if(@mysqli_num_rows($sonuc) ==1 )
                                  {
                                       $satir++;
                                        echo '<tr>
                                        <td title="'.$satir.'">'.$satir.'</td>
                                        <td title="'.$sutun["numara"].'">'.$sutun["numara"].'</td>
                                        <td title="'.$sutun["ogrenciAdi"].'">'.$sutun["ogrenciAdi"].'</td>
                                        <td title="'.$sutun["ogrenciSoyadi"].'">'.$sutun["ogrenciSoyadi"].'</td>
                                        <td title="'.$sutun["projeTuru"].'">'.$sutun["projeTuru"].'</td>
                                        <td><span class="label label-success ">Onaylanmış</span></td>
                                        <td><a href="index.php?sayfa=komisyon-proje-tabanli-detayli-gorunum&id='.$sutun["ogrenciId"].'&ogrenciAdi='.$sutun["ogrenciAdi"].'&foto='.$sutun["foto"].'&ogrenciSoyadi='.$sutun["ogrenciSoyadi"].'&numara='.$sutun["numara"].'&projeTuru='.$sutun["projeTuru"].'&projeTuruId='.$sutun["projeTuruId"].'" class="fa fa-search"/></td>
                                        </tr>  ';
                                  }
                                  else if(@mysqli_num_rows($sonuc) ==0){
                                      $satir++;
                                        echo '<tr>
                                        <td title="'.$satir.'">'.$satir.'</td>
                                        <td title="'.$sutun["numara"].'">'.$sutun["numara"].'</td>
                                        <td title="'.$sutun["ogrenciAdi"].'">'.$sutun["ogrenciAdi"].'</td>
                                        <td title="'.$sutun["ogrenciSoyadi"].'">'.$sutun["ogrenciSoyadi"].'</td>
                                        <td title="'.$sutun["projeTuru"].'">'.$sutun["projeTuru"].'</td>
                                        <td><span class="label label-warning">Onaylanmamış</span></td>
                                        <td><a href="index.php?sayfa=komisyon-proje-tabanli-detayli-gorunum&id='.$sutun["ogrenciId"].'&ogrenciAdi='.$sutun["ogrenciAdi"].'&foto='.$sutun["foto"].'&ogrenciSoyadi='.$sutun["ogrenciSoyadi"].'&numara='.$sutun["numara"].'&projeTuru='.$sutun["projeTuru"].'&projeTuruId='.$sutun["projeTuruId"].'" class="fa fa-search"/></td>
                                        </tr>  ';
                                  }

                         }
                 }
      function projeleriListele($projeTipi,$proje)
      {
                      global $conn;
                      $query='SELECT
                               *
                             FROM
                               tbl_proje AS P
                             WHERE
                               P.turu='.$proje->getTur().' AND P.kisi_sayisi'.$projeTipi.'1 AND P.projedurum_id=1
                               ';
                      $sonuc2 =mysqli_query($conn,$query);
                             $satir=0;
                 	       while($sutun=mysqli_fetch_array($sonuc2)){
                                echo '<tr>
                                   <td title="'.$sutun["adi"].'">'.$sutun["adi"].'</td>
                                   <td title="'.$sutun["konu"].'">'.$sutun["konu"].'</td>
                                   <td title="'.$sutun["kisi_sayisi"].'">'.$sutun["kisi_sayisi"].'</td>
                                   <td title="'.$sutun["danisman_sayisi"].'">'.$sutun["danisman_sayisi"].'</td>
                                    <td title="'.$sutun["accept_date"].'">'.$sutun["accept_date"].'</td>
                                   <td><input type="checkbox" class="pasif"  id="'.$sutun["id"].'"   onchange="sonlandir(this);"
                                    value="'.$sutun["id"].'"></td>
                                   </tr>';
                        }
         }
         function projeListeleDanismanSayisiIslem($proje)
         {  global $conn;
            $query="SELECT
                       P.id AS id,
                       K.adi AS onerenAdi,
                       K.soyadi AS onerenSoyadi,
                       P.adi AS projeAdi,
                       P.konu AS konu,
                       P.kisi_sayisi AS kisiSayisi,
                       P.danisman_sayisi AS danismanSayisi
                             FROM
                               tbl_proje AS P
                            INNER JOIN
                                tbl_danisman  AS D ON D.id=P.oneren_id
                            INNER JOIN
                            	tbl_kullanici AS K ON K.id=D.user_id
                             WHERE
                               P.turu=".$proje->getTur()." AND P.adi LIKE  '%".$proje->getAdi()."%' AND P.danisman_sayisi LIKE  '%".$proje->getDanismanSayisi()."%' AND P.projedurum_id=".$proje->getDurum()."";
                $sonuc2 =mysqli_query($conn,$query);
                while(@$sutun=mysqli_fetch_array($sonuc2)){
                       echo '<tr>
                           <td title="'.$sutun["onerenAdi"].' '.$sutun["onerenSoyadi"].'">'.$sutun["onerenAdi"].' '.$sutun["onerenSoyadi"].'</td>
                                 <td title="'.$sutun["projeAdi"].'">'.$sutun["projeAdi"].'</td>
                              <td title="'.$sutun["konu"].'">'.$sutun["konu"].'</td>
                               <td title="'.$sutun["kisiSayisi"].'">'.$sutun["kisiSayisi"].'</td>
                               <td>
                                    <i class=" btn btn-success   fa fa-plus"  id="'.$sutun["id"].'" selecter="arttir"  activeConsultantCount="'.$sutun["danismanSayisi"].'" " onclick="consultantCountIncrease(this);"></i>
                                    <span style="font-weight: bold;">'.$sutun["danismanSayisi"].'</span></br>
                                    <i class="  btn btn-danger fa fa-minus" id="'.$sutun["id"].'" selecter="azalt" activeConsultantCount="'.$sutun["danismanSayisi"].'" " onclick="consultantCountIncrease(this);"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 </td>
                                  </tr>';
                 }
         }

}
