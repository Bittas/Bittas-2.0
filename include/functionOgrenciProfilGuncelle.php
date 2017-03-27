<?php

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

	?>
