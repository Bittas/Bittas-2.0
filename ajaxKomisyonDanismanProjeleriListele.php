<?php

 require_once("include/config.php");
 require_once("include/function.php");

$sayfa = @$_POST["page"];
if($sayfa=="komisyon-danisman-ekle")
danismanProjeleriListele();

    function danismanProjeleriListele()
    {
        global $conn;
        echo tablo();
          $projeOnay = @$_POST["projeOnay"];
          $projeTuru = @$_POST["projeTuru"];
          $query2 ="SELECT
                    P.adi as ProjeAdi,
                    PD.durum as ProjeDurumu,
                    PT.tur as ProjeTuru
                    from
                    tbl_proje as P
                    INNER JOIN
                    tbl_projedurum as PD
                    on  P.projedurum_id = PD.id
                    INNER JOIN
                    tbl_projeturu as PT
                    on  P.turu = PT.id
                    where
                    P.projedurum_id='.$projeOnay.'
                    and
                    P.turu = '.$projeTuru.'
                ";
               $satir=0;
               $sonuc2 =mysqli_query($conn,$query2);
                while($sutun=mysqli_fetch_array($sonuc2))
                {
                $onayDurumu = $sutun["ProjeDurumu"];
                    if($onayDurumu == "Pasif")
                    {
                         $satir++;
                          echo '<tr>
                          <td title="'.$satir.'">'.$satir.'</td>
                          <td title="'.$sutun["ProjeAdi"].'">'.$sutun["ProjeAdi"].'</td>
                          <td title="'.$sutun["ProjeTuru"].'">'.$sutun["ProjeTuru"].'</td>
                          <td title="'.$sutun["ProjeDurumu"].'">'.$sutun["ProjeDurumu"].'</td>
                          <td><span class="label label-warning">Onaylanmış</span></td>
                          <td><a href="index.php?sayfa=komisyon-danisman-ekle-detayli-gorunum&id='.$sutun["ogrenciId"].'" class="fa fa-search"/></td>
                          </tr>  ';
                    }
                    else if($onayDurumu == "Aktif"){
                          $satir++;
                           echo '<tr>
                           <td title="'.$satir.'">'.$satir.'</td>
                           <td title="'.$sutun["ProjeAdi"].'">'.$sutun["ProjeAdi"].'</td>
                           <td title="'.$sutun["ProjeTuru"].'">'.$sutun["ProjeTuru"].'</td>
                           <td title="'.$sutun["ProjeDurumu"].'">'.$sutun["ProjeDurumu"].'</td>
                           <td><span class="label label-success ">Onaylanmış</span></td>
                           <td><a href="index.php?sayfa=komisyon-danisman-ekle-detayli-gorunum&id='.$sutun["ogrenciId"].'" class="fa fa-search"/></td>
                           </tr>  ';
                    }

           }
               echo "</table>";
    }

function tablo(){
    return '  <table id="databaseTablo" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sıra</th>
                  <th>Proje Adı</th>
                  <th>Proje Türü</th>
                  <th>Proje Durumu</th>
                  <th>Detay</th>
                </tr>
                </thead>
                <tbody>
                ';
}

?>
