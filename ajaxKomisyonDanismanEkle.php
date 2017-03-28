<?php

 require_once("include/config.php");
 require_once("include/function.php");

  $sayfa = @$_POST["page"];
  if($sayfa=="komisyon-danisman-ekle")
      komisyonDanismanEkleme();
//komisyon projeler ve danismanlari listeleme ajax
     function komisyonDanismanEkleme()
    {
          global $conn;
		      $selectOnay = @$_POST["selectOnay"];
		      $selectProjeTuru = @$_POST["selectProjeTuru"];
          echo '<table id="databaseTablo" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Sıra</th>
                        <th>Proje Adı</th>
                        <th>Proje Türü</th>
                        <th>Proje Durumu</th>
                        <th>Detay</th>
                      </tr>
                      </thead>
                      <tbody>';
            $query2 ="SELECT
                    P.id AS projeId,
                    P.adi AS projeAdi,
                    PD.durum AS projeDurumu,
                    PT.tur AS projeTuru
                    FROM
                    tbl_proje AS P
                    INNER JOIN
                    tbl_projedurum AS PD
                    ON
                    P.projedurum_id = PD.id
                    INNER JOIN
                    tbl_projeturu AS PT
                    ON
                    P.turu = PT.id
                    WHERE
                    P.projedurum_id LIKE '%$selectOnay%'
                    AND
                    P.turu LIKE '%$selectProjeTuru%'
                  ";
                  $satir=0;
                  $sonuc2 =mysqli_query($conn,$query2);
                   while($sutun=mysqli_fetch_array($sonuc2))
                   {
                   $onayDurumu = $sutun["projeDurumu"];
                       if($onayDurumu == "Pasif")
                       {
                            $satir++;
                             echo '<tr>
                             <td title="'.$satir.'">'.$satir.'</td>
                             <td title="'.$sutun["projeAdi"].'">'.$sutun["projeAdi"].'</td>
                             <td title="'.$sutun["projeTuru"].'">'.$sutun["projeTuru"].'</td>
                             <td><span class="label label-warning">Onaylanmamış</span></td>
                             <td><a href="index.php?sayfa=komisyon-danisman-ekle-detayli-gorunum&id='.$sutun["projeId"].'" class="fa fa-search"/></td>
                             </tr>  ';
                       }
                       else if($onayDurumu == "Aktif"){
                             $satir++;
                              echo '<tr>
                              <td title="'.$satir.'">'.$satir.'</td>
                              <td title="'.$sutun["projeAdi"].'">'.$sutun["projeAdi"].'</td>
                              <td title="'.$sutun["projeTuru"].'">'.$sutun["projeTuru"].'</td>
                              <td><span class="label label-success ">Onaylanmış</span></td>
                              <td><a href="index.php?sayfa=komisyon-danisman-ekle-detayli-gorunum&id='.$sutun["projeId"].'" class="fa fa-search"/></td>
                              </tr>  ';
                       }

              }
                  echo "</table>";

      }

?>
