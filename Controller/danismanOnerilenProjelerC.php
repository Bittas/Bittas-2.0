<?php

require_once("Model/danisman.php");

class danismanOnerilenProjelerC
{
  public function danismanOnerilenProjeler()
  {
    $danisman=new Danisman();
    return $danisman->onerilenProjeler();
  }
}

?>
