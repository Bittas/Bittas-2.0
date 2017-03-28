<?php

require_once("Model/danisman.php");

class danismanProjeTuruHepsiniGetirC
{
    public function projeTuruHepsiniGetir()
    {
      $danisman = new Danisman();
      return $danisman->projeTuruHepsiniGetir();
    }
}

?>
