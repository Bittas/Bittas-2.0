

<?php
include_once("Controller/ogrenciRaporYukleC.php");
if(isset($_FILES['file-2'])){
  echo OgrenciRaporYukle::raporYukle($_FILES['file-2']);
}
?>


    <!-- Main content -->
    <section class="content">
    <?php $sonuc1= OgrenciRaporYukle::raporYukleyebilirMi();
    

   if ($sonuc1) {
      $durum=mysqli_fetch_array($sonuc1);
      if ($durum["projedurum_id"]==1) {
         echo '<form method="post" enctype="multipart/form-data">';
            echo '<div class="row">';
               echo '<div class="col-xs-2">';
                  echo '<input type="file" name="file-2" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
   <label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Rapor seçin&hellip;</span></label>';
               echo '</div>';
               echo '<div class="col-xs-8"><input type="submit" name="kaydet" value="Yükle" class="btn btn-primary"></div>';
            echo '</div>';
         echo '</form>';
      }
      else{
         return warningMesaj("Bu proje Aktif değil, rapor yükleyemezsiniz");
    }
   }
   else
      echo "sorgu hatalı";

     ?>




        <!-- The time line -->
        <ul class="timeline">
          <!-- timeline time label -->
          <?php $sonuc=OgrenciRaporYukle::raporGetirKisiyeGore();
          
      $tarihTut=0000-00-00;

      while($proje=mysqli_fetch_array($sonuc)){
         $raporAdi=explode("/", $proje["rapor_url"]);
         $gunFarki=date("Y-m-d").$proje["date"];
      $ilktarihstr=strtotime($proje["date"]);//ilk tarihi strtotime ile çeviriyom
      $sontarihstr=strtotime(date("Y-m-d"));//ilk tarihi strtotime ile çeviriyom
      $fark=($sontarihstr-$ilktarihstr)/86400;
      if (($sontarihstr-$ilktarihstr)/86400==0)//sondan ilki çıkarıp 86400 e bölüyoz bu bize günü verecek
         $farkMesaj="Bugün";
      else
         $farkMesaj=$fark." gün önce";
         if($tarihTut==$proje["date"]){
            //<!-- timeline item -->
            echo '<li>';
               echo '<i class="fa fa-file-zip-o bg-blue"></i>';
               echo '<div class="timeline-item">';
                  echo '<span class="time"><i class="fa fa-clock-o"></i> '.$farkMesaj.'</span>';
                  echo '<h3 class="timeline-header no-border">Proje adı: '.$proje["pAdi"].'</h3>';
                  echo '<div class="timeline-body"><label>'.end($raporAdi).'</label></div>';
                  echo '<div class="timeline-footer"><a class="btn btn-primary btn-xs" href="'.$proje["rapor_url"].'">İndir</a></div>';
               echo '</div>';
            echo '</li>';
            }
         else{
            echo '<li class="time-label">';
               echo '<span class="bg-green">';
                  echo $proje["date"];
               echo '</span>';
            echo '</li>';
               //<!-- /.timeline-label -->
               //<!-- timeline item -->
            echo '<li>';
               echo '<i class="fa fa-file-zip-o bg-blue"></i>';
               echo '<div class="timeline-item">';
                  echo '<span class="time"><i class="fa fa-clock-o"></i> '.$farkMesaj.'</span>';
                  echo '<h3 class="timeline-header no-border">Proje adı: '.$proje["pAdi"].'</h3>';
                  echo '<div class="timeline-body"><label>'.end($raporAdi).'</label></div>';
                  echo '<div class="timeline-footer"><a class="btn btn-primary btn-xs" href="'.$proje["rapor_url"].'">İndir</a></div>';
               echo '</div>';
            echo '</li>';
         }
         $tarihTut=$proje["date"];
      }

           ?>
          <!-- END timeline item -->
        </ul>
      <!-- /.col -->
    </section>
    <!-- /.content -->