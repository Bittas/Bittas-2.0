<?php
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

	function projeTuruHepsiniGetir(){
		global $conn;
		$sorgu="select * from tbl_projeturu";
		$sonuc =mysqli_query($conn,$sorgu);
		if ($sonuc) {
			return $sonuc;
   //         while($row=mysqli_fetch_array($sonuc)){
   //         	echo '<option value="'.$row["id"].'">'.$row["tur"].'</option>';
   //         }
		}
	}
	?>
