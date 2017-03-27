<?php
/**
 * sayfa getirme işlemi
 */
class Sayfa
{
  private $nesne;
  private $sayfa;

  public function Nesne()
  {
    if ($nesne==NULL) {
      $nesne=new Sayfa();
    }
    else{
      return $nesne;
    }
  }

  public function SayfaGetir()
  {
  	//	$sayfa =@$_GET["sayfa"];
      if($sayfa =="profil-duzenle")
      {
        if($_SESSION["staj"]["rol"] == 1){// profil düzenleme sayfaları buraya !!!
           require_once("ogrProfilDuzenle.php");
        }
      }
      else if ($sayfa=="proje-oner")
      {
        if($_SESSION["staj"]["rol"] == 2){// proje önerme sayfaları buraya !!!
          require_once("danismanProjeOner.php");
        }
      }
      else if ($sayfa=="proje-onerilen")
      {
        if($_SESSION["staj"]["rol"] == 2){// önerilen projeler sayfaları buraya !!!
          require_once("danismanProjeOnerileri.php");
        }
      }
  	   else if($sayfa=="ogrenci-proje-onerme"){
             require_once("ogrenciProjeOnerme.php");
         }else if($sayfa=="bireysel-projeler"){
             require_once("ogrenciProjesiBasvuru.php");
         }
         else if($sayfa=="grup-projeler"){
             require_once("ogrenciProjesiBasvuru.php");
         }
         else if($sayfa=="basvurulan-projeleri"){
             require_once("ogrenciProjesiBasvuru.php");
         }
         else if($sayfa=="komisyon-proje-tabanli"){
             require_once("komisyonProjeTabanli.php");
         }
         else if($sayfa=="komisyon-proje-tabanli-detayli-gorunum"){
             require_once("komisyonProjeTabanliDetayliGorunum.php");
         }
        else if($sayfa=="tasarim-projesi"){
             require_once("tasarimProjesi.php");
         }
         else if($sayfa=="bitirme-projesi"){
             require_once("bitirmeProjesi.php");
         }
      else if($sayfa=="mesajlar"){
        require_once("mesajlar.php");
      }
      else if($sayfa=="komisyon-proje-onerileri"){
        require_once("komisyonOneriProjeDurum.php");
      }
      else if($sayfa=="rapor-islemleri"){
        require_once("ogrenciRapor.php");
      }//////////////////////////
  	   else if($sayfa=="proje-danismanb"){
             require_once("ogrenciDanismanBasvurubitirme.php");
         }///////////////////////////////////////////////////////////////////
  	   else if($sayfa=="proje-danismant"){
             require_once("ogrenciDanismanBasvurutasarim.php");
         }///////////////////////////////////////////////////////////////////

  		else if($sayfa=="form-goster"){//////////////////////////////////////
  			require_once("staj_form.php");
  		}else if($sayfa=="danisman-islemleri"){//////////////////////////////
  			require_once("danisman_islemleri.php");
  		}///////
  		else if ($sayfa == "ogrenci-danisman-basvurusu"){
  			require_once("ogrenci_danisman_basvuru.php");
  		}else if ($sayfa == "danisman-onaylama"){
  			require_once("danisman_onayla.php");
  		}/////////////////////////////////////////////////////////////////////
          else if ($sayfa == "listele"){
  			require_once("komisyonListele.php");
  		}
  		////////////////////////////

  		else if ($sayfa=="danisman-raporlar") {
  			require_once("danismanRaporlar.php");
  		}
  		else if ($sayfa=="danisman-raporlar-detay") {
  			require_once("danismanRaporlarDetay.php");
  		}
  		else if ($sayfa=="eslesme") {
  			require_once("komisyonEslesme.php");
  		}
  		else if ($sayfa=="ogrenci-kayit-onay") {
  			require_once("danismanOgrenciKayitOnay.php");
  		}
  		else if ($sayfa=="ogrenci-kayit-iptal") {
  			require_once("danismanOgrenciKayitIptal.php");
  		}
  		else if ($sayfa=="danisman-profil-duzenle") {
  			require_once("danismanProfilDuzenle.php");
  		}
  		else if ($sayfa=="danismana-ogrenci-proje-listele") {
  			require_once("danismanOgrenciProjeListeleme.php");
  		}
  }
}

 ?>
