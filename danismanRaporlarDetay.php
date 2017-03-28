    <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
        <!-- The time line -->
        <ul class="timeline">
          <!-- timeline time label -->
          <?php
          include_once("Controller/danismanRaporC.php");
          if (isset($_GET["projeID"])&&isset($_GET["ogrenciID"])) {
          $sonuc=DanismanRaporC::danismanRaporProjeGetir();
          
          $tarihTut=0000-00-00;
          while($proje=mysqli_fetch_array($sonuc)){
            $raporAdi=explode("/", $proje["rapor_url"]);
            $gunFarki=date("Y-m-d")-$proje["date"];
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
          }
          ?>
          <!-- END timeline item -->
        </ul>
      </div>
      <!-- /.col -->
    </section>
    <!-- /.content -->