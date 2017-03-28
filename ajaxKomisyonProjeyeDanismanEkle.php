<?php

 require_once("include/config.php");
 require_once("include/function.php");

//check olayı ajax
   echo KomisyonProjeyeDanismanEkle();
   function KomisyonProjeyeDanismanEkle()
   {
        global $conn;
        $projeId = ($_POST['projeId']);
        $danismanId = ($_POST['danismanId']);
        $check=($_POST['active']);
        $onayliDanismanSayisi=0;
        $projeDanismanSayisi=0;
        $projeDanismaniGoster=0;

        $query1="SELECT COUNT(*) as onayliDanismanSayisi
        FROM
        tbl_proje_danisman AS PD
        WHERE
        PD.proje_id = '$projeId'";
        $sonuc=@mysqli_query($conn,$query1);
        if($satir=@mysqli_fetch_array($sonuc)){
        $onayliDanismanSayisi = $satir['onayliDanismanSayisi'];
        }

        $query2="SELECT P.danisman_sayisi AS projeDanismanSayisi
        FROM
        tbl_proje AS P
        where P.id = '$projeId'";
        $sonuc=@mysqli_query($conn,$query2);
        if($satir=mysqli_fetch_array($sonuc))
        $projeDanismanSayisi=$satir['projeDanismanSayisi'];

            if($check==1)
            {
               if ( $onayliDanismanSayisi < $projeDanismanSayisi )
               {
                    $projeDanismaniGoster = $projeDanismanSayisi - $onayliDanismanSayisi-1;
                    $query ="INSERT INTO `tbl_proje_danisman`
                		(`danisma_id`, `proje_id`) VALUES ($danismanId, $projeId)";

                		if(mysqli_query($conn,$query)){
                			return successMesaj("Projeye Danışman Eklendi.
                        $projeDanismaniGoster adet danışman ekleme hakkınız kaldı.");

                		}else{
                			return errorMesaj("Projeye Danışman Eklenemedi..");
                		}
    	         }else
               return warningMesaj("Projeye Danışman Eklenemedi. Maksimum sınıra ulaşıldı.
               $projeDanismaniGoster adet danışman ekleme hakkınız kaldı.");
            }

            if($check==0)
            {
                  $query4="SELECT *
                  FROM `tbl_proje_danisman`
                  WHERE proje_id = '$projeId'
                  &&
                  danisma_id = '$danismanId'";

                    $sonuc4=@mysqli_query($conn,$query4);
                    $rowCount=mysqli_num_rows($sonuc4);
                        if($rowCount > 0)
                        {
                        $projeDanismaniGoster = $projeDanismanSayisi - $onayliDanismanSayisi+1;
                        $query ="DELETE
                        FROM `tbl_proje_danisman`
                		    WHERE proje_id = '$projeId'
                        &&
                        danisma_id = '$danismanId'";
                            if(mysqli_query($conn,$query)==1)
                    				    return deleteMesaj("Danışman Silindi..
                                $projeDanismaniGoster adet danışman ekleme hakkınız bulunmaktadır.");
                            else
                    				    return errorMesaj("Danışman Silinemedi..");
                        }
                				   // return warningMesaj("Danışman Kaydı bulunamadı..");

             }
	}

?>
