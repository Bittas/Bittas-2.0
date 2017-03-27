<?php
 require_once("include/config.php");
 require_once("include/function.php");

 if (@$_POST['selecter']=="arttir") {
   echo  arttir();
 }
 if (@$_POST['selecter']=="azalt") {
   echo  azalt();
 }

function azalt(){
  global $conn;
 $aktifDanismanSayisi = ($_POST['activeConsultantCount']);

     $projeId = ($_POST['id']);
     $queryControl="SELECT * FROM tbl_proje_danisman AS PD
                    WHERE
                    PD.proje_id=$projeId ";
      $result=mysqli_query($conn,$queryControl);
      if(@mysqli_num_rows($result)<$aktifDanismanSayisi){
         $aktifDanismanSayisi=$aktifDanismanSayisi-1;
        $query="UPDATE tbl_proje AS P
                SET P.danisman_sayisi=$aktifDanismanSayisi
                WHERE P.id=$projeId";

         		if(@mysqli_query($conn,$query)){
         			return successMesaj("Danışman sayısı güncellendi...");

         		}else{
         			return errorMesaj("Danışman sayısı güncellenemedi...");
         		}
      }
      else {
        return errorMesaj("İlk önce danışmanları silmelisiniz...");
      }
 	}
function arttir(){
 global $conn;
 $aktifDanismanSayisi = ($_POST['activeConsultantCount']);
 $aktifDanismanSayisi=$aktifDanismanSayisi+1;
     $projeId = ($_POST['id']);
     $query="UPDATE tbl_proje AS P
             SET P.danisman_sayisi=$aktifDanismanSayisi
             WHERE P.id=$projeId";

         		if(@mysqli_query($conn,$query)){
         			return successMesaj("Danışman sayısı güncellendi...");

         		}else{
         			return errorMesaj("Danışman sayısı güncellenemedi...");
         		}
 	}
 ?>
