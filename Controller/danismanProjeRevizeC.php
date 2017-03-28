<?php

require_once("Model/proje.php");
require_once("Model/komisyon.php");

class danismanProjeRevizeC
{

  public function danismanProjeRevize($id)
  {
    $komisyon=new Komisyon();
    $komisyon->setId($id);
    $proje = new Proje();
    return $proje->projeBilgileriGetir($komisyon);

  }
}

?>
