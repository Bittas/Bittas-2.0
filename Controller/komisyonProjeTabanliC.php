<?php

require_once("Model/komisyon.php");

class KomisyonProjeTabanliC
{

  public function listele()
  {  $komisyon=new Komisyon();
      if(@$_POST["listele"] && $_GET["sayfa"]=="komisyon-proje-tabanli"){
        return $komisyon->commissionSearchApplicantStudentList();
     }
     else if($_GET["sayfa"]=="komisyon-proje-tabanli")
          return $komisyon->komisyonProjeBasvuruListeleHepsi();
  }

}

 ?>
